@extends('layouts.app')
@section('content')
<section class="section-wrap pb-20">
  <div class="container">

    <!-- Breadcrumbs -->
    <ol class="breadcrumbs">
      <li>
        <a href="/">Trang chủ</a>
      </li>
      <li>
        <a href="#">Tin tức</a>
      </li>
      <li class="active">
        {{$blog->title}}
      </li>
    </ol>

    <div class="row">

      <!-- content -->
      <div class="col-lg-8 mb-50">

        <!-- standard post -->
        <article class="entry">

          <div class="entry__header">
            <h2 class="entry__title">
              <a href="blog-single.html">{{$blog->title}}</a>
            </h2>
            <ul class="entry__meta">
              <li class="entry__meta-date">
                <span class="entry__meta-label">date: </span>{{$blog->created_at}}
              </li>
              <li class="entry__meta-category">
                <span class="entry__meta-label">categories: </span><a href="#">{{$blog->blogCategory->name}}</a>
              </li>
            </ul>
          </div>

          {{-- <div class="entry__img-holder">
            <a href="blog-single.html">
              <img src="{{asset(Storage::url('blogs/'.$blog->image))}}" alt="" class="entry__img">
            </a>
          </div> --}}

          <div class="entry__article" style="color: none !important;">
            <div>{{$blog->summary}}</div><br>
            <div class="blog-content">{!!$blog->content!!}</div>

            {{-- <blockquote>
              <p>“Incredible change happens in your life when you decide to take control of what you do have power over
                instead of craving control over what you don't.”</p>
              <cite>- Steve Maraboli</cite>
            </blockquote> --}}
            <!-- tags -->
            <div class="entry__tags">
              Tags:
              <a href="#" rel="tag">app</a>,
              <a href="#" rel="tag">design</a>,
              <a href="#" rel="tag">mobile</a>
            </div> <!-- end tags -->

            <!-- share -->
            <div class="entry__share">
              <span class="entry__share-label">Chia sẻ với</span>
              <div class="socials">
                <a href="#" class="facebook"><i class="ui-facebook"></i></a>
                <a href="#" class="twitter"><i class="ui-twitter"></i></a>
                <a href="#" class="snapchat"><i class="ui-snapchat"></i></a>
                <a href="#" class="instagram"><i class="ui-instagram"></i></a>
                <a href="#" class="pinterest"><i class="ui-pinterest"></i></a>
              </div>
            </div> <!-- end share -->

          </div> <!-- end entry article -->

        </article> <!-- end standard post -->

        <!-- Author -->
        {{-- <div class="entry-author clearfix">
          <img src="img/blog/author.jpg" class="entry-author__img" alt="img">
          <div class="entry-author__info">
            <h6 class="entry-author__name"><a href="#">Jessie Rodrigues</a></h6>
            <p class="mb-0">But unfortunately for most of us our role as gardener has never been explained to us. And in
              misunderstanding our role, we have allowed seeds of all types, both good and bad, to enter our inner
              garden.</p>
          </div>
        </div> --}}

        <!-- Comments -->
        @livewire('client.comment-blog-component',['blog' => $blog])
        <!-- End Comments -->


      </div> <!-- end col -->

      <!-- Sidebar -->
      @include('client.layouts.sidebar-blog')
      <!-- end sidebar -->

    </div> <!-- end row -->
  </div> <!-- end container -->
</section>
@endsection
@push('scripts')
<script>
  var imgContent = document.querySelectorAll('.blog-content img');
  imgContent.forEach(item => {
    item.style.margin = '0 auto';
  });
</script>
@endpush