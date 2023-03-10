<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Auth;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::with('customer')->where('order_status','Chờ xác nhận')
        ->latest()->get();
        //logic ở đây sai
        $products = Product::distinct()
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->select('products.*')
            ->where('product_details.qty', 0)
            ->get();
        return view('livewire.admin.admin-dashboard-component', compact('orders','products'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Dashboard',
            'title'=> Auth::user()->name
        ]);
    }
}
