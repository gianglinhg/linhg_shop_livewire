@extends('layouts.admin')
@section('admin_content')
<!-- 4 cột đầu hàng -->
<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="card-box widget-box-two widget-two-primary">
      <i class="mdi mdi-chart-areaspline widget-two-icon"></i>
      <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Sản phẩm</p>
        <h2><span data-plugin="counterup">{{$products_count}}</span>
          <small><i class="mdi mdi-arrow-up text-success"></i></small>
        </h2>
        <p class="text-muted m-0"><b>Last:</b> 30.4k</p>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-lg-3 col-md-6">
    <div class="card-box widget-box-two widget-two-warning">
      <i class="mdi mdi-layers widget-two-icon"></i>
      <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Tin tức
        </p>
        <h2><span data-plugin="counterup">{{$blogs_count}}</span>
          <small><i class="mdi mdi-arrow-up text-success"></i></small>
        </h2>
        <p class="text-muted m-0"><b>Last:</b> 40.33k</p>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-lg-3 col-md-6">
    <div class="card-box widget-box-two widget-two-success">
      <i class="mdi mdi-account-convert widget-two-icon"></i>
      <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">Tổng thành viên</p>
        <h2><span data-plugin="counterup">{{$users_count}}</span>
          <small><i class="mdi mdi-arrow-down text-danger"></i></small>
        </h2>
        <p class="text-muted m-0"><b>Last:</b> 1250</p>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-lg-3 col-md-6">
    <div class="card-box widget-box-two widget-two-danger">
      <i class="mdi mdi-access-point-network widget-two-icon"></i>
      <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Đơn hàng đang xử lý</p>
        <h2><span data-plugin="counterup">{{$orders->count()}}</span>
          <small><i class="mdi mdi-arrow-up text-success"></i></small>
        </h2>
        <p class="text-muted m-0"><b>Last:</b> 30.4k</p>
      </div>
    </div>
  </div><!-- end col -->

</div>
<!-- Danh sách -->
<div class="row">
  @can('read-products')
  <div class="col-md-4">
    <div class="card-box">
      <h4 class="header-title m-t-0 m-b-30">Sản phẩm đã hết hàng</h4>
      <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
        <div class="inbox-widget slimscroll-alt"
          style="min-height: 302px; overflow: hidden; width: auto; height: 250px;">
          @foreach($products as $product)
          <a href="#">
            <div class="inbox-item">
              <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg" class="img-circle" alt=""></div>
              <p class="inbox-item-author">{{$product->name}}</p>
              <p class="inbox-item-text">
                <span class="mr-3">{{number_format($product->price,0)}}VNĐ</span>
                @if($product->discount)
                <span style="text-decoration: line-through;">
                  {{number_format($product->discount,0)}}VNĐ
                </span>
                @endif
              </p>
              <p class="inbox-item-date">ID:{{$product->id}}</p>
            </div>
          </a>
          @endforeach
        </div>
        <div class="slimScrollBar"
          style="background: rgb(152, 166, 173); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 182.774px;">
        </div>
        <div class="slimScrollRail"
          style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
        </div>
      </div>
    </div> <!-- end card -->
  </div>
  @endcan
  <!-- end col -->

  @can('read-orders')
  <div class="col-md-8">
    <div class="card-box">
      <h4 class="header-title m-t-0 m-b-30">Đơn hàng chưa xử lý</h4>

      <div class="table-responsive">
        <table id="mainTable" class="table table-striped m-b-0" style="cursor: pointer;">
          <thead>
            <tr>
              <th>#</th>
              <th>Mã đơn hàng</th>
              <th>Khách hàng</th>
              <th>Trạng thái</th>
              <th>Tổng tiền</th>
            </tr>
          </thead>
          <tbody>
            @forelse($orders as $key => $order)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$order->order_code}}</td>
              <td>
                <strong>{{$order->customer->last_name. ' '.$order->customer->first_name}}</strong>
                {{-- <strong>{{$order->customer->first_name}}</strong> --}}
              </td>
              <td>
                <button class="btn waves-effect waves-light w-xs btn-sm m-b-5
                          @if($order->order_status == 'Chờ xác nhận')
                          btn-danger
                          @elseif($order->order_status == 'Đã xác nhận')
                          btn-warning
                          @elseif($order->order_status == 'Đã thanh toán')
                          btn-teal
                          @else btn-info
                          @endif ">
                  {{$order->order_status ?? 'Chờ xác nhận'}}
                </button>
              </td>
              <td>{{number_format($order->total, 0)}}VNĐ</td>
            </tr>
            @empty
            <tr>
              <td colspan="5">Chưa có dữ liệu cần thiết</td>
            </tr>
            @endforelse
          </tbody>
        </table>

      </div> <!-- table-responsive -->
    </div> <!-- end card -->
  </div>
  @endcan
  <!-- end col -->

</div>
@endsection