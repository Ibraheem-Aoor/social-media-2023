@extends('layouts..user.master')
@push('css')
    <style>
        .features-item h4 {
            margin-top: -30px !important;
        }

        .custom-li {
            background: #33ccc5 !important;
            margin-bottom: 8% !important;
            color: white;
            border-radius: 3%;
        }
    </style>
@endpush
@section('content')
    <div id="features" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h6>{{ $platform->name }} Avilable Services</h6>
                    </div>
                    <div class="features-content">
                        <div class="row">
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($platform->services as $service)
                                <div class="{{ $class }}">
                                    <div class="features-item  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                        <div class="first-number number">
                                            <h6>{{ $counter++ }}</h6>
                                        </div>
                                        <div class="icon"></div>
                                        <h4>{{ $service->name }}</h4>
                                        <div class="line-dec"></div>
                                        <p>
                                            @php
                                                $features = json_decode($service->features, true);
                                            @endphp
                                            @foreach ($features as $feature)
                                                <li class="custom-li">
                                                    {{ $feature }}
                                                </li>
                                            @endforeach
                                        </p>
                                        <div class="main-green-button scroll-to-section mt-5">
                                            <a href="{{ route('service_offer', encrypt($service->id)) }}">GET RIGHT NOW
                                                !</a>
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
        </div>
    </div>
@endsection
