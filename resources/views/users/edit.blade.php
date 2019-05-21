@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <h5><i class="fas fa-user"></i>  {{ __('Update User') }}</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update',$user->id)}}">
                        @csrf
                        @method('PATCH')

                        @input([
                            'name' => 'name',
                            'label' => 'Name',
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'value' => $user->name,
                            'type' => 'text'
                        ])

                        @input([
                            'name' => 'email',
                            'label' => 'E-Mail Address',
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'readonly' => 'true',
                            'value' => $user->email,
                            'type' => 'text'
                        ])

                        @input([
                            'name' => 'password',
                            'label' => 'Password',
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'type' => 'password'
                        ])

                        @input([
                            'name' => 'password_confirmation',
                            'label' => 'Password Confirmation',
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'type' => 'password'
                        ])

                        <div class="float-right">
                            <a class="btn btn-link" href="{{ route('users.index') }}">{{ __('Back') }}</a>
                            @submit(['label' => 'Update'])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
