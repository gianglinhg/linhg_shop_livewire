<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\WithPagination;

class AdminBlogCategoryComponent extends Component
{
    use WithPagination;

    public $editMode = false;
    public $idBlogCate;
    public $blogCategory;

    public $name;
    public $slug;
    public $lang;
    public $featured;

    public function generateSlug(){
        $this->slug = \Str::slug($this->name,'-');
    }
    public function showFormAdd(){
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }
    public function storeAdd(){
        BlogCategory::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'lang' => $this->lang,
            'featured' => $this->featured ? 1 : 0
        ]);
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }
    public function showFormEdit($id){
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->blogCategory = BlogCategory::findOrFail($id);
        $this->name = $this->blogCategory->name;
        $this->slug = $this->blogCategory->slug;
        $this->lang = $this->blogCategory->lang;
        $this->featured = $this->blogCategory->featured;
    }
    public function storeEdit(){
        $this->blogCategory->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'lang' => $this->lang,
            'featured' => $this->featured ? 1 : 0,
        ]);
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }
    public function showDeleteBlogCate($id){
        $this->idBlogCate = $id;
        $this->dispatchBrowserEvent('delete');
    }
    public function deleteBlogCate(){
        BlogCategory::findOrFail($this->idBlogCate)->delete();
        $this->dispatchBrowserEvent('hide-delete');
        session()->flash('message','Xóa thành công');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function render()
    {
        $blogCategories = BlogCategory::latest()->paginate(config('admin.paginate'));
        return view('livewire.admin.admin-blog-category-component',compact('blogCategories'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Tin tức',
            'title'=>'Danh mục tin tức'
        ]);
    }
}
