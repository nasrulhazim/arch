@if ($errors->has(\Illuminate\Support\Str::snake($key)))
    <span class="{{ $error_class ?? 'invalid-feedback'}}">
        <strong>{{ $errors->first(\Illuminate\Support\Str::snake($key)) }}</strong>
    </span>
@endif