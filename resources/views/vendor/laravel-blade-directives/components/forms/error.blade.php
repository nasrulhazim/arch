@if ($errors->has(\Illuminate\Support\Str::snake($key)))
    <span class="invalid-feedback">
        <strong>{{ $errors->first(\Illuminate\Support\Str::snake($key)) }}</strong>
    </span>
@endif