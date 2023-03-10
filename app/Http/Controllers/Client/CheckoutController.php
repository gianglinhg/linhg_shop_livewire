<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Str;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use Auth;

class CheckoutController extends Controller
{
    public function index(){
        if(Cart::instance('cart')->count() == 0)
            return redirect()->route('shop.index')
                ->with('message','Giỏ hàng hiện đang trống, không thể thanh toán được');
        $title = 'Thanh toán';
        return view('client.checkout',compact('title'));
    }
    public function storeOrder($validate, $order_code){
        //Kiểm tra nếu trùng tất cả thì không tạo mới
        $customer = Customer::create([
            'first_name' => $validate['first_name'],
            'last_name' => $validate['last_name'],
            'address' => $validate['address'],
            'town' => $validate['town'],
            'city' => $validate['city'],
            'phone' => $validate['phone'],
            'email' => $validate['email'],
        ]);
        if(Auth::check() && Auth::user()->email === $customer->email){
            $request->user()->update([
                'customer_id' => $customer->id,
            ]);
        }
        $order = Order::create([
            'customer_id' => $customer->id,
            'order_code' => $order_code,
            'order_note' => $validate['order_note'],
            'total' => Cart::instance('cart')->total()
        ]);
        foreach(Cart::instance('cart')->content() as $key => $itemCart){
            $order_detail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $itemCart->model->id,
                'qty' => $itemCart->qty,
                'color' => $itemCart->options->color,
                'size' => $itemCart->options->size
            ]);
            if($order_detail) {
                $itemDetail = ProductDetail::where('size',$order_detail->size)
                    ->where('color', $order_detail->color)->first();
                $itemDetail->update([
                    'qty' => $itemDetail->qty - $order_detail->qty
                ]);
                Cart::instance('cart')->remove($itemCart->rowId);
                }
        }
        return $order->total;
    }
    public function store(Request $request){
        $validate = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "address" => "required",
            "town" => "required",
            "city" => "required",
            "phone" => "required",
            "email" => "required",
            "order_note" => "max: 500",
        ]);
        $order_code = Str::upper(Str::random(8));
        $order_total = $this->storeOrder($validate, $order_code);
        if($request->payment_method === 'vnpay')
            $this->vnpay($validate, $order_code, $order_total);
        return redirect('/')->with('message', 'Đã đặt hàng thành công !');
    }
    public function storeVnpay(Request $request){
        $order = Order::where('order_code', $request->vnp_OrderInfo)->first();
        if($request->vnp_ResponseCode == "00") {
            $message = 'Đã thanh toán qua VNPAY';
            $order->order_status = $message;
            $order->save();
        }else{
            $message = 'Thanh toán qua VNPAY bị lỗi';
            $order->order_status = $message;
            $order->save();
        }
        // session()->forget('url_prev');
        return redirect('/')->with('message' , $message);
    }
    public function vnpay($validate, $order_code, $order_total){
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('store-vnpay');
        $vnp_TmnCode = "SU4WDJC6";
        $vnp_HashSecret = "NHHSCVPVJKEMJZNLOOLDTEHSNBFFFBSP";
        $vnp_TxnRef = (string)$order_code;
        $vnp_OrderInfo = $order_code;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = (int)$order_total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => 200,
            'message' => 'OK',
            'data' => $vnp_Url
        );
        header('Location: ' . $vnp_Url);
        die();
            // vui lòng tham khảo thêm tại code demo
        }
}
