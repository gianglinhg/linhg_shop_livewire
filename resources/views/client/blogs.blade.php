@extends('layouts.app')
@section('content')
<section class="section-wrap pb-50">
    <div class="container">

        <!-- Breadcrumbs -->
        <ol class="breadcrumbs">
            <li>
                <a href="/">Trang chủ</a>
            </li>
            <li class="active">
                Tin tức
            </li>
        </ol>

        <div class="row">

            <!-- content -->
            <div class="col-lg-8 mb-50">
                @foreach($blogs as $blog)
                <!-- standard post -->
                <article class="entry">

                    <div class="entry__header">
                        <h2 class="entry__title">
                            <a href="{{route('blog.read',[$blog->slug])}}">{{$blog->title}}</a>
                        </h2>
                        <ul class="entry__meta">
                            <li class="entry__meta-date">
                                <span class="entry__meta-label">ngày: </span>{{$blog->created_at}}
                            </li>
                            <li class="entry__meta-category">
                                <span class="entry__meta-label">Loại: </span><a
                                    href="#">{{$blog->blogCategory->name}}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="entry__img-holder">
                        <a href="{{route('blog.read',[$blog->slug])}}">
                            <img src="{{asset(Storage::url('blogs/'.$blog->image))}}" alt="{{$blog->title}}"
                                class="entry__img" style="height: 500px !important;object-fit: cover">
                        </a>
                    </div>

                    <div class="entry__body">
                        <div class="entry__excerpt">
                            <p>{{$blog->summary}}</p>
                            <div class="entry__read-more">
                                <a href="{{route('blog.read',[$blog->slug])}}" class="entry__read-more-link">Đọc
                                    thêm</a>
                            </div>
                        </div>
                    </div>

                </article> <!-- end standard post -->
                @endforeach

                <!-- Pagination -->
                <div class="pagination clearfix">
                    {{$blogs->links('client-paginate')}}
                </div>

            </div> <!-- end col -->

            <!-- Sidebar -->
            @include('client.layouts.sidebar-blog')
            <!-- end sidebar -->

        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
@endsection