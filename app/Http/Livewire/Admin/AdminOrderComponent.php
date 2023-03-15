<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class AdminOrderComponent extends Component
{
    use WithPagination;
    public $isModalInfoBuyer = false;
    public $isModalProducts = false;
    public $isModalStatus = false;

    public $order_item;
    public $order_status;

    public $code;
    protected $queryString = ['code'];


    public function showModalStatus(Order $order){
        $this->reset();
        $this->isModalStatus = true;
        $this->dispatchBrowserEvent('show_change_status');
        $this->order_item = $order;
    }
    public function changeStatusOrder(){
        $this->order_item->update([
            'order_status' => $this->order_status ? $this->order_status : 'Chờ xác nhận'
        ]);
        $this->dispatchBrowserEvent('hide_change_status');
    }
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
    public function deleteOrder(Order $order){
        dd('Bạn đang xóa đơn hàng đó');
    }
    public function render()
    {
        $orders = Order::query();
            if($this->code)
                $orders = $orders->where('order_code','like','%'.$this->code.'%');
        $orders = $orders->where('order_status','!=','Đã hoàn thành')
        ->latest()->paginate(config('admin.paginate'));
        $subtile = new AdminOrderComponent();
        $subtile->name = 'Đơn hàng';
        $subtile->path = route('admin.order');
        return view('livewire.admin.admin-order-component',compact('orders'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => $subtile,
            'title'=>'Đơn hàng đang xử lý'
        ]);
    }
}
