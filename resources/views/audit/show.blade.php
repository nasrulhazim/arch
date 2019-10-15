@extends('layouts.admin')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @card
                @cardheader([
                    'title' => __('Audit Trail Details'),
                    'icon' => 'fas fa-clipboard-list mr-2',
                    'breadcrumb' => true
                ])
                @cardbody 
                    <table class="table">
                        <tr>
                            <th style="width: 20%;">{{ __('Type') }}</th>
                            <td>{{ class_basename($audit->auditable) }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">{{ __('User') }}</th>
                            <td>{{ $audit->user->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">{{ __('Date / Time') }}</th>
                            <td>{{ $audit->created_at->format('H:i:s, d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">{{ __('IP Address') }}</th>
                            <td>{{ $audit->ip_address }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">{{ __('User Agent') }}</th>
                            <td>{{ $audit->user_agent }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">{{ __('Before') }}</th>
                            <td>
                                <code>{{ json_encode($audit->old_values, JSON_PRETTY_PRINT) }}</code>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">{{ __('After') }}</th>
                            <td>
                                <code>{{ json_encode($audit->new_values, JSON_PRETTY_PRINT) }}</code>
                            </td>
                        </tr>
                    </table>

                    @buttonlink([
                        'label' => 'Back',
                        'url' => route('audit.index'),
                    ])
                @endcardbody
            @endcard
        </div>
    </div>
</div>
@endsection
