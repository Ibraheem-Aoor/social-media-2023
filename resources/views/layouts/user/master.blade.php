<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <title>SOCIAL - SOCIAL MDEIA SERVICES</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <meta name="keywords"
        content="social media marketing, social media management, social media advertising, social media optimization, social media engagement,
        social media analytics, social media strategy, Facebook marketing, Instagram marketing, Twitter marketing,
        LinkedIn marketing, YouTube marketing, influencer marketing, online reputation management, social media tools,followers , likes , insta followers , facebook followers , twitter followers">

    <meta name="description"
        content="Your social media services provider. We offer social media marketing, management, advertising, optimization, engagement, and analytics services for Facebook, Instagram, Twitter, LinkedIn, YouTube, and more. Get in touch to learn how we can help your business grow on social media.">

    <meta property="og:title" content="social media services" />
    <meta property="og:type" content="Social Media" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:image" content="{{ asset('assets/images/social_meida.png') }}" />
    <meta name="twitter:title" content="SOCIAL">
    <meta name="twitter:description"
        content="Your social media services provider. We offer social media marketing, management, advertising, optimization, engagement, and analytics services for Facebook, Instagram, Twitter, LinkedIn, YouTube, and more. Get in touch to learn how we can help your business grow on social media.">
    <meta name="twitter:image" content="{{ asset('assets/images/social_meida.png') }}">
    <meta name="twitter:card" content="asset('assets/images/social_meida.png')">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:description"
        content="Your social media services provider. We offer social media marketing, management, advertising, optimization, engagement, and analytics services for Facebook, Instagram, Twitter, LinkedIn, YouTube, and more. Get in touch to learn how we can help your business grow on social media.">
    <meta property="og:site_name" content="SEVIC">
    <meta name="twitter:image:alt" content="social media services">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-seo-dream.css?v=0.02') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

    @stack('css')

</head>

<body>

    @include('layouts.user.header')


    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    @yield('content')




    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 20223 SOCIAL MEDIA 20023, Ltd. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- Scripts -->
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        // Getting the anonymity status from the user's IP
        $.get("https://api.ipdata.co?api-key=f4f387ccf7dfad0d3c4ee224eb3e8305ef52b044761444a3422dbdaa", function(response) {
            if (response.threat.is_anonymous || response.threat.is_proxy) {
                window.location.href = "{{ route('vpn_block') }}";
            }
        }, "jsonp");
    </script>


    <script>
        @if (Session::has('error'))
            $.notify("{{ Session::get('error') }}");
        @endif
        @if (Session::has('success'))
            $.notify("{{ Session::get('success') }}");
        @endif
    </script>
    @stack('js')

</body>

</html>
