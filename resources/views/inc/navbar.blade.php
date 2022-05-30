
	<!-- start header Area -->
	<header id="header">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
						<ul>
							<li><a href="https://www.facebook.com/VartAfrica" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/AfricaVart" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com/company/76150670/admin/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
					<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
						<a href="{{('HireTractor')}}" target="_blank">
							<span class="text" style="font-size:20px; color:White;"> Order now</span>
						</a>

					</div>
				</div>
			</div>
		</div>

		<ul>

		<div class="container main-menu">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="{{('index')}}"><img src="img/vart/logo.png"  style="width:120px; height: 120px;" alt="Vartafrica"  title="" /></a>
				</div>
				<nav class="navbar navbar-dark bg-warning">
					<ul class="nav-menu">
						<li><a  href="{{ url('index') }}">Home</a></li>
						<li><a href="{{ url('about') }}">About</a></li>
						<li><a href="{{ url('contact') }}">Contact</a></li>
						<!-- LogIn and Register -->
						@if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a></li>
                    @else
					<li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>

                        {{-- @if (Route::has('register'))
                        	<li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                        @endif --}}
                    @endauth

            @endif
<!-- LogIn and Register End -->
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>
	<!-- end header Area -->



