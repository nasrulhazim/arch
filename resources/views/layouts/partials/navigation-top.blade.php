<nav class="navbar navbar-expand-md">
    <div class="container-fluid">
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
                
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>