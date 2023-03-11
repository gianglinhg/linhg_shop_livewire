<div class="left side-menu">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 232px;">
        <div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 232px;">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    <li class="menu-title">quản trị</li>

                    <li class="has_sub">

                        @hasanyrole('admin|super-admin')
                        <a href="{{route('admin.dashboard')}}" class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            {{-- <span class="label label-success pull-right">2</span> --}}
                            <span> Dashboard </span>
                        </a>
                        @endhasanyrole

                        @role('user')
                        <a href="#" class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            {{-- <span class="label label-success pull-right">2</span> --}}
                            <span> Dashboard </span>
                        </a>
                        @endrole

                    </li>

                    @hasanyrole('manager-products|super-admin')
                    <li class="has_sub">
                        <a href="#" class="waves-effect">
                            <i class="fa fa-product-hunt"></i>
                            {{-- <span class="label label-info pull-right">New</span> --}}
                            <span> Sản phẩm </span>
                        </a>
                        <ul class="list-unstyled" style="">
                            @can('products list')
                            <li>
                                <a href="{{route('admin.product')}}" class="waves-effect">
                                    <i class="mdi mdi-view-list"></i>
                                    <span>Danh sách</span>
                                </a>
                            </li>
                            @endcan
                            @can('products detail')
                            <li>
                                <a href="{{route('admin.product.detail')}}" class="waves-effect">
                                    <i class="fa fa-product-hunt"></i>
                                    <span>Số lượng</span>
                                </a>
                            </li>
                            @endcan
                            @can('products category')
                            <li>
                                <a href="{{route('admin.product.category')}}" class="waves-effect">
                                    <i class="mdi mdi-arrange-bring-forward"></i>
                                    <span>Danh mục</span>
                                </a>
                            </li>
                            @endcan
                            @can('products brand')
                            <li>
                                <a href="{{route('admin.brand')}}" class="waves-effect">
                                    <i class="mdi mdi-source-branch"></i>
                                    <span>Hãng</span>
                                </a>
                            </li>
                            @endcan
                            @can('products comment')
                            <li>
                                <a href="{{route('admin.product.comment')}}" class="waves-effect">
                                    <i class="mdi mdi-comment-text-outline"></i>
                                    <span>Bình luận</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endhasanyrole

                    @hasanyrole('manager-blogs|super-admin')
                    <li class="has_sub">
                        <a href="#" class="waves-effect">
                            <i class="mdi mdi-blogger"></i>
                            {{-- <span class="label label-info pull-right">New</span> --}}
                            <span> Tin tức </span>
                        </a>
                        <ul class="list-unstyled" style="">
                            <li>
                                <a href="{{route('admin.blog.index')}}" class="waves-effect">
                                    <i class="mdi mdi-view-list"></i>
                                    <span>Danh sách</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.blog.create')}}" class="waves-effect">
                                    <i class="mdi mdi-library-plus"></i>
                                    <span>Thêm tin tức</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.blog.category')}}" class="waves-effect">
                                    <i class="mdi mdi-box-shadow"></i>
                                    <span>Loại tin</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.blog.comment')}}" class="waves-effect">
                                    <i class="mdi mdi-comment-text-outline"></i>
                                    <span>Bình luận</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endhasanyrole

                    @hasanyrole('manager-orders|super-admin')
                    <li class="has_sub">
                        <a href="#" class="waves-effect">
                            <i class="mdi mdi-truck-delivery"></i>
                            {{-- <span class="label label-info pull-right">New</span> --}}
                            <span> Đơn hàng </span>
                        </a>
                        <ul class="list-unstyled" style="">
                            <li>
                                <a href="{{route('admin.order')}}" class="waves-effect">
                                    <i class="mdi mdi-view-list"></i>
                                    <span>Đang xử lý</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.order-finished')}}" class="waves-effect">
                                    <i class="mdi mdi-history"></i>
                                    <span>Đã hoàn thành</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endhasanyrole

                    @role('super-admin')
                    <li class="has_sub">
                        <a href="#" class="waves-effect">
                            <i class="mdi mdi-lock-outline"></i>
                            {{-- <span class="label label-info pull-right">New</span> --}}
                            <span>Tài khoản</span>
                        </a>
                        <ul class="list-unstyled" style="">
                            <li>
                                <a href="{{route('admin.user')}}" class="waves-effect">
                                    <i class="mdi mdi-account"></i>
                                    <span>Danh sách</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.role')}}" class="waves-effect">
                                    <i class="mdi mdi-account-settings-variant"></i>
                                    <span>Vai trò</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.permission')}}" class="waves-effect">
                                    <i class="mdi mdi-account-key"></i>
                                    <span>Quyền</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole

                </ul>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

            <div class="help-box" style="position: fixed;bottom: 1rem;">
                <h5 class="text-muted m-t-0">Bạn cần giúp đỡ ?</h5>
                <p class=""><span class="text-custom">Email:</span> <br> linhbq89@gmail.com</p>
                <p class="m-b-0"><span class="text-custom">Phone:</span> <br> (+84) 337 229 661</p>
            </div>

        </div>
        <div class="slimScrollBar"
            style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 378.624px; visibility: visible;">
        </div>
        <div class="slimScrollRail"
            style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
        </div>
    </div>
    <!-- Sidebar -left -->

</div>