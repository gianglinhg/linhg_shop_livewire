<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Cart;
use App\Models\Product;

class ProductDetailComponent extends Component
{
    public $slug;

    public $size;
    public $quantity;
    public $product;
    public $color;

    public function getColorDetail($color){
        $this->color = $color;
    }

    public function addToCart(){
        $cartItem = Cart::instance('cart')->add(
            $this->product->id,
            $this->product->name,
            $this->quantity ? $this->quantity : 1,
            $this->product->price,
            $this->product->weight ? $this->product->weight : 0,
            [
                'size' => $this->size ? $this->size : 'XS',
                'color' => $this->color
            ]
        );
        $cartItem->associate('\App\Models\Product');
        session()->flash('messageCart','Đã thêm sản phẩm vào giỏ hàng');
        $this->dispatchBrowserEvent('messageCart');
        $this->emitTo('client.cart-icon-component','refreshComponent');
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
    public function mount($slug){
        $this->product = Product::with('productDetails')->where('slug', $slug)->first();
    }
    public function render()
    {
        $product_category_id = $this->product->productCategory->id;
        $similarProducts = Product::where('product_category_id',$product_category_id)->get();
        $title = $this->product->name;
        return view('livewire.client.product-detail-component',compact('similarProducts'))->layoutData(['title'=> $title]);
    }
}
