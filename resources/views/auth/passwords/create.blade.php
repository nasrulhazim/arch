@extends('layouts.app')

@section('content')
    <form
        class="bg-white shadow rounded-lg p-8 max-w-login mx-auto"
        method="POST"
        action="{{ route('nova.password.email') }}"
    >
        @csrf

        <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="block font-light mb-2 text-white" for="email">{{ __('Email Address') }}</label>
            <input class="form-control form-input form-input-bordered w-full" id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <button class="w-full btn btn-default btn-white font-normal" type="submit">
            {{ __('Send Password Set Link') }}
        </button>
    </form>
@endsection
