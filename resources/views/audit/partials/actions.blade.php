<div class="btn-group" role="group" aria-label="actions">
	@if(auth()->guard('api')->user()->can('see-one-' . $permission))
		<a href="{{ $view_url }}" class="btn btn-sm btn-outline-primary" title="{{ __('View') }}">
			<i class="far fa-eye"></i>
		</a>
	@endif
</div>
