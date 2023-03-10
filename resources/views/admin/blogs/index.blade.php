@extends('layouts.admin')
@section('admin_content')
<div class="row">
  <div class="col-sm-12">
    <div class="col-sm-4 form-group mb-0 float-right">
      <input type="search" placeholder="Tìm kiếm" class="form-control">
    </div>
    <div class="col-sm-8 mt-sm-0 mt-1 main-btn">
      <a href="{{route('admin.blog.create')}}"
        class="btn btn-inverse waves-effect waves-light m-b-5 d-flex justify-content-end">
        <i class="mdi mdi-plus-circle"></i>
        <span>Thêm</span>
      </a>
    </div>
    <div class="table-responsive col-sm-12 mt-2">
      <table id="mainTable" class="table table-striped m-b-0" style="cursor: pointer;">
        <thead>
          <tr>
            <th>#</th>
            <th>Hình ảnh</th>
            <th width='55%' class="text-center">Tin tức</th>
            <th>Loại</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @php
          $i = ($blogs->currentPage() - 1) * $blogs->perPage();
          @endphp
          @foreach($blogs as $key => $blog)
          <tr>
            <td>{{++$i}}</td>
            <td>
              <img src="{{Storage::url('blogs/'.$blog->image)}}" alt="{{$blog->title}}"
                style="width: 100px;height:60px !important; object-fit:cover;">
            </td>
            <td>
              <a href="{{route('blog.read',$blog->slug)}}">
                <h2>{{$blog->title}}</h2>
                <p class="content-break">{{Str::limit($blog->summary, 150)}}</p>
              </a>
            </td>
            <td>{{$blog->blogCategory->name}}</td>
            <td style="font-size:18px; display:flex;gap:5px">
              <a href="{{route('admin.blog.edit',[$blog->id])}}" class="text-primary me-2">
                <i class="mdi mdi-pencil"></i>
              </a>
              <form action="{{route('admin.blog.destroy',[$blog->id])}}" method='POST' class="text-danger me-2">
                @csrf
                <button type="submit"><i class="mdi mdi-delete"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
          {{$blogs->links('custom-pagination-links-view')}}
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
@endsection