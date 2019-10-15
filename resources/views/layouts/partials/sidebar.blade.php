<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
	<div class="container-fluid">
		<!-- Toggler -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Brand -->
		<a class="navbar-brand pt-0" href="{{ route('home') }}">
			{{ config('app.name') }}
			{{-- <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> --}}
		</a>

	  <!-- Collapse -->
	  <div class="collapse navbar-collapse" id="sidenav-collapse-main">
		<!-- Collapse header -->
		<div class="navbar-collapse-header d-md-none">
		  <div class="row">
			<div class="col-6 collapse-brand">
				<a href="{{ route('home') }}">
					{{ config('app.name') }}
					{{-- <img src="./assets/img/brand/blue.png"> --}}
				</a>
			</div>
			<div class="col-6 collapse-close">
			  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
				<span></span>
				<span></span>
			  </button>
			</div>
		  </div>
		</div>
		
		<!-- Navigation -->
		<ul class="navbar-nav">

			@if(isImpersonateEnabled())
	            @impersonating
	                <li class="nav-item">
	                    <a class="nav-link" href="{{ route('impersonate.leave') }}">{{ __('Leave Impersonation') }}</a>
	                </li>
	            @endImpersonating
        	@endif

		  	<li class="nav-item">
				<a class="nav-link " href="{{ route('home') }}"> 
			  		<i class="fas fa-tachometer-alt"></i>{{ __('Dashboard') }}
				</a>
		  	</li>
		  	<li class="nav-item">
				<a class="nav-link " href="{{ route('profile.edit') }}"> 
			  		<i class="fas fa-address-card"></i>{{ __('Profile') }}
				</a>
		  	</li>
		  	<li class="nav-item">
				<a class="nav-link " href="{{ route('notifications') }}"> 
			  		<i class="far fa-bell"></i>{{ __('Notifications') }}
                    @if(auth()->user()->hasUnreadNotifications())
                        <span class="badge badge-pill badge-danger">{{ auth()->user()->totalUnreadNotifications() }}</span>
                    @endif
				</a>
		  	</li>
		</ul>

		  	@can('see-all-administration')
		  		<!-- Divider -->
				<hr class="my-3">
				<!-- Heading -->
				<h6 class="navbar-heading text-muted">{{ __('Administration') }}</h6>

	            <ul class="navbar-nav mb-md-3">    
	                @can('see-all-user')
	                    <li class="nav-item">
	                    	<a class="nav-link" href="{{ route('users.index') }}">
	                            <i class="fas fa-users"></i>{{ __('Users') }}
	                        </a>
	                    </li>
	                @endcan

	                @can('see-all-audit')
	                    <li class="nav-item">
	                    	<a class="nav-link" href="{{ route('audit.index') }}">
	                            <i class="fas fa-clipboard-list"></i>{{ __('Audit Trails') }}
	                        </a>
	                    </li>
	                @endcan
	            </ul>
            @endcan

		<!-- Divider -->
		<hr class="my-3">
		<!-- Heading -->
		<h6 class="navbar-heading text-muted">{{ __('Documentation') }}</h6>
		<!-- Navigation -->
		<ul class="navbar-nav mb-md-3">
		  <li class="nav-item">
			<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
			  <i class="ni ni-spaceship"></i> Getting started
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
			  <i class="ni ni-palette"></i> Foundation
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
			  <i class="ni ni-ui-04"></i> Components
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="https://github.com/nasrulhazim/arch#development">
			  <i class="ni ni-button-play"></i> Arch
			</a>
		  </li>
		</ul>

		  <!-- Divider -->
		<hr class="my-3">
		<!-- Navigation -->
		<ul class="navbar-nav mb-md-3">
			<li>
				<a class="nav-link d-lg-block d-xl-block" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
		        	<i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
		    	</a>
			</li>
		</ul>

	  </div>
	  
	  <div class="d-none d-lg-block d-xl-block">
	  	@include('layouts.partials.footer')
	  </div>
	</div>
</nav>