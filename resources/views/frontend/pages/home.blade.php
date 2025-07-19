@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        .map-section {
            /* background-color: var(--secondary); */
            /* background:  url('/assets/img/map-bg-3.jpg'); */

            background-image:
                linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
                url('/assets/img/map-bg8.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        @media (max-width: 767.98px) {

            .swiper-button-prev-rental {
                left: -10px;
            }

            .swiper-button-next-rental {
                right: -10px;
            }

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


        }

        @media (min-width: 768px) {
            .custom-margin-top {
                margin-top: -114px !important;
            }

            .tour-margin {
                margin-top: -160px;

            }

            .alirlin-title {
                margin-top: 10px;
            }


        }

        #departDate,
        #departDate::placeholder {
            color: #000 !important;
        }

        #returnDate,
        #returnDate::placeholder {
            color: #000 !important;
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
            background: linear-gradient(45deg, #94c73e, #94c73e);

            /* Smooth gradient */
            color: #fff;
            /* White text */
            font-size: 16px;
            font-weight: 600;
            padding: 12px 24px;
            border: none;
            border-radius: 0px;
            /* Soft rounded corners */
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .custom-btn:hover {
            background: #000000 !important;
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

            transition: all 0.3s ease;
        }

        .swiper-button-prev-inbound {
            left: -45px;
            /* adjust as needed */
        }

        .swiper-button-next-inbound {
            right: -45px;
            /* adjust as needed */
        }

        .swiper-button-prev-inbound:hover,
        .swiper-button-next-inbound:hover {
            background: #efefef;

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


        /* Floating Toggle Button */
        #chatbot-toggle {
            position: fixed;
            bottom: 80px;
            right: 30px;
            z-index: 1000;
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: white;
            border-radius: 50%;
            width: 75px;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 32px;
            box-shadow: 0 10px 30px rgba(2, 140, 204, 0.4);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 4px solid rgba(255, 255, 255, 0.2);
            outline: none;
            backdrop-filter: blur(10px);
        }

        #chatbot-toggle:hover {
            transform: translateY(-8px) scale(1.1);
            box-shadow: 0 20px 40px rgba(2, 140, 204, 0.6);
            background: linear-gradient(135deg, #0056b3 0%, #028ccc 100%);
        }

        #chatbot-toggle.active {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            transform: rotate(45deg) scale(1.05);
            border-color: rgba(255, 255, 255, 0.3);
        }

        #chatbot-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            /* Make sure it's higher than header (usually 1000+) */
        }


        /* Chatbot Window */
        #chatbot-box {
            position: fixed;
            bottom: 165px;
            right: 30px;
            width: 420px;
            max-width: calc(100vw - 60px);
            max-height: calc(100vh - 174px);
            /* prevent from overflowing screen */
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(25px);
            border-radius: 25px;
            z-index: 1101;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.1);
            transform: translateY(100px) scale(0.85);
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            /* allow inner sections to flow vertically */
        }

        #chatbot-box.show {
            transform: translateY(0) scale(1);
            opacity: 1;
            visibility: visible;
        }

        /* Header */
        .chat-header {
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: white;
            padding: 25px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .chat-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: headerShimmer 3s linear infinite;
        }

        @keyframes headerShimmer {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .chat-header h3 {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }

        .chat-header p {
            font-size: 13px;
            opacity: 0.95;
            margin: 8px 0 0 0;
            font-weight: 400;
            position: relative;
            z-index: 1;
        }

        /* Chat Content */
        #chat-content {
            flex: 1;
            overflow-y: auto;
            padding: 25px;
            background: rgba(255, 255, 255, 0.95);
        }


        #chat-content::-webkit-scrollbar {
            width: 8px;
        }

        #chat-content::-webkit-scrollbar-track {
            background: rgba(2, 140, 204, 0.1);
            border-radius: 10px;
        }

        #chat-content::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #028ccc 0%, #0056b3 100%);
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        /* Message Bubbles */
        .message {
            margin-bottom: 20px;
            animation: fadeInUp 0.6s ease-out;
        }

        .bot-message {
            background: linear-gradient(135deg, #f8fbff 0%, #e8f4fd 100%);
            color: #2c3e50;
            padding: 16px 20px;
            border-radius: 20px 20px 20px 8px;
            max-width: 88%;
            box-shadow: 0 4px 15px rgba(2, 140, 204, 0.15);
            border: 1px solid rgba(2, 140, 204, 0.1);
            position: relative;
            font-size: 14px;
            line-height: 1.5;
        }

        .bot-message::before {
            content: '';
            position: absolute;
            top: 10px;
            left: -8px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 8px 8px 8px 0;
            border-color: transparent #f8fbff transparent transparent;
        }

        .user-message {
            background: linear-gradient(135deg, #028ccc 0%, #0a3d52 100%);
            color: white;
            padding: 16px 20px;
            border-radius: 20px 20px 8px 20px;
            max-width: 88%;
            margin-left: auto;
            text-align: right;
            box-shadow: 0 4px 15px rgba(2, 140, 204, 0.3);
            position: relative;
            font-size: 14px;
            line-height: 1.5;
        }

        .user-message::after {
            content: '';
            position: absolute;
            top: 10px;
            right: -8px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 8px 0 8px 8px;
            border-color: transparent transparent transparent #028ccc;
        }

        /* Input Area */
        #chat-input-area {
            padding: 25px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            border-top: 1px solid rgba(2, 140, 204, 0.1);
            display: flex;
            gap: 15px;
            align-items: center;
        }

        #chat-input {
            flex: 1;
            padding: 15px 20px;
            border: 2px solid rgba(2, 140, 204, 0.2);
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.95);
            outline: none;
            font-size: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(2, 140, 204, 0.1);
        }

        #chat-input:focus {
            border-color: #028ccc;
            background: white;
            box-shadow: 0 0 0 4px rgba(2, 140, 204, 0.15);
            transform: translateY(-1px);
        }

        #send-btn {
            background: linear-gradient(135deg, #028ccc 0%, #0a3d52 100%);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            font-size: 20px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(2, 140, 204, 0.3);
        }

        #send-btn:hover {
            transform: scale(1.1) translateY(-2px);
            box-shadow: 0 8px 25px rgba(2, 140, 204, 0.4);
            background: linear-gradient(135deg, #0a3d52 0%, #028ccc 100%);
        }

        #send-btn:active {
            transform: scale(1.05) translateY(0);
        }

        /* Form Styles */
        .form-container {
            padding: 25px;
            background: rgba(255, 255, 255, 0.98);
        }

        .form-container h4 {
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
        }

        .form-container,
        .service-grid {
            max-height: 300px;
            overflow-y: auto;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            margin-bottom: 15px;
            border: 2px solid rgba(2, 140, 204, 0.2);
            border-radius: 15px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 8px rgba(2, 140, 204, 0.1);
        }

        .form-control:focus {
            outline: none;
            border-color: #028ccc;
            box-shadow: 0 0 0 4px rgba(2, 140, 204, 0.15);
            transform: translateY(-1px);
        }

        @media (max-height: 700px) {
            #chatbot-box {
                max-height: calc(100vh - 172px);
                bottom: 163px;
            }

            .alirlin-title {
                margin-top: 10px;
            }
        }

        .btn {
            padding: 15px 25px;
            border: none;
            border-radius: 15px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #000000 0%, #000000 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(2, 140, 204, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);

        }

        .btn-outline-primary {
            background: transparent;
            color: #000000;
            border: 2px solid #000000;
            margin-bottom: 10px;
        }

        .btn-outline-primary:hover {

            color: white;
            transform: translateY(-2px);

        }

        .w-100 {
            width: 100%;
        }

        .mb-2 {
            margin-bottom: 15px;
        }

        .my-1 {
            margin: 8px 0;
        }

        /* Service Selection Styles */
        .service-grid {
            padding: 25px;
        }

        .service-grid h4 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 600;
        }

        .service-card {
            background: linear-gradient(135deg, #f8fbff 0%, #e8f4fd 100%);
            border: 2px solid rgba(2, 140, 204, 0.2);
            border-radius: 18px;
            padding: 18px;
            text-align: center;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .service-card:hover {
            border-color: #028ccc;
            transform: translateY(-4px);
            box-shadow: 0 12px 35px rgba(2, 140, 204, 0.25);
            background: linear-gradient(135deg, #028ccc 0%, #0056b3 100%);
            color: white;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .service-card:hover::before {
            left: 100%;
        }

        /* Typing Indicator */
        .typing-indicator {
            display: flex;
            align-items: center;
            padding: 12px 18px;
            background: rgba(2, 140, 204, 0.1);
            border-radius: 20px 20px 20px 8px;
            margin-bottom: 20px;
            max-width: 85%;
            border: 1px solid rgba(2, 140, 204, 0.2);
        }

        .typing-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #028ccc;
            margin: 0 3px;
            animation: typing 1.4s infinite;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes typing {

            0%,
            60%,
            100% {
                transform: translateY(0);
                opacity: 0.4;
            }

            30% {
                transform: translateY(-12px);
                opacity: 1;
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.08);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .alirlin-title {
                margin-top: 30px;
            }

            #chatbot-box {
                width: calc(100vw - 40px);
                right: 20px;
                bottom: 110px;
            }

            #chatbot-toggle {
                right: 20px;
                bottom: 20px;
                width: 65px;
                height: 65px;
                font-size: 28px;
            }

            #chat-content {
                height: 320px;
                padding: 20px;
            }

            .chat-header {
                padding: 20px;
            }

            #chat-input-area {
                padding: 20px;
            }
        }

        /* chat bot ending */
        /* Demo page styling */
        .demo-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .demo-title {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .demo-subtitle {
            color: #6c757d;
            font-size: 1.2rem;
            margin-bottom: 3rem;
        }

        .demo-note {
            background: rgba(2, 140, 204, 0.1);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 2rem;
            border: 1px solid rgba(2, 140, 204, 0.2);
        }


        .swiper-pagination-bullets .swiper-pagination-bullet.swiper-pagination-bullet-active {
            background-color: #000000;

            border-color: #000000;

        }

        .swiper-pagination-bullets .swiper-pagination-bullet {
            border-color: #000000;
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
                                    style="font-family: 'Roboto', sans-serif;  font-size: clamp(1.125rem, 2.5vw, 1.5rem);  font-weight: 400; color: ">

                                    Where every trip becomes a story worth remembering
                                </span>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s"
                                    style="  font-family: 'Poppins', sans-serif;font-size: clamp(2.5rem, 5vw, 4rem);font-weight: 700; color: #ffffff;">
                                    Let us take you beyond the ordinary
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
                                    style="font-family: 'Roboto', sans-serif;  font-size: clamp(1.125rem, 2.5vw, 1.5rem);  font-weight: 400; color: ">
                                    Travel smarter. Travel further. Travel with us.
                                </span>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s"
                                    style="  font-family: 'Poppins', sans-serif;font-size: clamp(2.5rem, 5vw, 4rem);font-weight: 700; color: #ffffff;">

                                    Your next getaway is just a flight away
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
                                    <select id="serviceSelect" class="custom-select px-4" style="height: 55px;color:#000;">
                                        <option selected disabled>Services</option>
                                        <option value="inbound">Inbound Tour</option>
                                        {{-- <option value="outbound">Outbound Tour</option> --}}
                                        <option value="airport">Vehicle Rental </option>
                                        <option value="rent">Transportaion</option>
                                        <option value="tickets">Air Ticketing</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 mb-md-0">
                                    <div class="input-group">
                                        <input type="text" id="departDate" class="form-control p-4 bg-white"
                                            style="box-shadow:none; border: 1px solid #ced4da;color:#000 !important; font-size: 1rem;font-weight: 400;border-radius: 0;height: 56px;font-family:'Inter', sans-serif !important;"
                                            placeholder="Departure Date" style="  height: 56px;">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-white" style="height: 56px; "><i
                                                    class="fa fa-calendar-alt" style="color:#000;"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3 mb-md-0">
                                    <div class="input-group">
                                        <input type="text" id="returnDate" class="form-control p-4 bg-white"
                                            placeholder="Return Date"
                                            style="box-shadow:none; border: 1px solid #ced4da;color:#000; font-size: 1rem;font-weight: 400;border-radius: 0;height: 56px;font-family:'Inter', sans-serif !important;">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-white " style="height: 56px;"><i
                                                    class="fa fa-calendar-alt" style="color:#000;"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="form-btn col-md-12 col-lg-auto text-center text-lg-start mt-3 mt-lg-0">
                        <button class="custom-btn" type="button" id="getQuoteBtn" style="height: 56px;">Explore
                            Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Tour Packagen Outbound -->
    {{-- <section class="position-relative bg-top-center overflow-hidden space tour-margin " id="service-sec" style="">
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
                                            <div class="tour-box style2 th-ani shadow"
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
    </section> --}}

    <!-- Tour Package Inbound -->
    <section class="position-relative  overflow-hidden space tour-margin-inbound " id="service-sec" data-bg-src=""
        style="margin-top: -270px;">


        <div class="container-fluid tour-margin-inbound" style="">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="title-area text-center inbound-title">
                        <span class="sub-title"
                            style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Inbound
                            Tours</span>
                        <h2 class="sec-title"
                            style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;margin-bottom: 0.5rem;">
                            Discover the Wonders of Sri Lanka </h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
                            <div class="slider-area tour-slider slider-drag-wrap position-relative">
                                <div class="swiper-button-prev-inbound ">
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
                                                <a href="{{ route('tour.details', $inboundPackage->id) }}"
                                                    class="tour-box-link" style="text-decoration: none; color: inherit;">
                                                    <div class="tour-box style2 th-ani shadow"
                                                        style="cursor: pointer; transition: transform 0.3s ease; border-radius: 0px; overflow: hidden; min-height: 320px; position: relative;border-radius: 10px;">

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
                                                            <img src="{{ $imageUrl }}"
                                                                alt="{{ $inboundPackage->place }}"
                                                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 0px;">
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
                                                            <p class="text-dark  small mt-1 mb-1"
                                                                style="line-height: 1.4; max-height: 40px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                                {{ Str::limit($inboundPackage->description, 90) }}
                                                           </p>


                                                            <a href="{{ route('tour.details', $inboundPackage->id) }}"
                                                                class="small"
                                                                style="font-weight: 500; color:#3596d3;">View More</a>
                                                        </div>

                                                        <!-- Tour Info -->
                                                        <div class="d-flex align-items-center justify-content-between"
                                                            style="margin-bottom: 5px; padding-right: 15px; padding-left: 15px; padding-bottom: 15px;">

                                                            <div class="price-info">
                                                                <span class="text-dark" style="font-weight: bold;">
                                                                    USD {{ number_format($inboundPackage->price, 0) }}
                                                                </span>

                                                            </div>

                                                            <span class="text-dark" style="font-weight: bold;">
                                                                {{ $inboundPackage->days }} Days,
                                                                {{ $inboundPackage->nights }} Nights
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach



                                    </div>
                                    {{-- <div class="slider-pagination" style="margin-top: 20px;margin-bottom: 58px;"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center ">
                <a href="{{ url('/inbound-tours') }}" class="th-btn "
                    style=" background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%); color: white; margin-top: 40px;">
                    Show More
                </a>
            </div>

    </section>


    <section id="transportation" class="py-5 bg-smoke map-section" style="margin-bottom: 70px; margin-top: 30px;">
        <div class="container-fluid">


            <!-- Title Section with improved typography -->
            <div class="title-area text-center mb-5" style="">
                <span class="sub-title"
                    style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Travel
                    Sri Lanka</span>
                <h2 class="sec-title"
                    style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;margin-bottom: 0.5rem;">
                    Transport Solutions </h2>
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
                                    style="background: linear-gradient(135deg, #f6faff 0%, #ddeeff 100%); border-radius: 16px; padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); position: relative; text-align: center;">
                                    <div class="content-overlay d-flex flex-column align-items-center">
                                        <div class="icon-container mb-4"
                                            style="width: 70px; height: 70px; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-car" style="font-size: 28px; color: #3498db;"></i>
                                        </div>
                                        <h3 style="font-size: 21px; font-weight: 700; color: #333;">Airport Pickups
                                        </h3>
                                        <p style="font-size: 15px; color: #555;">
                                            Hassle-free airport transfers anytime. We monitor your flight and ensure
                                            prompt, reliable rides.
                                        </p>
                                    </div>
                                    <div class="decorative-shape"
                                        style="position: absolute; top: -15px; right: -15px; width: 100px; height: 100px; border-radius: 50%; border-radius: 50%; background-color: rgba(52, 152, 219, 0.07); z-index: 1;">
                                    </div>
                                </div>
                            </div>

                            <!-- Service Box 2 -->
                            <div class="col-12 d-flex">
                                <div class="service-box h-100 shadow"
                                    style="background: linear-gradient(135deg, #f6faff 0%, #ddeeff 100%); border-radius: 16px; padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); position: relative;">
                                    <div class="content-overlay d-flex flex-column align-items-center">
                                        <div class="icon-container mb-4"
                                            style="width: 70px; height: 70px; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-shield-alt" style="font-size: 28px; color: #3498db;"></i>
                                        </div>
                                        <h3 style="font-size: 21px; font-weight: 700; color: #333;">Safe & Reliable
                                        </h3>
                                        <p class="text-center" style="font-size: 15px; color: #555;">
                                            Certified service with insured, well-maintained vehicles and licensed,
                                            professional drivers.
                                        </p>
                                    </div>
                                    <div class="decorative-shape"
                                        style="position: absolute; bottom: -20px; left: -20px; width: 120px; height: 120px; border-radius: 50%; border-radius: 50%; background-color: rgba(52, 152, 219, 0.07); z-index: 1;">
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
                                    style="background: linear-gradient(135deg, #f6faff 0%, #ddeeff 100%); border-radius: 16px; padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); position: relative;">
                                    <div class="content-overlay d-flex flex-column align-items-center">
                                        <div class="icon-container mb-4"
                                            style="width: 70px; height: 70px; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-credit-card" style="font-size: 28px; color: #3498db;"></i>
                                        </div>
                                        <h3 style="font-size: 21px; font-weight: 700; color: #333;">Booking Made Easy
                                        </h3>
                                        <p class="text-center" style="font-size: 15px; color: #555;">
                                            Simple booking with flexible hourly or distance-based packages tailored to
                                            your journey.
                                        </p>
                                    </div>
                                    <div class="decorative-shape"
                                        style="position: absolute; top: -15px; left: -15px; width: 100px; height: 100px; border-radius: 50%; border-radius: 50%; background-color: rgba(52, 152, 219, 0.07);z-index: 1;">
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
                                        <h3 style="font-size: 21px; font-weight: 700; color: #333;">Experienced Drivers
                                        </h3>
                                        <p class="text-center" style="font-size: 15px; color: #555;">
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
                    style=" background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%); color: white;">
                    Show More
                </a>
            </div>
        </div>
    </section>


    <!-- Rent vehicles -->
    <section class="position-relative bg-top-center  overflow-hidden space" id="service-sec"
        style="margin-top: -75px; padding-bottom: 52px;">
        <div class="bg-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;">
        </div>

        <div class="container position-relative" style="z-index: 1;">
            <!-- Title Section with improved typography -->
            <div class="title-area text-center mb-5" style="margin-top: -75px;">
                <span class="sub-title"
                    style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Premium
                    Car Rentals</span>
                <h2 class="sec-title"
                    style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;margin-bottom: 0.5rem;">
                    Find Your Perfect Ride </h2>
            </div>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-step1" role="tabpanel" style="margin-top: -20px;">
                    <div class="slider-area tour-slider slider-drag-wrap">

                        <!-- Navigation Buttons with improved styling -->
                        <div class="swiper-button-prev-rental"
                            style="background-color: rgba(255, 252, 252, 0.1); width: 54px; height: 54px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;  backdrop-filter: blur(5px);">
                            <i class="fas fa-chevron-left" style="color: #000000; font-size: 20px;"></i>
                        </div>
                        <div class="swiper-button-next-rental"
                            style="background-color: rgba(255, 255, 255, 0.1); width: 54px; height: 54px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; backdrop-filter: blur(5px);">
                            <i class="fas fa-chevron-right" style="color: #000000; font-size: 20px;"></i>
                        </div>

                        <!-- Swiper Container with enhanced styling -->
                        <div class="swiper th-slider "
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
                                            style="background: linear-gradient(135deg, #071f2b 0%, #000000 100%);   overflow: hidden; margin: 10px; transition: all 0.3s ease; position: relative; padding: 30px;  border: 1px solid rgba(0,162,255,0.1);">

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
                                                        style="position: absolute; width: 300px; height: 300px; border-radius: 50%; z-index: 1;">
                                                    </div>

                                                    <img src="{{ $vehicle->image ? asset('storage/' . $vehicle->image) : asset('assets/img/bike3.png') }}"
                                                        alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                                        style="width: 100%; max-width: auto; height: 350px; object-fit: contain; z-index: 2; transform: scale(1.1); transition: transform 0.5s ease; ">
                                                </div>


                                                <div class="price-features-section"
                                                    style="flex: 1; padding-left: 20px; display: flex; align-items: center; justify-content: center;">


                                                    <div class="demo-container">
                                                        <div
                                                            style="position: absolute; text-align: center; right: 12px; background: rgba(5, 150, 105, 0.95); color: white; padding: 15px 20px; border-radius: 60px; font-size: 14px; font-weight: 800; backdrop-filter: blur(10px); box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                                                            <span style="font-size: 28px;">$ {{ $vehicle->price }}</span>
                                                            <span style="font-size: 12px; opacity: 0.9;">/ day</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Specifications Section -->
                                            <!-- Specifications Section -->
                                            <div class="specification priority-mobile"
                                                style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-top: 40px; padding: 20px;  box-shadow: 0 8px 20px rgba(0,0,0,0.2);  background-color: rgba(0, 0, 0, 0.6);">

                                                <!-- Helmets -->
                                                <div class="specification-item"
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; text-align: left; font-family: 'Nunito Sans', sans-serif; color: #00A2FF; font-weight: 700; font-size: 18px;">
                                                    <i class="fas fa-helmet-safety"
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; "></i>
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
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; "></i>
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
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center;"></i>
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
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center;"></i>
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



            <div class="text-center  " style="margin-top:40px;">
                <a href="{{ url('/rent') }}" class="th-btn"
                    style="background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);  color: white;">
                    Show More
                </a>
            </div>
        </div>
    </section>
    <!-- Ari Line -->

    <section class=" overflow-hidden space bg-smoke" id="blog-sec">
        <div class="container-fluid">
            <div class="mb-30 text-center text-md-start" style="margin-top: -60px;">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-7 airlin-mob">
                        <div class="title-area mb-md-0 alirlin-title">
                            {{-- <span class="sub-title" style="color: #AAAAAA;">Airline Tickets</span>
                                <h2 class="sec-title"  style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #ffffff; margin-bottom: 20px; text-shadow: 0 2px 15px rgba(0,162,255,0.3);">Your Gateway to the World</h2> --}}
                            <span class="sub-title "
                                style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Airline
                                Ticket</span>
                            <h2 class="sec-title"
                                style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;margin-bottom: 0.5rem;">
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
                                        <img class="original" src="assets/img/airline/Air Asia.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Air Asia.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Air India.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Air India.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Air Arabia.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Air Arabia.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/azur air.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/azur air.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div> --}}
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Air China.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Air China.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Emirates.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Emirates.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Etihad.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Etihad.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Fits Air.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Fits Air.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/fly Dubai.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/fly dubai.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>

                            {{-- <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/indigo.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/indigo.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div> --}}

                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Jazeera Airways.png"
                                            alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Jazeera Airways.png"
                                            alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Malaysia Airlines.png"
                                            alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Malaysia Airlines.png"
                                            alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Qatar Airways.png"
                                            alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Qatar Airways.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Salam Air.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Salam Air.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/seychelle.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/seychelle.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div> --}}
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Singapore Airlines.png"
                                            alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Singapore Airlines.png"
                                            alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Sri Lankan Airlines.png"
                                            alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Sri Lankan Airlines.png"
                                            alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/Thai Airways.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/Thai Airways.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="swiper-slide">
                                <div class="brand-box">
                                    <a href="">
                                        <img class="original" src="assets/img/airline/turkish.png" alt="Brand Logo">
                                        <img class="gray" src="assets/img/airline/turkish.png" alt="Brand Logo">
                                    </a>
                                </div>
                            </div> --}}

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
        <div class="container-fluid">
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
                                    @foreach ($testimonials as $testimonial)
                                        <div class="swiper-slide">
                                            <div class="testimonial-card card h-100">
                                                <div class="card-body" style="height: 240px;">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <img src="{{ $testimonial->image ? 'https://test.admin/' . $testimonial->image : 'https://ui-avatars.com/api/?name=' . urlencode($testimonial->name) . '&background=random' }}"
                                                            class="avatar rounded-circle me-3"
                                                            alt="{{ $testimonial->name }}" style="height: 48px;">
                                                        <div>
                                                            <h6 class="mb-0">{{ $testimonial->name }}</h6>
                                                            <small class="text-muted">
                                                                <i
                                                                    class="bi bi-{{ strtolower($testimonial->source) }} me-1"></i>
                                                                {{ $testimonial->source }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="stars mb-3">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i
                                                                class="bi {{ $i <= $testimonial->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                                        @endfor
                                                    </div>
                                                    <p class="review-text">"{{ $testimonial->message }}"</p>
                                                    <small class="text-muted">Posted on:
                                                        {{ \Carbon\Carbon::parse($testimonial->postedate)->format('M d, Y') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Pagination -->
                                <div class="slider-pagination mt-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div id="chatbot-container">
        <!-- Floating Toggle Button -->
        <div id="chatbot-toggle">
            💬
        </div>

        <!-- Chatbot Window -->
        <div id="chatbot-box">
            <div class="chat-header">
                <h3
                    style="display: flex; align-items: center; justify-content: center; gap: 10px; margin: 0;color:#fff;font-size:22px;  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    {{-- <img src="/assets/img/chatbot.png" alt="Assistant"
                        style="height: 28px; color: #ffff; margin-top: 6px;"> --}}
                    Tour Assistant
                </h3>

            </div>

            <div id="chat-content">
                <div class="message">
                    <div class="bot-message" style=" font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                        👋 Hi there! I'm your personal tour assistant. How can I help you plan your perfect trip today?
                    </div>
                </div>
            </div>

            <div id="chat-input-area">
                <input type="text" id="chat-input" placeholder="Type your message..." autocomplete="off">
                <button id="send-btn">➤</button>
            </div>

            <!-- Hidden Form -->
            <div id="user-form" class="form-container" style="display: none;">
                <h4>Contact Information</h4>
                <input type="text" id="name" placeholder="Your Name" class="form-control mb-2">
                <input type="email" id="email" placeholder="Your Email" class="form-control mb-2">
                <input type="text" id="phone" placeholder="Your Phone" class="form-control mb-2">
                <button id="submit-form" class="btn btn-primary w-100">Submit Information</button>
            </div>

            <!-- Hidden Service Selection -->
            <div id="service-options" class="service-grid" style="display: none;">
                <h4 style="text-align: center; color: #2c3e50; margin-bottom: 15px;"> Choose Your Service</h4>
                <button class="btn btn-outline-primary w-100 my-1 service-btn service-card" data-service="Inbound Tour">
                    Inbound Tour
                </button>
                <button class="btn btn-outline-primary w-100 my-1 service-btn service-card" data-service="Outbound Tour">
                    Outbound Tour
                </button>
                <button class="btn btn-outline-primary w-100 my-1 service-btn service-card" data-service="Rent Vehicle">
                    Rent Vehicle
                </button>
                <button class="btn btn-outline-primary w-100 my-1 service-btn service-card" data-service="Transportation">
                    Transportation
                </button>
                <button class="btn btn-outline-primary w-100 my-1 service-btn service-card" data-service="Airline">
                    Airline Services
                </button>
            </div>
        </div>

    </div>
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
        document.getElementById('getQuoteBtn').addEventListener('click', function() {
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




    <script>
        // Chatbot functionality
        const toggleBtn = document.getElementById('chatbot-toggle');
        const chatBox = document.getElementById('chatbot-box');
        const chatInput = document.getElementById('chat-input');
        const sendBtn = document.getElementById('send-btn');
        const chatContent = document.getElementById('chat-content');
        const userForm = document.getElementById('user-form');
        const serviceOptions = document.getElementById('service-options');
        const chatInputArea = document.getElementById('chat-input-area');

        let isOpen = false;
        let currentStep = 'chat';
        let selectedService = '';

        // Toggle chatbot
        toggleBtn.addEventListener('click', () => {
            isOpen = !isOpen;
            if (isOpen) {
                chatBox.classList.add('show');
                toggleBtn.classList.add('active');
                chatInput.focus();
            } else {
                chatBox.classList.remove('show');
                toggleBtn.classList.remove('active');
            }
        });

        // Send message
        function sendMessage() {
            const message = chatInput.value.trim();
            if (message) {
                addMessage(message, 'user');
                chatInput.value = '';
                simulateTyping();

                setTimeout(() => {
                    removeTyping();
                    handleBotResponse(message);
                }, 1500);
            }
        }

        // Add message to chat
        function addMessage(message, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message';
            messageDiv.innerHTML = `<div class="${sender}-message">${message}</div>`;
            chatContent.appendChild(messageDiv);
            chatContent.scrollTop = chatContent.scrollHeight;
        }

        // Simulate typing indicator
        function simulateTyping() {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'typing-indicator';
            typingDiv.innerHTML = `
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            `;
            chatContent.appendChild(typingDiv);
            chatContent.scrollTop = chatContent.scrollHeight;
        }

        function removeTyping() {
            const typing = document.querySelector('.typing-indicator');
            if (typing) {
                typing.remove();
            }
        }

        // Handle bot responses
        function handleBotResponse(userMessage) {
            const responses = [
                "That sounds interesting! I'd love to help you plan your adventure. Would you like to see our available services?",
                "Great question! Let me show you what we can offer. Shall we start with our service options?",
                "I'm here to help make your travel dreams come true! Would you like to explore our tour packages?",
                "Perfect! I can assist you with that. Let me show you our available services first."
            ];

            const randomResponse = responses[Math.floor(Math.random() * responses.length)];
            addMessage(randomResponse, 'bot');

            setTimeout(() => {
                showServiceOptions();
            }, 1000);
        }

        // Show service options
        function showServiceOptions() {
            chatInputArea.style.display = 'none';
            serviceOptions.style.display = 'block';
            currentStep = 'service';
        }

        // Show user form
        function showUserForm() {
            serviceOptions.style.display = 'none';
            userForm.style.display = 'block';
            currentStep = 'form';
        }

        // Event listeners
        sendBtn.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // Service selection
        document.querySelectorAll('.service-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const service = e.target.getAttribute('data-service');
                selectedService = service;
                addMessage(`I'm interested in ${service}`, 'user');
                simulateTyping();

                setTimeout(() => {
                    removeTyping();
                    addMessage(
                        `Excellent choice! ${service} is one of our most popular services. To provide you with the best assistance, I'll need some contact information.`,
                        'bot');
                    showUserForm();
                }, 1500);
            });
        });

        // Form submission
        document.getElementById('submit-form').addEventListener('click', () => {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phoneRegex = /^[0-9]{9,12}$/;

            if (!name) {
                addMessage('Please enter your name.', 'bot');
                return;
            }
            if (!email || !emailRegex.test(email)) {
                addMessage('Please enter a valid email address.', 'bot');
                return;
            }
            if (!phone || !phoneRegex.test(phone)) {
                addMessage('Please enter a valid phone number (digits only, 9–12 characters).', 'bot');
                return;
            }

            // Show loading state
            const submitBtn = document.getElementById('submit-form');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Submitting...';
            submitBtn.disabled = true;

            const formData = {
                name: name,
                email: email,
                phone: phone,
                service: selectedService
            };

            addMessage(`Name: ${name}, Email: ${email}, Phone: ${phone}`, 'user');
            simulateTyping();

            fetch('/chatbot/save', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                            'content') || '',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    setTimeout(() => {
                        removeTyping();
                        if (data.success) {
                            addMessage(
                                `Thank you ${name}! 🎉 Your information has been successfully saved. Our team will contact you within 24 hours to discuss your ${selectedService} plans.`,
                                'bot');
                        } else {
                            addMessage(
                                `Thank you ${name}! Your request has been received. Our team will get back to you soon!`,
                                'bot');
                        }
                        resetForm();
                    }, 1500);
                })
                .catch(error => {
                    console.error('Error:', error);
                    setTimeout(() => {
                        removeTyping();
                        addMessage(
                            `Thank you ${name}! Your information has been received. If you don't hear from us within 24 hours, feel free to contact us directly.`,
                            'bot');
                        resetForm();
                    }, 1500);
                });
        });

        // Reset form function
        function resetForm() {
            const submitBtn = document.getElementById('submit-form');
            submitBtn.textContent = 'Submit Information';
            submitBtn.disabled = false;

            userForm.style.display = 'none';
            chatInputArea.style.display = 'flex';
            currentStep = 'chat';
            selectedService = '';

            // Clear form fields
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('phone').value = '';
        }

        // Add pulse animation to toggle button
        setInterval(() => {
            if (!isOpen) {
                toggleBtn.classList.add('pulse');
                setTimeout(() => {
                    toggleBtn.classList.remove('pulse');
                }, 2000);
            }
        }, 10000);

        document.addEventListener('click', function(event) {
            const isClickInside = chatBox.contains(event.target) || toggleBtn.contains(event.target);

            if (!isClickInside && isOpen) {
                chatBox.classList.remove('show');
                toggleBtn.classList.remove('active');
                isOpen = false;
            }
        });

        window.addEventListener('load', () => {
            setTimeout(() => {
                if (!isOpen) {
                    isOpen = true;
                    chatBox.classList.add('show');
                    toggleBtn.classList.add('active');
                    chatInput.focus();
                }
            }, 5000); // 5000 ms = 5 seconds
        });
    </script>


@endsection
