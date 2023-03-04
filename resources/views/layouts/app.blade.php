<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('client.layouts.head')
</head>

<body class="font-sans antialiased">
    @include('client.layouts.mobile_sidebar')
    <main class="main oh" id="main">
        <!-- Navigation -->
        <header class="nav">
            @include('client.layouts.header')
        </header> <!-- end navigation -->


        <!-- Home -->
        @yield('content')
        @if(isset($slot)) {{$slot}} @endif

        <!-- Footer -->
        @include('client.layouts.footer')
    </main> <!-- end main-wrapper -->
    {{-- @stack('modals') --}}
    @livewireScripts
</body>

</html>