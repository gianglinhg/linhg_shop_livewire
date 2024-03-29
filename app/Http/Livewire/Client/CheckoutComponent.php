<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Cart;
use Str;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use Auth;

class CheckoutComponent extends Component
{
    public $address;
    public $first_name;
    public $last_name;
    public $town;
    public $city;
    public $phone;
    public $email;
    public $order_note;

    public $data;
    public $payment_method = 'cod';

    protected $rules = [
        "first_name" => "required",
        "last_name" => "required",
        "address" => "required",
        "town" => "required",
        "city" => "required",
        "phone" => "required",
        "email" => "required",
        "payment_method" => 'required',
    ];
    public function updatedPaymentMethod(){
        // if ($this->payment_method == 'paypal') {
        //     dd($this->payment_method);
        // } elseif ($this->payment_method == 'vnpay') {
        //     dd($this->payment_method);
        // }
    }
    public function storeOrder(){
        $validate = $this->validate();
        $customer = Customer::create($validate);
        $order = Order::create([
            'customer_id' => $customer->id,
            'order_code' => Str::upper(Str::random(8)),
            'order_note' => $this->order_note ? $this->order_note : null,
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
        return redirect('/')->with('message', 'Đã đặt hàng thành công !');
    }
    public function mount(){
        // $this->payment_method['cod'] = "cod";
        if(Cart::instance('cart')->count() == 0) {
            $this->dispatchBrowserEvent('message');
            return to_route('shop.index')
                ->with('message','Giỏ hàng hiện đang trống, không thể thanh toán được');
        }
        if(Auth::check()){
            $this->first_name = Auth::user()->first_name;
            $this->last_name = Auth::user()->last_name;
            $this->phone = Auth::user()->phone;
            $this->email = Auth::user()->email;
        }
        // if($payment == 'vnpay') $this->storeOrder();
    }
    public function render()
    {
        return view('livewire.client.checkout-component')->layoutData(['title'=>'Thanh toán']);
    }
}
