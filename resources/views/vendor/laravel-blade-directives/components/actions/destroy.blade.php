<div>
	@baseAction([
		'href' => $href ?? '#',
		'label' => $label ?? '',
		'class' => 'btn-danger',
		'icon' => 'fa-trash',
		'data' => $data ?? [],
		'attributes' => $attributes ?? []
	])

	@formHidden([
		'id' => $id, 
		'action' => $href, 
		'method' => 'DELETE'
	])
</div>