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
                            <th>Người bình luận</th>
                            <th style="width: 40%">Nội dung</th>
                            <th>Sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = ($productComments->currentPage() - 1) * $productComments->perPage();
                        @endphp
                        @foreach($productComments as $key => $productComment)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>
                                <p><strong>{{$productComment->user->name}}</strong></p>
                                <p>{{$productComment->email}}</p>
                            </td>
                            <td class="content-break">{{$productComment->messages}}</td>
                            <td>{{$productComment->product->name}}</td>
                            <td
                                wire:click.prevent='changeFeatured({{$productComment->featured}},{{$productComment->id}})'>
                                <button
                                    class="btn {{$productComment->featured ? 'btn-success' : 'btn-danger'}} waves-effect waves-light w-xs btn-sm m-b-5">
                                    {{$productComment->featured ? 'Hiện' : 'Ẩn'}}
                                </button>
                            </td>
                            <td style="font-size:18px ">
                                <a href="#" class="text-danger me-2"
                                    wire:click.prevent='showDeleteCmt({{$productComment->id}})'>
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        {{$productComments->links('custom-pagination-links-view')}}
                    </tbody>
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