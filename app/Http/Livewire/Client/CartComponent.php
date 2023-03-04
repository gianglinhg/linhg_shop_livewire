<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty+1;
        Cart::update($rowId, $qty);
        $this->emitTo('client.cart-icon-component','refreshComponent');
    }
    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty-1;
        if($qty == 0)
        Cart::instance('cart')->update($rowId, 1);
        else Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('client.cart-icon-component','refreshComponent');
    }
    public function removeItem($rowId){
        Cart::instance('cart')->remove($rowId);
        session()->flash('message','Xóa sản phẩm thành công');
        $this->dispatchBrowserEvent('message');
        $this->emitTo('client.cart-icon-component','refreshComponent');
    }
    public function mount(){
        if(Cart::instance('cart')->count() == 0) {
        $this->dispatchBrowserEvent('message');
        return to_route('shop.index')->with('message','Giỏ hàng hiện đang trống, hãy thêm vào');
        }
    }
    public function render(){
        return view('livewire.client.cart-component')->layoutData(['title'=> 'Giỏ hàng']);
    }
}
