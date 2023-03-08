<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Cart;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductDetailComponent extends Component
{
    public $slug;

    public $size;
    public $quantity = 1;
    public $product;
    public $color;
    public $colorDetails;

    public function getColorDetail($color){
        $this->color = $color;
        $this->colorDetails = ProductDetail::where('color', $color)
        ->where('product_id', $this->product->id)
        ->get();
    }

    public function addToCart(){
        if(!empty($this->color)){
            $cartItem = Cart::instance('cart')->add(
                $this->product->id,
                $this->product->name,
                $this->quantity ? $this->quantity : 1,
                $this->product->price,
                $this->product->weight ? $this->product->weight : 0,
                [
                    'size' => $this->size,
                    'color' => $this->color,
                ]
            );
            $cartItem->associate('\App\Models\Product');
            $messageCart = 'Đã thêm sản phẩm vào giỏ hàng';
        }else{
            $messageCart = 'Bạn chưa chọn màu, vui lòng chọn !';
        }
        session()->flash('messageCart', $messageCart);
        $this->dispatchBrowserEvent('messageCart');
        $this->emitTo('client.cart-icon-component','refreshComponent');
    }
    public function addToWishList($product_id, $product_name, $product_price){
        $wishlistItem = Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price);
        $wishlistItem->associate('\App\Models\Product');
        $this->emitTo('client.wishlist-icon-component','refreshComponent');
    }

    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $wishItem){
            if($wishItem->id === $product_id) {
                Cart::instance('wishlist')->remove($wishItem->rowId);
                $this->emitTo('client.wishlist-icon-component','refreshComponent');
                break;
            }
        }
    }
    public function mount($slug){
        $this->product = Product::with('productDetails')->where('slug', $slug)->first();
        session()->put('product_id', $this->product->id);
    }
    public function render()
    {
        $product_category_id = $this->product->productCategory->id;
        $similarProducts = Product::where('product_category_id',$product_category_id)->get();
        $title = $this->product->name;
        return view('livewire.client.product-detail-component',compact('similarProducts'))
        ->layoutData(['title'=> $title]);
    }
}
