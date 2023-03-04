<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4 form-group mb-0 float-right">
                <input type="search" placeholder="Tìm kiếm" class="form-control" wire:model="keyword">
            </div>
            <div class="col-sm-8 mt-sm-0 mt-1 main-btn">
                <button class="btn btn-inverse waves-effect waves-light m-b-5 d-flex justify-content-end"
                    wire:click.prevent='showFilter'>
                    <i class="mdi mdi-filter-outline"></i>
                    <span>Lọc</span>
                </button>
            </div>
            <div class="table-responsive col-sm-12 mt-2">
                <table id="mainTable" class="table table-striped m-b-0" style="cursor: pointer;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Trạng thái</th>
                            <th>Các sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = ($orders->currentPage() - 1) * $orders->perPage();
                        @endphp
                        @foreach($orders as $key => $order)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$order->order_code}}</td>
                            <td>
                                <strong>{{$order->customer->last_name. ' '.$order->customer->first_name}}</strong>
                                <button class="btn btn-custom waves-effect waves-light btn-rounded btn-xs mr-3"
                                    style="float: right;" wire:click.prevent='showModalInfoBuyer({{$order->id}})'>
                                    thông tin
                                </button>
                            </td>
                            <td wire:click.prevent="showModalStatus({{$order->id}})">
                                <button class="btn waves-effect waves-light w-xs btn-sm m-b-5
                                    @if($order->order_status == 'Chờ xác nhận')
                                    btn-danger
                                    @elseif($order->order_status == 'Đã xác nhận')
                                    btn-warning
                                    @elseif($order->order_status == 'Đã thanh toán')
                                    btn-teal
                                    @endif ">
                                    {{$order->order_status ?? 'Chờ xác nhận'}}
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-success waves-effect waves-light w-xs btn-sm m-b-5"
                                    wire:click.prevent="showProductsOrder({{$order->id}})">
                                    Chi tiết
                                </button>
                            </td>
                            <td>{{number_format($order->total, 0)}}VNĐ</td>
                            <td style="font-size:18px ">
                                <a href="#" class="text-danger me-2 btn__delete-order"
                                    wire:click.prevent='deleteOrder({{$order->id}})'>
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        {{$orders->links('custom-pagination-links-view')}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if($isModalStatus)
    <!-- Modal trạng thái -->
    <div class="modal" id="change_status">
        <div class="modal-dialog">
            <form wire:submit.prevent='changeStatusOrder' method="POST">
                @csrf
                <div class="modal-content" style="padding: 10px 30px">
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="" id="" class="form-control" wire:model.defer='order_status'>
                                <option value="0">Chờ xác nhận</option>
                                @foreach(config('admin.status_order') as $status_order)
                                <option value="{{$status_order}}">{{$status_order}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            Hủy
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Lưu
                        </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    @endif
    @if($isModalInfoBuyer)
    @php
    $customer = $order_item->customer;
    @endphp
    <div class="modal fade bd-example-modal-lg" id="detail" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content p-0">
                <div class="modal-body">
                    <div class="mx-auto p-2 m-2" style="width: 600px;font-size:18px">
                        <table class="table" id="table-detail">
                            <tr>
                                <td>Tên</td>
                                <td>{{$customer->last_name .' '.$customer->first_name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$customer->email}}</td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td>{{$customer->phone}}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>
                                    {{$customer->address.', '.$customer->town.', '.$customer->city}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($isModalProducts)
    <div class="modal fade bd-example-modal-lg" id="modal_products" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content p-0">
                <div class="modal-body">
                    <div class="mx-auto p-2 m-2" style="font-size:18px">
                        <table class="table table-bordered" id="table-detail">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Màu</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order_item->oderDetail as $itemOrder)
                                <tr>
                                    <td>{{$itemOrder->product->name}}</td>
                                    <td>{{$itemOrder->color}}</td>
                                    <td>{{$itemOrder->size}}</td>
                                    <td>{{$itemOrder->qty}}</td>
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
    @push('scripts')
    <script>
        window.addEventListener('show-detail',event =>{
                $('#detail').modal('show');
            });
        window.addEventListener('message',event =>{
                $('#messageModal').modal('show');
            });
        window.addEventListener('show_change_status',event =>{
                $('#change_status').modal('show');
            });
        window.addEventListener('hide_change_status',event =>{
                $('#change_status').modal('hide');
            });
        window.addEventListener('show-products',event =>{
                $('#modal_products').modal('show');
            });
    </script>
    @endpush
</div>