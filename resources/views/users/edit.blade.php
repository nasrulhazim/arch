@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @card
                @cardheader([
                    'title' => __('Edit User'),
                    'icon' => 'fas fa-user mr-2',
                    'breadcrumb' => true
                ])

                @cardbody
                    <form method="POST" action="{{ route('users.update',$user->id)}}">
                        @csrf
                        @method('PATCH')

                        @input([
                            'name' => 'name',
                            'label' => __('Name'),
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'value' => $user->name,
                            'type' => 'text'
                        ])

                        @input([
                            'name' => 'email',
                            'label' => __('E-Mail Address'),
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'readonly' => 'true',
                            'value' => $user->email,
                            'type' => 'text'
                        ])

                        @input([
                            'name' => 'password',
                            'label' => __('Password'),
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'type' => 'password'
                        ])

                        @input([
                            'name' => 'password_confirmation',
                            'label' => __('Password Confirmation'),
                            'label_class' => 'col-md-4 col-form-label text-md-right',
                            'input_classes' => 'col-md-6',
                            'input_form_class' => 'form-group row',
                            'type' => 'password'
                        ])

                        @buttonlink([
                            'label' => 'Cancel',
                            'url' => route('users.show', $user),
                        ])

                        @buttonsubmit([
                            'icon' => 'fas fa-save mr-2',
                            'label' => 'Update',
                            'classes' => 'btn btn-success float-right'
                        ])
                    </form>
                @endcardbody
            @endcard
        </div>
    </div>
</div>
@endsection
