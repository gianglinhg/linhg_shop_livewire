<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4 form-group mb-0 float-right">
                <input type="search" placeholder="Tìm kiếm" class="form-control" wire:model="keyword">
            </div>
            <div class="col-sm-8 mt-sm-0 mt-1 main-btn">
                <button class="btn btn-primary waves-effect waves-light m-b-5 d-flex justify-content-end"
                    wire:click.prevent='showFormAdd'>
                    <i class="mdi mdi-plus-circle"></i>
                    <span>Thêm</span>
                </button>
            </div>
            <div class="table-responsive col-sm-12 mt-2">
                <table id="mainTable" class="table table-striped m-b-0" style="cursor: pointer;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ngôn ngữ</th>
                            <th>Tên</th>
                            <th>Ẩn/Hiện</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = ($blogCategories->currentPage() - 1) * $blogCategories->perPage();
                        @endphp
                        @foreach($blogCategories as $blogCategory)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$blogCategory->lang}}</td>
                            <td>
                                <h2>{{$blogCategory->name}}</h2>
                            </td>
                            <td>
                                @if($blogCategory->featured)
                                <button class="btn btn-success waves-effect waves-light w-xs btn-sm m-b-5">
                                    Hiện
                                </button>
                                @else
                                <button class="btn btn-danger waves-effect waves-light w-xs btn-sm m-b-5">
                                    Ẩn
                                </button>
                                @endif
                            </td>
                            <td style="font-size:18px ">
                                <a href="#" class="text-primary me-2"
                                    wire:click.prevent='showFormEdit({{$blogCategory->id}})'>
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <a href="#" class="text-danger me-2"
                                    wire:click.prevent='showDeleteBlogCate({{$blogCategory->id}})'>
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        {{$blogCategories->links('custom-pagination-links-view')}}
                    </tbody>
                    <tfoot>
                        {{-- {{$blogcomments->links('custom-pagination-links-view')}} --}}
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <div class="modal-title">
                            @if($editMode)
                            <h1 class="modal-title" id="exampleModalLabel">Cập nhật loại tin</h1>
                            @else
                            <h1 class="modal-title" id="exampleModalLabel">Thêm loại tin</h1>
                            @endif
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <label for="lang" class="col-md-2 text-md-right col-form-label">Ngôn ngữ</label>
                            <div class="col-md-10 col-xl-8">
                                <input name="lang" id="lang" placeholder="Ngôn ngữ" type="text" class="form-control"
                                    value="" wire:model="lang">
                                @error('lang')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Name</label>
                            <div class="col-md-10 col-xl-8">
                                <input name="name" id="name" placeholder="Name" type="text" class="form-control"
                                    value="" wire:model="name" wire:keyup='generateSlug'>
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="slug" class="col-md-2 text-md-right col-form-label">Slug</label>
                            <div class="col-md-10 col-xl-8">
                                <input slug="slug" id="slug" placeholder="Slug" type="text" class="form-control"
                                    value="" wire:model="slug">
                                @error('slug')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="featured" class="col-md-2 text-md-right col-form-label">Featured</label>
                            <div class="col-md-10 col-xl-8">
                                <div class="form-check pt-sm-2">
                                    <input name="featured" id="featured" type="checkbox" value="1"
                                        class="form-check-input" wire:model="featured">
                                    <label for="featured" class="form-check-label">Featured</label>
                                    @error('featured')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        @if($editMode)
                        <button type="button" class="btn btn-primary" wire:click.prevent="storeEdit">
                            Cập nhật
                        </button>
                        @else
                        <button type="button" class="btn btn-primary" wire:click.prevent="storeAdd">
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
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteBlogCate">
                        Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>
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