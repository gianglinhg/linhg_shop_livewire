<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogComment;
use Livewire\WithPagination;

class AdminBlogCommentComponent extends Component
{
    use WithPagination;

    public $editMode = false;
    public $idBlogCmt;

    public function showDeleteCmt($id){
        $this->idBlogCmt = $id;
        $this->dispatchBrowserEvent('delete');
    }
    public function deleteCmt(){
        BlogComment::findOrFail($this->idBlogCmt)->delete();
        $this->dispatchBrowserEvent('hide-delete');
        session()->flash('message','Xóa thành công');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }

    public function render()
    {
        $blogComments = BlogComment::latest()->paginate(config('admin.paginate'));
        return view('livewire.admin.admin-blog-comment-component',compact('blogComments'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Tin tức',
            'title' => 'Bình luận tin tức'
        ]);
    }
}
