<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductComment;
use Livewire\WithPagination;

class AdminProductCommentComponent extends Component
{
    use WithPagination;

    public $editMode = false;
    public $idProductCmt;
    public $q;
    protected $queryString = ['q'];

    public function showDeleteCmt($id){
        $this->idProductCmt = $id;
        $this->dispatchBrowserEvent('delete');
    }
    public function deleteCmt(){
        ProductComment::findOrFail($this->idProductCmt)->delete();
        $this->dispatchBrowserEvent('hide-delete');
        session()->flash('message','Xóa thành công');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function changeFeatured($featured, $comment_id ){
        $comment = ProductComment::findOrFail($comment_id);
        $comment->update([
            'featured' => $featured ? 0 : 1,
        ]);
    }
    public function render()
    {
        $productComments = ProductComment::latest();
        if($this->q)
            $productComments = $productComments->where('%'.$this->q.'%');
        $productComments = $productComments->paginate(config('admin.paginate'));
        $subtitle = new AdminProductCommentComponent();
        $subtitle->name = 'Sản phẩm';
        $subtitle->path = route('admin.product');
        return view('livewire.admin.admin-product-comment-component',compact('productComments'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => $subtitle,
            'title'=>'Bình luận sản phẩm'
        ]);
    }
}
