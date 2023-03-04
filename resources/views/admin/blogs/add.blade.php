@extends('layouts.admin')
@section('admin_content')
<form action="{{route('admin.blog.store')}}" method="POST" class="p-3" enctype="multipart/form-data">
  @csrf
  <div class="row form-group">
    <label for="newImage" class="text-md-right col-form-label">Hình ảnh</label>
    <div class="col-xl-8" style="cursor: pointer">
      <input class="form-control" type="file" id="blog_image" name="blog_image">
      @error('blog_image')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="mx-auto mb-4" id="image_preview" style="width:50%;">
      <img id="image_preview" width="50%" style="object-fit: cover;margin: auto">
    </div>
  </div>

  <div class="row form-group">
    <label for="blog_category_id" class="text-md-right
      col-form-label">Danh mục</label>
    <div class="col-xl-8">
      <select name="blog_category_id" id="blog_category_id" class="form-control">
        <option value="0">Category</option>
        @foreach($blogCategories as $blogCategory)
        <option value="{{$blogCategory->id}}">
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
      <input name="title" id="title" placeholder="Tiêu đề" type="text" class="form-control">
      @error('name')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>

  <div class="row form-group">
    <label for="summary" class="text-md-right col-form-label">Summary</label>
    <div class="col-xl-8">
      <textarea class="form-control" name="summary" id="summary" placeholder="summary"></textarea>
      @error('summary')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="row form-group">
    <label for="content" class="text-md-right col-form-label">Content</label>
    <div class="col-xl-8">
      <textarea class="form-control" name="content" id="ckeditor-new" placeholder="Content"></textarea>
      @error('content')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="form-footer">
    <button type="submit" class="btn btn-primary mr-2">Lưu</button>
    <a href="{{route('admin.blog.index')}}" class="btn btn-success ">Danh sách</a>
  </div>
</form>
@endsection
@push('scripts')
<script>
  var inputFile = document.getElementById('blog_image');
  var imagePreview = document.getElementById('image_preview');

  inputFile.addEventListener('change', () => {
  const file = inputFile.files[0];
  if (file) {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
      const imageUrl = reader.result;
      // .imagePreview.setAttribute('src', imageUrl);
      const img = new Image();
      img.src = imageUrl;
      img.onload = () => {
        imagePreview.innerHTML = '';
        imagePreview.appendChild(img);
      };
    };
  }
});
</script>
@endpush