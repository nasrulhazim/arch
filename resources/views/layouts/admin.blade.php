@extends('layouts.app')

@section('navigation')
    @include('layouts.partials.navigation-top')
    @container
        @row 
            @col 
              {{ Breadcrumbs::render() }}  
            @endcol
        @endrow
    @endcontainer
@endsection 