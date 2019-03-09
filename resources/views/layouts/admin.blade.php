@extends('layouts.app')

@section('navigation')
    @include('partials.navigation-top')
@endsection 

@section('content')
    @container 
        @row 
            @col 
                {{ Breadcrumbs::render() }}
            @endcol
        @endrow
    @endcontainer
@endsection