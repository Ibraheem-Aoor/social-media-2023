@extends('layouts..user.master')

@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Social Media Services</h2>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="main-green-button scroll-to-section">
                                            <a href="#services">Check Our Services</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="assets/images/banner-right-image.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="features" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h6>How It Work</h6>
                    </div>
                    <div class="features-content">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0s">
                                    <div class="first-number number">
                                        <h6>01</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Platform Selection</h4>
                                    <div class="line-dec"></div>
                                    <p>Select the social media platform you want to target. Choose from popular platforms
                                        like Facebook, Instagram, Twitter, and more. Selecting the right platform will help
                                        you reach your target audience and achieve your marketing goals.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4 max-h-500">
                                <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.2s">
                                    <div class="second-number number">
                                        <h6>02</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Service Type Selection</h4>
                                    <div class="line-dec"></div>
                                    <p>Choose the type of service you need to grow your social media presence. We offer a
                                        wide range of services including followers, likes, comments, and more. Each service
                                        is designed to help you increase your social media engagement and reach your target
                                        audience.</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="features-item third-feature wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.4s">
                                    <div class="third-number number">
                                        <h6>03</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Task Completion</h4>
                                    <div class="line-dec"></div>
                                    <p>Complete tasks to get your service fast. Choose from a variety of tasks that will
                                        help you grow your social media presence. Each task you complete helps us process
                                        your order faster. Follow instructions carefully to get your service quickly.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    {{-- <div class="skills-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                                    <div class="progress" data-percentage="80">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <div class="progress-value">
                                            <div>
                                                80%<br>
                                                <span>HTML/CSS/JS</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="progress" data-percentage="60">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <div class="progress-value">
                                            <div>
                                                60%<br>
                                                <span>Wordpress</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                    <div class="progress" data-percentage="90">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <div class="progress-value">
                                            <div>
                                                90%<br>
                                                <span>Marketing</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="skill-item last-skill-item wow fadeIn" data-wow-duration="1s"
                                    data-wow-delay="0.6s">
                                    <div class="progress" data-percentage="70">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <div class="progress-value">
                                            <div>
                                                70%<br>
                                                <span>Photoshop</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="assets/images/about-left-image.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="section-heading">
                        <h6>About Us</h6>
                        <h2>Top <em>Socail Media Services</em> Agency Helps You Reach Your <span>Target</span></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h4>750+</h4>
                                <h6>happy clients</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h4>100K+</h4>
                                <h6>followers</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h4>65K+</h4>
                                <h6>comments</h6>
                            </div>
                        </div>
                    </div>
                    <p><a rel="nofollow" href="{{ route('home') }}" target="_parent">Here </a>we're a team of social media
                        experts who believe in the power of social media to help
                        businesses grow. We specialize in creating customized social media campaigns for businesses of all
                        sizes on platforms like Facebook, Twitter, Instagram, and LinkedIn. We're committed to delivering
                        results and working closely with our clients to understand their unique needs and goals.



                    </p>
                </div>
            </div>
        </div>
    </div>


    <div id="services" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6>Our Services</h6>
                        <h2>Discover Our Recent <em>Services</em> For <span>Social Media Platforms</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
                <div class="col-lg-12">
                    <div class="loop owl-carousel">
                        <div class="item">
                            @foreach ($platforms as $platform)
                                <div class="portfolio-item">
                                    <div class="thumb">
                                        <img src="{{$platform->getLogo()}}" alt="">
                                        <div class="hover-content">
                                            <div class="inner-content">
                                                <a href="{{route('platform_services' , encrypt($platform->id))}}">
                                                    <h4>{{ $platform->name }}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="contact-us section">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="section-heading">
                                    <h6>Contact Us</h6>
                                    <h2>Fill Out The Form Below To <span>Get</span> In <em>Touch</em> With Us</h2>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="name" name="name" id="name" placeholder="Name"
                                                autocomplete="on" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="surname" name="surname" id="surname" placeholder="Surname"
                                                autocomplete="on" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                                placeholder="Your Email" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="subject" name="subject" id="subject" placeholder="Subject"
                                                autocomplete="on">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button ">Send Message
                                                Now</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="contact-info">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <img src="assets/images/contact-icon-01.png" alt="email icon">
                                            </div>
                                            <a href="#">info@company.com</a>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="assets/images/contact-icon-02.png" alt="phone">
                                            </div>
                                            <a href="#">+001-002-0034</a>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="assets/images/contact-icon-03.png" alt="location">
                                            </div>
                                            <a href="#">26th Street, Digital Villa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
