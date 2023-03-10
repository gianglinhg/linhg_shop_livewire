<div>
    <div class="row">
        <div class="col-sm-12">
            <div style="display: flex; justify-content: flex-end">
                <button class="btn btn-primary waves-effect waves-light m-b-5" wire:click.prevent='showFormAdd'>
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
                            <th>Quyền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = ($roles->currentPage() - 1) * $roles->perPage();
                        @endphp
                        @foreach($roles as $key => $role)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$role->name}}</td>
                            @if(count($role->permissions) > 0)
                            <td>
                                @foreach($role->permissions as $role_permission)
                                <span class="bg-danger p-2 rounded text-white"
                                    wire:click="revokePermission({{$role->id}},{{$role_permission->id}})">{{$role_permission->name}}</span>
                                @endforeach
                            </td>
                            @else
                            <td>Không có</td>
                            @endif
                            <td style="font-size:18px ">
                                <a href="#" class="text-primary me-2" wire:click.prevent='showFormEdit({{$role->id}})'>
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <a href="#" class="text-danger me-2" wire:click.prevent='showDeleteRole({{$role->id}})'>
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        {{$roles->links('custom-pagination-links-view')}}
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
                            <h1 class="modal-title" id="exampleModalLabel">Cập nhật vai trò</h1>
                            @else
                            <h1 class="modal-title" id="exampleModalLabel">Thêm vai trò</h1>
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
                                <select name="role_permission" id="role_permission" class="form-control"
                                    wire:model="role_permission">
                                    <option value="0">Permission</option>
                                    @foreach($permissions as $key => $permission)
                                    <option value="{{$permission->name}}">
                                        {{$permission->name}}
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
                        <button type="button" class="btn btn-primary" wire:click.prevent="storeRoleEdit">
                            Cập nhật
                        </button>
                        @else
                        <button type="button" class="btn btn-primary" wire:click.prevent="storeRoleAdd">
                            Lưu
                        </button>
                        @endif
                    </div>
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