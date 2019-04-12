@push('scripts')
	<script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>
	<script type="text/javascript">
		function dtConfirmDelete(route_name, argument)
		{
			event.preventDefault();
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this record!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	axios.delete(route(route_name, argument))
			  		.then(function (response) {
			  			swal("Success", "Record deleted.", "success");
					    location.reload();
					  })
					  .catch(function (error) {
					    swal("Error", "An error occured.", "error");
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