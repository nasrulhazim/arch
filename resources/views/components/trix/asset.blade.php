@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
@endpush

@push('scripts')
	@isset($core)
		<script type="text/javascript" src="{{ asset('js/trix-core.js') }}"></script>
	@else 
		<script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
	@endisset
@endpush