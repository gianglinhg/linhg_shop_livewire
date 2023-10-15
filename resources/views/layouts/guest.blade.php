<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('admin.layouts.head')
</head>
<body class="bg-transparent widescreen">
  <section>
    <div class="container-alt">
        <div class="row">
            @yield('guest_content')
            @if(isset($slot)) {{ $slot }} @endif
        </div>
    </div>
  </section>
  @include('admin.layouts.footer')
</body>