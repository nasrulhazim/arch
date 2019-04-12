@push('scripts')
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var options = { 
				processing: true, 
				serverSide: true, 
				responsive: true, 
				deferRender: true,
				ajax: {
					url: '{!! $route !!}',
					beforeSend: function (request) {
				        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
				    }
				} @isset($lang), language: { url: '{{ asset($lang) }}' } @endisset};
			$('#{{ $table_id }}').DataTable(options);
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