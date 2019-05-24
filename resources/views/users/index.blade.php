@extends('layouts.admin')

@section('content')
	@include('components.datatable.asset')
	<div class="container">
		<div class="row pb-3">
			<div class="col">
				@buttonnew([
					'url' => route('users.create'),
					'classes' => 'btn btn-success float-right'
				])
			</div>
		</div>
		@card
			@cardheader([
				'title' => __('Users'),
				'icon' => 'fas fa-users mr-2',
				'breadcrumb' => true
			])
			@cardbody 
				@include('components.datatable.datatable', [
					'table_id' => 'user_dt',
					'route' => route('dt.users'),
					'columns' => [
						['data' => 'name', 'title' => __('Name'), 'defaultContent' => '-'],
						['data' => 'email', 'title' => __('E-mail'), 'defaultContent' => '-'],
						['data' => 'action' , 'name' => null, 'searchable' => false],
					],
				])
			@endcardbody
	    @endcard
	</div>
@endsection
