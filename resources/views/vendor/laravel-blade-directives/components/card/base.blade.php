<div class="card {{ $card_class ?? '' }}}">
  	@isset($card_title)
		<div class="card-header {{ $card_header_class ?? '' }}">
			{{ __($card_title) }}
		</div>
  	@endisset

  	@isset($card_body)
		<div class="card-body {{ $card_body_class ?? '' }}">
			{{ $card_body }}
		</div>
	@endisset

	@isset($card_footer)
		<div class="card-footer {{ $card_footer_class ?? '' }}">
			{{ $card_footer }}
		</div>
  	@endisset
</div>