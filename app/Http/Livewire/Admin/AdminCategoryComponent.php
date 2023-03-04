<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public $editMode = false;
    public $keyword;
    public $cates;
    public $idCategory;

    public $name;
    public $slug;
    public $sex;

    protected $rules = [
        'sex' => 'required',
        'name' => 'required',
        'slug' => ['required',"regex:'^[a-z0-9]+(?:(?:-|_)+[a-z0-9]+)*$'"]
    ];
    protected $messages = [
        'name.required' => 'Tên danh mục buộc nhập',
        'slug.required' => 'Slug danh mục buộc nhập',
        'slug.regex' => 'Slug không đúng định dạng'
    ];
    public function generateSlug(){
        $this->slug = \Str::slug($this->name,'-');
    }
    public function updated(){
        $this->validate();
    }
    public function showFormAdd(){
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }
    public function storeCategoryAdd(){
        $this->validate();
        ProductCategory::create([
            'sex' => $this->sex,
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        session()->flash('message','Tạo danh mục thành công');
        $this->dispatchBrowserEvent('hide-form');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function showFormEdit($id){
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->cates = ProductCategory::findOrFail($id);
        $this->sex = $this->cates->sex;
        $this->name = $this->cates->name;
        $this->slug = $this->cates->slug;
    }
    public function storeCategoryEdit(){
        // dd(123);
        $this->validate();
        $this->cates->update([
            'sex' => $this->sex,
            'name' => $this->name,
            'slug' => $this->slug,
        ]);
        session()->flash('message','Sửa danh mục thành công');
        $this->dispatchBrowserEvent('hide-form');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function showDeleteCategory($id){
        $this->dispatchBrowserEvent('delete');
        $this->idCategory = $id;
    }
    public function deleteCategory(){
        ProductCategory::findOrFail($this->idCategory)->delete();
        session()->flash('message','Xóa danh mục thành công');
        $this->dispatchBrowserEvent('hide-delete');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function changeFeatured($featured, $id){
        $featuredUpdate = ProductCategory::findOrFail($id);
        $featuredUpdate->update([
            'featured' => $featured == 1 ? 0 : 1
        ]);
    }
    public function render()
    {
        $categories = ProductCategory::latest();
        if(!empty($this->keyword)){
            $categories = $categories->where('name','like','%'.$this->keyword.'%');
        }
        $categories = $categories->paginate(config('admin.paginate'));
        return view('livewire.admin.admin-category-component',compact('categories'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Sản phẩm',
            'title'=>'Danh mục sản phẩm'
        ]);
    }
}
