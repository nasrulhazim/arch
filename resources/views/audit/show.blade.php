@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ Breadcrumbs::render() }}  
                    <h5><i class="fas fa-clipboard-list mr-2"></i>{{ __('Audit Trails') }}</h5>
                </div>

                <div class="card-body">
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
                    <a href="{{ route('audit.index') }}" class="btn btn-default">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
