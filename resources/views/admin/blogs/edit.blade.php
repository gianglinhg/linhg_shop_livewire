@extends('layouts.admin')
@section('admin_content')
<form action="{{route('admin.blog.update')}}" method="POST" class="p-3" enctype="multipart/form-data">
  @csrf
  <div class="row form-group">
    <label for="newImage" class="text-md-right col-form-label">Hình ảnh</label>
    <div class="col-xl-8" style="cursor: pointer">
      <input class="form-control" type="file" id="blog_image" name="blog_image">
      @error('blog_image')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="mx-auto mb-4" style="width:50%;">
      <img src="{{asset(Storage::url('blogs/'.$blog->image))}}" id="image_preview" width="50%"
        style="object-fit: cover;margin: auto">
    </div>
  </div>

  <div class="row form-group">
    <label for="blog_category_id" class="text-md-right
      col-form-label">Danh mục</label>
    <div class="col-xl-8">
      <select name="blog_category_id" id="blog_category_id" class="form-control">
        <option value="0">Category</option>
        @foreach($blogCategories as $blogCategory)
        <option value="{{$blogCategory->id}}" {{$blogCategory->id == $blog->blog_category_id ? 'selected' : ''}}>
          {{$blogCategory->name}}
        </option>
        @endforeach
      </select>
    </div>
    @error('blog_category_id')
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="row form-group">
    <label for="title" class="text-md-right col-form-label">Tiêu đề</label>
    <div class="col-xl-8">
      <input type="text" name="title" id="title" placeholder="Tiêu đề" value="{{$blog->title}}" class="form-control">
      @error('title')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>

  <div class="row form-group">
    <label for="summary" class="text-md-right col-form-label">Summary</label>
    <div class="col-xl-8">
      <textarea class="form-control" name="summary" id="summary
        placeholder=" summary">{{$blog->summary}}</textarea>
      @error('summary')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="row form-group">
    <label for="content" class="text-md-right col-form-label">Content</label>
    <div class="col-xl-8">
      <textarea class="form-control" name="content" id="ckeditor-new" rows="6"
        placeholder="Content">{{$blog->content}}</textarea>
      @error('content')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="form-foot">
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{route('admin.blog.index')}}" class="btn btn-success ">Danh sách</a>
  </div>
</form>
@endsection
@push('scripts')
<script>
  var inputFile = document.getElementById('blog_image');
  var imagePreview = document.getElementById('image_preview');

  inputFile.addEventListener('change', function() {
    var reader = new FileReader();
    reader.onload = function() {
        imagePreview.src = reader.result;
        imagePreview.style.display = 'block';
    }
    reader.readAsDataURL(inputFile.files[0]);
});
</script>
@endpush