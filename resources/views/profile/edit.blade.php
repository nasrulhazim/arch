@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-3">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			  <a class="nav-link active" id="v-pills-supervisor-tab" data-toggle="pill" href="#v-pills-supervisor" role="tab" aria-controls="v-pills-supervisor" aria-selected="true">Supervisor &amp; Reviewer</a>
			  <a class="nav-link" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false">Security</a>
			</div>
		</div>
		<div class="col-9">
			<div class="tab-content" id="v-pills-tabContent">
			  <div class="tab-pane fade show active" id="v-pills-supervisor" role="tabpanel" aria-labelledby="v-pills-supervisor-tab">
				@include('profile.partials.supervisor')
			  </div>
			  <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">
			  	@include('profile.partials.password')
			  </div>
			</div>
		</div>
	</div>
</div>
@endsection
