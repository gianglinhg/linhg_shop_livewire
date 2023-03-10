<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use Cart;

class HomeComponent extends Component
{
    public $productDetail;

    public function quickViewDetail($id){
        $this->productDetail = Product::findOrFail($id);
        $this->dispatchBrowserEvent('show-quickDetail');
    }
    public function addToWishList($product_id, $product_name, $product_price){
        $wishlistItem = Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price);
        $wishlistItem->associate('\App\Models\Product');
        $this->emitTo('client.wishlist-icon-component','refreshComponent');
    }

    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $wiItem){
            if($wiItem->id === $product_id) {
                Cart::instance('wishlist')->remove($wiItem->rowId);
                $this->emitTo('client.wishlist-icon-component','refreshComponent');
                break;
            }
        }
    }
    public function boot(){
        if(session()->has('message')){
            $this->dispatchBrowserEvent('show-message');
        }
    }
    public function render()
    {
        $query = Product::distinct()
        ->join('product_details', 'products.id', 'product_details.product_id')
        ->select('products.*')
        ->where('featured',true)
        ->where('product_details.qty', '>' , 0);
        $bestSellers = $query->limit(6)->get();
        $newArries = $query->limit(6)->latest()->get();
        return view('livewire.client.home-component',compact('bestSellers','newArries'));
    }
}
