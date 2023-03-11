<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-7">
                <div class="form-group mb-0">
                    <input type="search" placeholder="Tìm kiếm" class="form-control" wire:model="keyword">
                </div>
            </div>
            <div class="table-responsive col-sm-12 mt-2">
                <table id="mainTable" class="table table-striped m-b-0" style="cursor: pointer;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th style="width: 40%">Nội dung</th>
                            <th>Bài viết</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = ($blogComments->currentPage() - 1) * $blogComments->perPage();
                        @endphp
                        @foreach($blogComments as $key => $blogComment)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>
                                <b>{{$blogComment->user->name}}</b>
                            </td>
                            <td class="content-break">{{$blogComment->messages}}</td>
                            <td>
                                <a href="{{route('blog.read',[$blogComment->blog->slug])}}">
                                    {{$blogComment->blog->title}}
                                </a>
                            </td>
                            <td wire:click.prevent='changeFeatured({{$blogComment->featured}},{{$blogComment->id}})'>
                                <button
                                    class="btn {{$blogComment->featured ? 'btn-success' : 'btn-danger'}} waves-effect waves-light w-xs btn-sm m-b-5">
                                    {{$blogComment->featured ? 'Hiện' : 'Ẩn'}}
                                </button>
                            </td>
                            <td style="font-size:18px ">
                                {{-- <a href="#" class="text-primary me-2"
                                    wire:click.prevent='showFormEdit({{$blogComment->id}})'>
                                    <i class="mdi mdi-pencil"></i>
                                </a> --}}
                                <a href="#" class="text-danger me-2"
                                    wire:click.prevent='showDeleteCmt({{$blogComment->id}})'>
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        {{$blogComments->links('custom-pagination-links-view')}}
                    </tbody>
                    <tfoot>
                        {{-- {{$blogComments->links('custom-pagination-links-view')}} --}}
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
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteCmt">
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