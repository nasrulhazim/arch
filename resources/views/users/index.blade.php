@extends('layouts.admin')

@section('content')
	@include('components.datatable.asset')
	<div class="container">
		<div class="row pb-3">
			<div class="col">
				<a href="{{ route('users.create') }}" class="btn btn-success float-right">{{ __('New User') }}</a>
			</div>
		</div>
		<div class="card">
			<div class="card-header bg-dark text-light">{{ __('Users') }}</div>

			<div class="card-body">
				@include('components.datatable.datatable', [
					'table_id' => 'user_dt',
					'route' => route('dt.users'),
					'columns' => [
						['data' => 'name', 'title' => __('Name'), 'defaultContent' => '-'],
						['data' => 'email', 'title' => __('E-mail'), 'defaultContent' => '-'],
						['data' => 'action' , 'name' => null, 'searchable' => false],
					],
				])
			</div>
	    </div>
	</div>
@endsection
