<div>
    @push('styles')
    <style>
        .colors_item {
            display: inline-block;
            width: 50px;
            height: 25px;
        }

        .detail-table tr th,
        td {
            text-align: center;
        }

        #mainTable tr th {
            text-align: center;
        }

        .line {
            width: 100%;
            height: 4px;
            background-color: #000;
            margin: 6px 0;
        }
    </style>
    @endpush
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4 form-group mb-0 float-right">
                <input type="search" placeholder="Tìm kiếm" class="form-control" wire:model="keyword">
            </div>
            <div class="col-sm-8 mt-sm-0 mt-1 main-btn">
                <button class="btn btn-primary waves-effect waves-light m-b-5" wire:click.prevent='showFormAddQty'>
                    <i class="mdi mdi-plus-circle"></i>
                    <span>Thêm</span>
                </button>
                <a class="btn btn-success waves-effect waves-light m-b-5" href="{{route('admin.product')}}">
                    <i class="mdi mdi-view-list me-1"></i>
                    <span>Danh sách</span>
                </a>
            </div>
            <div class="table-responsive col-sm-12 mt-2">
                <table id="mainTable" class="table table-striped m-b-0" style="cursor: pointer;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Tổng</th>
                            <th width="60%">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = ($products_has_detail->currentPage() - 1) * $products_has_detail->perPage();
                        @endphp
                        @foreach($products_has_detail as $key => $product_has_detail)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$product_has_detail->name}}</td>
                            <td>
                                @php
                                $sumQty = 0;
                                foreach($product_has_detail->productDetails as $productDetail)
                                $sumQty += $productDetail->qty;
                                echo $sumQty;
                                @endphp
                            </td>
                            <td>
                                <table class="table table-bordered detail-table" style="width:100%; margin:8px 0px;">
                                    <tr>
                                        <th>Màu</th>
                                        <th>Size</th>
                                        <th>Số lượng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    @foreach($product_has_detail->productDetails as $productDetail)
                                    <tr>
                                        <td>
                                            <a class='colors_item'
                                                style=" background-color: {{$productDetail->color_code}}">
                                            </a>
                                        </td>
                                        <td>
                                            {{$productDetail->size}}
                                        </td>
                                        <td>
                                            {{$productDetail->qty}}
                                        </td>
                                        <td style="font-size:18px ">
                                            <a href="#" class="text-primary me-2"
                                                wire:click.prevent='showFormEditQty({{$productDetail->id}})'>
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            <a href="#" class="text-danger me-2"
                                                wire:click.prevent='deleteQty({{$productDetail->id}})'>
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </td>

                        </tr>
                        @endforeach
                        {{$products_has_detail->links('custom-pagination-links-view')}}
                    </tbody>
                    <tfoot>
                        {{-- <tr>
                            <th><strong>TOTAL</strong></th>
                            <th>1290</th>
                            <th>1420</th>
                            <th>5</th>
                        </tr> --}}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <div class="modal-title">
                            @if($editMode)
                            <h1 class="modal-title" id="exampleModalLabel">{{$product_qty->product->name}}</h1>
                            @else
                            <h1 class="modal-title" id="exampleModalLabel">Thêm</h1>
                            @endif
                        </div>
                    </div>

                    <div class="modal-body">
                        @if(!$editMode)
                        <div class="row form-group">
                            <label for="product_id" class="col-md-2 text-md-right col-form-label">Sản phẩm</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="product_id" id="product_id" class="form-control"
                                    wire:model.defer="form.product_id">
                                    <option value="0">Sản phẩm</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">
                                        {{$product->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('form.product_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        @endif
                        {{-- @for($i=0;$i<$line;$i++) --}} <div class="row form-group">
                            <label for="size" class="col-md-2 text-md-right col-form-label">Size</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="size" id="size" class="form-control" wire:model.defer="form.size">
                                    <option value="0">Size</option>
                                    @foreach(config('admin.size_clothes') as $size)
                                    <option value="{{$size}}">{{$size}}</option>
                                    @endforeach
                                </select>
                                @error('form.size')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                    </div>
                    <div class="row form-group">
                        <label for="color" class="col-md-2 text-md-right col-form-label">Màu</label>
                        <div class="col-md-10 col-xl-8">
                            <input name="color" id="color" placeholder="color" type="text" class="form-control"
                                wire:model="form.color">
                            @error('form.color')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="color_code" class="col-md-2 text-md-right col-form-label">Mã màu</label>
                        <div class="col-md-10 col-xl-8">
                            <input name="color_code" id="color_code" placeholder="color_code" type="color"
                                class="form-control" wire:model="form.color_code">
                            @error('form.color_code')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="qty" class="col-md-2 text-md-right col-form-label">Số lượng</label>
                        <div class="col-md-10 col-xl-8">
                            <input name="qty" id="qty" placeholder="qty" type="number" class="form-control" value=""
                                wire:model="form.qty">
                            @error('form.qty')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- @if($line > 1 && $i != $line-1)
                    <div class="line"></div>
                    @endif
                    @endfor --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        @if($editMode)
                        <button type="button" class="btn btn-primary" wire:click.prevent="storeQtyEdit">
                            Cập nhật
                        </button>
                        @else
                        {{-- <button type="button" class="btn btn-success" wire:click.prevent="addLine">
                            Thêm dòng
                        </button> --}}
                        <button type="button" class="btn btn-primary" wire:click.prevent="storeQtyAdd">
                            Lưu
                        </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    @push('scripts')
    <script>
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
    </script>
    @endpush
</div>