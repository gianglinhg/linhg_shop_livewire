<!-- Preloader -->
<div class="loader-mask">
  <div class="loader">
    <div></div>
  </div>
</div>

<!-- Mobile Sidenav -->
<header class="sidenav" id="sidenav">
  <!-- Search -->
  <div class="sidenav__search-mobile">
    <form method="get" class="sidenav__search-mobile-form">
      <input type="search" class="sidenav__search-mobile-input" placeholder="Tìm kiếm" aria-label="Search input">
      <button type="submit" class="sidenav__search-mobile-submit" aria-label="Submit search">
        <i class="ui-search"></i>
      </button>
    </form>
  </div>

  <nav>
    <ul class="sidenav__menu" role="menubar">
      <li>
        <a href="{{route('shop.index')}}" class="sidenav__menu-link">cửa hàng</a>
      </li>
      <li>
        <a href="#" class="sidenav__menu-link">Nam</a>
        <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
            class="ui-arrow-down"></i></button>
        <ul class="sidenav__menu-dropdown">
          @foreach($himCategories as $himCategory)
          <li>
            <a href="{{url('shop?for=men&category='.$himCategory->slug)}}" class="sidenav__menu-link">
              {{$himCategory->name}}
            </a>
          </li>
          @endforeach
        </ul>

      <li>
        <a href="#" class="sidenav__menu-link">Nữ</a>
        <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
            class="ui-arrow-down"></i></button>
        <ul class="sidenav__menu-dropdown">
          @foreach($herCategories as $herCategory)
          <li>
            <a href="{{url('shop?for=women&category='.$herCategory->slug)}}" class="sidenav__menu-link">
              {{$herCategory->name}}
            </a>
          </li>
          @endforeach
        </ul>
      </li>

      {{-- <li>
        <a href="#" class="sidenav__menu-link">Accessories</a>
        <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
            class="ui-arrow-down"></i></button>
        <ul class="sidenav__menu-dropdown">
          <li>
            <a href="#" class="sidenav__menu-link">All accessories</a>
            <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
                class="ui-arrow-down"></i></button>
            <ul class="sidenav__menu-dropdown">
              <li>
                <a href="#" class="sidenav__menu-link">Wallets</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Scarfs</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Shirt</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Shoes</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#" class="sidenav__menu-link">for her</a>
            <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
                class="ui-arrow-down"></i></button>
            <ul class="sidenav__menu-dropdown">
              <li>
                <a href="#" class="sidenav__menu-link">Underwear</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Hipster</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Dress</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Hoodie &amp; Jackets</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Tees</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#" class="sidenav__menu-link">for him</a>
            <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
                class="ui-arrow-down"></i></button>
            <ul class="sidenav__menu-dropdown">
              <li>
                <a href="#" class="sidenav__menu-link">T-shirt</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Hoodie &amp; Jackets</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Dress</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Suits</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Shorts</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#" class="sidenav__menu-link">Watches</a>
            <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
                class="ui-arrow-down"></i></button>
            <ul class="sidenav__menu-dropdown">
              <li>
                <a href="#" class="sidenav__menu-link">Smart Watches</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Diving Watches</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Sport Watches</a>
              </li>
              <li>
                <a href="#" class="sidenav__menu-link">Classic Watches</a>
              </li>
            </ul>
          </li>

        </ul>
      </li> --}}

      <li>
        <a href="#" class="sidenav__menu-link">tin tức</a>
        <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
            class="ui-arrow-down"></i></button>
        <ul class="sidenav__menu-dropdown">
          @foreach($blogCategories as $blogCategory)
          <li>
            <a href="{{url('blog?category='.$blogCategory->slug)}}"
              class="sidenav__menu-link">{{$blogCategory->name}}</a>
          </li>
          @endforeach
        </ul>
      </li>

      <li>
        <a href="{{route('contact')}}" class="sidenav__menu-link">Liên hệ</a>
      </li>
      <li>
        <a href="{{route('about')}}" class="sidenav__menu-link">giới thiệu</a>
      </li>

      @auth
      <li>
        <a href="{{route('admin.dashboard')}}" class="sidenav__menu-link">tài khoản</a>
        <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
            class="ui-arrow-down"></i></button>
        <ul class="sidenav__menu-dropdown">
          <li><a href="{{route('admin.product')}}" class="sidenav__menu-link">Sản phẩm</a></li>
          <li><a href="{{route('admin.product.category')}}" class="sidenav__menu-link">Danh mục</a></li>
          <li><a href="{{route('admin.brand')}}" class="sidenav__menu-link">Hãng</a></li>
          <li><a href="{{route('admin.blog.index')}}" class="sidenav__menu-link">Tin tức</a></li>
          <li><a href="{{route('admin.order')}}" class="sidenav__menu-link">Đơn hàng</a></li>
          @if(Auth::user()->hasRole('super-admin'))
          <li><a href="{{route('admin.user')}}" class="sidenav__menu-link">Tài khoản</a></li>
          @endif
          <li>
            <form action="{{ route('logout')}}" method="post">
              @csrf
              <a href="#" class="sidenav__menu-link" onclick="event.preventDefault();
              this.closest('form').submit();">>Đăng xuất</a>
          </form>
        </li>
        </ul>
      </li>
      @endauth

      <li>
        @auth
        <a href="{{route('profile.edit')}}" class="sidenav__menu-link">
          <i class="ui-user"></i>
          {{Auth::user()->name}}
        </a>
        @endauth
        @guest
        <a href="{{route('login')}}" class="sidenav__menu-link">
          <i class="ui-user"></i>
          Đăng nhập
        </a>
        @endguest
      </li>
    </ul>
  </nav>
</header> <!-- end mobile sidenav -->
<!-- end mobile sidebar -->