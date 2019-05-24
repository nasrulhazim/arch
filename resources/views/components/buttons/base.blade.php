<a href="{{ $url }}" class="{{ $classes ?? 'btn btn-success' }}">
	@includeWhen(isset($icon), 'components.misc.icon', ['icon' => $icon]){{ __($label) }}
</a>