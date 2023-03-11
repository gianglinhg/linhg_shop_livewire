<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Auth;
use DB;

class AdminDashboardController extends Controller
{
    public function index(){
        $products_count = DB::table('products')->count();
        $blogs_count = DB::table('blogs')->count();
        $users_count = DB::table('users')->count();
        //Đơn hàng chưa xử lý
        $orders = Order::with('customer')->where('order_status','Chờ xác nhận')
        ->latest()->get();
        //Sản phẩm hết hàng
        $products = DB::table('products')->select('products.*')
            ->whereRaw('(SELECT COALESCE (SUM(qty), 0) FROM product_details WHERE product_id = products.id) = 0')->get();
        return view('admin.dashboard',
            compact('orders','products','products_count','blogs_count','users_count'),[
                    'title' => Auth::user()->name,
                    'subtitle' => 'Dashboard'
                ]);
    }
}
