<div class="{{ $input_form_class ?? 'form-group' }}">
    @if(!empty($label))
        <label for="{{ \Illuminate\Support\Str::snake($label) }}" class="{{ $label_class ?? '' }}">
            {{ __($label) }}
        </label>
    @endif

    <textarea 
        class="form-control {{ 
            $errors->has(\Illuminate\Support\Str::snake($label)) 
            ? 'is-invalid' : '' 
        }} {{ $input_classes ?? '' }}"
        {{ isset($checked) && ($checked) ? 'checked' : '' }}
        @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
        @isset($readonly) readonly="true" @endisset
        @isset($id) id="{{ $id }}" @else id="{{ \Illuminate\Support\Str::snake($label) }}" @endisset
        @isset($name) name="{{ $name }}" @else name="{{ \Illuminate\Support\Str::snake($label) }}" @endisset
        @isset($required) required @endisset autofocus
        @isset($onkeyup) onkeyup="{{ $onkeyup }}" @endisset
        @isset($step) step="{{ $step }}" @endisset
        @isset($value) value="{{ old(\Illuminate\Support\Str::snake($label), $default_value ?? '') }}" @endisset
        @isset($help) aria-describedby="{{ \Illuminate\Support\Str::snake($label) }}_help" @endisset>@isset($value){{ $value }}@endisset</textarea>
        @inputHelp(['help' => isset($help) ?? false, 'label' => isset($label) ?? ''])
        @inputError(['key' => isset($label) ?? ''])
</div>