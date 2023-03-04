<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductDetail;
use App\Models\Product;
use Livewire\WithPagination;
use DB;

class AdminProductDetailComponent extends Component
{
    use WithPagination;

    public $editMode = false;
    public $product_qty;

    public $form = [];
    public $keyword;
    public $line = 1;

    protected $rules = [
        'form.product_id' => 'required',
        'form.color' => 'required',
        'form.size' => 'required',
        'form.qty' => 'required',
    ];
    public function showFormAddQty(){
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }
    public function storeQtyAdd(){
        $this->validate();
        ProductDetail::create($this->form);
        session()->flash('message','Tạo thành công');
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }
    public function showFormEditQty($id){
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->product_qty = ProductDetail::findOrFail($id);
        $this->form['product_id'] = $this->product_qty->product->id;
        $this->form['size'] = $this->product_qty->size;
        $this->form['color'] = $this->product_qty->color;
        $this->form['color_code'] = $this->product_qty->color_code;
        $this->form['qty'] = $this->product_qty->qty;
     }
    public function storeQtyEdit(){
        $this->validate();
        $this->product_qty->update([
            'size' => $this->form['size'],
            'color' => $this->form['color'],
            'color_code' => $this->form['color_code'],
            'qty' => $this->form['qty'],
        ]);
        session()->flash('message','Cập nhật thành công');
        $this->dispatchBrowserEvent('hide-form');
        // $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function deleteQty($id){
        ProductDetail::findOrFail($id)->delete();
        // session()->flash('message','Xóa thành công');
        // $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    // public function addLine(){
    //     $this->line++;
    // }
    public function render()
    {
        $products_has_detail = Product::distinct()
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->select('products.*');
        if(!empty($this->keyword)){
            $products_has_detail = $products_has_detail->where('name','like', '%'.$this->keyword.'%');
        }
        $products_has_detail= $products_has_detail->paginate(config('admin.paginate'));
        $products = Product::all();
        return view('livewire.admin.admin-product-detail-component',compact('products_has_detail','products'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Sản phẩm',
            'title' => 'Chi tiết số lượng sản phẩm'
        ]);
    }
}
