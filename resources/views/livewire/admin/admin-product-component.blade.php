<div>
    @push('styles')
    <style>
        .image-detail {
            width: 50% !important;
            display: flex !important;
            gap: 8px !important;
        }

        .image-detail img {
            width: 100% !important;
            /* height: 50% !important; */
            overflow: hidden;
            object-fit: cover;
        }
    </style>
    @endpush
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4 form-group mb-0 float-right">
                <input type="search" placeholder="Tìm kiếm" class="form-control" wire:model="q">
            </div>
            <div class="col-sm-8 mt-sm-0 mt-1 main-btn">
                <button class="btn btn-primary waves-effect waves-light m-1" wire:click.prevent='showFormAdd'>
                    <i class="mdi mdi-plus-circle"></i>
                    <span>Thêm</span>
                </button>
                <button class="btn btn-warning waves-effect waves-light m-1" wire:click.prevent='showFilter'>
                    <i class="mdi mdi-filter-outline"></i>
                    <span>Lọc</span>
                </button>
                <a href="{{route('admin.product.detail')}}" class="btn btn-teal waves-effect waves-light m-1">
                    <i class="mdi mdi-information-outline"></i>
                    <span>Thêm số lượng</span>
                </a>
            </div>
            <div class="table-responsive col-sm-12 mt-2">
                <table id="mainTable" class="table table-striped m-b-0" style="cursor: pointer;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Tình trạng</th>
                            <th>Số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = ($products->currentPage() - 1) * $products->perPage();
                        @endphp
                        @foreach($products as $key => $product)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>
                                <a href="{{route('shop.detail',[$product->slug])}}">{{$product->name}}</a>
                                <button class="btn btn-info waves-effect waves-light btn-rounded btn-xs me-2"
                                    style="float: right;" wire:click.prevent='showModalProductDetail({{$product->id}})'>
                                    thêm...
                                </button>
                            </td>
                            <td>{{number_format($product->price, 0)}}VNĐ</td>
                            {{-- <td>{{\Str::currency($product->price)}}VNĐ</td> --}}
                            <td wire:click.prevent='changeFeatured({{$product->featured}},{{$product->id}})'>
                                @if($product->featured == 1)
                                <button class="btn btn-success waves-effect waves-light w-xs btn-xs m-b-3">
                                    Hiện
                                </button>
                                @else
                                <button class="btn btn-danger waves-effect waves-light w-xs btn-xs m-b-3">
                                    Ẩn
                                </button>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-purple waves-effect waves-light w-xs btn-sm m-b-5"
                                    wire:click.prevent="showQty({{$product->id}})">
                                    Chi tiết
                                </button>
                            </td>
                            <td style="font-size:18px ">
                                @can('sửa sản phẩm')
                                <a href="#" class="text-primary me-2"
                                    wire:click.prevent='showFormEdit({{$product->id}})'>
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                @endcan
                                <a href="#" class="text-danger me-2"
                                    wire:click.prevent='showDeleteProduct({{$product->id}})'>
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        {{$products->links('custom-pagination-links-view')}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content scroll-modal">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title">
                            @if($editMode)
                            <h1 class="modal-title" id="exampleModalLabel">Cập nhật sản phẩm</h1>
                            @else
                            <h1 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h1>
                            @endif
                            <div class="image"
                                style="float: right; display: flex; justify-content:center; align-items:center">
                                <div class="mr-1" style="display: flex; flex-direction: column">
                                    @if(session()->has('messageImg'))
                                    <small class=" text-danger">{{session()->get('messageImg')}}</small>
                                    @endif
                                    @error('newImages')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <label class="btn btn-primary waves-effect waves-light m-b-5">
                                    <i class="mdi mdi-image-area m-r-5"></i>
                                    @if($editMode)
                                    <span>Sửa hình ảnh</span>
                                    @else
                                    <span>Thêm hình ảnh</span>
                                    @endif
                                    <input type="file" class="image_product" style="display: none;" multiple
                                        wire:model.defer='newImages'>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-4" style="width:20%;display:flex;gap:2px;">
                            @if($newImages)
                            @foreach($newImages as $newImage)
                            <img src="{{ $newImage->temporaryUrl() }}" alt="" width="100%" style="object-fit: cover">
                            @endforeach
                            @elseif($oldImages)
                            @foreach($oldImages as $oldImage)
                            <img src="{{asset(Storage::url('products/'.$oldImage->path))}}" alt="" width="100%"
                                style="object-fit: cover">
                            <span class="text-danger">
                                <i class="mdi mdi-close cursor-pointer" wire:click='deleteImage({{$oldImage->id}})'></i>
                            </span>
                            @endforeach
                            @endif
                        </div>

                        <div class="row form-group">
                            <label for="brand_id" class="col-md-2 text-md-right col-form-label">Hãng</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="brand_id" id="brand_id" class="form-control"
                                    wire:model.defer="form.brand_id">
                                    <option value="0">Hãng</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">
                                        {{$brand->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('form.brand_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="product_category_id" class="col-md-2 text-md-right col-form-label">Danh
                                mục</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="product_category_id" id="product_category_id" class="form-control"
                                    wire:model.defer='form.product_category_id'>
                                    <option value="0">Danh mục</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('form.product_category_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Name</label>
                            <div class="col-md-10 col-xl-8">
                                <input name="name" id="name" placeholder="Name" type="text" class="form-control"
                                    value="" wire:model.defer="form.name">
                                @error('form.name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="price" class="col-md-2 text-md-right col-form-label">Price</label>
                            <div class="col-md-10 col-xl-8">
                                <input name="price" id="price" placeholder="Price" type="text" class="form-control"
                                    value="" wire:model.defer="form.price">
                                @error('form.price')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="discount" class="col-md-2 text-md-right col-form-label">Discount</label>
                            <div class="col-md-10 col-xl-8">
                                <input name="discount" id="discount" placeholder="Discount" type="number"
                                    class="form-control" value="" wire:model.defer="form.discount">
                                @error('form.discount')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="weight" class="col-md-2 text-md-right col-form-label">Weight</label>
                            <div class="col-md-10 col-xl-8">
                                <input name="weight" id="weight" placeholder="Weight" type="nummber"
                                    class="form-control" value="" wire:model.defer="form.weight">
                                @error('form.weight')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="sku" class="col-md-2 text-md-right col-form-label">SKU</label>
                            <div class="col-md-10 col-xl-8">
                                <input name="sku" id="sku" placeholder="SKU" type="text" class="form-control" value=""
                                    wire:model.defer="form.sku">
                                @error('form.sku')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="featured" class="col-md-2 text-md-right col-form-label">Featured</label>
                            <div class="col-md-10 col-xl-8">
                                <div class="form-check pt-sm-2">
                                    <input name="featured" id="featured" type="checkbox" value="1"
                                        class="form-check-input" wire:model.defer="form.featured">
                                    <label for="featured" class="form-check-label">Featured</label>
                                    @error('form.featured')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="description" class="col-md-2 text-md-right col-form-label">Description</label>
                            <div class="col-md-10 col-xl-8">
                                <textarea class="form-control" name="description" id="description"
                                    placeholder="Description" wire:model.defer="form.description"></textarea>
                                @error('form.description')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div wire:ignore class="row form-group">
                            <label for="content" class="col-md-2 text-md-right col-form-label">Content</label>
                            <div class="col-md-10 col-xl-8">
                                <textarea class="form-control" name="content" id="content" rows="6"
                                    placeholder="Content" wire:model.defer="form.content"></textarea>
                                @error('form.content')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        @if($editMode)
                        <button type="button" class="btn btn-primary" wire:click.prevent="storeProductEdit">
                            Cập nhật
                        </button>
                        @else
                        <button type="button" class="btn btn-primary" wire:click.prevent="storeProduct">
                            Lưu
                        </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Large Modal -->
    @if($modalProductDetail)
    <div class="modal fade bd-example-modal-lg" id="detail" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content scroll-modal p-0">
                <div class="modal-body">
                    <div class="mx-auto image-detail">
                        <img src="{{asset(Storage::url('products/'.$productDetail->productImages[0]->path))}}"
                            alt="{{$productDetail->name}}">
                        <img src="{{asset(Storage::url('products/'.$productDetail->productImages[1]->path))}}"
                            alt="{{$productDetail->name}}">
                    </div>
                    <div class="mx-auto p-2 m-2" style="width: 600px;font-size:18px">
                        <table class="table" id="table-detail">
                            <thead>
                                <tr>
                                    <th width="25%"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tên</td>
                                    <td>{{$productDetail->name}}</td>
                                </tr>
                                <tr>
                                    <td>Danh mục</td>
                                    <td>{{$productDetail->productCategory->name}}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả</td>
                                    <td>{{$productDetail->description ?? "Chưa có mô tả"}}</td>
                                </tr>
                                <tr>
                                    <td>Số lượng</td>
                                    <td>
                                        @php
                                        $sumQty = 0;
                                        foreach($productDetail->productDetails as $quantity)
                                        $sumQty += $quantity->qty;
                                        echo $sumQty;
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Chưa tính giảm giá -->
                                    <td>Giảm giá</td>
                                    <td>
                                        {{number_format($productDetail->discount ? $productDetail->discount : 0, 0)}}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cân nặng</td>
                                    <td>{{$productDetail->weight ?? 'Không có'}}</td>
                                </tr>
                                <tr>
                                    <td>Hãng</td>
                                    <td>{{$productDetail->brand->name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- modal sản phẩm chi tiết -->
    @if($qtyMode)
    <div class="modal fade bd-example-modal-lg" id="quantity" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>{{$productQty->name}}</h3>
                </div>
                <div class="modal-body">
                    <div class="mx-auto p-2 m-2" style="font-size:18px">
                        <table class="table table-bordered" id="table-detail">
                            <thead>
                                <tr>
                                    <th>Màu</th>
                                    <th>Size</th>
                                    <th width='30%'>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productQty->productDetails as $quantity)
                                <tr>
                                    <td>{{$quantity->color}}</td>
                                    <td>{{$quantity->size}}</td>
                                    <td>{{$quantity->qty}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('message'))
    <div class="modal" id="messageModal">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 10px 30px">
                <div class="modal-body">
                    <i class="mdi mdi-check-circle text-success"></i>
                    {{session()->get('message')}}
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 10px 30px">
                <div class="modal-body">
                    Bạn có chắc chắn xóa ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        Hủy
                    </button>
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteProduct">
                        Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter modal -->
    <div class="modal" id="filterModal">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 10px 30px">
                <form action="" wire:submit.prevent='filter'>
                    <div class="modal-header">
                        Lọc
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <label for="product_category_id"
                                class="col-md-2 text-md-right col-form-label">Category</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="product_category_id" class="form-control"
                                    wire:model.defer='filter_category'>
                                    <option value="0">Tất cả</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="row form-group">
                            <label for="product_category_id" class="col-md-2 text-md-right col-form-label">Giá</label>
                            <div class="col-md-5 col-xl-4">
                                <input type="number" class="form-control" placeholder="Thấp nhất">
                            </div>
                            <div class="col-md-5 col-xl-4">
                                <input type="number" class="form-control" placeholder="Cao nhất">
                            </div>
                        </div> --}}

                        <div class="row form-group">
                            <label for="brand_id" class="col-md-2 text-md-right col-form-label">Brand</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="brand_id" id="brand_id" class="form-control"
                                    wire:model.defer="filter_brand">
                                    <option value="0">Tất cả</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">
                                        {{$brand->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-2 text-md-right col-form-label me-2">
                                Trạng thái
                            </label>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="inlineRadio1" value="1" name="radio" checked
                                    wire:model.defer='filter_show'>
                                <label for="inlineRadio1"> Hiện </label>
                            </div>
                            <div class="radio radio-inline">
                                <input type="radio" id="inlineRadio2" name="radio" checked
                                    wire:model.defer='filter_hide'>
                                <label for="inlineRadio2"> Ẩn </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Hủ<y></y>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Lọc
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        // const editor = CKEDITOR.replace('content');
        // editor.on('change', function (event) {
        // // console.log(event.editor.getData())
        // @this.set('form.content', event.editor.getData());
        // })
    //     CKEDITOR.instances.content.on('change', function() {
    //       @this.set('form.content', this.getData());
    //   });
    </script>
    <script>
        window.addEventListener('show-detail',event =>{
                $('#detail').modal('show');
            });
        window.addEventListener('show-form',event =>{
                $('#form').modal('show');
            });
        window.addEventListener('hide-form',event =>{
                $('#form').modal('hide');
            });
        window.addEventListener('message',event =>{
                $('#messageModal').modal('show');
            });
        window.addEventListener('delete',event =>{
                $('#deleteModal').modal('show');
            });
        window.addEventListener('hide-delete',event =>{
                $('#deleteModal').modal('hide');
            });
        window.addEventListener('show-filter',event =>{
                $('#filterModal').modal('show');
            });
        window.addEventListener('hide-filter',event =>{
                $('#filterModal').modal('hide');
            });
        window.addEventListener('show-qty',event =>{
                $('#quantity').modal('show');
            });
        window.addEventListener('hide-qty',event =>{
                $('#quantity').modal('hide');
            });
    </script>
    @endpush
</div>