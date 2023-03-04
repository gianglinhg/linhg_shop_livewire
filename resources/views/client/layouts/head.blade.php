<title>{{$title ?? 'LinhG shop - Hệ thống thời trang nam nữ'}}</title>

<meta charset="utf-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Questrial:400%7CMontserrat:300,400,700,700i' rel='stylesheet'>

<!-- Css -->
<link rel="stylesheet" href="{{ asset('/template/client/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{asset('/template/client/css/font-icons.css')}}" />
<link rel="stylesheet" href="{{asset('/template/client/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('/template/client/css/color.css')}}" />

<link href="{{asset('/template/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />

<!-- Favicons -->
<link rel="shortcut icon" href="{{asset('/template/assets/images/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('/template/client/img/apple-touch-icon.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('/template/client/img/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('/template/client/img/apple-touch-icon-114x114.png')}}">

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<!-- Styles -->
@livewireStyles
@stack('styles')
<style>
  .form-group .form-control {
    margin-bottom: 30px !important;
  }

  .query-string {
    background-color: #000;
    width: 222px;
  }

  .query-string .img {
    width: 50px;
    padding: 6px 4px;
  }

  .query-string .item-content {
    padding: 2px 4px;
  }

  .query-string .item-content h6 {
    color: #fff !important;
    margin-bottom: 0px !important;
  }

  .query-string .all a,
  .item-content p {
    font-size: 14px;
  }

  .query-string .all a:hover {
    color: white;
  }

  .query-string .query-item {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  h1 {
    font-size: 20px !important;
  }

  #form-footer {
    background-color: transparent !important;
    border-color: #353535 !important;
    margin-bottom: 10px !important;

  }
</style>