<a class="btn btn-sm {{ $class ?? 'btn-primary' }}" href="{{ $href ?? '#' }}" 
	@isset($attributes)
		@foreach ($attributes as $key => $value) {{ $key }}="{{ $value }}" @endforeach
	@endisset
	@isset($data) 
        @foreach($data as $key => $value) data-{{ $key }}="{{ $value }}" @endforeach
    @endisset>
    @isset($icon)
		<i class="fa {{ $icon }}"></i>
	@endisset
	{{ $label ?? '' }}
</a>