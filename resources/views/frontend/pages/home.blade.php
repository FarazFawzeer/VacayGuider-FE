@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        @media (max-width: 767.98px) {

            .inbound-title {
                margin-top: 80px
            }

            .airlin-mob {
                margin-top: -40px;
                margin-bottom: -20px;
            }

            .specification {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 20px;
            }

            .specification-item {
                justify-content: flex-start !important;
                border-left: none !important;
                border-right: none !important;
                padding: 0 !important;
                width: 100%;
            }

            .cars-slider__item .horizontal-layout {
                flex-direction: column;
                gap: 20px;
            }

            .cars-slider__item .content-section,
            .cars-slider__item .image-section,
            .cars-slider__item .price-features-section {
                flex: unset;
                padding: 0 !important;
                text-align: center;
            }

            .cars-slider__item h3 {
                font-size: 28px !important;
            }

            .cars-slider__item img {
                height: 250px !important;
            }


            .custom-margin-top {
                margin-top: -201px !important;
            }

            .tour-margin {
                margin-top: -134px;
            }

            .tour-margin-inbound {
                margin-top: -68px;
            }
        }

        @media (min-width: 768px) {
            .custom-margin-top {
                margin-top: -114px !important;
            }

            .tour-margin {
                margin-top: -160px;

            }

            .tour-margin-inbound {
                margin-top: -98px;
            }
        }

        .inbound-title #blog-sec .mb-30 {
            margin-top: 0 !important;
            padding: 20px 0;
        }


        #blog-sec .form-btn {
            display: flex;
            justify-content: center;
        }

        #blog-sec .fancy {
            font-size: 16px;
            padding: 12px 24px;
        }

        .inbound-title {
            margin-top: 100px
        }

        /* Default styles (desktop) */
        .custom-input-col {
            flex: 0 0 25%;
            /* 4 items per row */
            max-width: 25%;
        }



        .transition:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .swiper-pagination-bullets .swiper-pagination-bullet {
            display: inline-block;
            --swiper-pagination-bullet-size: 10px;
            --swiper-pagination-bullet-horizontal-gap: 15px;
            margin:
                5px 7px;
            opacity: 1;
            background-color: transparent;
            border:
                1px solid #008BAE;
            color: #E4E4E4;
            border-radius:
                50%;
            position: relative;
            cursor: pointer;
        }

        .heading {
            text-align: center;
            color: #454343;
            font-size: 30px;
            font-weight: 700;
            position: relative;
            margin-bottom: 70px;
            text-transform: uppercase;
            z-index: 999;
        }

        .white-heading {
            color: #ffffff;
        }

        .heading:after {
            content: ' ';
            position: absolute;
            top: 100%;
            left: 50%;
            height: 40px;
            width: 180px;
            border-radius: 4px;
            transform: translateX(-50%);
            background: url(img/heading-line.png);
            background-repeat: no-repeat;
            background-position: center;
        }

        .white-heading:after {
            background: url(https://i.ibb.co/d7tSD1R/heading-line-white.png);
            background-repeat: no-repeat;
            background-position: center;
        }

        .heading span {
            font-size: 18px;
            display: block;
            font-weight: 500;
        }

        .white-heading span {
            color: #ffffff;
        }

        .icon-colored {
            width: 20px;
            margin-right: 10px;
            fill: #ff5733 !important;
            /* Example orange */
        }


        .split-layout {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .split-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            width: 100%;
            gap: 30px;
            flex-wrap: wrap;
        }

        .split-left,
        .split-right {
            width: 25%;
            font-size: 16px;
        }

        .split-image {
            width: 40%;
            text-align: center;
        }

        .split-image img {
            width: 100%;

        }

        /* Optional: style arrows */
        .swiper-button-prev-rental,
        .swiper-button-next-rental {
            position: absolute;
            top: 45%;
            z-index: 9;
            color: #fff;
            background: #000;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .swiper-button-prev-rental {
            left: -60px;
        }

        .swiper-button-next-rental {
            right: -60px;
        }

        body {
            font-family: var(--body-font);
            font-size: 16px;
            font-weight: 400;
            color: var(--body-color);
            line-height: 18px;
        }

      

        .header-layout1 .currency-menu {
            border: 1px solid var(--light-color);
            border-radius: 100px;
            padding: 3px 14px;
            max-width: 98px;
            text-transform: capitalize;
        }

        .currency-menu .nice-select {
            font-family: var(--body-font);
            color: #FFF;
            font-weight: 400;
            font-size: 11px;
            line-height: 16px;
        }

        .tour-country {
            font-size: 14px;
            font-weight: 600;
            color: #028CCC;
            /* Matches your theme */
            margin-bottom: 5px;
        }

        .tour-list {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }

        .tour-list li {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .tour-list i {
            color: #909090;
            margin-right: 5px;
        }


        .tour-box .tour-action .th-btn {
            border: 1px solid #60D522;

            font-weight: 500;

            padding: 10px 19.5px;

        }



        .header-links li:not(:last-child)::after {
            content: '';
            height: 14px;
            width: 1px;
            background-color: #ffffff;
            position: absolute;
            top: 5px;
            right: -27px;
        }

        .booking-form {
            position: relative;
            background-color: var(--white-color);
            border: 2px solid var(--theme-color);
            box-shadow: 0px 20px 20px rgba(204, 204, 204, 0.25);
            border-radius: 0px;
            padding: 14px 34px;
            z-index: 3;
            margin-top: -45px;
        }

        .space,
        .space-bottom {
            padding-bottom: 20px;
        }

        .custom-btn-with-arrow:after {
            content: "\E800";
            font-family: fontello;
            font-size: 18px;
            margin-left: 17px;
        }

        .custom-btn {
            background: linear-gradient(45deg, #60D522, #A3EB58);

            /* Smooth gradient */
            color: #fff;
            /* White text */
            font-size: 16px;
            font-weight: 600;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            /* Soft rounded corners */
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .custom-btn:hover {
            background: #0f172a;
            /* Reverse gradient */
            transform: translateY(-3px);
            /* Slight lift effect */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .box-title a {
            font-size: 16px;
        }

        .custom-btn:active {
            background: #0f172a;
            transform: translateY(1px);
            /* Press-down effect */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }


        .tour-header {
            display: flex;
            align-items: center;
            /* Ensures vertical alignment */
            justify-content: space-between;
            /* Keeps spacing equal */
        }

        .copyright-wrap {
            padding: 5px 0;
            background-color: #262A36;
        }

        .tour-country {
            font-size: 14px;
            font-weight: bold;
            display: flex;
            align-items: center;
            /* Centers icon & text */
        }

        .tour-rating {
            display: flex;
            align-items: center;
            /* Ensures rating is vertically centered */
        }

        .small-star {
            font-size: 12px;
            /* Smaller stars */
            color: #fbbf24;
            margin-left: -2px;
            /* Adds slight spacing between stars */
        }

        .tour-box {
            position: relative;
            background-color: var(--white-color);
            border: 1px solid #BCCED2;
            border-top-width: 1px;
            border-top-style: solid;
            border-top-color: rgb(188, 206, 210);
            border-top: transparent;
            border-radius: 16px;
            overflow: hidden;
        }

        .tour-box_img img {
            width: 100%;
            border-radius: 0px 0px 0 0;
            -webkit-transition: 1.3s all ease;
            transition: 1.3s all ease;
        }

        .tour-box_img {
            position: relative;
            border-radius: 0px 0px 0 0;
            z-index: 2;
            overflow: hidden;
        }

        .carousel-inner {
            height: 100%;
        }

        .carousel-item img {
            object-fit: cover;
            /* Ensures images cover the container */
            width: 50%;
            height: 50%;
        }

        /* Adjust the carousel control buttons to stand out better */
        .carousel-control-prev,
        .carousel-control-next {
            background-color: rgba(0, 0, 0, 0.5);
            /* Dark background for better contrast */
            border-radius: 50%;
            /* Round buttons */
            width: 40px;
            /* Adjust the width */
            height: 40px;
            /* Adjust the height */
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #fff;
            width: 20px;
            height: 20px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .header-layout1 .currency-menu .nice-select {
            min-width: 104px;
        }

        .h2,
        h2 {
            font-size: 30px;
            line-height: 1.327;
        }

        .sub-title {
            display: block;
            color: var(--title-color);
            font-size: 20px;
            line-height: 40px;
            font-weight: 700;
            font-family: 'Dancing Script', cursive;
            position: relative;
            margin-bottom: -4px;
        }

        .sec-text {
            font-size: 15px;
            line-height: 26px;
        }

        .box-title {
            font-size: 20px;
            line-height: 1.417;
            font-weight: 600;
            margin-top: -0.32em;
        }

        .widget-area {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .fa-map-marker-alt {
            margin-right: 5px;
        }

        .tour-box_img img {
            height: 200px;
            object-fit: cover;
            /* Ensures the image covers the area without distortion */
            width: 100%;
            /* Maintains responsiveness */
        }

        .services i {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #7AB730;
            background: #FFFFFF;
            color: #7AB730;
            transition: .5s;
        }





        .swiper-button-prev-inbound,
        .swiper-button-next-inbound {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;

            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;

            color: #1e1e1e;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .swiper-button-prev-inbound {
            left: -60px;
            /* adjust as needed */
        }

        .swiper-button-next-inbound {
            right: -60px;
            /* adjust as needed */
        }

        .swiper-button-prev-inbound:hover,
        .swiper-button-next-inbound:hover {
            background: #FFFFFF;
            color: #60D522;
            transform: translateY(-50%) scale(1.1);
        }



        .swiper-button-prev-outbound,
        .swiper-button-next-outbound {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;

            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;

            color: #1e1e1e;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .swiper-button-prev-outbound {
            left: -60px;
            /* adjust as needed */
        }

        .swiper-button-next-outbound {
            right: -60px;
            /* adjust as needed */
        }

        .swiper-button-prev-outbound:hover,
        .swiper-button-next-outbound:hover {
            background: #FFFFFF;
            color: #60D522;
            transform: translateY(-50%) scale(1.1);
        }


        /* Hover effect */
        .services:hover i {
            background: #60D522;
            /* Background green on hover */
            color: white;
            /* Icon color white on hover */
        }

        /* Styling the paragraph */
        .service-desc {
            font-size: 0.9rem;
            color: #555;
            margin-top: 10px;
            line-height: 1.5;
        }

        .services {
            background-color: #f8f9fa;
            /* Light gray background */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
        }

        .info-box_text a {
            color: #888C97;
        }

        .info-box_text p {
            color: #888C97;
        }

        .th-social a {
            display: inline-block;
            width: var(--icon-size, 32px);
            height: var(--icon-size, 32px);
            line-height: var(--icon-size, 32px);
            background-color: #262A36;
            color: var(--theme-color);
            font-size: 16px;
            border-radius: 50%;
            text-align: center;
            margin-right: 5px;
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .info-box_text .icon {
            color: var(--body-color);
            -webkit-box-flex: 0;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none;
            width: 40px;
            height: 40px;
            line-height: 37px;
            background-color: #262A36;
            border-radius: 50%;
            text-align: center;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .bg-smoke {
            background-color: #F5F5F5 !important;
        }


        .testimonials-section {
            background-color: var(--secondary);
            background: url(https://i.ibb.co/PTJDkgb/testimonials.jpg);
        }


        .card {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .review-summary .card-body {
            padding: 2rem;
        }

        .stars {
            color: #fbbf24;
        }

        .progress {
            background-color: var(--secondary);
            border-radius: var(--radius);
        }

        .progress-bar {
            background-color: var(--primary);
            border-radius: var(--radius);
        }

        .avatar {
            width: 48px;
            height: 48px;
            object-fit: cover;
        }

        .platform-item {
            padding: 0.5rem 0;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: var(--primary-foreground);
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius);
            transition: opacity 0.3s ease;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .review-text {
            font-size: 0.95rem;
            line-height: 1.6;
        }



        :root {
            --primary: #0284c7;
            --primary-foreground: #ffffff;
            --secondary: #f1f5f9;
            --secondary-foreground: #0f172a;
            --background: #ffffff;
            --foreground: #0f172a;
            --card: #ffffff;
            --card-foreground: #0f172a;
            --border: #e2e8f0;
            --ring: #0284c7;
            --radius: 0.5rem;
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1);
        }

        body {
            background-color: var(--background);
            color: var(--foreground);
            font-family: system-ui, -apple-system, sans-serif;
        }

        /* From Uiverse.io by cssbuttons-io */
        .fancy {
            background-color: transparent;
            border: 2px solid #000;
            border-radius: 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            float: right;
            font-weight: 700;
            letter-spacing: 0.05em;
            margin: 0;
            outline: none;
            overflow: visible;
            padding: 1.25em 2em;
            position: relative;
            text-align: center;
            text-decoration: none;
            text-transform: none;
            transition: all 0.3s ease-in-out;
            user-select: none;
            font-size: 13px;
        }

        .fancy::before {
            content: " ";
            width: 1.5625rem;
            height: 2px;
            background: black;
            top: 50%;
            left: 1.5em;
            position: absolute;
            transform: translateY(-50%);
            transform-origin: center;
            transition: background 0.3s linear, width 0.3s linear;
        }

        .fancy .text {
            font-size: 1.125em;
            line-height: 1.33333em;
            padding-left: 2em;
            display: block;
            text-align: left;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
            text-decoration: none;
            color: black;
        }

        .fancy .top-key {
            height: 2px;
            width: 1.5625rem;
            top: -2px;
            left: 0.625rem;
            position: absolute;
            background: #e8e8e8;
            transition: width 0.5s ease-out, left 0.3s ease-out;
        }

        .fancy .bottom-key-1 {
            height: 2px;
            width: 1.5625rem;
            right: 1.875rem;
            bottom: -2px;
            position: absolute;
            background: #e8e8e8;
            transition: width 0.5s ease-out, right 0.3s ease-out;
        }

        .fancy .bottom-key-2 {
            height: 2px;
            width: 0.625rem;
            right: 0.625rem;
            bottom: -2px;
            position: absolute;
            background: #e8e8e8;
            transition: width 0.5s ease-out, right 0.3s ease-out;
        }

        .fancy:hover {
            color: white;
            background: black;
        }

        .fancy:hover::before {
            width: 0.9375rem;
            background: white;
        }

        .fancy:hover .text {
            color: white;
            padding-left: 1.5em;
        }

        .fancy:hover .top-key {
            left: -2px;
            width: 0px;
        }

        .fancy:hover .bottom-key-1,
        .fancy:hover .bottom-key-2 {
            right: 0;
            width: 0;
        }

        
        .demo-container {
            position: relative;
            height: 200px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 200px;
            padding: 10px
        }
    </style>

    <!-- Banner section -->
    <div class="th-hero-wrapper hero-1" id="hero">
        <div class="swiper th-slider hero-slider-1" style="height: 750px;" id="heroSlide1"
            data-slider-options='{"effect":"fade","menu": ["", "", ""],"heroSlide1": {"swiper-container": {"pagination": {"el": ".swiper-pagination", "clickable": true }}}}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="assets/img/women-9114238_1920.jpg"
                            style="background-position-x: initial !important;background-position-y: initial !important; ">
                        </div>
                        <div class="container">
                            <div class="hero-style1 d-flex flex-column justify-content-center align-items-center text-center"
                                style="min-height: 750px; max-width: 100%;">
                                <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"
                                    style="font-family: cursive; font-size:20px;margin-bottom: -15px;">
                                    Let us take you beyond the ordinary
                                </span>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s"
                                    style="font-size: 60px;font-weight: 900;">
                                    Natural Wonder
                                </h1>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="assets/img/women.jpg">
                        </div>
                        <div class="container">
                            <!-- <div class="hero-style1">
                                                                                                                                                <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.2s">Get
                                                                                                                                                    unforgetable pleasure with us</span>
                                                                                                                                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">
                                                                                                                                                    Let’s make your best trip with us </h1>
                                                                                                                                            </div> -->
                            <div class="hero-style1 d-flex flex-column justify-content-center align-items-center text-center"
                                style="min-height: 750px; max-width: 100%;">
                                <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"
                                    style="font-family: cursive; font-size:20px;margin-bottom: -15px;">
                                    Your next getaway is just a flight away
                                </span>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s"
                                    style="font-size: 60px;font-weight: 900;">
                                    Where luxury meets the road
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  <div class="swiper-slide">
                                                                                                                                    <div class="hero-inner">
                                                                                                                                        <div class="th-hero-bg" data-bg-src="assets/img/hero/hero_bg_1_3.jpg">
                                                                                                                                        </div>
                                                                                                                                        <div class="container">
                                                                                                                                            <div class="hero-style1">
                                                                                                                                                <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.2s">Get
                                                                                                                                                    unforgetable pleasure with us</span>
                                                                                                                                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">
                                                                                                                                                    Explore beauty of the whole world </h1>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div> -->

            </div>
            <div class="th-swiper-custom">
                <button data-slider-prev="#heroSlide1" class="slider-arrow slider-prev"><img
                        src="assets/img/icon/right-arrow.svg" alt=""></button>
                <div class="slider-pagination"></div>
                <button data-slider-next="#heroSlide1" class="slider-arrow slider-next"><img
                        src="assets/img/icon/left-arrow.svg" alt=""></button>
            </div>

        </div>
    </div>

    <!-- Booking Start -->
    <div class="container-fluid booking mt-5 pb-5" style="position: relative; z-index: 999;">
        <div class="container pb-5">
            <div class="bg-light shadow custom-margin-top" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 mb-md-0">
                               <select id="serviceSelect" class="custom-select px-4" style="height: 55px;">
    <option selected disabled>Services</option>
    <option value="inbound">Inbound Tour</option>
    <option value="outbound">Outbound Tour</option>
    <option value="airport">Airport Transport</option>
    <option value="rent">Rent Vehicles</option>
    <option value="tickets">Air Tickets</option>
</select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 mb-md-0">
                                    <div class="input-group">
                                        <input type="text" id="departDate" class="form-control p-4 bg-white"
                                            placeholder="Depart Date">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-white" style="height: 56px; "><i
                                                    class="fa fa-calendar-alt" style="color: #6e7070;"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3 mb-md-0">
                                    <div class="input-group">
                                        <input type="text" id="returnDate" class="form-control p-4 bg-white"
                                            placeholder="Return Date">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-white " style="height: 56px;"><i
                                                    class="fa fa-calendar-alt" style="color: #6e7070;"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="form-btn col-md-12 col-lg-auto text-center text-lg-start mt-3 mt-lg-0">
                        <button class="th-btn custom-btn"  type="button" id="getQuoteBtn">GET QUOTE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Tour Packagen Outbound -->
    <section class="position-relative bg-top-center overflow-hidden space tour-margin " id="service-sec" style="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="title-area text-center">
                        <span class="sub-title" style="font-size: 20px;">Outbound Tours</span>
                        <h2 class="sec-title" style="font-size: 42px;">Explore the World Beyond</h2>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
                    <div class="slider-area tour-slider slider-drag-wrap">
                        <div class="swiper-button-prev-outbound"> <i class="fas fa-chevron-left"></i></div>

                        <div class="swiper-button-next-outbound"> <i class="fas fa-chevron-right"></i></div>
                        <div class="swiper th-slider has-shadow"
                            data-slider-options='{"navigation": {
                                "nextEl": ".swiper-button-next-outbound",
                                "prevEl": ".swiper-button-prev-outbound"
                              },"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"4"}}}'>

                            <div class="swiper-wrapper">



                                @foreach ($packages as $package)
                                    <div class="swiper-slide">
                                        <a href="{{ route('tour.details', $package->id) }}" class="tour-box-link"
                                            style="text-decoration: none; color: inherit;">
                                            <div class="tour-box style2 th-ani"
                                                style="cursor: pointer; transition: transform 0.3s ease; border-radius: 10px; overflow: hidden; min-height: 320px; position: relative;">

                                                @php
                                                    $imagePath = $package->picture
                                                        ? 'storage/' . $package->picture
                                                        : null;
                                                    $fallbackImage = asset('assets/img/tour/1.jpg'); // Your dummy tour image
                                                    $imageUrl =
                                                        $imagePath && file_exists(public_path($imagePath))
                                                            ? asset($imagePath)
                                                            : $fallbackImage;
                                                @endphp
                                                <!-- Image Section -->
                                                <div class="tour-box_img global-img" style="position: relative;">
                                                    <img src="{{ $imageUrl }}"
                                                        alt="{{ $package->place ?? 'Tour Image' }}"
                                                        style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                                                </div>

                                                <!-- Content Section -->
                                                <div class="tour-content" style="padding: 15px;">
                                                    <!-- Country & Rating -->
                                                    <div class="tour-header d-flex align-items-center justify-content-between"
                                                        style="margin-top: -12px; margin-bottom: -8px;">
                                                        <p class="tour-country m-0 d-flex align-items-center">
                                                            {{ $package->country_name ?? 'Sri Lanka' }}
                                                        </p>
                                                        <div class="tour-rating d-flex align-items-center"
                                                            style="margin-top: 13px;">
                                                            <i class="fas fa-star text-warning"></i>
                                                            <span class="ms-1"
                                                                style="font-weight: 600; font-size: 14px; color: #333;">{{ $package->ratings }}</span>
                                                        </div>
                                                    </div>

                                                    <!-- Title -->
                                                    <h3 class="box-title mt-2"
                                                        style="font-size: 16px; font-weight: bold; margin-bottom: 12px;">
                                                        {{ $package->heading }}
                                                    </h3>

                                                    <!-- Small Description -->
                                                    <p class="text-muted small mt-1 mb-1"
                                                        style="line-height: 1.4; max-height: 40px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                        {{ Str::limit($package->description, 90) }}
                                                    </p>

                                                    <a href="{{ route('tour.details', $package->id) }}"
                                                        class="text-primary small" style="font-weight: 500;">View More</a>
                                                </div>

                                                <!-- Tour Info -->
                                                <div class="d-flex align-items-right"
                                                    style="justify-content: right; margin-bottom: 5px; padding-right: 15px; padding-bottom: 15px;">
                                                    <i class="fas fa-calendar-check text-danger me-2"></i>
                                                    <span class="text-dark fw-semibold">
                                                        {{ $package->days }} Days, {{ $package->nights }} Nights
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach





                            </div>


                            <div class="slider-pagination" style="margin-top: 20px;"></div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- Tour Package Inbound -->
    <section class="position-relative  overflow-hidden space tour-margin-inbound " id="service-sec" data-bg-src="">


        <div class="container tour-margin-inbound" style="">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="title-area text-center inbound-title">
                        <span class="sub-title" style="font-size: 20px;">Inbound Tours</span>
                        <h2 class="sec-title" style="font-size: 42px;">Discover the Wonders of Sri Lanka </h2>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
                    <div class="slider-area tour-slider slider-drag-wrap">
                        <div class="swiper-button-prev-inbound">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="swiper-button-next-inbound">
                            <i class="fas fa-chevron-right"></i>
                        </div>

                        <div class="swiper th-slider has-shadow"
                            data-slider-options='{ "navigation": {
                                "nextEl": ".swiper-button-next-inbound",
                                "prevEl": ".swiper-button-prev-inbound"
                            },"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"4"}}}'>
                            <div class="swiper-wrapper">


                                @foreach ($inboundPackages as $inboundPackage)
                                    <div class="swiper-slide">
                                        <a href="{{ route('tour.details', $inboundPackage->id) }}" class="tour-box-link"
                                            style="text-decoration: none; color: inherit;">
                                            <div class="tour-box style2 th-ani"
                                                style="cursor: pointer; transition: transform 0.3s ease; border-radius: 10px; overflow: hidden; min-height: 320px; position: relative;">

                                                @php
                                                    $imagePath = $inboundPackage->picture
                                                        ? 'storage/' . $inboundPackage->picture
                                                        : null;
                                                    $fallbackImage = asset('assets/img/tour/yala.jpg'); // Your dummy tour image
                                                    $imageUrl =
                                                        $imagePath && file_exists(public_path($imagePath))
                                                            ? asset($imagePath)
                                                            : $fallbackImage;
                                                @endphp
                                                <!-- Image Section -->
                                                <div class="tour-box_img global-img" style="position: relative;">
                                                    <img src="{{ $imageUrl }}" alt="{{ $inboundPackage->place }}"
                                                        style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                                                </div>

                                                <!-- Content Section -->
                                                <div class="tour-content" style="padding: 15px;">
                                                    <!-- Country & Rating -->
                                                    <div class="tour-header d-flex align-items-center justify-content-between"
                                                        style="margin-top: -12px; margin-bottom: -8px;">
                                                        <p class="tour-country m-0 d-flex align-items-center">
                                                            {{ $inboundPackage->country_name ?? 'Sri Lanka' }}
                                                        </p>
                                                        <div class="tour-rating d-flex align-items-center"
                                                            style="margin-top: 13px;">
                                                            <i class="fas fa-star text-warning"></i>
                                                            <span class="ms-1"
                                                                style="font-weight: 600; font-size: 14px; color: #333;">{{ $inboundPackage->ratings }}</span>
                                                        </div>
                                                    </div>

                                                    <!-- Title -->
                                                    <h3 class="box-title mt-2"
                                                        style="font-size: 16px; font-weight: bold; margin-bottom: 12px;">
                                                        {{ $inboundPackage->heading }}
                                                    </h3>

                                                    <!-- Small Description -->
                                                    <p class="text-muted small mt-1 mb-1"
                                                        style="line-height: 1.4; max-height: 40px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                        {{ Str::limit($inboundPackage->description, 90) }}
                                                    </p>

                                                    <a href="{{ route('tour.details', $inboundPackage->id) }}"
                                                        class="text-primary small" style="font-weight: 500;">View More</a>
                                                </div>

                                                <!-- Tour Info -->
                                                <div class="d-flex align-items-right"
                                                    style="justify-content: right; margin-bottom: 5px; padding-right: 15px; padding-bottom: 15px;">
                                                    <i class="fas fa-calendar-check text-danger me-2"></i>
                                                    <span class="text-dark fw-semibold">
                                                        {{ $inboundPackage->days }} Days, {{ $inboundPackage->nights }}
                                                        Nights
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach



                            </div>
                            <div class="slider-pagination" style="margin-top: 20px;margin-bottom: 58px;"></div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="text-center mt-4">
                <a href="{{ url('/inbound-tours') }}" class="th-btn "
                    style="outline: 2px solid #000; background-color: black; color: white;">
                    Show More
                </a>
            </div>

    </section>


        <section id="transportation" class="py-5 bg-smoke" style="margin-bottom: 70px; margin-top: 30px;">
            <div class="container">


                <!-- Title Section with improved typography -->
                <div class="title-area text-center mb-5" style="">
                    <!-- <span class="sub-title" style="font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500; color: #0069d9; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 8px;">Premium Car Rentals</span> -->
                    <span class="sub-title fw-semibold">Travel Sri Lanka</span>
                    <h2 class="sec-title"
                        style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #1a2b49; margin-bottom: 20px;">
                        Transport Solutions</h2>
                    <div class="title-separator"
                        style="width: 80px; height: 3px; background: linear-gradient(90deg, #0069d9, #00a2ff); margin: 0 auto;">
                    </div>
                </div>

                <!-- Main Content Row: Left Services - Center Image - Right Services -->
                <div class="row align-items-center">
                    <!-- Left Side: 2 Service Boxes -->
                    <div class="col-lg-4">
                        <div class="services-container" style="font-family: 'Poppins', sans-serif;">
                            <div class="row g-4">
                                <!-- Service Box 1 -->
                                <div class="col-12 d-flex">
                                    <div class="service-box h-100 shadow"
                                        style="background: linear-gradient(135deg, #f9f9ff 0%, #eaeaff 100%); border-radius: 16px; padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); position: relative; text-align: center;">
                                        <div class="content-overlay d-flex flex-column align-items-center">
                                            <div class="icon-container mb-4"
                                                style="width: 70px; height: 70px; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-car" style="font-size: 28px; color: #4e54c8;"></i>
                                            </div>
                                            <h3 style="font-size: 21px; font-weight: 600; color: #333;">Airport Pickups
                                            </h3>
                                            <p style="font-size: 15px; color: #555;">
                                                Hassle-free airport transfers anytime. We monitor your flight and ensure
                                                prompt, reliable rides.
                                            </p>
                                        </div>
                                        <div class="decorative-shape"
                                            style="position: absolute; top: -15px; right: -15px; width: 100px; height: 100px; border-radius: 50%; background-color: rgba(78, 84, 200, 0.07); z-index: 1;">
                                        </div>
                                    </div>
                                </div>

                                <!-- Service Box 2 -->
                                <div class="col-12 d-flex">
                                    <div class="service-box h-100 shadow"
                                        style="background: linear-gradient(135deg, #fff9f6 0%, #ffe8dd 100%); border-radius: 16px; padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); position: relative;">
                                        <div class="content-overlay d-flex flex-column align-items-center">
                                            <div class="icon-container mb-4"
                                                style="width: 70px; height: 70px; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-shield-alt" style="font-size: 28px; color: #ff7a50;"></i>
                                            </div>
                                            <h3 style="font-size: 21px; font-weight: 600; color: #333;">Safe & Reliable
                                            </h3>
                                            <p style="font-size: 15px; color: #555;">
                                                Certified service with insured, well-maintained vehicles and licensed,
                                                professional drivers.
                                            </p>
                                        </div>
                                        <div class="decorative-shape"
                                            style="position: absolute; bottom: -20px; left: -20px; width: 120px; height: 120px; border-radius: 50%; background-color: rgba(255, 122, 80, 0.07); z-index: 1;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Center: Map Image -->
                    <div class="col-lg-4 text-center mb-4 mb-lg-0">
                        <img src="assets/img/map-car.png" alt="Sri Lanka Transport Map" class="img-fluid rounded"
                            style="max-width: 100%; height: auto;">
                    </div>

                    <!-- Right Side: 2 Service Boxes -->
                    <div class="col-lg-4">
                        <div class="services-container" style="font-family: 'Poppins', sans-serif;">
                            <div class="row g-4">
                                <!-- Service Box 3 -->
                                <div class="col-12 d-flex">
                                    <div class="service-box h-100 shadow"
                                        style="background: linear-gradient(135deg, #f6fff9 0%, #ddffe8 100%); border-radius: 16px; padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); position: relative;">
                                        <div class="content-overlay d-flex flex-column align-items-center">
                                            <div class="icon-container mb-4"
                                                style="width: 70px; height: 70px; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-credit-card"
                                                    style="font-size: 28px; color: #2ecc71;"></i>
                                            </div>
                                            <h3 style="font-size: 21px; font-weight: 600; color: #333;">Booking Made Easy
                                            </h3>
                                            <p style="font-size: 15px; color: #555;">
                                                Simple booking with flexible hourly or distance-based packages tailored to
                                                your journey.
                                            </p>
                                        </div>
                                        <div class="decorative-shape"
                                            style="position: absolute; top: -15px; left: -15px; width: 100px; height: 100px; border-radius: 50%; background-color: rgba(46, 204, 113, 0.07); z-index: 1;">
                                        </div>
                                    </div>
                                </div>

                                <!-- Service Box 4 -->
                                <div class="col-12 d-flex">
                                    <div class="service-box h-100 shadow"
                                        style="background: linear-gradient(135deg, #f6faff 0%, #ddeeff 100%); border-radius: 16px; padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); position: relative;">
                                        <div class="content-overlay d-flex flex-column align-items-center">
                                            <div class="icon-container mb-4"
                                                style="width: 70px; height: 70px; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-user-tie" style="font-size: 28px; color: #3498db;"></i>
                                            </div>
                                            <h3 style="font-size: 21px; font-weight: 600; color: #333;">Experienced Drivers
                                            </h3>
                                            <p style="font-size: 15px; color: #555;">
                                                Skilled local drivers with courteous service, island knowledge, and
                                                multilingual support.
                                            </p>
                                        </div>
                                        <div class="decorative-shape"
                                            style="position: absolute; bottom: -20px; right: -20px; width: 120px; height: 120px; border-radius: 50%; background-color: rgba(52, 152, 219, 0.07); z-index: 1;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Centered Show More Button -->
                <div class="text-center mt-5">
                    <a href="{{ url('/transportation') }}" class="th-btn"
                        style="outline: 2px solid #000; background-color: black; color: white;">
                        Show More
                    </a>
                </div>
            </div>
        </section>


        <!-- Rent vehicles -->
        <section class="position-relative bg-top-center  overflow-hidden space" id="service-sec"
            style="margin-top: -75px; padding-bottom: 52px;background: linear-gradient(180deg, #0B0B13 0%, #121219 100%);">
            <div class="bg-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;">
            </div>

            <div class="container position-relative" style="z-index: 1;">
                <!-- Title Section with improved typography -->
                <div class="title-area text-center mb-5" style="margin-top: -55px;">
                    <!-- <span class="sub-title" style="font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500; color: #0069d9; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 8px;">Premium Car Rentals</span> -->
                    <span class="sub-title fw-semibold" style="color: #AAAAAA;">Premium Car Rentals</span>
                    <h2 class="sec-title"
                        style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #ffffff; margin-bottom: 20px; text-shadow: 0 2px 15px rgba(0,162,255,0.3);">
                        Find Your Perfect Ride</h2>
                    <div class="title-separator"
                        style="width: 80px; height: 3px; background: linear-gradient(90deg, #0069d9, #00a2ff); margin: 0 auto;">
                    </div>
                </div>

               <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
                    <div class="slider-area tour-slider slider-drag-wrap">

                        <!-- Navigation Buttons with improved styling -->
                        <div class="swiper-button-prev-rental"
                            style="background-color: rgba(0,162,255,0.1); width: 54px; height: 54px; border-radius: 50%; box-shadow: 0 3px 12px rgba(0,162,255,0.2); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 1px solid rgba(0,162,255,0.3); backdrop-filter: blur(5px);">
                            <i class="fas fa-chevron-left" style="color: #00A2FF; font-size: 16px;"></i>
                        </div>
                        <div class="swiper-button-next-rental"
                            style="background-color: rgba(0,162,255,0.1); width: 54px; height: 54px; border-radius: 50%; box-shadow: 0 3px 12px rgba(0,162,255,0.2); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 1px solid rgba(0,162,255,0.3); backdrop-filter: blur(5px);">
                            <i class="fas fa-chevron-right" style="color: #00A2FF; font-size: 16px;"></i>
                        </div>

                        <!-- Swiper Container with enhanced styling -->
                        <div class="swiper th-slider has-shadow"
                            data-slider-options='{
                        "navigation": {
                          "nextEl": ".swiper-button-next-rental",
                          "prevEl": ".swiper-button-prev-rental"
                        },
                        "breakpoints": {
                          "0": { "slidesPerView": 1 },
                          "576": { "slidesPerView": 1 },
                          "768": { "slidesPerView": 1 },
                          "992": { "slidesPerView": 1 },
                          "1200": { "slidesPerView": 1 }
                        }
                      }'>

                            <div class="swiper-wrapper">


                                <!-- Slide 1: Motorbike with improved styling -->
                                @foreach ($vehicles as $vehicle)
                                    <div class="swiper-slide">
                                        <div class="cars-slider__item"
                                            style="background: linear-gradient(135deg, rgba(19,19,30,0.95) 0%, rgba(30,30,47,0.95) 100%); border-radius: 18px; overflow: hidden; margin: 10px; transition: all 0.3s ease; position: relative; padding: 30px; box-shadow: 0 15px 30px rgba(0,0,0,0.3), 0 0 60px rgba(0,162,255,0.1) inset; border: 1px solid rgba(0,162,255,0.1);">

                                            <!-- Main Row Layout -->
                                            <div class="horizontal-layout"
                                                style="display: flex; align-items: center; justify-content: space-between; width: 100%;">

                                                <!-- Left Section -->
                                                <div class="content-section" style="flex: 1; padding-right: 20px;">
                                                    <div
                                                        style="display: inline-block; background: linear-gradient(135deg, #FF4D4D, #CC0000);padding: 8px 14px; border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 600; color: #fff; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 3px 10px rgba(0,162,255,0.3);">
                                                        {{ $vehicle->category ?? 'Premium ' }}
                                                    </div>

                                                    <h3
                                                        style="margin-bottom: 8px; font-family: 'Montserrat', sans-serif; color: #ffffff; font-weight: 700; font-size: 44px; text-shadow: 0 2px 10px rgba(0,162,255,0.4);">
                                                        {{ $vehicle->make }}
                                                    </h3>
                                                    <h3
                                                        style="margin-bottom: 15px; font-family: 'Montserrat', sans-serif; color: #00A2FF; font-weight: 800; font-size: 44px; text-shadow: 0 2px 10px rgba(0,162,255,0.4);">
                                                        {{ $vehicle->model }}
                                                    </h3>

                                                    <div
                                                        style="width: 60px; height: 6px; background: linear-gradient(90deg, #00A2FF, #0069d9); margin: 10px 0 20px; border-radius: 3px;">
                                                    </div>
                                                </div>

                                                <!-- Center Image Section -->
                                                <div class="image-section"
                                                    style="flex: 1; display: flex; justify-content: center; align-items: center; position: relative; height: 100%;">
                                                    <div
                                                        style="position: absolute; width: 300px; height: 300px; border-radius: 50%; background: radial-gradient(circle, rgba(0,162,255,0.15) 0%, rgba(0,162,255,0) 70%); z-index: 1;">
                                                    </div>

                                                    <img src="{{ $vehicle->image ? asset('storage/' . $vehicle->image) : asset('assets/img/bike3.png') }}"
                                                        alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                                        style="width: 100%; max-width: auto; height: 350px; object-fit: contain; z-index: 2; transform: scale(1.1); transition: transform 0.5s ease; filter: drop-shadow(0 10px 25px rgba(0,162,255,0.25));">
                                                </div>


                                              <div class="price-features-section"
                                                    style="flex: 1; padding-left: 20px; display: flex; align-items: center; justify-content: center;">


                                                    <div class="demo-container">
                                                        <div
                                                            style="position: absolute; text-align: center; right: 12px; background: rgba(5, 150, 105, 0.95); color: white; padding: 8px 12px; border-radius: 20px; font-size: 14px; font-weight: 700; backdrop-filter: blur(10px); box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                                                            <span style="font-size: 28px;">$ {{ $vehicle->price }}</span>
                                                            <span style="font-size: 12px; opacity: 0.9;">/ day</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Specifications Section -->
                                            <!-- Specifications Section -->
                                            <div class="specification priority-mobile"
                                                style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-top: 40px; padding: 20px; border-radius: 14px; box-shadow: 0 8px 20px rgba(0,0,0,0.2); background: linear-gradient(135deg, rgba(19,19,30,0.7) 0%, rgba(30,30,47,0.7) 100%); backdrop-filter: blur(5px); border: 1px solid rgba(0,162,255,0.1);">

                                                <!-- Helmets -->
                                                <div class="specification-item"
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; text-align: left; font-family: 'Nunito Sans', sans-serif; color: #00A2FF; font-weight: 700; font-size: 18px;">
                                                    <i class="fas fa-helmet-safety"
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,162,255,0.2); border: 1px solid rgba(0,162,255,0.3);"></i>
                                                    <div style="display: flex; flex-direction: column;">
                                                        <span
                                                            style="color: #AAAAAA; font-weight: 600; font-size: 14px;">Helmets</span>
                                                        <span style="color: #ffffff; font-weight: 700; font-size: 18px;">
                                                            {{ $vehicle->helmet_count ?? '1 or 2' }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <!-- First-Aid Kit -->
                                                <div class="specification-item"
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; border-left: 1px solid rgba(255,255,255,0.1); border-right: 1px solid rgba(255,255,255,0.1); padding: 0 15px; text-align: left; font-family: 'Nunito Sans', sans-serif; font-weight: 700; font-size: 18px; color: #00A2FF;">
                                                    <i class="fas fa-kit-medical"
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,162,255,0.2); border: 1px solid rgba(0,162,255,0.3);"></i>
                                                    <div style="display: flex; flex-direction: column;">
                                                        <span
                                                            style="color: #AAAAAA; font-weight: 600; font-size: 14px;">First-Aid
                                                            Kit</span>
                                                        <span style="color: #ffffff; font-weight: 700; font-size: 18px;">
                                                            {{ $vehicle->first_aid_kit ? 'Yes' : 'No' }}
                                                        </span>
                                                    </div>
                                                </div>


                                                <!-- Transmission -->
                                                <div class="specification-item"
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; text-align: left; font-family: 'Nunito Sans', sans-serif; font-weight: 700; font-size: 18px; color: #00A2FF;">
                                                    <i class="fas fa-cogs"
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,162,255,0.2); border: 1px solid rgba(0,162,255,0.3);"></i>
                                                    <div style="display: flex; flex-direction: column;">
                                                        <span
                                                            style="color: #AAAAAA; font-weight: 600; font-size: 14px;">Transmission</span>
                                                        <span style="color: #ffffff; font-weight: 700; font-size: 18px;">
                                                            {{ ucfirst($vehicle->transmission ?? 'N/A') }}
                                                        </span>
                                                    </div>
                                                </div>


                                                <!-- Mileage -->
                                                <div class="specification-item"
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; border-left: 1px solid rgba(255,255,255,0.1); padding: 0 15px; text-align: left; font-family: 'Nunito Sans', sans-serif; font-weight: 700; font-size: 18px; color: #00A2FF;">
                                                    <i class="fas fa-road"
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,162,255,0.2); border: 1px solid rgba(0,162,255,0.3);"></i>
                                                    <div style="display: flex; flex-direction: column;">
                                                        <span
                                                            style="color: #AAAAAA; font-weight: 600; font-size: 14px;">Mileage</span>
                                                        <span style="color: #ffffff; font-weight: 700; font-size: 18px;">
                                                            {{ $vehicle->mileage ?? 'Unlimited' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                                <!-- Slides End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



                <div class="text-center  " style="margin-top: 70px;">
                    <a href="{{ url('/rent') }}" class="th-btn"
                        style="outline: 2px solid #000; background-color: black; color: white;">
                        Show More
                    </a>
                </div>
            </div>
        </section>
        <!-- Ari Line -->

        <section class=" overflow-hidden space bg-smoke" id="blog-sec">
            <div class="container">
                <div class="mb-30 text-center text-md-start" style="margin-top: -60px;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-7 airlin-mob">
                            <div class="title-area mb-md-0">
                                {{-- <span class="sub-title" style="color: #AAAAAA;">Airline Tickets</span>
                                <h2 class="sec-title"  style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #ffffff; margin-bottom: 20px; text-shadow: 0 2px 15px rgba(0,162,255,0.3);">Your Gateway to the World</h2> --}}
                                    <span class="sub-title fw-semibold" >Airline Ticket</span>
                    <h2 class="sec-title"
                        style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700;color: #1a2b49; margin-bottom: 20px; ">
                        Your Gateway to the World</h2>
               

                            </div>


                              <!-- <span class="sub-title" style="font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500; color: #0069d9; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 8px;">Premium Car Rentals</span> -->
                
                        </div>
                        <!-- <div class="col-md-auto">
                                                                                        <a href="tours.html" class="th-btn" style="outline: 2px solid #60D522; background-color: white; color: black;">
                                                                                            Get Tickets
                                                                                        </a>
                                                                                    </div> -->
                        <div class="form-btn col-md-12 col-lg-auto d-none d-md-block">
                            <!-- <button class="th-btn custom-btn" type="submit">Get Tickets</button> -->
                            <a class="fancy" href="air-line.html">
                                <span class="top-key"></span>
                                <span class="text">Buy Tickets</span>
                                <span class="bottom-key-1"></span>
                                <span class="bottom-key-2"></span>
                            </a>
                        </div>


                    </div>
                </div>

                <div class="brand-area overflow-hidden space-bottom">
                    <div class="container th-container">
                        <div class="swiper th-slider brandSlider1" id="brandSlider1"
                            data-slider-options='{
                        "breakpoints": {
                            "0": {"slidesPerView": 1},
                            "576": {"slidesPerView": 1},
                            "768": {"slidesPerView": 2},
                            "992": {"slidesPerView": 4},
                            "1200": {"slidesPerView": 4},
                            "1400": {"slidesPerView": 4}
                        }
                    }'>
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/Air Asia.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/Air Asia.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/air india.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/air india.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/Airarabia.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/Airarabia.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/azur air.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/azur air.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/china.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/china.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/Emirates.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/Emirates.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/Etihad.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/Etihad.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/FitsAir.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/FitsAir.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/flydubai.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/flydubai.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/indigo.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/indigo.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/jazeera.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/jazeera.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/malaysia.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/malaysia.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/Qatar Airways.jpeg"
                                                alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/Qatar Airways.jpeg"
                                                alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/salam air.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/salam air.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/seychelle.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/seychelle.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/singapore.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/singapore.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/SriLankan.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/SriLankan.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/thai.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/thai.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="">
                                            <img class="original" src="assets/img/brand/turkish.png" alt="Brand Logo">
                                            <img class="gray" src="assets/img/brand/turkish.png" alt="Brand Logo">
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 d-block d-md-none d-flex justify-content-center form-btn "
                    style="margin-top: 10px;margin-bottom: 18px;">
                    <a class="fancy" href="air-line.html">
                        <span class="top-key"></span>
                        <span class="text">Buy Tickets</span>
                        <span class="bottom-key-1"></span>
                        <span class="bottom-key-2"></span>
                    </a>
                </div>
            </div>

        </section>



        <section class="testimonials-section py-5">
            <div class="container">
                <div class="heading white-heading text-center mb-4">Testimonial</div>

                <div id="testimonial4"
                    class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x"
                    data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

                    <div class="row">
                        <div class="col-12" style="margin-top: 34px;">
                            <div class="slider-area testimonial-slider slider-drag-wrap">
                                <div class="swiper th-slider"
                                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"768":{"slidesPerView":2},"992":{"slidesPerView":3}}}'>
                                    <div class="swiper-wrapper">

                                        <!-- Review 1 -->
                                        <div class="swiper-slide">
                                            <div class="testimonial-card card h-100">
                                                <div class="card-body" style="height: 240px; ">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330"
                                                            class="avatar rounded-circle me-3" alt="User"
                                                            style="height: 48px;">
                                                        <div>
                                                            <h6 class="mb-0">Sarah Johnson</h6>
                                                            <small class="text-muted"><i
                                                                    class="bi bi-google text-danger me-1"></i>
                                                                Google</small>
                                                        </div>
                                                    </div>
                                                    <div class="stars mb-3">
                                                        <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p class="review-text">"Great experience from start to finish.
                                                        The attention to detail was impressive."</p>
                                                    <small class="text-muted">Posted on: Jan 15, 2024</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Review 2 -->
                                        <div class="swiper-slide">
                                            <div class="testimonial-card card h-100">
                                                <div class="card-body" style="height: 240px;">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e"
                                                            class="avatar rounded-circle me-3" alt="User"
                                                            style="height: 48px;">
                                                        <div>
                                                            <h6 class="mb-0">Michael Chen</h6>
                                                            <small class="text-muted"><i
                                                                    class="bi bi-facebook text-primary me-1"></i>
                                                                Facebook</small>
                                                        </div>
                                                    </div>
                                                    <div class="stars mb-3">
                                                        <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-half"></i>
                                                    </div>
                                                    <p class="review-text">"Great experience from start to finish.
                                                        The attention to detail was impressive."</p>
                                                    <small class="text-muted">Posted on: Jan 12, 2024</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Review 3 -->
                                        <div class="swiper-slide">
                                            <div class="testimonial-card card h-100">
                                                <div class="card-body" style="height: 240px;">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330"
                                                            class="avatar rounded-circle me-3" alt="User"
                                                            style="height: 48px;">
                                                        <div>
                                                            <h6 class="mb-0">Emma Wilson</h6>
                                                            <small class="text-muted"><i
                                                                    class="bi bi-twitter text-info me-1"></i>
                                                                Twitter</small>
                                                        </div>
                                                    </div>
                                                    <div class="stars mb-3">
                                                        <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p class="review-text">"Absolutely fantastic! The team was
                                                        professional and courteous."</p>
                                                    <small class="text-muted">Posted on: Jan 10, 2024</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Review 4 -->
                                        <div class="swiper-slide">
                                            <div class="testimonial-card card h-100">
                                                <div class="card-body" style="height: 240px; ">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d"
                                                            class="avatar rounded-circle me-3" alt="User"
                                                            style="height: 48px;">
                                                        <div>
                                                            <h6 class="mb-0">David Thompson</h6>
                                                            <small class="text-muted"><i
                                                                    class="bi bi-google text-danger me-1"></i>
                                                                Google</small>
                                                        </div>
                                                    </div>
                                                    <div class="stars mb-3">
                                                        <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star"></i>
                                                    </div>
                                                    <p class="review-text">"Very satisfied with the quality of
                                                        service.
                                                        The staff was knowledgeable."</p>
                                                    <small class="text-muted">Posted on: Jan 8, 2024</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Pagination -->
                                    <div class="slider-pagination mt-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>


        <script>
            window.addEventListener('DOMContentLoaded', function() {
                document.getElementById('departDate').value = '';
                document.getElementById('returnDate').value = '';

                flatpickr("#departDate", {
                    dateFormat: "Y-m-d",
                    disableMobile: true
                });

                flatpickr("#returnDate", {
                    dateFormat: "Y-m-d",
                    disableMobile: true
                });
            });
        </script>

<script>
    document.getElementById('getQuoteBtn').addEventListener('click', function () {
        const selectedValue = document.getElementById('serviceSelect').value;

        switch (selectedValue) {
            case 'inbound':
                window.location.href = '/inbound-tours';
                break;
            case 'outbound':
                window.location.href = '/';
                break;
            case 'airport':
                window.location.href = '/transportation';
                break;
            case 'rent':
                window.location.href = '/rent';
                break;
            case 'tickets':
                window.location.href = '/airline';
                break;
            default:
                alert('Please select a service to continue.');
                break;
        }
    });
</script>

    @endsection
