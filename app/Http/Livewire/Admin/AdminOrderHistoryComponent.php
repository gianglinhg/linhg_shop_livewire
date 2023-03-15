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

    public $code;
    protected $queryString = ['code'];

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
        $orders = Order::query();
            if($this->code)
                $orders = $orders->where('order_code','like','%'.$this->code.'%');
        $orders = $orders->showProductsOrderwhere('order_status','Đã hoàn thành')
        ->latest()->paginate(config('admin.paginate'));
        $subtile = new AdminOrderHistoryComponent();
        $subtile->name = 'Đơn hàng';
        $subtile->path = route('admin.order');
        return view('livewire.admin.admin-order-history-component',compact('orders'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => $subtile,
            'title'=>'Đơn hàng đã hoàn thành'
        ]);
    }
}
