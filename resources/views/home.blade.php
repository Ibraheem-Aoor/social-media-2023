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



    <div id="services" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6>Our Services</h6>
                        <h2>Discover Our Recent <em>Services</em> For <span>Social Media Platforms</span></h2>
                        <h3 class="text-danger">Important📢<br>VPN</h3>
                        <h4 class="text-danger" style=""> Is not allowed to be used..and if it was used You Will Not
                            Get Your Order. Thanks</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach ($platforms as $platform)
                    <div class="col-lg-6 text-center">
                        <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="row">
                                <a href="{{ route('platform_services', encrypt($platform->id)) }}">
                                    <div class="col-lg-12 text-center">
                                        <div class="icon">
                                            <img src="{{ $platform->getLogo() }}" alt="">
                                        </div>
                                        <div class="right-content text-center" style="margin-top: 5% !important;">
                                            <h4>{{ $platform->name }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="contact" class="contact-us section">
        <div class="container">
        </div>
    </div>
@endsection
