<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
use Cart;
use Illuminate\Http\Request;

class ShopComponent extends Component
{
    use WithPagination;
    public $sort;
    public $productDetail;

    public function quickViewDetail($id){
        $this->dispatchBrowserEvent('show-quickDetail');
        $this->productDetail = Product::findOrFail($id);
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
    public function render(Request $request)
    {
        $products = Product::distinct()
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->where('featured',true)
            ->select('products.*');
        foreach(ProductCategory::all() as $key => $productCategory){
            $productCategory_arr[$key] = $productCategory->slug;
        }
        $for_array = array('men', 'women', 'unisex');
        if($request->has('for') && in_array($request->for, $for_array)){
            $sexCategories = ProductCategory::where('sex',$request->for)->get();
            $products = $products->where(function ($query) use ($sexCategories) {
                foreach($sexCategories as $sexCategory){
                    $query->orWhere('product_category_id',$sexCategory->id);
                }
            });
            if($request->has('category') && in_array($request->category, $productCategory_arr) ){
                $category_id = ProductCategory::where('slug', $request->category)->value('id');
                $products = $products->where('product_category_id', $category_id);
            }
        }
        if(!empty($this->sort)){
            if($this->sort === 'price-low-to-high'){
                $products = $products->orderBy('price','asc');
            }
            if($this->sort === 'price-high-to-low'){
                $products = $products->orderBy('price','desc');
            }
        }
        $products = $products->paginate(12);
        return view('livewire.client.shop-component',compact('products'))
        ->layoutData(['title'=> 'Cửa hàng']);
    }
}
