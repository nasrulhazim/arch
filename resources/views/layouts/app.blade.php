@extends('layouts.base')

@section('navigation')
    @include('layouts.partials.navigation-top')
@endsection 

@section('content')
	<div class="main-content mt-5">
		@yield('main-content')
	</div>
@endsection