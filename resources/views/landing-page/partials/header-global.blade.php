<header class="header-global">
		<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom headroom--not-bottom headroom--pinned headroom--top">
			<div class="container">
				<a class="navbar-brand mr-lg-5" href="{{ route('landing-page') }}">{{ config('app.name') }}</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				@include('landing-page.partials.header-navigation')
			</div>
		</nav>
	</header>