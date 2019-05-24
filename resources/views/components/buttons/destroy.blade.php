@buttonbase([
	'label' => isset($label) ? $label : __('Destroy'),
	'icon' => isset($icon) ? $icon : 'fas fa-trash mr-2',
	'url' => $url,
	'classes' => isset($classes) ? $classes : 'btn btn-sm btn-danger'
])