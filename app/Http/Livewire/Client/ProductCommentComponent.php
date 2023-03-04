<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\ProductComment;
use Auth;

class ProductCommentComponent extends Component
{
    public $comment = [];
    public $product_id;

    public function storeComment(){
        if(Auth::check()){
            $this->validate(
                ['comment.message'=> 'required'],
                ['comment.message.required' => 'Không thể để trống']
            );
            ProductComment::create([
                'product_id' => $this->product_id,
                'messages' => $this->comment['message'],
                'user_id' =>  Auth::id(),
                'name' =>  Auth::user()->name,
                'email' =>  Auth::user()->email,
            ]);
        }else{
            $this->validate([
                'comment.message'=> 'required',
                'comment.name'=> 'required',
                'comment.email'=> 'required'
            ],[
                'comment.message.required' => 'Không thể để trống',
                'comment.name.required' => 'Không thể để trống',
                'comment.email.required' => 'Không thể để trống',
            ]);
            ProductComment::create([
                'product_id' => $this->product_id,
                'messages' => $this->comment['message'],
                'name' =>  $this->comment['name'],
                'email' =>  $this->comment['email'],
            ]);
        }
        $this->reset();
    }
    public function deleteComment($id){
        ProductComment::findOrFail($id)->delete();
    }
    public function mount(){
        $this->product_id = session()->get('product_id');
    }
    public function render()
    {
        $productComments = ProductComment::where('product_id', $this->product_id)
        ->orderBy('created_at', 'asc')->get();
        return view('livewire.client.product-comment-component',compact('productComments'));
    }
}

