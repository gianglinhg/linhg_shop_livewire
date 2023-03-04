<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{

    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $wiItem){
            if($wiItem->id === $product_id) {
                Cart::instance('wishlist')->remove($wiItem->rowId);
                $this->emitTo('client.wishlist-icon-component','refreshComponent');
                if(Cart::instance('wishlist')->count() == 0) return to_route('shop.index');
                break;
            }
        }
    }
    public function mount(){
        if(Cart::instance('wishlist')->count() == 0) {
            $this->dispatchBrowserEvent('message');
            return to_route('shop.index')->with('message','Yêu thích hiện đang trống, hãy thêm vào');
        }
    }
    public function render()
    {
        return view('livewire.client.wishlist-component')->layoutData(['title' => 'Yêu thích']);
    }
}
