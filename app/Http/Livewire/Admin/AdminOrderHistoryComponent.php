<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;


class AdminOrderHistoryComponent extends Component
{
    use WithPagination;

    public $isModalInfoBuyer = false;
    public $isModalProducts = false;

    public $order_item;

    public function showModalInfoBuyer($order_id){
        $this->reset();
        $this->isModalInfoBuyer = true;
        $this->dispatchBrowserEvent('show-detail');
        $this->order_item = Order::findOrFail($order_id);
    }
    public function showProductsOrder($order_id){
        $this->reset();
        $this->isModalProducts = true;
        $this->dispatchBrowserEvent('show-products');
        $this->order_item = Order::findOrFail($order_id);
    }
    public function render()
    {
        $orders = Order::where('order_status','Đã hoàn thành')
        ->latest()->paginate(config('admin.paginate'));
        return view('livewire.admin.admin-order-history-component',compact('orders'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Đơn hàng',
            'title'=>'Đơn hàng đã hoàn thành'
        ]);
    }
}
