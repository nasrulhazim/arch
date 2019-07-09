@push('scripts')
	<script type="text/javascript">
		var datatable_{{ $table_id }};
		var datatable_{{ $table_id }}_options = {};

		jQuery(document).ready(function($) {
			var datatable_{{ $table_id }}_options = { 
				language: {
  					paginate: {
  						previous: '<i class="fas fa-angle-left"></i>',
  						next: '<i class="fas fa-angle-right"></i>',
  					}
  				},
				processing: true, 
				serverSide: true, 
				responsive: true, 
				deferRender: true,
				@isset($multiselect)select: { style: 'multi'}, @endisset
				@isset($columns)columns: @json($columns),@endisset
				ajax: {
					url: '{!! $route !!}',
					@isset($unique)
				    dataSrc: function(json) {
				       	var names = [];
				       	return json.data.filter(function(item) {
				         	if (!~names.indexOf(item.name) ) {
				           		names.push(item.name);
				           	return item;
				         	}
				       	})
			    	},
					@endisset
					beforeSend: function (request) {
				        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
				    }
				} @isset($lang), language: { url: '{{ asset($lang) }}' } @endisset};
			datatable_{{ $table_id }} = $('#{{ $table_id }}').DataTable(datatable_{{ $table_id }}_options);
			@isset($col_to_filter)
				datatable_{{ $table_id }}.column({{ $col_to_filter }}).data().unique();
			@endisset
			@stack('scripts-datatable')
		});
	</script>
@endpush

@table(['table_id' => $table_id])
	@isset($headers)
		@slot('thead')
			@foreach($headers as $header)
				<th>{{ $header }}</th>
			@endforeach
		@endslot
	@endisset
	
	@isset($footers)
		@slot('tfoot')
			@foreach($footers as $footer)
				<th>{{ $footer }}</th>
			@endforeach
		@endslot
	@endisset
@endtable