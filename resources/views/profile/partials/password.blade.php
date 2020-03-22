<div class="card">
    <div class="card-header use App\Processors\Imports">Security</div>

    <div class="card-body">
        <form action="{{ route('profile.password.update') }}" method="POST">
            @csrf 
            @method('PUT')
    
            <div class="form-group">
                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    
                    @inputError(['key' => 'password'])
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <input type="submit" class="mt-2 btn btn-success  float-right" value="{{ __('Submit') }}">
        </form>
    </div>
</div>