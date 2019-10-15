@extends('layouts.base')

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/argon.css') }}">
@endpush

@section('navigation')
    @include('layouts.partials.sidebar')
@endsection 

@section('content')
	<div class="main-content">
		@include('layouts.partials.navbar')
		@yield('main-content')
	</div>
@endsection