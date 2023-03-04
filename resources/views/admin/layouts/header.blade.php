<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{route('admin.dashboard')}}" class="logo">
            <span>
                <img src="{{asset('/template/assets/images/logo_tran2.png')}}" alt="" width="80%"
                    style="margin: 0px 20px">
            </span>
            {{-- <span>Zir<span>cos</span></span> --}}
            <i class="mdi mdi-layers"></i>
        </a>

        {{-- <a href="index.html" class="logo">
            <span>
                <img src="template/assets/images/logo.png" alt="" height="30">
            </span>
            <i>
                <img src="template/assets/images/logo_sm.png" alt="" height="28">
            </i>
        </a> --}}
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <!-- Navbar-left -->
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                {{-- <li class="hidden-xs">
                    <form role="search" class="app-search">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href="#"><i class="fa fa-search"></i></a>
                    </form>
                </li> --}}
                <li class="hidden-xs">
                    <a href="/" class="menu-item">Trang chủ</a>
                </li>
                <li class="dropdown hidden-xs">
                    <a data-toggle="dropdown" class="dropdown-toggle menu-item" href="#" aria-expanded="false">Tiếng
                        Việt
                        <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="#">English</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right(Notification) -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Nút cài đặt kế avatar -->
                {{-- <li>
                    <a href="javascript:void(0);" class="right-bar-toggle right-menu-item">
                        <i class="mdi mdi-settings"></i>
                    </a>
                </li> --}}

                <li class="dropdown user-box">
                    <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown"
                        aria-expanded="true">
                        <img src="{{asset(Storage::url('users/'. Auth::user()->avatar))}}" alt="user-img"
                            class="img-circle user-img" style="object-fit: cover">
                    </a>

                    <ul
                        class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                        <li>
                            <h5>Hi, {{Auth::user()->name}}</h5>
                        </li>
                        <li><a href="/profile"><i class="ti-user m-r-5"></i>Hồ sơ</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i>Cài đặt</a></li>
                        {{-- <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li> --}}
                        <li>
                            <a href="{{route('logout')}}"><i class="ti-power-off m-r-5"></i>Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul> <!-- end navbar-right -->

        </div><!-- end container -->
    </div><!-- end navbar -->
</div>