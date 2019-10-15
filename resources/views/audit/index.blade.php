@extends('layouts.admin')

@section('main-content')
	@include('components.datatable.asset')
	<div class="container">
		@card
			@cardheader([
				'title' => __('Audit Trails'),
				'icon' => 'fas fa-clipboard-list mr-2',
				'breadcrumb' => true
			])
			@cardbody 
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
			@endcardbody
		@endcard
	</div>
@endsection
