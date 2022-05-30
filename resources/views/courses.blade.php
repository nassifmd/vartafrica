@extends('layouts.appmain')
@include('inc.navbar')

@section('content')

	<!-- start banner Area -->
	<section class="banner-area relative about-banner" id="home">
		<img class="cta-img img-fluid" src="img/cta-img.png" alt="">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1>
						Courses
					</h1>
					<p class="link-nav"><a href="index.html">Home </a>
						<span class="lnr lnr-arrow-right"></span> <a href="courses.html">
							Courses</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start Features Area -->
	<section class="feature-area courses section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12">
					<div class="section-title-wrap text-center">
						<h1>Our Featured Classes</h1>
						<p>As you pour the first glass of your favorite Chianti or Chardonnay and settle into an intimate Friday evening.</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center d-flex align-items-center">
				<div class="col-lg-6 col-md-6 single-feature">
					<figure>
						<img class="img-fluid" src="img/featured-class/f1.jpg" alt="">
						<div class="overlay overlay-bg"></div>
					</figure>
					<div class="text-center">
						<h4 class="mb-10">Get into shape now</h4>
						<p>
							<a href="#">Book an appointment</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 single-feature">
					<figure>
						<img class="img-fluid" src="img/featured-class/f2.jpg" alt="">
						<div class="overlay overlay-bg"></div>
					</figure>
					<div class="text-center">
						<h4 class="mb-10">Get into shape now</h4>
						<p>
							<a href="#">Book an appointment</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 single-feature">
					<figure>
						<img class="img-fluid" src="img/featured-class/f3.jpg" alt="">
						<div class="overlay overlay-bg"></div>
					</figure>
					<div class="text-center">
						<h4 class="mb-10">Get into shape now</h4>
						<p>
							<a href="#">Book an appointment</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 single-feature">
					<figure>
						<img class="img-fluid" src="img/featured-class/f4.jpg" alt="">
						<div class="overlay overlay-bg"></div>
					</figure>
					<div class="text-center">
						<h4 class="mb-10">Get into shape now</h4>
						<p>
							<a href="#">Book an appointment</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Features Area -->

	<!-- start footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>About Us</h4>
						<p>
							The state of Utah in the United States is home to lots of beautiful National Parks, & Bryce Canyon National Park ranks as
							three of the magnificent & awe inspiring.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Contact Us</h4>
						<p>
							56/8, rockybeach road, santa monica, Los angeles, California - 59620.
						</p>
						<p class="number">
							012-6532-568-9746 <br> 012-6532-569-9748
						</p>
					</div>
				</div>
				<div class="col-lg-5  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Newsletter</h4>
						<p>You can trust us. we only send offers, not a single spam.</p>
						<div class="d-flex flex-row" id="mc_embed_signup">

							<form class="navbar-form" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get">
								<div class="input-group add-on align-items-center d-flex">
									<input class="form-control" name="email" placeholder="Your Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email address'"
									 required="" type="email">
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>
									<div class="input-group-btn">
										<button class="genric-btn"><span class="lnr lnr-arrow-right"></span></button>
									</div>
								</div>
								<div class="info mt-20"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center">
				<p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				<div class="col-lg-6 col-sm-12 footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

@endsection