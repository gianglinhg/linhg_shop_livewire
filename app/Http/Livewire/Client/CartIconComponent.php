<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class CartIconComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function removeItem($rowId){
        \Cart::instance('cart')->remove($rowId);
    }
    public function render()
    {
        return view('livewire.client.cart-icon-component');
    }
}
