<div class="trix-container">
	<input id="{{ $id }}" name="{{ $id }}" value="{!! $content ?? '' !!}" type="hidden" name="content">
	<trix-editor input="{{ $id }}"></trix-editor>
</div>