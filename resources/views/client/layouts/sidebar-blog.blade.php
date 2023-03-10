@php
$blogCategories = \DB::table('blog_categories')->latest()->get();
$recentBlogs = \DB::table('blogs')->limit(3)->get();
@endphp

<aside class="col-lg-4 sidebar">

  <div class="sidebar__box">

    {{--
    <!-- About -->
    <div class="widget widget_text">
      <h4 class="widget-title">About</h4>
      <div class="textwidget">
        <p>Namira is a very slick and clean e-commerce template with endless possibilities.
          Creating
          an awesome clothes store with this Theme is easy than you can imagine.
        </p>
      </div>
    </div> --}}

    <!-- Categories -->
    <div class="widget widget_categories">
      <h4 class="widget-title">Danh mục</h4>
      <ul>
        @foreach($blogCategories as $blogCategory)
        <li>
          {{-- <a href="{{route('blog.readCategory',[$blogCategory->slug])}}">{{$blogCategory->name}}</a> --}}
          <a href="{{url('blog?category='.$blogCategory->slug)}}">{{$blogCategory->name}}</a>
        </li>
        @endforeach
      </ul>
    </div>

    <!-- Recent Posts -->
    <div class="widget widget_recent_entries">
      <h4 class="widget-title">Bài đăng gần đây</h4>
      <ul>
        @foreach($recentBlogs as $recentBlog)
        <li>
          <a href="{{route('blog.read',[$recentBlog->slug])}}">{{$recentBlog->title}}</a>
          <span class="post-date">{{$recentBlog->created_at}}</span>
        </li>
        @endforeach
      </ul>
    </div>

    <!-- Follow Us -->
    <div class="widget widget-follow">
      <h4 class="widget-title">Theo dõi chúng tôi</h4>
      <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Google+</a></li>
        <li><a href="#">Pinterest</a></li>
      </ul>
    </div>


    <!-- Tags -->
    <div class="widget widget_tags clearfix">
      <h4 class="widget-title">Tag</h4>
      <a href="#">Showbiz</a>
      <a href="#">Fashion</a>
      <a href="#">T-shirt</a>
      <a href="#">Clean</a>
      <a href="#">Modern</a>
      <a href="#">Responsive</a>
      <a href="#">E-commerce</a>
      <a href="#">WordPress</a>
      <a href="#">Woocommerce</a>
      <a href="#">Store</a>
      <a href="#">Business</a>
    </div>

  </div> <!-- end sidebar box -->
</aside>