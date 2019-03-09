<form id="{{ $id ?? 'form-id'}}" 
	action="{{ $action }}" 
	method="{{ $method ?? 'POST' }}" 
	@isset($hidden) style="display: none;" @endisset
	@isset($file) enctype="multipart/form-data" @endisset
	>
    @csrf
    @isset($method) 
		@method($method)
    @endisset
    {!! $inputs ?? '' !!}
</form>