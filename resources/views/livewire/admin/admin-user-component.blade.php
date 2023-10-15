<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4 form-group mb-0 float-right">
                <input type="search" placeholder="Tìm kiếm" class="form-control" wire:model="q">
            </div>
            <div class="table-responsive col-sm-12 mt-2">
                <table id="mainTable" class="table table-striped m-b-0" style="cursor: pointer;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 10%">Ảnh đại diện</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Quyền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = ($users->currentPage() - 1) * $users->perPage();
                        @endphp
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>
                                <img src="{{Storage::url('users/'.$user->avatar)}}" alt="{{$user->name}}"
                                    class="mx-auto rounded"
                                    style="width: 50px;height:50px !important; object-fit:cover;">
                            </td>
                            <td>
                                <b>{{$user->name}}</b>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if(count($user->roles) > 0)
                                @foreach($user->roles as $user_role)
                                @if($user_role->name == 'super-admin')
                                <span class="bg-success p-2 m-2 rounded text-white">{{$user_role->name}}
                                </span>
                                @else
                                <span class="bg-danger p-2 m-2 rounded text-white"
                                    wire:click="removeRole({{$user->id}},{{$user_role->id}})">{{$user_role->name}}
                                </span>
                                @endif
                                @endforeach
                                @else
                                Không có
                                @endif
                            </td>
                            <td>
                                @if(count($user->permissions) > 0)
                                @foreach($user->permissions as $user_permission)
                                <span class="bg-danger p-2 m-2 rounded text-white"
                                    wire:click="revokePermission({{$user->id}},{{$user_permission->id}})">{{$user_permission->name}}
                                </span>
                                @endforeach
                                @else
                                Không có
                                @endif
                            </td>
                            <td style="font-size:18px ">
                                <a href="#" class="text-primary me-2" wire:click.prevent='showFormEdit({{$user->id}})'>
                                    <i class="mdi mdi-key-change"></i>
                                </a>
                                <a href="{{route('admin.impersonate',[$user->id])}}" style="color:#56c456">
                                    <i class="mdi mdi-account-switch"></i>
                                </a>
                                <a href="#" class="text-danger me-2" wire:click.prevent='showDeleteUser({{$user->id}})'>
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        {{$users->links('custom-pagination-links-view')}}
                    </tbody>
                    <tfoot>
                        {{-- {{$users->links('custom-pagination-links-view')}} --}}
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
                            <h1 class="modal-title">Cấp quyền cho {{$user->name ?? ''}}</h1>
                        </div>
                    </div>
                    <div class="modal-body">
                        @if($editMode)
                        <div class="row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Vai trò</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="role" id="role" class="form-control" wire:model="role">
                                    <option value="0">Roles</option>
                                    @foreach($roles as $key => $role)
                                    <option value="{{$role->name}}">
                                        {{$role->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @if(session()->has('msgRole'))
                                <span class="text-success">{{session()->get('msgRole')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Quyền</label>
                            <div class="col-md-10 col-xl-8">
                                <select name="permission" id="permission" class="form-control" wire:model="permission">
                                    <option value="0">Permission</option>
                                    @foreach($permissions as $key => $permission)
                                    <option value="{{$permission->name}}">
                                        {{$permission->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @if(session()->has('msgPermission'))
                                <span class="text-success">{{session()->get('msgPermission')}}</span>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            Đóng
                        </button>
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
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteUser">
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