<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\BlogComment;
use Auth;
use Carbon\Carbon;

class BlogCommentComponent extends Component
{
    public $message;

    public function storeComment(){
        if(Auth::check()){
            $this->validate(['message'=> 'required']);
            $createBlogComment = BlogComment::create([
                'blog_id' => session()->get('blog_id'),
                'messages' => $this->message,
                'user_id' =>  Auth::id()
            ]);
        }
        $this->reset();
    }
    public function deleteComment($id){
        BlogComment::findOrFail($id)->delete();
    }

    public function render()
    {
        $blogComments = BlogComment::where('blog_id', session()->get('blog_id'))->oldest()->get();
        return view('livewire.client.blog-comment-component',compact('blogComments'));
    }
}
