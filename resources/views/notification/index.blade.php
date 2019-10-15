@extends('layouts.admin')

@push('scripts')
	<script type="text/javascript">
		function markAsRead(url)
		{
			axios.put(url)
				.then(function(){
					location.reload();
				})
		}
		function markAllAsRead()
		{
			axios.put('{{ route('api.notification.mark.all.as.read') }}')
				.then(function(){
					location.reload();
				})
		}
	</script>
@endpush

@section('main-content')
	<div class="container">
		@if(auth()->user()->notifications->count() > 0)
		<div class="row pb-3">
			<div class="col">
				<div class="btn btn-primary float-right" onclick="markAllAsRead()">
					{{ __('Mark All as Read') }}
				</div>
			</div>
		</div>
		@endif
		<div class="row">
			<div class="col">
				@card 
					@cardheader([
						'title' => 'Notifications',
						'icon' => 'far fa-bell mr-2',
					])

					@cardbody 
						<table class="table">
							<tr>
								<th>{{ __('Message') }}</th>
								<th>{{ __('Type') }}</th>
								<th>{{ __('Received At') }}</th>
								<th>{{ __('Action') }}</th>
							</tr>
							@forelse (auth()->user()->notifications as $notification)
								<tr>
									<td>
										<a href="{{ $notification->data['url'] }}" 
											class="{{ ! $notification->read_at ? 'font-weight-bold' : '' }}" 
											target="_blank">
											{{ $notification->data['message'] }}
										</a>
									</td>
									<td>{{ classNameToTitleCase($notification->type) }}</td>
									<td>{{ $notification->created_at->format('H:i:s d/m/Y') }}</td>
									<td>
										@if(! $notification->read_at)
											<div class="btn btn-sm btn-outline-primary" onclick="markAsRead('{{ route('api.notification.mark.as.read', $notification->id) }}')">
												{{ __('Mark as read') }}
											</div>
										@endif
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="4">
										<p class="text-center">{{ __('No new notifications available.') }}</p>
									</td>
								</tr>
							@endforelse
						</table>
					@endcardbody
				@endcard 
			</div>
		</div>
	</div>
@endsection