<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layouts.head')
</head>

<body class="fixed-left widescreen">

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        @include('admin.layouts.header')
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.sidebar')
        <!-- Left Sidebar End -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    @include('admin.layouts.page_title')
                    @if(!empty($slot)) {{$slot}} @endif
                    @yield('admin_content')
                </div>
            </div>
            <!-- content -->

            <footer class="footer text-right">
                2023 © Giang Văn Linh shop by Laravel, Livewire
            </footer>

        </div>

    </div>
    <!-- END wrapper -->

    @include('admin.layouts.footer')

</body>

</html>