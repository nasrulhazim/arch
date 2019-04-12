<div class="card">
    <div class="card-header bg-dark text-light">Supervisor</div>

    <div class="card-body">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf 
            @method('PUT')

            <div class="form-group">
                <label for="supervisor_id">{{ __('Supervisor') }}</label>
                <select name="supervisor_id" class="custom-select">  
                    <option>{{ __('Select your supervisor...') }}</option>  
                    @foreach ($supervisors as $supervisor)
                        <option 
                        {{ $supervisor->id == auth()->user()->supervisor_id ? 'selected' : '' }} 
                        value={{ $supervisor->id }}>
                            {{ $supervisor->name }}
                        </option>    
                    @endforeach
                </select>
                @include('laravel-blade-directives::components.forms.error', ['key' => 'supervisor_id'])
            </div>

            <div class="form-group">
                <label for="reviewer_id">{{ __('Reviewer') }}</label>
                <select name="reviewer_id" class="custom-select">   
                    <option>{{ __('Select your reviewer...') }}</option>
                    @foreach ($reviewers as $reviewer)
                        <option 
                             {{ $reviewer->id == auth()->user()->reviewer_id ? 'selected' : '' }} 
                            value={{ $reviewer->id }}>
                                {{ $reviewer->name }}
                        </option>    
                    @endforeach
                </select>
                @include('laravel-blade-directives::components.forms.error', ['key' => 'reviewer_id'])
            </div>

            <input type="submit" class="mt-2 btn btn-dark text-light float-right" value="{{ __('Submit') }}">
        </form>
    </div>
</div>