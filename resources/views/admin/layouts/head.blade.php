<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
<meta name="author" content="Coderthemes">

<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('/template/assets/images/favicon.png')}}">
<!-- App title -->
<title>{{$title ?? 'Quản trị LinhG Shop'}}</title>

<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{asset('/template/plugins/morris/morris.css')}}">

<!-- App css -->
<link href="{{asset('/template/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/template/assets/css/core.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/template/assets/css/components.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/template/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/template/assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/template/assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/template/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('/template/plugins/switchery/switchery.min.css')}}">

<link rel="shortcut icon" href="{{asset('/template/assets/images/favicon.png')}}">

<script src="{{asset('/template/assets/js/modernizr.min.js')}}"></script>
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<!-- Styles -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" />
@livewireStyles
<style>
  .scroll-modal {
    max-height: 680px;
    overflow-y: scroll;
  }

  .form-group .form-control {
    font-size: 1.5rem !important;
    border-color: #9ca1ab !important;
    border-radius: 5px !important;
    background-color: #fff !important;
    line-height: 1.5rem !important;
    padding: .5rem .75rem !important;
    line-height: 2rem !important;
  }

  .main-btn {
    display: flex;
    justify-content: end;
    gap: 2px;
  }

  /* Ck editor */
  .ck-editor__editable[role="textbox"] {
    min-height: 200px;
  }

  .ck-content .image {
    max-width: 80%;
    margin: 20px auto;
  }
</style>
@stack('styles')