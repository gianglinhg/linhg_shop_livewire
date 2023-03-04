@extends('layouts.app')
@section('content')
<!-- Hero Slider -->
@include('client.layouts.hero')

@livewire('client.home-component')
@endsection