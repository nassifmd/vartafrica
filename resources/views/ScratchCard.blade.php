@extends('layouts.appcustom')
@include('inc.navbarsc')

@section('content')

 <!-- ***** Welcome Area Start ***** -->
 <div class="welcome-area" id="welcome">

<!-- ***** Header Text Start ***** -->
<div class="header-text">
    <div class="container">
        <div class="row">
            <div class="left-text col-lg-6 col-md-12 col-sm-12 col-xs-12"
                data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <h1>Save TO <em>Pay</em></h1>
                <p>Save for your inputs with our layaway system and get quality improved seeds delivered to you / booking agent nearest to you in time.</p> 
                <a href="{{ route('login') }}" class="main-button-slider">Login</a>
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
<h1>What?</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
            data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <div class="features-item">
                <div class="features-icon">
                    <h2>01</h2>
                    <img src="Service/images/features-icon-1.png" alt="">
                    <h4>Problem</h4>
                    <p>Most smallholder farmers in Uganda live on less than $2 a day. A lack of access to credit and saving accounts, 
                        quality seeds and fertilizer, and modern agricultural training prevents small farmers from permanently moving 
                        out of poverty. Essentially, smallholder farmers have a cash flow problem: their income peaks at harvest time, 
                        but planting season is when they need cash the most to purchase quality seeds and fertilizers. Sadly, this is 
                        normally when the money has already run out.</p>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
            data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
            <div class="features-item">
                <div class="features-icon">
                    <h2>02</h2>
                    <img src="Service/images/features-icon-2.png" alt="">
                    <h4>Solution</h4>
                    <p>Vart Africa Solutions Limited comes in to solve this challenge by providing smallholder farmers access to quality 
                        seeds, fertilizers and modern agricultural training in one package called “Vart Inputs’ using a digital technology. </p>
                    
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
    <h1>How Vart Inputs works?</h1>
    <div class="row">
        <div class="left-image col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix-big"
            data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <img src="Service/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
        </div>
        <div class="right-text offset-lg-1 col-lg-6 col-md-12 col-sm-12 mobile-bottom-fix">
            <ul>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="Service/images/about-icon-01.png" alt="">
                    <div class="text">
                        <h4>Step 1</h4>
                        <p>Visit your nearest Booking agent or Scratch Card vendor in your location or contact us</p>
                    </div>
                </li>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                    <img src="Service/images/about-icon-02.png" alt="">
                    <div class="text">
                        <h4>Step 2:</h4>
                        <p>Register as a user on our website or request the booking agent / scratch card vendor to help you register – 
                            Click Here (Link to registration form on our website.)</p>
                    </div>
                </li>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                    <img src="Service/images/about-icon-03.png" alt="">
                    <div class="text">
                        <h4>Step 3:</h4>
                        <p>Buy scratch card from the Booking agent / scratch card vendor in any range (5000, 10,000, 20,000 and 50,000 UGX 
                            which puts money towards your package (seeds, fertilizer and training) in your account in our system.</p>
                    </div>
                </li>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                    <img src="Service/images/about-icon-03.png" alt="">
                    <div class="text">
                        <h4>Step 4:</h4>
                        <p>Scratch the card to reveal a secret code, enter that code to our system with the help of booking agent / vendor.</p>
                    </div>
                </li>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                    <img src="Service/images/about-icon-03.png" alt="">
                    <div class="text">
                        <h4>Step 5:</h4>
                        <p>Keep buying the scratch card whenever you get money until you reach your goal for the seeds and Training you registered for.</p>
                    </div>
                </li>
                <li data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                    <img src="Service/images/about-icon-03.png" alt="">
                    <div class="text">
                        <h4>Step 6:</h4>
                        <p>When your saving goal is reached, we will deliver the seeds and provide you with the training in time. </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</section>
<!-- ***** Features Big Item End ***** -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
            data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <div class="features-item">
                <div class="features-icon">
                    <h2>Facts & Figures</h2>
                    <h4 style="margin-top: 100px;">Over 500 farmers registered and using Yaa Malu cards to save for seeds</h4>
                    <h4>Over 5,000 Kgs of seeds supplied / delivered to farmers</h4>
                    <p>Have Trust in us just like other farmers do; we have sold equivalent of 60,000,000 Million Yaa Malu scratch cards.</p>
                    
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