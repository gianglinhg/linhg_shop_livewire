<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
<meta name="author" content="Coderthemes">
<meta name="csrf-token" content="{{ csrf_token() }}">

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
{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
<!-- Styles -->
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" />
<style>
  .logout{
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: 400;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
    }
    .logout:hover{
        color: #262626;
        text-decoration: none;
        background-color: #f5f5f5;
    }
    .container{
        max-width: 1600px;
    }
</style>