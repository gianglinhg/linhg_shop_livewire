<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Brand;
use Livewire\WithPagination;

class AdminBrandComponent extends Component
{
    use WithPagination;

    public $editMode = false;
    public $bras;
    public $idBrand;

    public $name;
    public $slug;

    public $q;
    protected $queryString = ['q'];

    protected $rules = [
        'name' => 'required',
        'slug' => ['required',"regex:'^[a-z0-9]+(?:(?:-|_)+[a-z0-9]+)*$'"]
    ];
    protected $messages = [
        'name.required' => 'Tên hãng buộc nhập',
        'slug.required' => 'Đường dẫn hãng buộc nhập',
        'slug.regex' => 'Định dạng đường dẫn không đúng'
    ];
    public function generateSlug(){
        $this->slug = \Str::slug($this->name,'-');
    }
    public function updated(){
        $this->validate();
    }
    public function changeFeatured($featured, $brand_id){
        $brand = Brand::findOrFail($brand_id);
        $brand->featured = $featured ? 0 : 1;
        $brand->save();
    }
    public function showFormAdd(){
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }
    public function storeBrandAdd(){
        $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        session()->flash('message','Tạo hãng thành công');
        $this->dispatchBrowserEvent('hide-form');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function showFormEdit($id){
        $this->reset();
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->bras = Brand::findOrFail($id);
        $this->name = $this->bras->name;
        $this->slug = $this->bras->slug;
    }
    public function storeBrandEdit(){
        $this->validate();
        $this->bras->update([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);
        session()->flash('message','Sửa hãng thành công');
        $this->dispatchBrowserEvent('hide-form');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function showDeleteBrand($id){
        $this->dispatchBrowserEvent('delete');
        $this->idBrand = $id;
    }
    public function deleteBrand(){
        Brand::findOrFail($this->idBrand)->delete();
        session()->flash('message','Xóa hãng thành công');
        $this->dispatchBrowserEvent('hide-delete');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function render()
    {
        $brands = Brand::latest();
        if(!empty($this->q))
            $brands = $brands->where('name','like','%'.$this->q.'%');
        $brands = $brands->paginate(config('admin.paginate'));
        $subtitle = new AdminBrandComponent();
        $subtitle->name = 'Sản phẩm';
        $subtitle->path = route('admin.product');
        return view('livewire.admin.admin-brand-component',compact('brands'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => $subtitle,
            'title'=>'Hãng sản phẩm'
        ]);
    }
}
