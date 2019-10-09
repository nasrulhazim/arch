<main>
		<div class="position-relative">
			<!-- Hero for FREE version -->
			<section class="section section-lg section-hero section-shaped">
				<!-- Background circles -->
				<div class="shape shape-style-1 shape-primary">
					<span class="span-150"></span>
					<span class="span-50"></span>
					<span class="span-50"></span>
					<span class="span-75"></span>
					<span class="span-100"></span>
					<span class="span-75"></span>
					<span class="span-50"></span>
					<span class="span-100"></span>
					<span class="span-50"></span>
					<span class="span-100"></span>
				</div>
				<div class="container shape-container d-flex align-items-center py-lg">
					<div class="col px-0">
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-6 text-center">
								{{-- <img src="./assets/img/brand/white.png" style="width: 200px;" class="img-fluid"> --}}
								<p class="lead text-white">{{ config('app.description') }}</p>
								<div class="mt-5">
									<small class="text-white font-weight-bold mb-0 mr-2">
										{{ __('maintained by Nasrul Hazim') }}
									</small>
									<img src="https://avatars1.githubusercontent.com/u/10341422?s=460&v=4" style="height: 28px;">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- SVG separator -->
				<div class="separator separator-bottom separator-skew zindex-100">
					<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
					</svg>
				</div>
			</section>
		</div>
		@include('landing-page.partials.section-first')
		@include('landing-page.partials.section-footer')
	</main>