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
                            <th>Tên</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = ($permissions->currentPage() - 1) * $permissions->perPage();
                        @endphp
                        @foreach($permissions as $key => $permission)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$permission->name}}</td>
                            @if(count($permission->roles) > 0)
                            <td>
                                @foreach($permission->roles as $permission_role)
                                <span class="bg-danger p-2 rounded text-white"
                                    wire:click="removeRole({{$permission->id}},{{$permission_role->id}})">{{$permission_role->name}}</span>
                                @endforeach
                            </td>
                            @else
                            <td>Không có</td>
                            @endif
                            <td style="font-size:18px ">
                                <a href="#" class="text-primary me-2"
                                    wire:click.prevent='showFormEdit({{$permission->id}})'>
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <a href="#" class="text-danger me-2"
                                    wire:click.prevent='showDeletePermission({{$permission->id}})'>
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        {{$permissions->links('custom-pagination-links-view')}}
                    </tbody>
                    <tfoot>
                        {{-- {{$roles->links('custom-pagination-links-view')}} --}}
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
                            <h1 class="modal-title" id="exampleModalLabel">Cập nhật quyền</h1>
                            @else
                            <h1 class="modal-title" id="exampleModalLabel">Thêm quyền</h1>
                            @endif
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Name</label>
                            <div class="col-md-10 col-xl-8">
                                <input name="name" id="name" placeholder="Name" type="text" class="form-control"
                                    value="" wire:model="name">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        @if($editMode)
                        <div class="row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Quyền</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="permission_role" id="permission_role" class="form-control"
                                    wire:model="permission_role">
                                    <option value="0">Permission</option>
                                    @foreach($roless as $key => $role)
                                    <option value="{{$role->name}}">
                                        {{$role->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @if(session()->has('msgSpatie'))
                                <span class="text-success">{{session()->get('msgSpatie')}}</span>
                                @endif
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        @if($editMode)
                        <button type="button" class="btn btn-primary" wire:click.prevent="storePermissionEdit">
                            Cập nhật
                        </button>
                        @else
                        <button type="button" class="btn btn-primary" wire:click.prevent="storePermissionAdd">
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
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteTag">
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