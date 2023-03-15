<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\ProductImage;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminProductComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';

    public $modalProductDetail = false;
    public $editMode = false;
    public $qtyMode = false;
    public $showFormDetail = false;

    public $productDetail;
    public $sumQty = 0;
    public $idProduct;
    public $product;
    public $productQty;

    public $newImages = [];
    public $oldImages = [];

    public $form = [
        'brand_id' => "",
        'product_category_id' => "",
        'name' => "",
        'content' => "",
        'price' => "",
        'discount' => null,
        'weight' => null,
        'sku' => null,
        'tag' => null,
        'featured' => null,
        'description' => null,
    ];

    public $filter_category;
    public $filter_brand;
    public $filter_show;
    public $filter_hide;
    public $q;

    protected $queryString = ['q'];

    protected $rules = [
        'form.brand_id' => 'required',
        'form.product_category_id' => 'required',
        'form.name' => 'required',
        'form.price' => 'required',
    ];
    protected $messages = [
        'form.brand_id.required' => 'Chưa chọn hãng',
        'form.product_category_id.required' => 'Chưa chọn danh mục',
        'form.name.required' => 'Trường tên sản phẩm là bắt buộc',
        'form.price.required' => 'Trường giá là bắt buộc',
    ];
    public function updated(){
        if(!empty($this->newImages )){
            $countNewImage = count($this->newImages);
            if($countNewImage > 5){
                session()->flash('messageImg','Chỉ có thể chọn 5 hình ảnh');
                $this->newImages = null;
            }
        }
    }
    public function showQty($id){
        $this->productQty = Product::findOrFail($id);
        if(count($this->productQty->productDetails) > 0) {
            $this->qtyMode = true;
            $this->dispatchBrowserEvent('show-qty');
        }else{
        session()->flash('message','Sản phẩm chưa có mục chi tiết');
        $this->dispatchBrowserEvent('message');
        $this->reset();
        }
    }
    public function showModalProductDetail($id){
        // $this->reset();
        $this->dispatchBrowserEvent('show-detail');
        $this->modalProductDetail = true;
        $this->idProduct = $id;
    }
    public function showFormAdd(){
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }
    public function storeProduct(){
        $this->validate([
            'newImages' => 'required',
        ],[
            'newImages.required' => 'Chưa chọn hình ảnh cho sản phẩm',
        ]);
        $createProduct = Product::create([
            'brand_id' => $this->form['brand_id'],
            'product_category_id' => $this->form['product_category_id'],
            'name' => $this->form['name'],
            'slug' => \Str::slug($this->form['name'],'-'),
            'price' => $this->form['price'],
            'weight' => $this->form['weight'],
            'sku' => $this->form['sku'],
            'content' => $this->form['content'],
            'description' => $this->form['description'],
            'discount' => $this->form['discount'],
            'featured' => $this->form['featured'] ? 1 : 0,
        ]);
        if(!empty($this->newImages)){
            $idCreateProduct = $createProduct->id;
            foreach ($this->newImages as $key => $newImage) {
                $extension = $newImage->getClientOriginalExtension();
                $nameImage = 'product-'.$idCreateProduct.'-'.$key.'.'.$extension;
                $productImgs[$key] = $nameImage;
                $image = $newImage->storeAs('public/products',$nameImage);
            }
            foreach($productImgs as $productImg){
                ProductImage::create([
                    'path' => $productImg,
                    'product_id' => $idCreateProduct
                ]);
            }
        }
        $this->dispatchBrowserEvent('hide-form');
        session()->flash('message','Tạo sản phẩm thành công');
        $this->reset();
    }
    public function showFormEdit($id){
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->product = Product::findOrFail($id);
        $this->authorize('update',$this->product);
        $this->oldImages = $this->product->productImages;
        $this->form['brand_id'] = $this->product->brand_id;
        $this->form['product_category_id'] = $this->product->product_category_id;
        $this->form['name'] = $this->product->name;
        $this->form['price'] = $this->product->price;
        $this->form['weight'] = $this->product->weight;
        $this->form['sku'] = $this->product->sku;
        $this->form['content'] = $this->product->content;
        $this->form['description'] = $this->product->description;
        $this->form['discount'] = $this->product->discount;
        $this->form['featured'] = $this->product->featured;
    }
    public function deleteImage($idImg){
        foreach($this->oldImages as $oldImage){
            if($idImg == $oldImage->id){
                $delete_path = '/public/products/'.$oldImage->path;
                if(Storage::exists($delete_path)){
                    ProductImage::find($idImg)->delete();
                    Storage::delete($delete_path);
                    session()->flash('message','Đã xóa hình');
                }else session()->flash('message','Hình không tồn tại');
            }else break;
        }
    }
    public function storeProductEdit(){
        $this->validate();
        $updatedProduct = $this->product->update([
            'brand_id' => $this->form['brand_id'],
            'product_category_id' => $this->form['product_category_id'],
            'name' => $this->form['name'],
            'slug' => \Str::slug($this->form['name'],'-'),
            'price' => $this->form['price'],
            'weight' => $this->form['weight'],
            'sku' => $this->form['sku'],
            'content' => $this->form['content'],
            'description' => $this->form['description'],
            'discount' => $this->form['discount'],
            'featured' => $this->form['featured'] ? 1 : 0,
        ]);
        $idUpdatedProduct = $this->product->id;
        // if(!empty($this->newImages)){
        //     if(!empty($this->oldImages)){
        //         ProductImage::where('product_id',$idUpdatedProduct)->delete();
        //         foreach($this->oldImages as $key => $oldImage){
        //             Storage::delete('/public/products/'.$oldImage->path);
        //         }
        //     }
        //     foreach ($this->newImages as $key => $newImage) {
        //         $extension = $newImage->getClientOriginalExtension();
        //         $nameImage = 'product-'.$idUpdatedProduct.'-'.$key.'.'.$extension;
        //         $image = $newImage->storeAs('/public/products/',$nameImage);
        //         $createImages = new ProductImage();
        //         $createImages->path = $nameImage;
        //         $createImages->product_id = $idUpdatedProduct;
        //         $createImages->save();
        //     }
        // }
        if (!empty($this->newImages)) {
            \DB::transaction(function () use ($idUpdatedProduct) {
                if (!empty($this->oldImages)) {
                    $oldImagePaths = $this->oldImages->pluck('path')->toArray();
                    ProductImage::where('product_id', $idUpdatedProduct)
                    ->whereIn('path', $oldImagePaths)->delete();

                    Storage::delete('/public/products/' . implode(',', $oldImagePaths));
                }
                $newImagesData = [];
                foreach ($this->newImages as $key => $newImage) {
                    $extension = $newImage->getClientOriginalExtension();
                    $nameImage = 'product-' . $idUpdatedProduct . '-' . $key . '.' . $extension;
                    $newImagesData[] = [
                        'path' => $nameImage,
                        'product_id' => $idUpdatedProduct,
                    ];
                    $newImage->storeAs('/public/products/', $nameImage);
                }
                ProductImage::insert($newImagesData);
            });
        }
        $this->dispatchBrowserEvent('hide-form');
        session()->flash('message','Cập nhật sản phẩm thành công');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function showDeleteProduct($id){
        $this->dispatchBrowserEvent('delete');
        $this->idProduct = $id;
    }
    public function deleteProduct(){
        $productDelete = Product::findOrFail($this->idProduct)->delete();
        ProductImage::where('product_id',$this->idProduct)->delete();
        foreach($productDelete->productImages as $key => $oldImage){
            Storage::delete('/public/products/'.$oldImage->path);
        }
        $this->dispatchBrowserEvent('hide-delete');
        session()->flash('message','Xóa sản phẩm thành công');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function showFilter(){
        $this->reset();
        $this->dispatchBrowserEvent('show-filter');
    }
    public function filter(){
        $this->dispatchBrowserEvent('hide-filter');
    }
    public function changeFeatured($featured, $id){
        $featuredUpdate = Product::findOrFail($id);
        $featuredUpdate->update([
            'featured' => $featured == 1 ? 0 : 1
        ]);
    }
    public function render()
    {
        $products = Product::query();
        if(!empty($this->filter_category)){
            $products = $products->where('product_category_id',$this->filter_category);
            $countProduct = $products->count();
        }
        if(!empty($this->filter_brand)){
            $products = $products->where('brand_id',  $this->filter_brand);
            $countProduct = $products->count();
        }
        if(!empty($this->filter_show)){
            $products = $products->where('featured',1);
            $countProduct = $products->count();
        }
        if(!empty($this->filter_hide)){
            $products = $products->where('featured',0);
            $countProduct = $products->count();
        }
        if(!empty($this->q)){
            $products = $products->where('name','like','%'.$this->q.'%');
            $countProduct = $products->count();
        }
        if(!empty($countProduct) && $countProduct <= config('admin.paginate')) $paginate = $countProduct;
        else $paginate = config('admin.paginate');
        $products = $products->latest()->paginate($paginate);

        if(!empty($this->idProduct)) {
            $this->productDetail = Product::find($this->idProduct);
        }
        $subtitle = new AdminProductCommentComponent();
        $subtitle->name = 'Sản phẩm';
        $subtitle->path = route('admin.product');
        return view('livewire.admin.admin-product-component',compact('products'),[
                'categories' => ProductCategory::all(),
                'brands' => Brand::all()
            ])
            ->layout('layouts.admin')
            ->layoutData([
                'subtitle' => $subtitle,
                'title'=>'Danh sách sản phẩm'
            ]);
    }
}
