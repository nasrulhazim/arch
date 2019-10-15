<nav class="navbar navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="{{ auth()->user() ? route('home') : route('landing-page') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if(isImpersonateEnabled())
                        @impersonating
                            <li class="nav-item m-1">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('impersonate.leave') }}">{{ __('Leave Impersonation') }}</a>
                            </li>
                        @endImpersonating
                    @endif
                    <li class="nav-item m-1">
                        <a class="btn btn-sm btn-{{ auth()->user()->unreadNotifications->count() > 0 ? 'danger' : 'primary' }} border-0 shadow-none" 
                            href="{{ route('notifications') }}">
                            <i class="far fa-bell"></i>
                            {{ auth()->user()->unreadNotifications->count() > 0 ? auth()->user()->unreadNotifications->count() : '' }}
                        </a>
                    </li>
                    @can('see-all-administration')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAdministration" class="nav-link dropdown-toggle" 
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Administration') }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAdministration">
                                @can('see-all-user')
                                    <a class="dropdown-item" href="{{ route('users.index') }}">
                                        <i class="fas fa-users mr-3"></i>{{ __('Users') }}
                                    </a>
                                @endcan

                                @can('see-all-audit')
                                    <a class="dropdown-item" href="{{ route('audit.index') }}">
                                        <i class="fas fa-clipboard-list mr-3"></i>{{ __('Audit Trails') }}
                                    </a>
                                @endcan

                            </div>
                        </li>
                    @endcan
                    <li class="nav-item dropdown">
                        <a id="navbarDropdownProfile" class="nav-link dropdown-toggle" 
                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="rounded-circle" src="{{ gravatar(18) }}">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-address-card mr-3"></i>{{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>