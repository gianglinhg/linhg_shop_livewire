<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\BlogComment;
use Auth;

class CommentBlogComponent extends Component
{
    public $comment = [];
    public $blog;

    public function storeComment(){
        if(Auth::check()){
            $this->validate(['comment.message'=> 'required']);
            BlogComment::create([
                'blog_id' => session()->get('idBlogDetail'),
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
            ]);
            BlogComment::create([
                'blog_id' => session()->get('idBlogDetail'),
                'messages' => $this->comment['message'],
                'name' =>  $this->comment['name'],
                'email' =>  $this->comment['email'],
            ]);
        }
        $this->reset();
    }
    public function deleteComment($id){
        BlogComment::findOrFail($id)->delete();
    }
    public function render()
    {
        $blogComments = BlogComment::where('blog_id', $this->blog->id)->orderBy('created_at', 'asc')->get();
        return view('livewire.client.comment-blog-component',compact('blogComments'));
    }
}
