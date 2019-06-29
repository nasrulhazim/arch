@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
	<style type="text/css">
		.trix-toolbar, .trix-button-group, .trix-button  {
			border: none !important;
			border-radius: 0 !important;
		}
		.trix-button {
			border-radius: 5px !important;
			margin-right: 0.1rem !important;
			margin-left: 0.1rem !important;
		}
		.trix-button.trix-active {
			background: rgba(31, 58, 105, 0.4) !important;
		}
	</style>
@endpush

@push('scripts')
	@isset($core)
		<script type="text/javascript" src="{{ asset('js/trix-core.js') }}"></script>
	@else 
		<script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
	@endisset
@endpush