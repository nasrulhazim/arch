@extends('layouts.admin')

@section('content')
	@include('components.datatable.asset')
	<div class="container">
		<div class="card">
			<div class="card-header">
				{{ Breadcrumbs::render() }}  
				<h5><i class="fas fa-clipboard-list mr-2"></i>{{ __('Audit Trails') }}</h5>
			</div>

			<div class="card-body">
				@include('components.datatable.datatable', [
					'table_id' => 'audit_dt',
					'route' => route('dt.audits'),
					'columns' => [
						['data' => 'type', 'title' => __('Type'), 'defaultContent' => '-', 'searchable' => false, 'orderable' => false],
						['data' => 'user' , 'title' => __('User'), 'defaultContent' => '-', 'searchable' => false, 'orderable' => false],
						['data' => 'datetime', 'title' => __('Date / Time'), 'defaultContent' => '-', 'searchable' => false, 'orderable' => false],
						['data' => 'action' , 'title' => __('Actions'), 'name' => null, 'searchable' => false, 'orderable' => false],
					],
				])
			</div>
	    </div>
	</div>
@endsection
