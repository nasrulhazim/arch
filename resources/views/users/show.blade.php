@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <h5><i class="fas fa-user"></i>  {{ __('User Details') }}</h5>
                </div>

                <div class="card-body">
                        
                        @input([
                            'name' => 'name',
                            'label' => 'Name',
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'readonly' => true,
                            'value' => $user->name,
                            'type' => 'text'
                        ])

                        @input([
                            'name' => 'email',
                            'label' => 'E-Mail Address',
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'readonly' => true,
                            'value' => $user->email,
                            'type' => 'text'
                        ])

                        <div class="float-right">
                            <a href="{{ route('users.index') }}" class="btn btn-link">{{ __('Back') }}</a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-success">{{ __('Edit') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
