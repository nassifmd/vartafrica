@extends('layouts.appmain')
@include('inc.navbar')

@section('content')

	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container-fluid">
			<div class="row fullscreen d-flex align-items-center justify-content-between">
				<!-- <div class="col-lg-6 col-md-6 banner-img">
				
					<img class="img-fluid" src="img/trac.png" alt="">
				</div> -->
				<div class="banner-content col-lg-8 col-md-6">
					<h1 class="text-uppercase">
						<span>A Passion for<br>Problem<br> Solving</span> 
					</h1>
					<a href="{{ url('Consultancy') }}" class="btn btn-warning mt-40">Consultation</a>
					<a href="{{ url('HireTractor') }}" class="btn btn-warning mt-40">Tractor Hiring</a>
					<a href="{{ url('ScratchCard') }}" class="btn btn-warning mt-40">Scratch Card</a>
					<a href="{{ url('tracking') }}" class="btn btn-warning mt-40">Vehicle Tracking</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start About Us Area -->
	<section class="about-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12">
					<div class="section-title-wrap text-center">
						<h1>How Vartafrica can change your life</h1>
						<p>Providing smart technology for your Agribusiness and tailor made solutions for Business development</p>
					</div>
				</div>
			</div>

			<div class="row justify-content-between align-items-center">
				<div class="col-lg-6 about-right">
					<div class="row">
						<div class="col-lg-6">
							<div class="single-about">
								<h4>The Problem</h4>
								<p>
								Inadequate tailor made solutions for business development limit the profitability of many businesses in 
								Africa. Specifically, in agribusiness; Smallholder farmers lack access to mechanization services leading 
								to low production. <br><button class="btn btn-warning mt-40"> <a href="{{('about')}}">Read more</a></button>
								</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="single-about">
								<h4>The Solution</h4>
								<p>
								Vart Africa Solutions Limited provides tailor made solutions to entrepreneurs for their business 
								development and consulting.  We implement a “VART-SPACE-MODEL” that provides solutions to challenges 
								along agricultural value chain by use of technology.<br><button class="btn btn-warning mt-40"> <a href="{{('about')}}">Read more</a></button> 
								</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="single-about">
								<h4>Why Choose Us</h4>
								<p>
								We are committed to working in partnership with our clients and 
								stakeholders and consistently deliver value by sharing our knowledge 
								and experience.
								</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="single-about">
								<h4>Our Clients</h4>
								<p>
								Our clients include entrepreneurs, Tractor Owners (mechanization service providers), Farmers, Youth, 
								local, National and international organizations / companies, Local and Central Government, bilateral 
								development partners / agencies, schools, vocational institutions, vehicle and motorcycle owners. 
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 about-left">
					<img class="img-fluid" src="img/trac.png" alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- End About Us Area -->

	<!-- Start Features Area -->
	<section class="feature-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12">
					<div class="section-title-wrap text-center">
						<h1>Our Services</h1>
						<p>We provide technology for smarter, better maintained and more profitable businesses. We help you manage risk, 
							unlock new value and grow your business.</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center d-flex align-items-center">
				<div class="col-lg-6 col-md-6 single-feature">
					<figure>
						<img class="img-fluid" src="img/vart/h3.jpg" style="width: 600px; height: 280px;" alt="">
						<div class="overlay overlay-bg"></div>
					</figure>
					<div class="text-center">
						<h4 class="mb-10">Consultancy</h4>
						<p>
							<a href="{{ url('Consultancy') }}" target="_blank">Book an appointment</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 single-feature">
					<figure>
						<img class="img-fluid" src="img/vart/h31.jpg" style="height: 280px; width: 600px;" alt="">
						<div class="overlay overlay-bg"></div>
					</figure>
					<div class="text-center">
						<h4 class="mb-10">Hire a Tractor / Connect to Farmers</h4>
						<p>
							<a href="{{ url('HireTractor') }}" target="_blank">Book an appointment</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 single-feature">
					<figure>
						<img class="img-fluid" src="img/vart/h30.jpg" style="height: 280px; width: 600px;" alt="">
						<div class="overlay overlay-bg"></div>
					</figure>
					<div class="text-center">
						<h4 class="mb-10">Buy Yaa Malu Scratch Card and save for Seeds & Training </h4>
						<p>
							<a href="{{ url('ScratchCard') }}" target="_blank">Book an appointment</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 single-feature">
					<figure>
						<img class="img-fluid" src="img/vart/h6.jpg" style="width: 600px; height: 280px;" alt="">
						<div class="overlay overlay-bg"></div>
					</figure>
					<div class="text-center">
						<h4 class="mb-10">Vehicle GPS Tracking Devices (Hello Tractor Technology) </h4>
						<p>
							<a href="{{ url('tracking') }}" target="_blank">Book an appointment</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Features Area -->

	

	<!-- Start testomial Area -->
	<section class="testomial-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12">
					<div class="section-title-wrap text-center">
						<h1>Client’s Feedback</h1>
						<p>We listern. We implement. We grow with you..</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="active-testimonial-carusel">
					<div class="single-testimonial item">
						<img class="mx-auto rounded-circle" src="img/.png" alt="">
						<p class="desc">
						“We are saving more money and now able to invest in buying more Tractors. Before installing Hello Tractor 
						Technology, we were making a loss of around UGX 400,000 whenever our Tractor goes to the field. Now we are 
						saving more and more. What a technology? We are able to access farmers easily because booking of our services 
						is made easy. I encourage all Tractor Owners to use this technology.”
						</p>
						<h4>Mr. Nelson Okello</h4>
						<p>
						Tractor Owner
						</p>
					</div>
					<div class="single-testimonial item">
						<img class="mx-auto rounded-circle" src="img/.png" alt="">
						<p class="desc">
						“Vart Africa Solutions Limited has made it easy for me to access Tractor services. For many years, I faced 
						challenge of buying quality improved seeds during planting seasons. But now I save little by Little and at 
						the beginning of the season by seeds are delivered to me in time. I am sorted!”
						</p>
						<h4>Mrs. Grace Ogangi </h4>
						<p>
						Farmer
						</p>
					</div>
					<div class="single-testimonial item">
						<img class="mx-auto rounded-circle" src="img/.png" alt="">
						<p class="desc">
						“I earn commission from every acre of land I book, the scratch cards I sell and also from every kilogram of 
						produce I buy on behalf of Vart Africa Solutions Limited. To you the rural youth, if you are unemployed, just 
						register with Vart Africa Solutions Limited and start earning income.”
						</p>
						<h4>Ms. Jackline Adong </h4>
						<p>
						Booking Agent
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End testomial Area -->

	<!-- Start cta-one Area -->
	<section class="cta-one-area relative section-gap">
		<img class="cta-img img-fluid" src="" alt="">
		<div class="container">
			<div class="row justify-content-center">
				<div class="wrap">
					<h1>Trusted Partners</h1>
					<p>
						What if we join you transform your business within a 24hrs
					</p>
					<a class="btn btn-warning" target="_blank" href="{{('Consultancy')}} ">Book Now</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End cta-one Area -->

@endsection
