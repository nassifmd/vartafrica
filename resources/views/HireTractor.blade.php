@extends('layouts.appcustom')
@include('inc.navbarht')

@section('content')

 <!-- ***** Welcome Area Start ***** -->
 <div class="welcome-area" id="welcome">

<!-- ***** Header Text Start ***** -->
<div class="header-text">
    <div class="container">
        <div class="row">
            <div class="left-text col-lg-6 col-md-12 col-sm-12 col-xs-12"
                data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <h1>We are your partner in <em>managing your business</em></h1>
                <p>Are you A Tractor Owner / Equipment Owner?</p>
                <a href="#contact-us" class="main-button-slider">Hire now</a>
            </div>
        </div>
    </div>
</div>
<!-- ***** Header Text End ***** -->
</div>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Features Big Item Start ***** -->
<section class="section" id="about">
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
            data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <div class="features-item">
                <div class="features-icon">
                    <h2>01</h2>
                    <img src="Service/images/features-icon-1.png" alt="">
                    <h4>Focus on what matters most</h4>
                    <p>Track and manage your fleet remotely through our mobile and web applications. Access customers and increase profits 
                        through our booking app and farmer marketplace. Use Hello Tractor detailed reporting to access financing and expand 
                        your fleet.</p>
                    <a href="#testimonials" class="main-button">
                        Read More
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
            data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
            <div class="features-item">
                <div class="features-icon">
                    <h2>02</h2>
                    <img src="Service/images/features-icon-2.png" alt="">
                    <h4>Track your valuables</h4>
                    <p>Buy our technology and make more profit from your equipment (Tractor, Tipper Lorry, Vehicle or Motorcycle). You 
                        will be able to Track active and in-active hours, moving or not, real time location, fuel consumption, distance 
                        travelled, hectares / acres ploughed and trips covered. You can Geo-fence and immobilize your equipment when needed.</p>
                    <a href="#testimonials" class="main-button">
                        Discover More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- ***** Features Big Item End ***** -->

<div class="left-image-decor"></div>

<!-- ***** Features Big Item Start ***** -->
<section class="section" id="promotion">
<div class="container">
    <div class="row">
    <div class="col-lg-8 offset-lg-2">
            <div class="center-heading">
                <h2>The 5 Easy Tracking Device Setup Steps</h2>
                <p>Send Your Orders</p>
            </div>
        </div>
        <div class="left-image col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix-big"
            data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <img src="Service/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
        </div>
        <div class="right-text offset-lg-1 col-lg-6 col-md-12 col-sm-12 mobile-bottom-fix">
            <ul>
            <li data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                    <img src="Service/images/about-icon-03.png" alt="">
                    <div class="text">
                        <h4>STEP 1</h4>
                        <p>Buy Hello Tractor Technology (GPS Tracking system) from us. <a rel="nofollow" href="https://play.google.com/store/apps/details?id=com.hellotractor.android.code&hl=en " target="_parent">BUY HERE</a></p>
                    </div>
                </li>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="Service/images/about-icon-01.png" alt="">
                    <div class="text">
                        <h4>STEP 2</h4>
                        <p>Download the app on Google Play (link ‘Google 
                            Play’ to this:  <a rel="nofollow" href="https://play.google.com/store/apps/details?id=com.hellotractor.android.code&hl=en " target="_parent">Download </a>
                       </p>
                    </div>
                </li>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                    <img src="Service/images/about-icon-02.png" alt="">
                    <div class="text">
                        <h4>STEP 3</h4>
                        <p>Add all Tractors, Operators and Booking Agents to your account</p>
                    </div>
                </li>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                    <img src="Service/images/about-icon-03.png" alt="">
                    <div class="text">
                        <h4>STEP 4</h4>
                        <p>Service farmers organized by your booking agents when season starts.</p>
                    </div>
                </li>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                    <img src="Service/images/about-icon-03.png" alt="">
                    <div class="text">
                        <h4>STEP 5</h4>
                        <p>Track your Tractor daily operation, your operators, your booking agent’s performance from your smart phone to 
                            ensure maximum machine efficiency, profits and reduce fraud.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</section>
<!-- ***** Features Big Item End ***** -->

<div class="col-lg-8 offset-lg-2">
            <div class="center-heading">
                <h2>Are You a <em>Farmer</em> and You need to <em>Hire a Tractor?</em></h2>
                <p>With our hiring services, you only pay for services that you need and at a fraction of the cost of manual labor. 
                    Schedule your tractor service in advance either in our app or with one of our ‘Booking Agent’. Plant on time and 
                    fully cultivate your land with a professional contractor for maximum profits.
                </p>
            </div>
            <a href="{{ route('login') }}" class="main-button-slider" style="margin-left: 420px">Hire now</a>
</div>

<div class="col-lg-8 offset-lg-2" style="margin-top: 100px;">
            <div class="center-heading">
                <h2>Do you want to become a <em>Booking Agent?</em></h2>
                <h3 style="color:orange">Book More, Earn More</h3>
                <p>Earn extra cash by booking tractor services on behalf of farmers in your community. Set your schedule and work only 
                    when it’s convenient for you. Leverage the relationships with new farmers in your community as you aggregate demand. 
                    Earn a commission on every completed farmer booking.</p>
            </div>
            <div>
                <h2>How it Works?</h2>
                <ul>
                    <li>
                    <p><b>STEP 1:</b>Download Hello Tractor app on Google Play  <a href="https://play.google.com/store/apps/details?id=com.hellotractor.android.code&hl=en"></a>Sign Up as booking Agent</p>
                    </li>
                    <li>
                    <b>STEP 2:</b> Select your Country and Location.
                    </li>
                    <li>
                    <b>STEP 3:</b> Enter farmer information and walk plot boundary to capture location and plot size.
                    </li>
                    <li>
                    <b>STEP 4:</b> Continue adding farmers nearby until you reach a minimum of 10 acres then you book.
                    </li>
                </ul>
            </div>
        <div style="margin-left: 420px; margin-top: 50px;">
            <a href="{{ route('login') }}" class="main-button-slider">Register now</a>
        </div>
</div>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
            data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <div class="features-item">
                <div class="features-icon">
                    <h2>Facts & Figures</h2>
                    <h4 style="margin-top: 100px;">Over 3,000 Tractors / equipment / Fleets being managed by our system</h4>
                    <h4>Over 100,000 farmers registered and using our system to hire / book for Tractor services</h4>
                    <h4>Over 6,000 Youth employed as booking agents and earning commission</h4>
                    
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="right-image-decor"></div>

<!-- ***** Testimonials Starts ***** -->
<section class="section" id="testimonials">
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="center-heading">
                <h2>What They Think <em>About Us</em></h2>
                <p>Suspendisse vitae laoreet mauris. Fusce a nisi dapibus, euismod purus non, convallis odio.
                    Donec vitae magna ornare, pellentesque ex vitae, aliquet urna.</p>
            </div>
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 mobile-bottom-fix-big"
            data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <div class="owl-carousel owl-theme">
                <div class="item service-item">
                    <div class="author">
                        <i><img src="Service/images/testimonial-author-1.png" alt="Author One"></i>
                    </div>
                    <div class="testimonial-content">
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <h4>Jonathan Smart</h4>
                        <p>“Nullam hendrerit, elit a semper pharetra, ipsum nibh tristique tortor, in tempus
                            urna elit in mauris.”</p>
                        <span>Besta CTO</span>
                    </div>
                </div>
                <div class="item service-item">
                    <div class="author">
                        <i><img src="Service/images/testimonial-author-1.png" alt="Second Author"></i>
                    </div>
                    <div class="testimonial-content">
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <h4>Martino Tino</h4>
                        <p>“Morbi non mi luctus felis molestie scelerisque. In ac libero viverra, placerat est
                            interdum, rhoncus leo.”</p>
                        <span>Web Analyst</span>
                    </div>
                </div>
                <div class="item service-item">
                    <div class="author">
                        <i><img src="Service/images/testimonial-author-1.png" alt="Author Third"></i>
                    </div>
                    <div class="testimonial-content">
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <h4>George Tasa</h4>
                        <p>“Fusce rutrum in dolor sit amet lobortis. Ut at vehicula justo. Donec quam dolor,
                            congue a fringilla sed, maximus et urna.”</p>
                        <span>System Admin</span>
                    </div>
                </div>
                <div class="item service-item">
                    <div class="author">
                        <i><img src="Service/images/testimonial-author-1.png" alt="Fourth Author"></i>
                    </div>
                    <div class="testimonial-content">
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <h4>Sir James</h4>
                        <p>"Fusce rutrum in dolor sit amet lobortis. Ut at vehicula justo. Donec quam dolor,
                            congue a fringilla sed, maximus et urna."</p>
                        <span>New Villager</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- ***** Testimonials Ends ***** -->
@endsection