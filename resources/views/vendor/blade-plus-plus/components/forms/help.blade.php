@if($help)
    <small 
        id="{{ \Illuminate\Support\Str::snake($label) }}_help" 
        class="form-text text-muted {{ $help_class ?? '' }}">
        {{ __($help) }}
    </small>
@endif