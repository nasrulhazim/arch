@push('scripts')
	<script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>
	<script type="text/javascript">
		function dtConfirmDelete(url)
		{
			event.preventDefault();
			swal({
			  title: "{{ __('Are you sure?') }}",
			  text: "{{ __('Once deleted, you will not be able to recover this record!') }}",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	axios.delete(url)
			  		.then(function (response) {
			  			swal("Success", "{{ __('Record deleted') }}", "success");
					    location.reload();
					  })
					  .catch(function (error) {
					    swal("Error", "{{ __('An error occured') }}", "error");
					  })
					  .then(function () {
					    // always executed
					  });
			  }
			});
		}
	</script>
@endpush

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/datatable.css') }}">
@endpush