<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\ProductComment;
use Auth;
use Carbon\Carbon;

class ProductCommentComponent extends Component
{
    public $message;
    public $product_id;

    public function storeComment(){
        if(Auth::check()){
            $this->validate(
                ['message'=> 'required'],
                ['message.required' => 'Không thể để trống']
            );
            ProductComment::create([
                'product_id' => session()->get('product_id'),
                'messages' => $this->message,
                'user_id' =>  Auth::id(),
            ]);
        }
        $this->reset();
    }
    public function deleteComment($id){
        ProductComment::findOrFail($id)->delete();
    }
    public function mount(){
    }
    public function render()
    {
        $productComments = ProductComment::where('product_id', session()->get('product_id'))
        ->oldest()->get();
        return view('livewire.client.product-comment-component',compact('productComments'));
    }
}

