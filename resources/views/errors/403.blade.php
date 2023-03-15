@extends('layouts.admin')
@section('admin_content')
<div class="row">
  <div class="col-sm-12 text-center">
    <div class="wrapper-page">
      <img src="{{asset('/template/assets/images/animat-search-color.gif')}}"
        style="height:120px !important;margin:0 auto;">
      <h2 class="text-uppercase text-danger">Lỗi 403: Truy cập bị từ chối!</h2>
      <p class="text-muted">Xin lỗi, bạn không có quyền truy cập vào trang này. Vui lòng liên hệ với quản trị viên để
        được hỗ trợ.</p>

      <a class="btn btn-success waves-effect waves-light m-t-20" href="/admin">Dashboard</a>
    </div>

  </div>
</div>
@endsection