<div class="btn-group" role="group" aria-label="actions">
	@if(auth()->guard('api')->user()->can('see-one-' . $permission))
	<a href="{{ $view_url }}" class="btn btn-sm btn-outline-primary" title="{{ __('View') }}">
		<i class="far fa-eye"></i>
	</a>
	@endif
	@if(auth()->guard('api')->user()->can('update-' . $permission))
	<a href="{{ $edit_url }}" class="btn btn-sm btn-outline-success" title="{{ __('Edit') }}">
		<i class="far fa-edit"></i>
	</a>
	@endif
	@if(auth()->guard('api')->user()->can('destroy-' . $permission))
	<a href="#" class="btn btn-sm btn-outline-danger" title="{{ __('Delete') }}"
       onclick="dtConfirmDelete('{{ $delete_url }}', {{ $id }})">
        <i class="far fa-trash-alt"></i>
    </a>
    @endif
</div>
