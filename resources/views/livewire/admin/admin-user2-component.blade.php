<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4 form-group mb-0 float-right">
                <input type="search" placeholder="Tìm kiếm" class="form-control" wire:model="keyword">
            </div>
            <div class="table-responsive col-sm-12 mt-2">
                <table id="mainTable" class="table table-striped m-b-0" style="cursor: pointer;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 10%">Ảnh đại diện</th>
                            <th>Tên</th>
                            <th>Email</th>
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
                            <td style="font-size:18px ">
                                <a href="#" class="text-primary me-2"
                                    wire:click.prevent='showPermission({{$user->id}})'>
                                    <i class="mdi mdi-account-key"></i>
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
    @if($isPermission)
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <div class="modal-title">
                            <h1 class="modal-title" id="exampleModalLabel">{{$user->name}}</h1>
                        </div>
                    </div>
                    <form>
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Vai trò</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($roles as $role)
                                            {{dd($user)}}
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-success checkbox-circle">
                                                        <input id="{{$role->name}}" type="checkbox"
                                                            @if($user->hasRole($role->name)) checked="" @endif
                                                        name="role[]" value="{{$role->name}}" wire:model='role'>
                                                        <label for="{{$role->name}}">
                                                            {{$role->name}}
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Quyền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($permissions as $permission)
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-success checkbox-circle">
                                                        <input id="{{$permission->name}}" type="checkbox"
                                                            {{$user->hasDirectPermission($permission->name)
                                                        ?
                                                        "checked=''" : ""}}
                                                        name="permission[]" value="{{$permission->name}}"
                                                        wire:model='permission'>
                                                        <label for="{{$permission->name}}">
                                                            {{$permission->name}}
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary"
                                wire:click.prevent="storePermission">Lưu</button>
                        </div>
                    </form>
                </form>
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