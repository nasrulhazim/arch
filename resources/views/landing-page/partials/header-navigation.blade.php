<div class="navbar-collapse collapse" id="navbar_global">
  <ul class="navbar-nav align-items-lg-center ml-lg-auto">
        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="https://github.com/nasrulhazim/arch" target="_blank" data-toggle="tooltip" title="" data-original-title="Star us on Github">
            <i class="fab fa-github"></i>
            <span class="nav-link-inner--text d-lg-none">Github</span>
          </a>
        </li>
        
		@if (Route::has('login'))
            @auth
            	<li class="nav-item d-none d-lg-block ml-lg-4">
	            	<a class="nav-link" href="{{ route('home') }}" data-toggle="tooltip" title="" data-original-title="{{ __('Home') }}">
					    <span class="nav-link-inner--text">{{ __('Home') }}</span>
					</a>
                </li>
            @else
            	<li class="nav-item d-none d-lg-block ml-lg-4">
	            	<a class="nav-link" href="{{ route('login') }}" data-toggle="tooltip" title="" data-original-title="{{ __('Login') }}">
					    <span class="nav-link-inner--text">{{ __('Login') }}</span>
					</a>
                </li>

                @if (Route::has('register'))
                	<li class="nav-item d-none d-lg-block ml-lg-4">
		            	<a class="nav-link" href="{{ route('register') }}" data-toggle="tooltip" title="" data-original-title="{{ __('register') }}">
						    <span class="nav-link-inner--text">{{ __('Register') }}</span>
						</a>
                    </li>
                @endif
            @endauth
        @endif
	</li>
  </ul>
</div>