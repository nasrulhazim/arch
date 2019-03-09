@component('mail::message')
# {{ __($subject) }}

{{ $content }}

@component('mail::button', ['url' => is_null($link) ? route('login') : $link ])
	{{ $link_label or __('Log Masuk') }}
@endcomponent

{{ __('Terima Kasih') }},<br>
{{ config('app.name') }}
@endcomponent
