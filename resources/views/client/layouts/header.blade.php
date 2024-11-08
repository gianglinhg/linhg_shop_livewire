@push('styles')
<style>
    .top-bar__right .dropdown-auth {
        display: none !important;
    }

    .query-string {
        position: absolute !important;
        width: 220px;
        background-color: #000;
    }
</style>
@endpush
<div class="nav__holder nav--sticky">
    <div class="container relative">

        <!-- Top Bar -->
        <div class="top-bar d-none d-lg-flex">

            <!-- Currency / Language -->
            <ul class="top-bar__currency-language">
                <li class="top-bar__language">
                    <a href="#">VietNam</a>
                    <div class="top-bar__language-dropdown">
                        <ul>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                </li>
                <li class="top-bar__currency">
                    <a href="#">VNĐ</a>
                    <div class="top-bar__currency-dropdown">
                        <ul>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div>
                </li>
            </ul>

            <!-- Promo -->
            <p class="text-center top-bar__promo">Miễn phí ship cho mọi đơn hàng từ 1.000.000VNĐ</p>

            <!-- Sign in / Wishlist / Cart -->
            <div class="top-bar__right">

                <!-- Sign In -->
                @auth
                <a href="{{route('profile.edit')}}" class="top-bar__item top-bar__sign-in">
                    <i class="ui-user"></i>
                    {{Auth::user()->name}}
                </a>
                @endauth
                @guest
                <a href="{{route('login')}}" class="top-bar__item top-bar__sign-in">
                    <i class="ui-user"></i>
                    Đăng nhập
                </a>
                @endguest

                <!-- Wishlist -->
                <div class="top-bar__item nav-cart">
                    @livewire('client.wishlist-icon-component')
                </div>

                <div class="top-bar__item nav-cart">
                    @livewire('client.cart-icon-component')
                </div>
            </div>

        </div> <!-- end top bar -->

        <div class="flex-parent">

            <!-- Mobile Menu Button -->
            <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open mobile menu">
                <span class="nav-icon-toggle__box">
                    <span class="nav-icon-toggle__inner"></span>
                </span>
            </button> <!-- end mobile menu button -->

            <!-- Logo -->
            <a href="/" class="logo">
                <img class="logo__img_1" src="/template/assets/images/logo_tran.png" alt="logo" width="100px">
            </a>

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">
                <ul class="nav__menu">
                    <li class="nav__dropdown active">
                        <a href="/">Trang chủ</a>
                    </li>
                    <li class="nav__dropdown active">
                        <a href="{{route('shop.index')}}">cửa hàng</a>
                        {{-- <ul class="nav__dropdown-menu">
                            <li><a href="#">T-shirt</a></li>
                        </ul> --}}
                    </li>

                    <li class="nav__dropdown active">
                        <a href="{{url('shop?for=men')}}">nam</a>
                        <ul class="nav__dropdown-menu">
                            @foreach($himCategories as $himCategory)
                            <li>
                                <a href="{{url('shop?for=men&category='.$himCategory->slug)}}">
                                    {{$himCategory->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav__dropdown">
                        <a href="{{url('shop?for=women')}}">nữ</a>
                        <ul class="nav__dropdown-menu">
                            @foreach($herCategories as $herCategory)
                            <li>
                                <a href="{{url('shop?for=women&category='.$herCategory->slug)}}">
                                    {{$herCategory->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    {{-- <li class="nav__dropdown">
                        <a href="catalog.html">Phụ kiện</a>
                        <ul class="nav__dropdown-menu nav__megamenu">
                            <li>
                                <div class="nav__megamenu-wrap">
                                    <div class="row">

                                        <div class="col nav__megamenu-item">
                                            <a href="#" class="nav__megamenu-title">Phụ kiện</a>
                                            <ul class="nav__megamenu-list">
                                                <li><a href="#">Wallets</a></li>
                                                <li><a href="#">Scarfs</a></li>
                                                <li><a href="#">Belts</a></li>
                                                <li><a href="#">Shoes</a></li>
                                            </ul>
                                        </div>

                                        <div class="col nav__megamenu-item">
                                            <a href="#" class="nav__megamenu-title">Dành cho nữ</a>
                                            <ul class="nav__megamenu-list">
                                                @foreach($herCategories as $herCategorie)
                                                <li>
                                                    <a href="{{url('shop?for=women&category='.$herCategorie->slug)}}">
                                                        {{$herCategorie->name}}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="col nav__megamenu-item">
                                            <a href="#" class="nav__megamenu-title">dành cho nam</a>
                                            <ul class="nav__megamenu-list">
                                                @foreach($himCategories as $himCategorie)
                                                <li>
                                                    <a href="{{url('shop?for=men&category='.$himCategorie->slug)}}">
                                                        {{$himCategorie->name}}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="col nav__megamenu-item">
                                            <a href="#" class="nav__megamenu-title">watches</a>
                                            <ul class="nav__megamenu-list">
                                                <li><a href="#">Smart Watches</a></li>
                                                <li><a href="#">Diving Watches</a></li>
                                                <li><a href="#">Sport Watches</a></li>
                                                <li><a href="#">Classic Watches</a></li>
                                            </ul>
                                        </div>

                                        <div class="col nav__megamenu-item">
                                            <a href="#"><img src="img/shop/megamenu_banner.png" alt=""></a>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="nav__dropdown">
                        <a href="{{route('blog.index')}}">blog</a>
                        <ul class="nav__dropdown-menu">
                            @foreach($blogCategories as $blogCategory)
                            <li>
                                <a href="{{url('blog?category='.$blogCategory->slug)}}">{{$blogCategory->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav__dropdown">
                        <a href="{{route('contact')}}">liên hệ</a>
                    </li>
                    <li class="nav__dropdown">
                        <a href="{{route('about')}}">giới thiệu</a>
                    </li>
                    @auth
                    <li class="nav__dropdown">
                        @if(Auth::user()->hasRole(['admin','super-admin']))
                        <a href="{{route('admin.dashboard')}}">quản trị viên</a>
                        @else
                        <a href="#">thành viên</a>
                        @endif
                        <ul class="nav__dropdown-menu">
                            <li>
                                @if(Auth::user()->hasRole(['admin','super-admin']))
                                <a href="{{route('admin.product')}}">Sản phẩm</a>
                                <a href="{{route('admin.product.category')}}">Danh mục</a>
                                <a href="{{route('admin.brand')}}">Hãng</a>
                                <a href="{{route('admin.blog.index')}}">Blog</a>
                                @can('manager order')
                                <a href="{{route('admin.order')}}">Đơn hàng</a>
                                @endcan
                                @endif
                                @if(Auth::user()->hasRole('super-admin'))
                                <a href="{{route('admin.user')}}">Tài khoản</a>
                                @endif
                                {{-- <form action="{{ route('logout')}}" method="post">
                                    @csrf
                                    <a href="#" onclick="event.preventDefault();
                                    this.closest('form').submit();">>Đăng xuất</a>
                                </form> --}}
                            </li>

                        </ul>
                    </li>
                    @endauth

                </ul> <!-- end menu -->

            </nav> <!-- end nav-wrap -->


            <!-- Search -->
            @livewire('client.header-search-component')


            <!-- Mobile Wishlist -->
            <a href="#" class="nav__mobile-wishlist d-lg-none" aria-label="Mobile wishlist">
                <i class="ui-heart"></i>
                <span class="nav__mobile-cart-amount">({{Cart::instance('wishlist')->count()}})</span>
            </a>

            <!-- Mobile Cart -->
            <a href="{{route('cart')}}" class="nav__mobile-cart d-lg-none">
                <i class="ui-bag"></i>
                <span class="nav__mobile-cart-amount">({{Cart::instance('cart')->count()}})</span>
            </a>
        </div> <!-- end flex-parent -->
    </div> <!-- end container -->
</div>

<!-- End Navigation -->