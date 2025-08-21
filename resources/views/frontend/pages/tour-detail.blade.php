@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    <style>
        @media (max-width: 480px) {
            .main-head {
                font-size: 26px !important;
            }

            .p-thank {
                font-size: 14px;
                text-align: justify;

            }

            .panel-content {
                color: #333;
                font-size: 14px !important;
            }

            .accomo-gap {
                width: 14px !important;
            }

            .side-box-head {
                margin-top: 15px;
            }

            .tab-button {
                font-size: 16px;
                font-weight: 600;
                padding: 7px 10px !important;
                border-radius: 25px;
                margin-right: 10px;
                cursor: pointer;
                color: #000;

                display: flex;
                justify-content: center;
                /* center text horizontally */
                align-items: center;
                /* center vertically */
            }

            .tab-content {
                display: block;
                width: 100%;
                /* fill button */
                text-align: center;
            }

            .tab-container {
                display: flex;
                flex-wrap: nowrap;
                gap: 8px;
            }


            /*tour summary styls */
            .summary-heading {
                margin-bottom: 10px;
            }

            .tour-summaries {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .tour-card {
                padding: 1.5rem !important;
                width: 100%;
            }

            .tour-card h2 {
                font-size: 22px !important;
                margin-bottom: 1rem;
            }

            .tour-card .flex.items-center.justify-between {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .tour-card .text-lg {
                font-size: 14px !important;
            }

            .tour-card .text-xl {
                font-size: 18px !important;
            }

            .tour-card .text-base {
                font-size: 14px !important;
            }

            .tour-card .gap-2 {
                gap: 6px;
            }

            .tour-card .grid {
                grid-template-columns: 1fr !important;
                gap: 6px !important;
            }

            .tour-card img.w-5.h-5 {
                width: 18px !important;
                height: 18px !important;
            }

            .nav-container {
                display: flex;
                flex-wrap: nowrap;
                /* Prevent wrapping */
                overflow-x: auto;
                /* Enable horizontal scroll if needed */
                border-radius: 9999px;
                padding: 6px 10px;
                background-color: #f8fafc;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
                border: 1px solid #e2e8f0;
                width: 100% !important;
                scrollbar-width: none;
                /* Hide scrollbar for Firefox */
            }

            .nav-container::-webkit-scrollbar {
                display: none;
                /* Hide scrollbar for Chrome/Safari */
            }

            .nav-button {
                flex: 0 0 auto;
                /* Do not shrink, allow horizontal scroll */
                padding: 10px 28px;
                border: none;
                background-color: transparent;
                color: #000000;
                font-size: 15px;
                font-weight: 600;
                cursor: pointer;
                border-radius: 9999px;
                transition: all 0.3s ease;
                position: relative;
                outline: none;
                white-space: nowrap;
                /* Prevent text wrapping */
                margin-right: 8px;
                /* Space between buttons */
            }


            .breadcrumb-mobile {

                margin-top: 10px;
            }
        }

        .btn-outline-dark {
            border: 2px solid #0a3d52;
            color: #0a3d52;
            transition: all 0.3s ease;
            border-radius: 25px;
        }

        .btn-outline-dark:hover {
            background-color: #0a3d52;
            color: white;
        }

        .shadow-lg {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1) !important;
        }

        .tab-container {
            display: flex;
            border-radius: 9999px;
            padding: 6px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            max-width: 100%;
            border: 1px solid #e2e8f0;
            width: fit-content;
            background-color: #f8fafc;
            overflow-x: auto;
            gap: 8px;
        }

        .tab-button {
            flex: 1;

            border: none;

            color: #64748b;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            border-radius: 20px;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            white-space: nowrap;
        }

        .tab-button:hover {
            color: #334155;
        }

        .tab-button.active {
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: #f1f5f9;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
        }

        .tab-button.active:hover {
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: white;
        }


        .highlight-image {
            transition: transform 0.3s ease;
        }

        .highlight-image:hover {
            transform: scale(1.05);
        }

        .tour-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        }

        .tour-card:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .duration-badge {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .info-section {
            background: rgba(16, 185, 129, 0.05);
            border-left: 4px solid #10b981;
        }
    </style>
    <style>
        .steps-container {
            display: grid;
            gap: 30px;
            margin-top: 40px;
        }

        .step-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .step-header {
            display: flex;
            align-items: center;

        }

        .step-number {
            /* background: linear-gradient(135deg, #2596be, #1e6f94); */
            background: linear-gradient(135deg, #2596be, #96c93e);

            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-right: 20px;
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
        }

        .step-title {
            font-size: 1.8rem;
            color: #2c3e50;
            font-weight: 600;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            font-weight: 600;
            color: #34495e;
            margin-bottom: 8px;
            font-size: 1rem;
        }

        input,
        select {
            padding: 15px;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.2);
            transform: translateY(-2px);
        }

        input[type="file"] {
            padding: 12px;
            background: rgba(102, 126, 234, 0.05);
            border: 2px dashed #667eea;
        }

        .btn {

            padding: 18px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            margin-top: 20px;
        }

        .btn:hover {
            color: #ffff;
            transform: translateY(-3px);

        }

        .btn-submit {
            grid-column: 1 / -1;
            justify-self: center;
            margin-top: 30px;
        }

        .payment-info {
            background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
            padding: 25px;
            border-radius: 15px;
            margin: 25px 0;
            text-align: center;
        }

        .payment-info p {
            font-size: 1.1rem;
            color: #2d3436;
            margin-bottom: 20px;
        }

        .success-section {
            background: #6dab3c;
            color: white;
            text-align: center;
        }

        .success-section .step-number {
            background: linear-gradient(135deg, #00cec9, #00b894);
        }



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



        .bg-smoke {
            background-color: #F5F5F5 !important;
        }

        .tab-button {
            font-size: 16px;
            font-weight: 600;
            padding: 10px 20px;

            border-radius: 25px;
            margin-right: 10px;
            cursor: pointer;
            color: #000;
        }

        .tab-button[aria-selected="true"] {
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: white;
        }

        .tabpanel {
            padding: 30px;
            /* background-color: #f5f5f5; */
            border-radius: 16px;
            margin-top: 20px;
        }

        .panel-content {
            color: #333;
            font-size: 18px;
        }

        .active-btn {
            background-color: #ffffff !important;
            /* Bootstrap success green */
            color: #000 !important;
            border: 2px solid #ffffff !important;
        }

        html {
            scroll-behavior: smooth;
        }

        .nav-container {
            display: flex;
            border-radius: 9999px;
            padding: 6px;
            background-color: #f8fafc;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            width: fit-content;
            max-width: 100%;
        }

        .nav-button {
            flex: 1;
            padding: 10px 28px;
            border: none;
            background-color: transparent;
            color: #000000;
            /* slate-600 */
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 9999px;
            transition: all 0.3s ease;
            position: relative;
            outline: none;
        }

        .nav-button:hover {
            color: #000000;
            /* slate-800 */

        }

        .nav-button.active {
            background: linear-gradient(135deg, #0d4e6b, #0a3d52);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(13, 78, 107, 0.3);
        }

        .nav-button.active:hover {
            background: linear-gradient(135deg, #0c445e, #082f3f);
            color: #fff;
        }

        .nav-button:focus-visible {
            box-shadow: 0 0 0 3px rgba(13, 78, 107, 0.4);
        }

        /* For responsive design */
        @media (max-width: 576px) {}

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #2c3145;
        }

        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
            color: var(--body-color);
        }

        .section_all {
            position: relative;
            padding-bottom: 40px;
            min-height: 100vh;
        }

        .section-title {
            font-weight: 700;
            text-transform: capitalize;
            letter-spacing: 1px;
        }

        .section-subtitle {
            letter-spacing: 0.4px;
            line-height: 28px;
            max-width: 550px;
        }

        .section-title-border {
            background-color: #000;
            height: 1 3px;
            width: 44px;
        }

        .section-title-border-white {
            background-color: #fff;
            height: 2px;
            width: 100px;
        }

        .text_custom {
            color: #00bd2a;
        }

        .about_icon i {
            font-size: 22px;
            height: 65px;
            width: 65px;
            line-height: 65px;
            display: inline-block;
            background: #fff;
            border-radius: 35px;
            color: #00bd2a;
            box-shadow: 0 8px 20px -2px rgba(158, 152, 153, 0.5);
        }

        .about_header_main .about_heading {
            max-width: 450px;
            font-size: 24px;
        }

        .about_icon span {
            position: relative;
            top: -10px;
        }

        .about_content_box_all {
            padding: 28px;
        }

        .breadcumb-menu li,
        .breadcumb-menu a,
        .breadcumb-menu span {
            white-space: normal;
            word-break: break-word;
            font-family: var(--body-font);
            font-weight: 400;
            font-size: 18px;
            color: var(--white-color);
        }

        .breadcumb-title {
            margin: -0.23em 0 -0.30em 0;
            font-size: 44px;
            font-family: var(--title-font);
            color: var(--white-color);
            font-weight: 700;
            text-transform: capitalize;
        }

        .counters .counter strong {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .counters .counter label {
            font-size: 1.1rem;
            opacity: 0.8;
        }
    </style>

    {{-- <div class="container-fluid about-hero text-white position-relative"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),  url('{{ asset('assets/img/avenue-815297_1920.jpg') }}') center center / cover no-repeat; 
     display: flex;
     align-items: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-style7">
                        <span class="sub-title style1 text-white d-block mb-2">Inbound</span>
                        <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">Tour Details</h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="w-full">
        <div class="mx-auto  px-4 sm:px-6 lg:px-8">
            <div class="py-3">
                <nav aria-label="Breadcrumb navigation" class="breadcrumb-mobile">
                    <ol class="flex items-center space-x-1 text-sm font-medium">
                        <!-- Home Link -->
                        <li class="flex items-center">
                            <a href="{{ url('/') }}"
                                class="breadcrumb-item group flex items-center space-x-2 text-gray-500 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 rounded-lg px-2 py-1.5 transition-all duration-200">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-500 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                        <!-- Inbound Tours Link -->
                        <li class="flex items-center">
                            <a href="{{ url('/inbound-tours') }}"
                                class="breadcrumb-item text-gray-500 hover:text-blue-600 px-2 py-1.5 rounded transition-all duration-200">
                                Inbound Tours
                            </a>
                        </li>

                        <!-- Separator -->
                        <li class="flex items-center">
                            <svg class="w-3 h-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </li>

                        <!-- Current Tour Page -->
                        <li class="flex items-center">
                            <span
                                class="current-page flex items-center space-x-1.5 text-gray-800 font-semibold px-3 py-1.5 rounded-md border border-gray-200"
                                aria-current="page">
                                {{ $package->heading ?? 'Tour Details' }}
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- Blog Start -->
    <div class="container-fluid py-5" style="margin-top: -40px;">

        <div class="row ">
            <div class="col-lg-8 ">
                <!-- Blog Detail Start -->
                <div class="blog-item ">
                    <div class="position-relative ">

                        <div class="blog-date ">
                            <small class="text-uppercase  " style="font-size: 18px;font-weight: 900; color:#96c93e;">Sri
                                Lanka</small>
                            <h5 class="mt-2 main-head" style="font-size: 32px; font-weight:500;">
                                Tour for <strong style="font-weight: 900;">{{ $package->days }} Days</strong>
                                & <strong style="font-weight: 900;"> {{ $package->nights }}
                                    Nights</strong>
                            </h5>
                        </div>

                        @php
                            $backendBaseUrl = config('app.backend_url');
                            $imageUrl = $package->picture
                                ? $backendBaseUrl . '/storage/' . ltrim($package->picture, '/')
                                : asset('/images/no-image.jpg');
                        @endphp

                        <img class="w-full h-72  object-cover rounded-2xl mt-3 " src="{{ $imageUrl }}"
                            alt="{{ $package->place }}" style="height: 500px;">
                    </div>
                </div>



                <div class="pb-3  shadow">

                    <div class=" mb-3" style="padding: 30px;">

                        {{-- <h2 class="mb-3" style="font-size: 30px; color:#000; font-weight: bold;">{{ $package->heading }}
                        {{-- </h2> --}}
                        {{-- <p class=" px-3"style="padding-top: 10px; padding-bottom: 20px;">{{ $package->description }}</p>  --}}
                        <p class=" px-3"
                            style="padding-top: 10px; padding-bottom: 20px; text-align: justify;word-spacing: -1px;">
                            {{ $package->description }}
                        </p>



                        <div class="nav-container">
                            <button id="summary-btn" class="nav-button active" onclick="showSection('summary')">
                                Summary
                            </button>
                            <button id="itinerary-btn" class="nav-button" onclick="showSection('itinerary')">
                                Itinerary
                            </button>
                        </div>

                        <div class="tour-summaries mt-5 px-2 max-w-6xl mx-auto" id="summary-section">
                            <div class="tour-card rounded-2xl p-8 mb-8 transition-all duration-300"
                                style="background: #eff5ff;">
                                <!-- Header with Title and Duration -->
                                <div class="flex items-center justify-between mb-8 summary-heading">
                                    <h2 class=" mt-3" style="font-size: 30px; color:#000; font-weight: bold;">Tour Summary
                                    </h2>
                                    <div
                                        class="hidden md:flex gap-2 items-center text-black text-sm md:text-base font-bold px-4 py-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" width="18" height="18"
                                            class="me-2" viewBox="0 0 24 24">
                                            <path
                                                d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3a.75.75 0 0 1 1.5 0v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z">
                                            </path>
                                        </svg>
                                        <span>{{ $package->days }} Days, {{ $package->nights }} Nights</span>
                                    </div>

                                </div>

                                <!-- Summary Description -->
                                @if (!empty($package->summary_description))
                                    <div class="mb-8">
                                        <p class="leading-relaxed text-lg text-gray-600 text-justify">
                                            {{ $package->summary_description }}
                                        </p>
                                    </div>
                                @endif

                                <!-- Cities & Destinations -->
                                <div class="mb-8">
                                    <h2 class="text-xl font-bold text-black mb-4">Destinations</h2>
                                    <div class="flex flex-wrap items-center ml-2 text-lg font-medium gap-2 text-gray-600">
                                        @php
                                            $cityList = [];
                                            foreach ($tourSummaries as $summary) {
                                                if ($summary->package_id == $package->id) {
                                                    $cities = explode(',', $summary->city);
                                                    foreach ($cities as $city) {
                                                        $trimmed = trim($city);
                                                        if (!empty($trimmed)) {
                                                            $cityList[] = $trimmed;
                                                        }
                                                    }
                                                }
                                            }
                                            $cityList = array_values(array_unique($cityList));
                                        @endphp

                                        @foreach ($cityList as $index => $city)
                                            <span>{{ $city }}</span>
                                            @if ($index < count($cityList) - 1)
                                                <span class="text-blue-600">→</span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Themes -->
                                <div class="mb-8">
                                    <h2 class="text-xl font-bold text-black mb-4">Themes</h2>
                                    @php
                                        $themeList = [];

                                        foreach ($tourSummaries as $summary) {
                                            if ($summary->package_id == $package->id && !empty($summary->theme)) {
                                                $themes = explode(',', $summary->theme);
                                                foreach ($themes as $theme) {
                                                    $trimmed = trim($theme);
                                                    if (!empty($trimmed)) {
                                                        $themeList[] = $trimmed;
                                                    }
                                                }
                                            }
                                        }

                                        $themeList = array_values(array_unique($themeList));
                                    @endphp

                                    @if (!empty($themeList))
                                        <div
                                            class="ml-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1 text-base text-gray-600">
                                            @foreach ($themeList as $theme)
                                                @php
                                                    // Define theme icons with keywords and their URLs
                                                    $themeIcons = [
                                                        'adventure' =>
                                                            'https://d2xmwf00c85p5s.cloudfront.net/t5_0222b300ec.png',
                                                        'beach' =>
                                                            'https://d2xmwf00c85p5s.cloudfront.net/t2_a48d3a8dae.png',
                                                        'city' =>
                                                            'https://d2xmwf00c85p5s.cloudfront.net/2855998_b5bcbf5bea.png',
                                                        'history' =>
                                                            'https://d2xmwf00c85p5s.cloudfront.net/t6_005fa7fb20.png',
                                                        'culture' =>
                                                            'https://d2xmwf00c85p5s.cloudfront.net/t1_bfc05a4601.png',
                                                    ];

                                                    // Default icon
                                                    $iconUrl =
                                                        'https://d2xmwf00c85p5s.cloudfront.net/t5_0222b300ec.png';

                                                    // Match theme to icon
                                                    foreach ($themeIcons as $key => $url) {
                                                        if (str_contains(strtolower($theme), $key)) {
                                                            $iconUrl = $url;
                                                            break;
                                                        }
                                                    }
                                                @endphp

                                                <div class="flex items-center gap-2">
                                                    <img src="{{ $iconUrl }}" alt="{{ $theme }} icon"
                                                        class="w-5 h-5 object-contain">
                                                    <span>{{ $theme }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>



                            </div>
                        </div>



                        @foreach ($package->detailItineraries as $itinerary)
                            <div class="mx-auto p-6 rounded-lg mt-3  detail-itineraries "
                                id="itinerary-section-{{ $itinerary->day }}" style="display: block;">

                                <!-- Day Header -->
                                {{-- <div class="flex items-center mb-6">
                                    <div class="w-3 h-3 rounded-full bg-green-500 ring-8 ring-gray-100 mr-6"></div>
                                    <div class="flex items-center gap-4">
                                        <p class="text-xl font-medium text-gray-600">
                                            Day {{ str_pad($itinerary->day, 2, '0', STR_PAD_LEFT) }}
                                        </p>
                                        <h1 class="text-3xl font-semibold text-gray-900">{{ $itinerary->place_name }}</h1>
                                    </div>
                                </div> --}}

                                <div class="flex items-center justify-between mb-8">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-semibold text-lg mr-6 shadow-md"
                                            style="background: linear-gradient(45deg, rgb(148, 199, 62), rgb(148, 199, 62));">
                                            {{ str_pad($itinerary->day, 2, '0', STR_PAD_LEFT) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-600 uppercase tracking-wide"
                                                style="color: #709929;">
                                                Day {{ str_pad($itinerary->day, 2, '0', STR_PAD_LEFT) }}
                                            </p>
                                            <h1 class="text-3xl font-bold text-gray-900" style="margin-top: -15px;">
                                                {{ $itinerary->place_name }}</h1>
                                        </div>
                                    </div>
                                </div>


                                <!-- Description Section (only if available) -->
                                @if (!empty($itinerary->description))
                                    <div class="mb-8">
                                        <p class="text-gray-700 leading-relaxed text-sm text-justify">
                                            {{ $itinerary->description }}
                                        </p>
                                    </div>
                                @endif
                                <!-- Cover Image -->
                                @php
                                    $backendBaseUrl = config('app.backend_url');
                                    $defaultImage = asset('/images/no-image.jpg');
                                    $coverImage = $itinerary->pictures
                                        ? $backendBaseUrl . '/storage/' . ltrim($itinerary->pictures, '/')
                                        : $defaultImage;
                                @endphp

                                <img src="{{ $coverImage }}" alt="{{ $itinerary->place_name }} cover"
                                    class="w-full h-80 object-cover rounded-2xl shadow-lg" style="height: 20rem;" />

                                <!-- Activities Section -->
                                <div class="mb-12">
                                    <h3 class="text-2xl font-semibold text-gray-900 mb-6" style="margin-top: 30px;">
                                        Day {{ str_pad($itinerary->day, 2, '0', STR_PAD_LEFT) }} Program
                                    </h3>
                                    <div class="bg-gray-50 rounded-2xl p-6">
                                        @foreach (collect($itinerary->program_points)->take(4) as $point)
                                            <div class="flex items-start mb-4">
                                                <div class="w-2 h-2 rounded-full bg-gray-900 mt-2 mr-4 flex-shrink-0">
                                                </div>
                                                <span class="text-gray-700">{{ $point }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                @if ($itinerary->highlights->isNotEmpty())
                                    <div class="mb-12">
                                        <h3 class="text-2xl font-semibold text-gray-900 mb-6">
                                            {{ $itinerary->place_name }} Highlights
                                        </h3>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            @php
                                                $backendBaseUrl = config('app.backend_url'); // e.g., https://admin.vacayguider.com
                                                $defaultImage = asset('/images/no-image.jpg');
                                            @endphp

                                            @foreach ($itinerary->highlights->take(6) as $highlight)
                                                @php
                                                    $imageUrl = $highlight->images
                                                        ? $backendBaseUrl . '/storage/' . ltrim($highlight->images, '/')
                                                        : $defaultImage;
                                                @endphp

                                                <div class="flex flex-col">
                                                    <div class="overflow-hidden rounded-lg">
                                                        <img src="{{ $imageUrl }}" alt="Highlight"
                                                            class="w-full h-40 object-cover highlight-image"
                                                            style="height: 10rem;" />
                                                    </div>
                                                    <p class="text-center text-sm text-gray-600 mt-3">
                                                        {{ $highlight->highlight_places ?? ($highlight->title ?? 'Highlight') }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif


                                <!-- Accommodation Box -->
                                <div class="bg-gray-50 rounded-2xl p-6">
                                    <div class="space-y-4">
                                        <!-- Accommodation -->
                                        <div class="flex items-start space-x-4">
                                            <div class="flex items-center space-x-4 w-40 accomo-gap">
                                                <i class="fas fa-map-marker-alt w-6  text-gray-600"
                                                    style="height: 2rem;"></i>
                                                <p class="hidden md:block text-gray-700">Accommodation</p>
                                            </div>
                                            <div class="flex-1">
                                                <p class="flex items-center text-gray-900">
                                                    {{ $itinerary->overnight_stay ?? 'Not specified' }}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Meal Plan -->
                                        <div class="flex items-start space-x-4">
                                            <div class="flex items-center space-x-4 w-40 accomo-gap">
                                                <i class="fas fa-utensils w-6  text-gray-600" style="height: 2rem;"></i>
                                                <p class="hidden md:block text-gray-700">Meal Plan</p>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-gray-900">{{ $itinerary->meal_plan ?? 'None' }}</p>
                                            </div>
                                        </div>

                                        <!-- Travel Time -->
                                        <div class="flex items-start space-x-4">
                                            <div class="flex items-center space-x-4 w-40 accomo-gap">
                                                <i class="far fa-clock w-6  text-gray-600" style="height: 2rem;"></i>
                                                <p class="hidden md:block text-gray-700">Travel Time</p>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-gray-900">
                                                    {{ $itinerary->approximate_travel_time ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @if ($loop->last)
                                    @php
                                        $backendBaseUrl = config('app.backend_url'); // e.g., https://admin.vacayguider.com
                                        $defaultMapImage = asset('assets/img/default-map.jpg');

                                        $mapImage = $package->map_image
                                            ? $backendBaseUrl . '/storage/' . ltrim($package->map_image, '/')
                                            : $defaultMapImage;
                                    @endphp

                                    <div class="mt-12">
                                        <h3 class="text-2xl font-semibold text-gray-900 mb-6">Tour Map</h3>
                                        <img src="{{ $mapImage }}" alt="Tour map for {{ $package->place }}"
                                            class="lg:w-auto w-full object-cover rounded-xl shadow-md"
                                            style="height: 400px; width: 300px;" loading="lazy" />
                                    </div>
                                @endif

                            </div>
                        @endforeach






                        <div id="tour-accordion" class="mt-5" style="scroll-margin:90px">
                            <!-- Tab List -->
                            <div class="flex justify-start mb-4" aria-label="Tour Details">
                                <div class="tab-container" role="tablist" aria-orientation="horizontal">
                                    <!-- Tab Button 1 -->
                                    <button class="tab-button" aria-selected="false" role="tab" id="tab-highlights"
                                        data-key="highlights" aria-controls="tabpanel-highlights">
                                        <span class="tab-content">Inclusions</span>
                                    </button>
                                    <!-- Tab Button 2 -->
                                    <button class="tab-button" role="tab" id="tab-itinerary" data-key="itinerary"
                                        aria-controls="tabpanel-itinerary">
                                        <span class="tab-content">Exclusions</span>
                                    </button>
                                    <!-- Tab Button 3 -->
                                    <button class="tab-button" role="tab" id="tab-pricing" data-key="pricing"
                                        aria-controls="tabpanel-pricing">
                                        <span class="tab-content">Cancellation Policy</span>
                                    </button>
                                </div>
                            </div>



                            <!-- Content Panels -->
                            <!-- Panel for Inclusions -->
                            <div id="tabpanel-highlights" aria-labelledby="tab-highlights" class="tabpanel py-3 px-1">
                                <div class="panel-content">
                                    <ul class="list-none pl-0">

                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-startr">
                                                <div class="w-2 h-2 rounded-full  mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Airport pick up</span>
                                            </div>
                                        </li>

                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Assistance at the Airport</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Accommodation with breakfast and dinner basis on mentioned hotels
                                                    below</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-starttems-center">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Private luxury car (air-conditioned)</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Private English-Speaking driver for the entire journey</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>All government taxes</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Fuel & local insurance for the vehicle</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 20px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Airport drop off</span>
                                            </div>
                                        </li>

                                        <p style="margin-bottom: 10px ;margin-top: 2opx;">
                                            <strong style="color: #000;">Note :</strong> All rooms and tickets are subject
                                            to
                                            availability.
                                        </p>
                                        <p style="margin-bottom: 10px;">
                                            <strong style="color: #000;">Note :</strong> Travel durations listed in this
                                            itinerary are
                                            subject to change due to road, traffic, and weather conditions. These
                                            suggested durations are estimated point-to-point without any stops. This
                                            is only a guideline for your understanding.
                                        </p>
                                    </ul>
                                </div>
                            </div>

                            <!-- Panel for Exclusions -->
                            <div id="tabpanel-itinerary" aria-labelledby="tab-itinerary" class="tabpanel py-3 px-1"
                                style="display:none;">
                                <div class="panel-content">
                                    <ul class="list-none pl-0">
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Air tickets NOT included</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Sightseeing entrance charges</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Meals not mentioned in the itinerary</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Camera & video permits</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Insurances</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Guide/Driver tips</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Personal expenses</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Late check-outs & early check-in charges</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Visa cost (mandatory charge for immigration: 25 USD per person)</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Shopping expenses</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>PCR tests</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 20px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Above cost is valid for 14 pax or above only</span>
                                            </div>
                                        </li>

                                        <p style="margin-bottom: 10px;">
                                            <strong style="color: #000;">Note :</strong> Please note that if the
                                            information mentioned
                                            above varies according to the customer's preference, the corresponding
                                            charges will also be included.
                                        </p>
                                    </ul>
                                </div>
                            </div>


                            <!-- Panel for Cancellation Policy -->
                            <div id="tabpanel-pricing" aria-labelledby="tab-pricing" class="tabpanel py-3 px-1"
                                style="display:none;">
                                <div class="panel-content">
                                    <ul class="list-none pl-0">
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span><strong>In case of cancellation:</strong> The following cancellation
                                                    charges will be applicable</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>Cancellations made with less than 30 days from the start of a tour:
                                                    Zero refund.</span>
                                            </div>
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            <div class="flex items-start">
                                                <div class="w-2 h-2 rounded-full mr-2 mt-2 flex-shrink-0"
                                                    style="background: #727373;"></div>
                                                <span>No Show: Zero refund.</span>
                                            </div>
                                        </li>

                                        <p style="margin-bottom: 10px;"><strong style="color: #000;">Note :</strong>
                                            Cancellations made
                                            prior to 30 days from the scheduled start of a tour: 80% of total tour
                                            fee will be refunded.</p>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 40px; display: flex; justify-content: center;">
                            <div
                                style="max-width: 800px; width: 100%; padding: 20px; background-color: #f4f4f4; border-top: 2px solid #ccc; font-family: Arial, sans-serif; color: #333; font-size: 16px; line-height: 1.6; text-align: center;">

                                <p class="p-thank" style="margin: 0 0 10px 0;">
                                    At <strong>VacayGuider</strong>, the journey doesn't end when the trip does, it lingers
                                    in the stories shared,
                                    the photos reminisced, and the plans for the next adventure. But above all, we
                                    understand
                                    the sanctity of trust. Every service we offer, every tour we curate, prioritizes the
                                    safety and
                                    well-being of our travelers. With <strong>VacayGuider</strong>, you're not just booking
                                    a trip, you're ensuring an experience that's safe, seamless,
                                    and truly unforgettable. May your trip be full of adventure, joy, and amazing
                                    experiences. Stay with us
                                </p>


                                <p class="p-thank text-center" style="margin: 0; font-weight: bold;">Thank You</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Comment Form End -->
            <div class="col-lg-4 mt-lg-0 side-box-head">
                <div class="position-sticky" style="top: 130px;">
                    <div
                        style="padding: 32px;  background: white; border: 1px solid #e9ecef; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">

                        <!-- Destination & Tour Type -->
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid #f1f3f4;">
                            <div style="display: flex; align-items: center;">
                                <img src="https://d2xmwf00c85p5s.cloudfront.net/Flag_Sri_Lanka_8a368b9ec8.webp"
                                    alt="Sri Lanka Flag"
                                    style="width: 32px; height: 32px; border-radius: 50%; margin-right: 12px; border: 2px solid #f8f9fa;">
                                <span style="font-weight: 600; color: #2c3e50; font-size: 16px;">Sri Lanka</span>
                            </div>
                            <span
                                style="background: linear-gradient(135deg, #0c445e, #082f3f); color: white; padding: 6px 16px; border-radius: 20px; font-weight: 600; font-size: 13px; letter-spacing: 0.5px;">
                                Tailor Made
                            </span>
                        </div>

                        <!-- Package Heading -->
                        <h5
                            style="font-weight: 700; color: #212529; margin-bottom: 14px; text-align: center; font-size: 20px; line-height: 1.3;">
                            {{ $package->heading }}</h5>

                        <!-- Price Section -->
                        <div style="text-align: center; margin-bottom: 14px; padding: 20px 0;">
                            <div
                                style="display: inline-block; padding: 16px 24px; border: 2px solid #212529; border-radius: 12px;">
                                <h4
                                    style="color: #212529; font-weight: 800; margin: 0; font-size: 28px; letter-spacing: -0.5px;">
                                    USD ${{ number_format($package->price) }}
                                </h4>
                            </div>
                        </div>

                        <!-- Booking Info -->
                        <div style="text-align: center; margin-bottom: 32px; padding: 0 8px;">
                            <h6 style="font-weight: 700; color: #2c3e50; margin-bottom: 12px; font-size: 16px;">Plan Your
                                Trip with Ease</h6>
                            <p
                                style="color: #6c757d; font-size: 14px; margin: 0; line-height: 1.5; max-width: 280px; margin: 0 auto;">
                                Flexible booking with easy cancellations. Our travel experts are available 24/7 to assist
                                you.
                            </p>
                        </div>

                        <!-- Book Now Button -->
                        <div style="text-align: center;">
                            <a href="#booking-section"
                                style="display: inline-block; background: linear-gradient(135deg, #2596be, #96c93e); color: white; padding: 14px 40px; font-weight: 700; border-radius: 50px; text-decoration: none; font-size: 16px; letter-spacing: 0.5px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(33, 37, 41, 0.2);"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 25px rgba(33, 37, 41, 0.3)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(33, 37, 41, 0.2)'">
                                Explore Now
                            </a>
                        </div>

                    </div>
                </div>
            </div>



        </div>
        <!-- Blog End -->

    </div>



    <section class="bg-gradient-to-r from-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8" id="booking-section">

        <!-- 🔁 How It Works -->
        <div class="text-center " style="margin-bottom: 70px;">
            <h2 class="sec-title" style="font-weight: bold;font-size: clamp(1.75rem, 3vw, 2.5rem);">How It Works</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto px-4">

                    <!-- Step 1 -->
                    <div class="rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black font-bold text-lg mb-2">1. Submit Your Request</div>
                        <p class="text-gray-600 text-base">Use the form below to tell us your travel dates and preferences.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black font-bold text-lg mb-2">2. Get a Quote</div>
                        <p class="text-gray-600 text-base">We’ll send you a personalized package and price within 24 hours.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black font-bold text-lg mb-2">3. Confirm & Travel</div>
                        <p class="text-gray-600 text-base">Once confirmed, we handle everything so you can enjoy your trip
                            worry-free.</p>
                    </div>

                </div>
        </div>


        <div class="">


            <div class="steps-container">
                <div class="step-card">
                    <div class="step-header text-center">
                        <div class="step-number">01</div>
                        <h2 class="step-title text-blue-900 text-center">Check Your Reservation</h2>
                    </div>


                    @if (session('success'))
                        <div class="alert alert-success" id="success-message">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" id="alert-danger">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('package.booking.store') }}">
                        @csrf
                        <input type="hidden" name="package" value="{{ $package->id }}">

                        <div class="form-grid">
                            <div class="form-group md:col-span-2">
                                <label for="fullName">Full Name *</label>
                                <input type="text" id="fullName" name="fullName" required placeholder="John Doe">
                            </div>

                            <!-- Last Name -->
                            <div class="form-group md:col-span-2">
                                <label for="lastName">Last Name *</label>
                                <input type="text" id="lastName" name="lastName" required placeholder="Doe">
                            </div>

                            <!-- Street -->
                            <div class="form-group md:col-span-2">
                                <label for="street">Street *</label>
                                <input type="text" id="street" name="street" required placeholder="123 Main St">
                            </div>

                            <!-- City -->
                            <div class="form-group md:col-span-2">
                                <label for="city">City *</label>
                                <input type="text" id="city" name="city" required placeholder="New York">
                            </div>

                            <div class="form-group">
                                <label for="country">Country *</label>
                                <input type="text" id="country" name="country" required placeholder="USA">
                            </div>

                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" required
                                    placeholder="example@mail.com">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone *</label>
                                <input type="tel" id="phone" name="phone" required
                                    placeholder="+1 123-456-7890">
                            </div>

                            <div class="form-group">
                                <label for="whatsapp">WhatsApp *</label>
                                <input type="text" id="whatsapp" name="whatsapp" required
                                    placeholder="+1 123-456-7890">
                            </div>

                            <div class="form-group">
                                <label for="adults">Adults *</label>
                                <input type="number" id="adults" name="adults" min="0" required
                                    placeholder="2">
                            </div>

                            <div class="form-group">
                                <label for="children">Children</label>
                                <input type="number" id="children" name="children" min="0" placeholder="1">
                            </div>

                            <div class="form-group">
                                <label for="infants">Infants</label>
                                <input type="number" id="infants" name="infants" min="0" placeholder="0">
                            </div>

                            <div class="form-group">
                                <label for="startDate">Start Date *</label>
                                <input type="date" id="startDate" name="startDate" required>
                            </div>

                            <div class="form-group">
                                <label for="endDate">End Date *</label>
                                <input type="date" id="endDate" name="endDate" required>
                            </div>

                            <div class="form-group md:col-span-3">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" rows="4" placeholder="Tell us your preferences or questions..."></textarea>
                            </div>

                            <div class="form-group md:col-span-3 text-center pt-4">
                                <button type="submit" class="btn btn-primary btn-sm"
                                    style="background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- <div class="text-center " style="margin-bottom: -40px;margin-top: 30px;">
                <p class="text-sm text-gray-500">🌟 Rated 4.8/5 by over 1,200 happy travelers</p>
                <p class="text-xs text-gray-400 mt-1">Your data is secure and never shared. We value your privacy.</p>
            </div> --}}



        </div>






    </section>


    <script>
        // JavaScript to handle collapse functionality
        document.getElementById('collapse-options').addEventListener('click', function() {
            const sections = document.querySelectorAll(
                '#tour-itinerary, #accommodation, #inclusions-exclusions, #cancellation-policy');
            sections.forEach(section => {
                section.classList.toggle('d-none'); // Toggle visibility
            });
        });
    </script>

    <script>
        function showSection(section) {
            const summary = document.getElementById('summary-section');
            const itineraries = document.querySelectorAll('.detail-itineraries');
            const summaryBtn = document.getElementById('summary-btn');
            const itineraryBtn = document.getElementById('itinerary-btn');

            if (section === 'summary') {
                summary.style.display = 'block';
                itineraries.forEach(el => el.style.display = 'none');
                summaryBtn.classList.add('active');
                itineraryBtn.classList.remove('active');
            } else {
                summary.style.display = 'none';
                itineraries.forEach(el => el.style.display = 'block');
                summaryBtn.classList.remove('active');
                itineraryBtn.classList.add('active');
            }
        }

        // Optional: Show only summary section on page load
        document.addEventListener('DOMContentLoaded', function() {
            showSection('summary');
        });
    </script>

    <script>
        const tabs = document.querySelectorAll('[role="tab"]');
        const panels = document.querySelectorAll('.tabpanel');

        function activateTab(tab) {
            // Deactivate all
            tabs.forEach(t => {
                t.setAttribute('aria-selected', 'false');
                t.classList.remove('active');
            });

            panels.forEach(panel => panel.style.display = 'none');

            // Activate selected
            tab.setAttribute('aria-selected', 'true');
            tab.classList.add('active');

            const panelId = tab.getAttribute('aria-controls');
            const targetPanel = document.getElementById(panelId);
            if (targetPanel) targetPanel.style.display = 'block';
        }

        // Initial: Activate first tab
        if (tabs.length > 0) activateTab(tabs[0]);

        // On click
        tabs.forEach(tab => {
            tab.addEventListener('click', () => activateTab(tab));
        });

        // Scroll and button highlight logic (unchanged)
        function scrollToSection(sectionId, btn) {
            var headerOffset = 150;
            var section = document.getElementById(sectionId);
            if (section) {
                var sectionPosition = section.getBoundingClientRect().top + window.scrollY;
                var offsetPosition = sectionPosition - headerOffset;
                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            }

            document.querySelectorAll('.btn').forEach(button => {
                button.classList.remove('active-btn');
            });
            btn.classList.add('active-btn');
        }

        // Optional: Auto-dismiss success message
        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.classList.add('opacity-0');
                setTimeout(() => msg.remove(), 500);
            }
        }, 5000);
    </script>


@endsection
