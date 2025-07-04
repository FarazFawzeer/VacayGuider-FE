@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .breadcrumb-item {
            transition: all 0.2s ease-in-out;
        }

        .breadcrumb-item:hover {
            transform: translateY(-1px);
        }

        .current-page {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 640px) {
            .breadcrumb-mobile {
                overflow-x: auto;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            .breadcrumb-mobile::-webkit-scrollbar {
                display: none;
            }
        }
    </style>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap');



        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        .wk-desk-1 {
            width: 8.333333%;
        }

        .wk-desk-2 {
            width: 16.666667%;
        }

        .wk-desk-3 {
            width: 25%;
        }

        .wk-desk-4 {
            width: 33.333333%;
        }

        .wk-desk-5 {
            width: 41.666667%;
        }

        .wk-desk-6 {
            width: 50%;
        }

        .wk-desk-7 {
            width: 58.333333%;
        }

        .wk-desk-8 {
            width: 66.666667%;
        }

        .wk-desk-9 {
            width: 75%;
        }

        .wk-desk-10 {
            width: 83.333333%;
        }

        .wk-desk-11 {
            width: 91.666667%;
        }

        .wk-desk-12 {
            width: 100%;
        }

        @media (max-width: 1024px) {
            .wk-ipadp-1 {
                width: 8.333333%;
            }

            .wk-ipadp-2 {
                width: 16.666667%;
            }

            .wk-ipadp-3 {
                width: 25%;
            }

            .wk-ipadp-4 {
                width: 33.333333%;
            }

            .wk-ipadp-5 {
                width: 41.666667%;
            }

            .wk-ipadp-6 {
                width: 50%;
            }

            .wk-ipadp-7 {
                width: 58.333333%;
            }

            .wk-ipadp-8 {
                width: 66.666667%;
            }

            .wk-ipadp-9 {
                width: 75%;
            }

            .wk-ipadp-10 {
                width: 83.333333%;
            }

            .wk-ipadp-11 {
                width: 91.666667%;
            }

            .wk-ipadp-12 {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .wk-tab-1 {
                width: 8.333333%;
            }

            .wk-tab-2 {
                width: 16.666667%;
            }

            .wk-tab-3 {
                width: 25%;
            }

            .wk-tab-4 {
                width: 33.333333%;
            }

            .wk-tab-5 {
                width: 41.666667%;
            }

            .wk-tab-6 {
                width: 50%;
            }

            .wk-tab-7 {
                width: 58.333333%;
            }

            .wk-tab-8 {
                width: 66.666667%;
            }

            .wk-tab-9 {
                width: 75%;
            }

            .wk-tab-10 {
                width: 83.333333%;
            }

            .wk-tab-11 {
                width: 91.666667%;
            }

            .wk-tab-12 {
                width: 100%;
            }
        }

        @media (max-width: 500px) {
            .wk-mobile-1 {
                width: 8.333333%;
            }

            .wk-mobile-2 {
                width: 16.666667%;
            }

            .wk-mobile-3 {
                width: 25%;
            }

            .wk-mobile-4 {
                width: 33.333333%;
            }

            .wk-mobile-5 {
                width: 41.666667%;
            }

            .wk-mobile-6 {
                width: 50%;
            }

            .wk-mobile-7 {
                width: 58.333333%;
            }

            .wk-mobile-8 {
                width: 66.666667%;
            }

            .wk-mobile-9 {
                width: 75%;
            }

            .wk-mobile-10 {
                width: 83.333333%;
            }

            .wk-mobile-11 {
                width: 91.666667%;
            }

            .wk-mobile-12 {
                width: 100%;
            }
        }

        .icon-block svg {
            width: 100%;
            height: 100%;
        }

        * {
            font-family: Nunito, sans-serif;
        }

        .team-cards-inner-container {
            display: flex;
            row-gap: 1.3rem;
            column-gap: 1.3rem;
        }

        .text-blk {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            line-height: 25px;
        }

        .responsive-cell-block {
            min-height: 75px;
        }

        .responsive-container-block {
            min-height: 75px;
            height: fit-content;
            width: 100%;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            display: flex;
            flex-wrap: wrap;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            justify-content: flex-start;
        }

        .inner-container {
            max-width: 1200px;
            min-height: 92vh;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            justify-content: center;
        }

        .section-head {
            font-size: 60px;
            line-height: 70px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 24px;
            margin-left: 0px;
        }

        .section-body {
            font-size: 14px;
            line-height: 18px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 64px;
            margin-left: 0px;
        }

        .team-cards-outer-container {
            display: flex;
            align-items: center;
        }

        .content-container {
            display: flex;
            justify-content: flex-start;
            flex-direction: row;
            align-items: center;
            padding-top: 0px;
            padding-right: 25px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .img-box {
            max-width: 130px;
            max-height: 130px;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: hidden;
            margin-top: 0px;
            margin-right: 25px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .card {
            background-color: #f8f9fa;
            display: flex;
            padding-top: 16px;
            padding-right: 16px;
            padding-bottom: 16px;
            padding-left: 16px;
            box-shadow: rgba(95, 95, 95, 0.1) 6px 12px 24px;
            flex-direction: row;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .card-container {
            max-width: 350px;
        }

        .card-content-box {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .person-name {
            font-size: 16px;
            font-weight: 700;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 5px;
            margin-left: 0px;
        }

        .person-info {
            font-size: 14px;
            line-height: 15px;
        }

        .card-container {
            max-width: 350px;
        }

        .outer-container {
            justify-content: center;
            padding-top: 0px;
            padding-right: 50px;
            padding-bottom: 0px;
            padding-left: 50px;

        }

        .person-img {
            width: 100%;
            height: 100%;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
            border-bottom-left-radius: 6px;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0px);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0px);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }
        }

        @media (max-width: 1024px) {
            .team-card-container {
                justify-content: center;
            }

            .section-head {
                font-size: 50px;
                line-height: 55px;
            }

            .img-box {
                max-width: 109px;
                max-height: 109px;
            }

            .content-container {
                padding-top: 0px;
                padding-right: 20px;
                padding-bottom: 0px;
                padding-left: 0px;
            }

            .inner-container {
                justify-content: space-evenly;
            }
        }

        @media (max-width: 768px) {
            .inner-container {
                margin-top: 60px;
                margin-right: 0px;
                margin-bottom: 60px;
                margin-left: 0px;
            }

            .section-body {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
            }

            .img-box {
                margin-top: 0px;
                margin-right: 30px;
                margin-bottom: 0px;
                margin-left: 0px;
            }

            .content-box {
                text-align: center;
            }

            .content-container {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 30px;
                margin-left: 0px;
            }

            .card-container {
                max-width: 45%;
            }

            .team-cards-inner-container {
                justify-content: center;
            }
        }

        @media (max-width: 500px) {
            .outer-container {
                padding-top: 0px;
                padding-right: 60px;
                padding-bottom: 0px;
                padding-left: 60px;
            }

            .section-head {
                font-size: 40px;
                line-height: 45px;
            }

            .content-box {
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
            }

            .section-body {
                font-size: 12px;
            }

            .img-box {
                max-width: 68px;
                max-height: 68px;
            }

            .person-name {
                font-size: 14px;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 1px;
                margin-left: 0px;
            }

            .content-box {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 46px;
                margin-left: 0px;
                text-align: left;
            }

            .content-container {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
            }

            .card-container {
                max-width: 100%;
            }
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

        .testimonials-section {
            background-color: var(--secondary);
            background: url(https://i.ibb.co/PTJDkgb/testimonials.jpg);
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

        .th-btn:hover {
            background-color: #60D522 !important;
            color: white !important;
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

        /*

                .space, .space-top {
                  padding-top: 20px;
                } */
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
            background: linear-gradient(45deg, #feb47b, #ff7e5f);
            /* Reverse gradient */
            transform: translateY(-3px);
            /* Slight lift effect */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .box-title a {
            font-size: 16px;
        }

        .custom-btn:active {
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
            color: rgb(251, 207, 0);
            margin-left: 2px;
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
            border-radius: 0px;
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
            font-size: 25px;
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

        @media (max-width: 768px) {
            .review-summary {
                margin-bottom: 2rem;
            }

            .testimonial-card {
                margin-bottom: 1rem;
            }
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


        breadcumb-wrapper {
            position: relative;
            background-image: url('assets/img/hero/carousel-2.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
        }

        .breadcumb-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Adjust this for darker/lighter effect */
            z-index: 1;
        }

        .breadcumb-content {
            position: relative;
            z-index: 2;
            /* Ensures text stays on top */
        }

        .breadcumb-title {
            font-size: 36px;
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.6);
            /* Highlights text */
        }

        .breadcumb-menu li a,
        .breadcumb-menu li {
            font-size: 18px;
            color: white !important;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.8);
            /* Highlights menu text */
        }

        .section-title {
            position: relative;
            display: inline-block;
            text-transform: uppercase;
            font-size: 16px;
        }

        .h1 {
            font-family: "Nunito", sans-serif;
            font-size: 34px !important;
        }

        .counter-card {
            margin-top: 36px;
        }

        .vision-box:hover,
        .mission-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        @media (max-width: 991px) {

            .vision-box,
            .mission-box {
                margin-bottom: 25px;
            }
        }
    </style>

    {{-- <div class="container-fluid about-hero text-white position-relative"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/img/avenue-815297_1920.jpg') center center / cover no-repeat; 
     display: flex;
     align-items: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-style7">
                        <span class="sub-title style1 text-white d-block mb-2">About Us</span>
                        <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">To Tourist</h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Simple Professional Breadcrumb -->
    <div class="w-full ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="py-3">
                <nav aria-label="Breadcrumb navigation" class="breadcrumb-mobile">
                    <ol class="flex items-center space-x-1 text-sm font-medium">
                        <!-- Home Link -->
                        <li class="flex items-center">
                            <a href="{{ url('/') }}"
                                class="breadcrumb-item group flex items-center space-x-2 text-gray-500 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 rounded-lg px-2 py-1.5 transition-all duration-200">
                                <!-- Home Icon -->
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="group-hover:text-blue-600">Home</span>
                            </a>
                        </li>

                        <!-- Separator -->
                        <li class="flex items-center">
                            <svg class="w-3 h-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </li>

                        <!-- Current Page -->
                        <li class="flex items-center">
                            <span
                                class="current-page flex items-center space-x-1.5 text-gray-800 font-semibold px-3 py-1.5 rounded-md border border-gray-200"
                                aria-current="page">
                                <!-- About Icon -->
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>About Us</span>
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>





    <section class="counter-section " id="about" style="margin-top: -10px;">
        <div class="container">

            <div class="row vertical_content_manage mt-5">
                <div class="title-area text-center " style="">
                    <h2 class="sec-title"
                        style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Explore the World with Vacay Guider </h2>
                </div>

                <div class="col-lg-12" style="margin-top: -25px;">
                    <div class="about_header_main ">
                        {{-- <h4 class="about_heading text-capitalize text-center font-weight-bold mt-4">
                                    Explore the World with Vacay Guider
                                </h4>  --}}

                        <!-- <h1 class="mb-4 text-center" style="font-size:34px;">Welcome to Tourist</h1> -->
                        <p class="text-center ">
                            Welcome to <strong><span style="color: #94d106 !important;">Vacay</span> <span
                                    style="color:#028ccc !important;">Guider</span>
                            </strong>, your passport to extraordinary worldwide journeys. With over five years of certified
                            travel expertise, we specialize in crafting bespoke vacations that turn fleeting moments into
                            timeless memories. As award-winning global travel designers, we pride ourselves on delivering
                            seamless, personalized experiences that go beyond ordinary tourism – because every traveler
                            deserves a journey as unique as they are.
                        </p>
                        <p class="text-center mt-3">
                            At <strong><span style="color: #94d106 !important;">Vacay</span> <span
                                    style="color:#028ccc !important;">Guider</span>
                            </strong>, we design complete travel experiences from custom tour packages and air ticketing to
                            visa assistance, hotel bookings, airport transfers, car rentals, and travel insurance. Whether
                            you crave luxury escapes, cultural adventures, or family getaways, our end-to-end solutions
                            handle every detail. Relax knowing your journey is expertly planned, perfectly executed, and
                            fully protected.
                        </p>




                        <div class="text-center">
                            <p class="mt-3 text-muted">
                                To ensure a seamless and stress-free travel experience, we offer a wide range of reliable
                                services, including: 1. Custom Tour Packages – Experiences tailored to your interests 2. Air
                                Ticketing – Hassle-free booking to your dream destinations 3. Visa Assistance – Expert help
                                with travel documentation 4. Hotel Booking – Handpicked stays to suit your preferences and
                                budget 5. Airport Transportation – Smooth and punctual airport transfers 6. Car Rental
                                Services – Flexible options to suit your travel needs 7. Travel Insurance – Coverage for
                                peace of mind on every trip

                            </p>
                        </div>

                        <div class="text-center">
                            <p class="mt-3 text-muted">
                                We’re not just planners – we’re your travel storytellers. With meticulous attention to
                                detail and insider knowledge, we design soul-stirring journeys where every element sparks
                                joy. Ready to experience stress-free travel? Contact us today and let’s create your perfect
                                getaway together.

                            </p>
                        </div>






                    </div>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="vision-mission-container" style="padding: 40px 0; font-family: 'Poppins', sans-serif;">
                <div class="row g-4" style="margin: 0;">
                    <!-- Vision Box -->
                    <div class="col-lg-6">
                        <div class="vision-box h-100"
                            style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%); border-radius: 16px; padding: 40px 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); position: relative; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s;">
                            <div class="content-overlay" style="position: relative; z-index: 2;">
                                <div class="icon-container mb-4"
                                    style="width: 80px; height: 80px; margin: 0 auto; background-color: rgba(255, 255, 255, 0.6); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 5C12.5523 5 13 4.55228 13 4C13 3.44772 12.5523 3 12 3C11.4477 3 11 3.44772 11 4C11 4.55228 11.4477 5 12 5Z"
                                            fill="#2E7D32" />
                                        <path
                                            d="M12 22C11.4477 22 11 21.5523 11 21C11 20.4477 11.4477 20 12 20C12.5523 20 13 20.4477 13 21C13 21.5523 12.5523 22 12 22Z"
                                            fill="#2E7D32" />
                                        <path
                                            d="M17.6569 6.34315C18.0474 5.95262 18.0474 5.31946 17.6569 4.92893C17.2664 4.53841 16.6332 4.53841 16.2427 4.92893C15.8522 5.31946 15.8522 5.95262 16.2427 6.34315C16.6332 6.73367 17.2664 6.73367 17.6569 6.34315Z"
                                            fill="#2E7D32" />
                                        <path
                                            d="M4.92893 19.0711C4.53841 18.6805 4.53841 18.0474 4.92893 17.6569C5.31946 17.2663 5.95262 17.2663 6.34315 17.6569C6.73367 18.0474 6.73367 18.6805 6.34315 19.0711C5.95262 19.4616 5.31946 19.4616 4.92893 19.0711Z"
                                            fill="#2E7D32" />
                                        <path
                                            d="M19 12C19 11.4477 18.5523 11 18 11C17.4477 11 17 11.4477 17 12C17 12.5523 17.4477 13 18 13C18.5523 13 19 12.5523 19 12Z"
                                            fill="#2E7D32" />
                                        <path
                                            d="M3 12C3 11.4477 3.44772 11 4 11C4.55228 11 5 11.4477 5 12C5 12.5523 4.55228 13 4 13C3.44772 13 3 12.5523 3 12Z"
                                            fill="#2E7D32" />
                                        <path
                                            d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
                                            fill="#2E7D32" />
                                    </svg>
                                </div>
                                <h2
                                    style="font-size: 32px; font-weight: 700; margin-bottom: 16px; color: #2E7D32; text-transform: uppercase; letter-spacing: 1px;">
                                    Our Vision</h2>
                                <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 20px; color: #1B5E20;">
                                    Pioneering Tomorrow's Travel Tales</h3>
                                <p style="font-size: 16px; line-height: 1.8; color: #333333; margin-bottom: 0;">
                                    We aspire to be a globally recognized leader in the travel and tourism industry by
                                    redefining
                                    the way people experience the world. We aim to empower travelers through personalized,
                                    innovative, and seamless travel solutions that not only meet their expectations but
                                    exceed
                                    them. We envision a future where every journey we create fosters cultural connection,
                                    personal growth, and unforgettable memories. With a strong commitment to quality, trust,
                                    and sustainability, we strive to build lasting relationships with our clients and
                                    partners —
                                    becoming the go-to travel companion for explorers around the globe.
                                </p>
                            </div>
                            <div class="decorative-shape"
                                style="position: absolute; top: -20px; right: -20px; width: 120px; height: 120px; border-radius: 50%; background-color: rgba(46, 125, 50, 0.1); z-index: 1;">
                            </div>
                            <div class="decorative-shape"
                                style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; border-radius: 50%; background-color: rgba(46, 125, 50, 0.07); z-index: 1;">
                            </div>
                        </div>
                    </div>

                    <!-- Mission Box -->
                    <div class="col-lg-6">
                        <div class="mission-box h-100"
                            style="background: linear-gradient(135deg, #e6f2f7 0%, #c8d7e6 100%); border-radius: 16px; padding: 40px 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); position: relative; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s;">
                            <div class="content-overlay" style="position: relative; z-index: 2;">
                                <div class="icon-container mb-4"
                                    style="width: 80px; height: 80px; margin: 0 auto; background-color: rgba(255, 255, 255, 0.6); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.618 5.968C17.618 5.968 17.109 13.582 12.01 13.582C6.91 13.582 6.402 5.968 6.402 5.968"
                                            stroke="#1565C0" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M19 19.833L18.132 14.235C18.052 13.818 17.692 13.5 17.268 13.5H6.732C6.308 13.5 5.948 13.818 5.868 14.235L5 19.833"
                                            stroke="#1565C0" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M12 7L12 10" stroke="#1565C0" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <circle cx="12" cy="5" r="2" stroke="#1565C0" stroke-width="2" />
                                    </svg>
                                </div>
                                <h2
                                    style="font-size: 32px; font-weight: 700; margin-bottom: 16px; color: #1565C0; text-transform: uppercase; letter-spacing: 1px;">
                                    Our Mission</h2>
                                <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 20px; color: #0D47A1;">
                                    Crafting
                                    Journeys, Curating Memories</h3>
                                <p style="font-size: 16px; line-height: 1.8; color: #333333; margin-bottom: 0;">
                                    At VacayGuider, we deliver exceptional travel experiences through personalized,
                                    reliable, and comprehensive solutions. Committed to understanding each traveler's unique
                                    needs, we transform dreams into reality with carefully crafted tours, trusted support
                                    services, and our passionate team. Whether exploring Sri Lanka's beauty or discovering
                                    global destinations, we ensure every journey is smooth, enriching, and memorable. With
                                    our focus on quality, customer satisfaction, and innovation, we've become the trusted
                                    travel partner clients rely on - every step of the way
                                </p>
                            </div>
                            <div class="decorative-shape"
                                style="position: absolute; top: -20px; left: -20px; width: 120px; height: 120px; border-radius: 50%; background-color: rgba(21, 101, 192, 0.1); z-index: 1;">
                            </div>
                            <div class="decorative-shape"
                                style="position: absolute; bottom: -30px; right: -30px; width: 150px; height: 150px; border-radius: 50%; background-color: rgba(21, 101, 192, 0.07); z-index: 1;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </section>



    <section class="counter-section  " style="border-radius: 12px;margin-top: 25px; margin-bottom: 80px; ">
        <div class="container">

            <div class="row counters text-center">
                <!-- Counter Item Template -->
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="counter-card p-4"
                        style="background-color: transparent; border-radius: 15px; box-shadow: none;">
                        <div class="counter-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black"
                                viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg>
                        </div>
                        <strong data-to="5" data-append="+" class="mb-2 d-block display-4" style="color: black; font-weight: 900;">0</strong>
                        <label style="color: black; font-weight: 700;">Years of Experience</label>
                        <div class="counter-line mt-3 mx-auto" style="width: 50px; height: 3px; background-color: black;">
                        </div>
                    </div>
                </div>

                <!-- Repeat for other cards -->

                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="counter-card p-4"
                        style="background-color: transparent; border-radius: 15px; box-shadow: none;">
                        <div class="counter-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6z" />
                            </svg>
                        </div>
                        <strong data-to="60" data-append="+" class="mb-2 d-block display-4" style="color: black; font-weight: 900;">0</strong>
                        <label style="color: black; font-weight: 700;">Tour Packages</label>
                        <div class="counter-line mt-3 mx-auto" style="width: 50px; height: 3px; background-color: black;">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <div class="counter-card p-4"
                        style="background-color: transparent; border-radius: 15px; box-shadow: none;">
                        <div class="counter-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black"
                                viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z" />
                            </svg>
                        </div>
                        <strong data-to="75" data-append="+" class="mb-2 d-block display-4" style="color: black; font-weight: 900;">0</strong>
                        <label style="color: black; font-weight: 700;">Happy Customers</label>
                        <div class="counter-line mt-3 mx-auto" style="width: 50px; height: 3px; background-color: black;">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="counter-card p-4"
                        style="background-color: transparent; border-radius: 15px; box-shadow: none;">
                        <div class="counter-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black"
                                viewBox="0 0 16 16">
                                <path
                                    d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z" />
                            </svg>
                        </div>
                        <strong data-to="2" class="mb-2 d-block display-4" style="color: black; font-weight: 900;">0</strong>
                        <label style="color: black; font-weight: 700;">Award Winning Services</label>
                        <div class="counter-line mt-3 mx-auto" style="width: 50px; height: 3px; background-color: black;">
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>


    <section class="counter-section " style="background-color: #ffffff;margin-top: -60px;">
        <div class="container-fluid">
              <div class="title-area text-center " style="">
                    <h2 class="sec-title"
                        style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        The Team </h2>
                </div>
            <div class="responsive-container-block outer-container ">
                <div class="responsive-container-block inner-container" style="  min-height: 70vh; ">

                    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-4 wk-ipadp-5 content-container"
                        style="background-color:  #f8f9fa; border-radius: 8px; padding: 25px; ">
                        <div class="content-box">
                            <div class="text-start text-lg-start">
                                <h1 class="mb-4 text-black" style="font-size:36px; ">Atheek Zuhair</h1>
                                <footer class="blockquote-footer" style="font-weight: bold;">CEO & Founder</footer>
                            </div>

                            <!-- Large CEO Image in the description section -->
                            <div class="ceo-main-image mb-4 mt-4">
                                <img src="assets/img/ceo2.png" alt="CEO Portrait" class="img-fluid rounded shadow"
                                    style="width: 100%; ">
                            </div>
                        </div>
                    </div>

                    <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-8 team-cards-outer-container"
                        style="background-color:  #f8f9fa; border-radius: 8px; padding: 25px; ">
                        <div class="responsive-container-block">
                            <!-- CEO Description and Quote -->
                            <div class="ceo-content p-4">
                                <p class="text-center">
                                    With over a decade of hands-on experience in the travel and tourism industry, Mohomed
                                    Atheek founded Vacay Guider with a bold vision — to redefine the way people explore the
                                    world. Drawing from his academic background in cultural anthropology and a deep-rooted
                                    passion for sustainable, meaningful travel, he set out to build more than just a travel
                                    company. He envisioned a platform that connects people to places through authentic,
                                    enriching, and responsible experiences.
                                </p>
                                <p class="text-center">
                                    Under his visionary leadership, Vacay Guider has evolved from a small local agency into
                                    a
                                    globally recognized brand, trusted for delivering immersive journeys that celebrate
                                    culture,
                                    nature, and personal discovery. Atheek’s unwavering commitment to integrity, innovation,
                                    and traveler satisfaction has shaped every aspect of our service. His belief that travel
                                    should
                                    inspire, educate, and empower continues to drive our mission — guiding explorers not
                                    just
                                    to see the world, but to truly experience it.
                                </p>

                                <div class="quote-container my-4 p-4 rounded"
                                    style="background-color: #f0f7ff; border-left: 4px solid #007bff;">
                                    <blockquote class="blockquote">
                                        <p class="mb-0"><em>"The earth speaks in colors, flavors, and moments — only the
                                                curious
                                                truly listen."</em>
                                        </p>
                                        <footer class="blockquote-footer mt-2">Atheek Zuhair, CEO & Founder</footer>
                                    </blockquote>
                                </div>

                                <p class="text-muted">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="container-fluid mt-5 mb-5">
                
    <div class="title-area text-center mb-5" style="margin-top: -5px;">
                <span class="sub-title"
                    style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 600;color: #000000;">
                    Meet Our Team</span>
        
            </div>
                    <div class="responsive-container-block team-cards-inner-container justify-content-center">
                        <!-- First Row -->
                        <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-6 wk-desk-4 card-container ">
                            <div class="card"
                                style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform 0.3s; margin-bottom: 20px;">
                                <div class="img-box">
                                    <img class="person-img" src="assets/img/team1.jpg" alt="Team Member"
                                        style="width: 100%; height: auto;">
                                </div>

                                <div class="card-content-box p-3">
                                    <p class="text-black person-name">
                                        Junaideen
                                    </p>
                                    <p class="text-blk person-info">
                                        Director
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-6 wk-desk-4 card-container">
                            <div class="card"
                                style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform 0.3s; margin-bottom: 20px;">
                                <div class="img-box">
                                    <img class="person-img" src="assets/img/team2.jpg" alt="Team Member"
                                        style="width: 100%; height: auto;">
                                </div>

                                <div class="card-content-box p-3">
                                    <p class="text-black person-name">
                                        Safra
                                    </p>
                                    <p class="text-blk person-info">
                                        Travel Manager 
                                    </p>
                                </div>
                            </div>
                        </div>


                        <!-- Second Row -->
                        <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-6 wk-desk-4 card-container">
                            <div class="card"
                                style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform 0.3s;">
                                <div class="img-box">
                                    <img class="person-img" src="assets/img/shakir.jpg" alt="Team Member"
                                        style="width: 100%; height: auto;">
                                </div>

                                <div class="card-content-box p-3">
                                    <p class="text-black person-name">
                                        Shakeer
                                    </p>
                                    <p class="text-blk person-info">
                                        Tour Cordinator
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-6 wk-desk-4 card-container">
                            <div class="card"
                                style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform 0.3s;">
                                <div class="img-box">
                                    <img class="person-img" src="assets/img/Rimshad.jpg" alt="Team Member"
                                        style="width: 100%; height: auto;">
                                </div>

                                <div class="card-content-box p-3">
                                    <p class="text-black person-name">
                                        Rimshad
                                    </p>
                                    <p class="text-blk person-info">
                                        Travel Executive
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-6 wk-desk-4 card-container">
                            <div class="card"
                                style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform 0.3s;">
                                <div class="img-box">
                                    <img class="person-img" src="assets/img/Sabrin.jpg" alt="Team Member"
                                        style="width: 100%; height: auto;">
                                </div>


                                <div class="card-content-box p-3">
                                    <p class="text-black person-name">
                                        Shabrin
                                    </p>
                                    <p class="text-blk person-info">
                                        Tour Guider
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="responsive-cell-block wk-mobile-12 wk-ipadp-10 wk-tab-6 wk-desk-4 card-container">
                            <div class="card"
                                style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform 0.3s; margin-bottom: 20px;">
                                <div class="img-box">
                                    <img class="person-img" src="assets/img/siraj.jpg" alt="Team Member"
                                        style="width: 100%; height: auto;">
                                </div>


                                <div class="card-content-box p-3">
                                    <p class="text-black person-name">
                                        Siraj
                                    </p>
                                    <p class="text-blk person-info">
                                        Tour Guider
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
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


 <script>
    function animateCount(el, target) {
        let current = 0;
        const speed = 20;
        const increment = Math.ceil(target / 100);

        const counter = setInterval(() => {
            current += increment;
            if (current >= target) {
                el.textContent = target + (el.dataset.append || '');
                clearInterval(counter);
            } else {
                el.textContent = current + (el.dataset.append || '');
            }
        }, speed);
    }

    const counters = document.querySelectorAll('.counter-card strong');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-to'));
                if (!el.classList.contains('counted')) {
                    animateCount(el, target);
                    el.classList.add('counted');
                }
            }
        });
    }, {
        threshold: 0.5
    });

    counters.forEach(counter => observer.observe(counter));
</script>
@endsection
