<div class="form-group">
    @if(!empty($label))
        <label for="{{ \Illuminate\Support\Str::snake($label) }}" class="{{ $label_class ?? '' }}">
            {{ __($label) }}
        </label>
    @endif
    <select 
        class="form-control {{ 
            $errors->has(\Illuminate\Support\Str::snake($label)) 
            ? 'is-invalid' : '' 
        }} {{ $input_classes ?? '' }}"
        @isset($multiple) multiple @endisset
        @isset($readonly) readonly="true" @endisset
        @isset($id) id="{{ $id }}" @else id="{{ \Illuminate\Support\Str::snake($label) }}" @endisset
        @isset($name) name="{{ $name }}" @else name="{{ \Illuminate\Support\Str::snake($label) }}" @endisset
        @isset($required) required @endisset autofocus
        @isset($help) aria-describedby="{{ \Illuminate\Support\Str::snake($label) }}_help" @endisset>
      @foreach ($options as $option)
          <option 
            {{ isset($selected) && ($selected == $option->{{ $key ?? 'id' }}) ? 'selected' : '' }}
            value="{{ $option->{{ $key ?? 'id' }} }}">
              {{ __($option->{{ $value ?? 'name' }}) }}
          </option>
      @endforeach
    </select>
    
    @inputHelp(['help' => isset($help) ?? false, 'label' => isset($label) ?? ''])
    @inputError(['key' => isset($label) ?? ''])
</div>