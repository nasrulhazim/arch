@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @card
                @cardheader([
                    'title' => __('User Details'),
                    'icon' => 'fas fa-users mr-2',
                    'breadcrumb' => true
                ])
                @cardbody 
                    @input([
                        'name' => 'name',
                        'label' => __('Name'),
                        'label_class' => 'col-md-4 col-form-label text-md-right',
                        'input_classes' => 'col-md-6',
                        'input_form_class' => 'form-group row',
                        'readonly' => true,
                        'value' => $user->name,
                        'type' => 'text'
                    ])

                    @input([
                        'name' => 'email',
                        'label' => __('E-Mail Address'),
                        'label_class' => 'col-md-4 col-form-label text-md-right',
                        'input_classes' => 'col-md-6',
                        'input_form_class' => 'form-group row',
                        'readonly' => true,
                        'value' => $user->email,
                        'type' => 'text'
                    ])

                    <div class="form-group row">
                        <label for="roles[]" class="col-md-4 col-form-label text-md-right">
                            {{ __('Role(s)') }}
                        </label>
                        <div class="col-md-6">
                            <ol style="list-style: none;" class="p-0 mt-2 mb-2">
                                @foreach($user->getRoleNames() as $role)
                                    <li>{{ $role }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    
                    @buttonlink([
                        'url' => route('users.index'),
                    ])

                    @buttonedit([
                        'url' => route('users.edit', $user),
                        'classes' => 'btn btn-primary float-right'
                    ])
                @endcardbody
            @endcard
        </div>
    </div>
</div>
@endsection
