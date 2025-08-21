@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --light-bg: #f8f9fa;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --border-radius: 15px;
        }

        .vehicle-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin: 20px auto;
            max-width: 1200px;
        }



        .main-image-container {
            position: relative;
            overflow: hidden;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
        }

        .main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .main-image:hover {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .carousel-container {
            border-radius: var(--border-radius);
            overflow: hidden;
            height: 200px;
        }

        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.5);
            top: 50%;
            transform: translateY(-50%);
        }

        .details-section {
            padding: 40px;
        }

        .vehicle-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
            position: relative;
        }



        .price-tag {
            display: inline-block;
            background: #96c93e;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            padding: 15px 25px;
            border-radius: 50px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(46, 204, 113, 0.3);
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .detail-card {
            background: var(--light-bg);
            padding: 20px;
            border-radius: var(--border-radius);
            border-left: 4px solid var(--secondary-color);
            transition: all 0.3s ease;
        }

        .detail-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .detail-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .detail-label i {
            margin-right: 8px;
            color: var(--secondary-color);
            width: 16px;
        }

        .detail-value {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .status-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }

        .status-badge {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .status-badge i {
            margin-right: 5px;
        }

        .badge-available {
            background: rgba(39, 174, 96, 0.1);
            color: var(--success-color);
            border: 2px solid var(--success-color);
        }

        .badge-unavailable {
            background: rgba(231, 76, 60, 0.1);
            color: var(--accent-color);
            border: 2px solid var(--accent-color);
        }

        .badge-condition {
            background: rgba(52, 152, 219, 0.1);
            color: #95a5a6;
            border: 2px solid #95a5a6;
        }

        .feature-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            padding: 10px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 1.2rem;
        }

        .feature-available {
            background: rgba(39, 174, 96, 0.1);
            color: var(--success-color);
        }

        .feature-unavailable {
            background: rgba(149, 165, 166, 0.1);
            color: #95a5a6;
        }

        .meta-info {
            background: var(--light-bg);
            padding: 20px;
            border-radius: var(--border-radius);
            font-size: 0.9rem;
            color: #666;
            border-top: 1px solid #eee;
            margin-top: 30px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--secondary-color), #2980b9);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(52, 152, 219, 0.3);
        }

        .btn-outline-custom {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background: var(--primary-color);
            color: white;
        }

        @media (max-width: 768px) {
            .details-section {
                padding: 20px;
            }

            .vehicle-title {
                font-size: 2rem;
            }

            .price-tag {
                font-size: 1.5rem;
                padding: 12px 20px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            
            .sub-img-mob{
                margin-top: -70px !important;
            }

            .horizontal-layout {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .content-section,
            .image-section,
            .price-features-section {
                flex: none;
                width: 100%;
                padding: 10px 0 !important;
            }

            /* Center the price badge */
            .price-features-section .demo-container>div {
                position: static !important;
                display: inline-block;
                margin: 0 auto;
            }

            .hero-section {
                padding: 0px !important;
            }

            .step-card-mob {
                padding: 0px !important;
            }

            .permint-post-mob {
                margin-top: -32px;
            }

            /* Mobile adjustments */
            @media (max-width: 576px) {
                .title-area {
                    margin-top: 0 !important;
                    padding: 0 10px;
                }

                .sec-title {
                    font-size: 1.75rem !important;
                }

                .hero-section .container {
                    gap: 1rem;
                }

                .overview-text {
                    text-align: left;
                    font-size: 14px;
                }

                .info-badge {
                    font-size: 13px;
                    padding: 8px 12px;
                }
            }

            .rent-undrline {
                display: none !important;
            }

            .sidebar-container {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                max-height: 90%;
                width: 90%;
                background: transparent;
                /* Remove background */
                z-index: 1050;
                overflow-y: auto;
                transition: opacity 0.3s ease-in-out;
                box-shadow: none;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }


            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 1049;
                /* Just behind the sidebar */
                background-color: rgba(255, 255, 255, 0.4);
                backdrop-filter: blur(5px);
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease;
            }

            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }


            #filteredResults {
                position: relative;
                z-index: 1;
            }

            body.sidebar-open {
                overflow: hidden;
            }

            .sidebar-container.show {
                opacity: 1;
                pointer-events: auto;
            }

            .sidebar-container {
                opacity: 0;
                pointer-events: none;
            }


            .filter-title-mob {
                margin-top: 22px !important;
                margin-bottom: 25px !important;
            }

            .rvs-btn-mob {
                margin-top: 25px !important;
                margin-bottom: -40px !important;
            }

            .card-mob {
                margin-top: -24px !important;
            }

            .breadcrumb-mobile {
                overflow-x: auto;
                scrollbar-width: none;
                -ms-overflow-style: none;
                margin-top: 14px;
            }

            .title-mob {
                margin-top: -80px !important;
            }

            .title-mob-check {
                margin-top: -30px !important;
            }


            .rent-sub-tittle {
                margin-top: -60px !important;
            }

            element {}

            .demo-container {
                max-width: 1200px;
                margin: 0 auto;
                text-align: center !important;
            }

            .demo-container {

                height: 80px !important;

            }

        }

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
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: white;
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

        .pagination .page-item.active .page-link {
            background-color: black;
            color: white;
            border-color: black;
        }
    </style>


    <div class="w-full">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
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
                            <a href="{{ url('/rent') }}"
                                class="breadcrumb-item text-gray-500 hover:text-blue-600 px-2 py-1.5 rounded transition-all duration-200">
                                Rent Vehicles
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
                                {{ $vehicle->name ?? 'Tour Details' }}
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="position-relative bg-top-center overflow-hidden space" id="service-sec"
        style="margin-top: 2px; padding-bottom: 60px;background-color: #ffffff ;">
        <div class="bg-overlay"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; background: url('assets/img/pattern-dark.png') repeat; opacity: 0.05;">
        </div>

        <div class="container position-relative" style="z-index: 1;">
            <!-- Title Section with improved typography -->
            <div class="title-area text-center mb-5 title-mob" style="margin-top: -126px; ">


                <div class="title-area text-center " style="">
                    {{-- <span class="sub-title"
                            style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Premium Car Rentals</span> --}}
                    <h2 class="sec-title"
                        style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        BOOk YOUR VEHICLE</h2>
                </div>
            </div>



            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
                    <div class="slider-area tour-slider slider-drag-wrap">


                        <div class="swiper-wrapper">



                            <div class="swiper-slide">
                                <div class="cars-slider__item card-mob"
                                    style="background: linear-gradient(135deg, #071f2b 0%, #000000 100%); overflow: hidden; margin: 10px; transition: all 0.3s ease; position: relative; padding: 30px;  border: 1px solid rgba(0,162,255,0.1);border-radius: 10px;">

                                    <!-- Main Row Layout -->
                                    <div class="horizontal-layout"
                                        style="display: flex; align-items: center; justify-content: space-between; width: 100%;">

                                        <!-- Left Section -->
                                        <div class="content-section" style="flex: 1; padding-right: 20px;">
                                            <div
                                                style="display: inline-block; background: linear-gradient(135deg, rgb(53, 150, 211) 0%, rgb(37, 111, 157) 100%); padding: 4px 8px; border-radius: 10px; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 600; color: #fff; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 3px 10px rgba(0,162,255,0.3);">
                                                {{ $vehicle->label ?? 'Premium ' }}
                                            </div>

                                            <h3
                                                style="margin-bottom: 8px; font-family: 'Montserrat', sans-serif; color: #ffffff; font-weight: 700; font-size: 44px; text-shadow: 0 2px 10px rgba(0,162,255,0.4);">
                                                {{ $vehicle->make }}
                                            </h3>
                                            <h3
                                                style="margin-bottom: 15px; font-family: 'Montserrat', sans-serif; color: #3596d3; font-weight: 800; font-size: 44px; text-shadow: 0 2px 10px rgba(0,162,255,0.4);">
                                                {{ $vehicle->name }}
                                            </h3>

                                            <div class="rent-undrline"
                                                style="width: 60px; height: 6px; background: linear-gradient(90deg, #3596d3, #0069d9); margin: 10px 0 20px; border-radius: 3px;">
                                            </div>
                                        </div>

                                        <!-- Center Image Section -->
                                        <div class="image-section"
                                            style="flex: 1; display: flex; justify-content: center; align-items: center; position: relative; height: 100%;">
                                            <div
                                                style="position: absolute; width: 300px; height: 300px; border-radius: 50%; background: radial-gradient(circle, rgba(0,162,255,0.15) 0%, rgba(0,162,255,0) 70%); z-index: 1;">
                                            </div>

                                            @php
                                                $backendBaseUrl = config('app.backend_url');
                                                $vehicleImageUrl = $vehicle->vehicle_image
                                                    ? $backendBaseUrl .
                                                        '/storage/' .
                                                        ltrim($vehicle->vehicle_image, '/')
                                                    : asset('assets/img/bike3.png');
                                            @endphp

                                            <img src="{{ $vehicleImageUrl }}" alt="{{ $vehicle->name }}"
                                                style="width: 100%; max-width: auto; height: 350px; object-fit: contain; z-index: 2; transform: scale(1.1); transition: transform 0.5s ease;">
                                        </div>


                                        <!-- Right Section -->
                                        <div class="price-features-section"
                                            style="flex: 1; padding-left: 20px; display: flex; align-items: center; justify-content: center;">


                                            <div class="demo-container">
                                                <div class=" text-white font-bold text-2xl px-8 py-2 rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-300 relative overflow-hidden"
                                                    style="border-radius: 58px;background: #96c93e;">
                                                    <span class="relative z-10">USD
                                                        ${{ number_format($vehicle->price) }}</span>
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent transform -skew-x-12 translate-x-full hover:translate-x-[-100%] transition-transform duration-700">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Specifications Section -->
                                    <div class="specification priority-mobile"
                                        style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-top: 40px; padding: 20px;  box-shadow: 0 8px 20px rgba(0,0,0,0.2);background-color: rgba(0, 0, 0, 0.6);">

                                        <!-- Helmets -->
                                        <div class="specification-item"
                                            style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; text-align: left; font-family: 'Nunito Sans', sans-serif; color: #3596D3; font-weight: 700; font-size: 18px;">
                                            <i class="fas fa-helmet-safety"
                                                style="color: #3596D3; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; "></i>
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
                                            style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; border-left: 1px solid rgba(255,255,255,0.1); border-right: 1px solid rgba(255,255,255,0.1); padding: 0 15px; text-align: left; font-family: 'Nunito Sans', sans-serif; font-weight: 700; font-size: 18px; color: #3596D3;">
                                            <i class="fas fa-kit-medical"
                                                style="color: #3596D3; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; "></i>
                                            <div style="display: flex; flex-direction: column;">
                                                <span style="color: #AAAAAA; font-weight: 600; font-size: 14px;">First-Aid
                                                    Kit</span>
                                                <span style="color: #ffffff; font-weight: 700; font-size: 18px;">
                                                    {{ $vehicle->first_aid_kit ? 'Yes' : 'No' }}
                                                </span>
                                            </div>
                                        </div>


                                        <!-- Transmission -->
                                        <div class="specification-item"
                                            style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; text-align: left; font-family: 'Nunito Sans', sans-serif; font-weight: 700; font-size: 18px; color: #3596D3;">
                                            <i class="fas fa-cogs"
                                                style="color: #3596D3; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center;"></i>
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
                                            style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; border-left: 1px solid rgba(255,255,255,0.1); padding: 0 15px; text-align: left; font-family: 'Nunito Sans', sans-serif; font-weight: 700; font-size: 18px; color: #3596D3;">
                                            <i class="fas fa-road"
                                                style="color: #3596D3; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center;"></i>
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



                        </div>
                    </div>
                </div>
            </div>
        </div>






        </div>




    </section>

    <div class="title-area text-center mb-5 title-mob-check" style="margin-top: 0px; ">


        <div class="title-area text-center " style="">

            <h2 class="sec-title"
                style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                Check your booking </h2>
        </div>
    </div>

    <div class="container-fluid my-5">
        <div class="vehicle-container">
            <div class="row g-0">
                <!-- Vehicle Images Section -->
                <!-- Vehicle Images Section -->
<div class="col-lg-6 image-section p-4 d-flex flex-column align-items-center">
    @php
        $backendBaseUrl = config('app.backend_url');
        $subImages = [];

        if (!empty($vehicle->sub_image)) {
            $decoded = json_decode($vehicle->sub_image, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $subImages = $decoded;
            } else {
                $subImages = explode(',', $vehicle->sub_image);
            }
            $subImages = array_map(function ($img) {
                return trim($img, " \t\n\r\0\x0B\"");
            }, $subImages);
        }
    @endphp

    <!-- Main Image -->
    <div class="main-image-container position-relative mb-3" style="width: 100%;">
        <img src="{{ $vehicle->vehicle_image ? $backendBaseUrl . '/storage/' . ltrim($vehicle->vehicle_image, '/') : asset('/images/no-image.jpg') }}"
            class="main-image img-fluid rounded"
            alt="{{ $vehicle->name }}"
            style=" object-fit: contain; transform: scale(1.1); transition: transform 0.5s ease;">
    </div>

    <!-- Sub Images Grid -->
    @if (count($subImages) > 0)
        <div class="row g-2 w-100 sub-img-mob" style="margin-top: -100px">
            @foreach ($subImages as $index => $img)
                <div class="col-6">
                    <img src="{{ $backendBaseUrl . '/storage/' . ltrim($img, '/') }}"
                        class="img-fluid rounded sub-image"
                        alt="Sub Image {{ $index + 1 }}"
                        style=" object-fit: cover; cursor: pointer;"
                        data-bs-toggle="modal"
                        data-bs-target="#imageModal"
                        data-img="{{ $backendBaseUrl . '/storage/' . ltrim($img, '/') }}">
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Image Modal (Popup) -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark">
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid rounded" alt="Large Image">
            </div>
        </div>
    </div>
</div>

                <!-- Vehicle Details Section -->
                <div class="col-lg-6 details-section">
                    <h1 class="vehicle-title">{{ $vehicle->make }} {{ $vehicle->name }}</h1>

                    <div class="price-tag">
                        <i class="fas fa-dollar-sign"></i>{{ number_format($vehicle->price) }}
                    </div>

                    <div class="status-badges">
                        @if ($vehicle->availability)
                            <span class="status-badge badge-available">
                                <i class="fas fa-check-circle"></i> Available
                            </span>
                        @else
                            <span class="status-badge badge-unavailable">
                                <i class="fas fa-times-circle"></i> Not Available
                            </span>
                        @endif

                        <span class="status-badge badge-condition">
                            <i class="fas fa-star"></i> {{ $vehicle->condition }}
                        </span>
                    </div>

                    <div class="details-grid">
                        <div class="detail-card">
                            <div class="detail-label">
                                <i class="fas fa-users"></i> Seating Capacity
                            </div>
                            <div class="detail-value">{{ $vehicle->seats }} / Max: {{ $vehicle->max_seating_capacity }}
                            </div>
                        </div>

                        <div class="detail-card">
                            <div class="detail-label">
                                <i class="fas fa-suitcase"></i> Luggage Space
                            </div>
                            <div class="detail-value">{{ $vehicle->luggage_space }}</div>
                        </div>

                        <div class="detail-card">
                            <div class="detail-label">
                                <i class="fas fa-cogs"></i> Transmission
                            </div>
                            <div class="detail-value">{{ $vehicle->transmission }}</div>
                        </div>

                        <div class="detail-card">
                            <div class="detail-label">
                                <i class="fas fa-tachometer-alt"></i> Mileage
                            </div>
                            <div class="detail-value">{{ $vehicle->milage }}</div>
                        </div>



                    </div>

                    <div class="feature-list">
                        <div class="feature-item">
                            <div
                                class="feature-icon {{ $vehicle->air_conditioned ? 'feature-available' : 'feature-unavailable' }}">
                                <i class="fas fa-snowflake"></i>
                            </div>
                            <span>Air Conditioned</span>
                        </div>

                        <div class="feature-item">
                            <div
                                class="feature-icon {{ $vehicle->helmet ? 'feature-available' : 'feature-unavailable' }}">
                                <i class="fas fa-hard-hat"></i>
                            </div>
                            <span>Safety Helmet</span>
                        </div>

                        <div class="feature-item">
                            <div
                                class="feature-icon {{ $vehicle->first_aid_kit ? 'feature-available' : 'feature-unavailable' }}">
                                <i class="fas fa-first-aid"></i>
                            </div>
                            <span>First Aid Kit</span>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>



    <section class="bg-gradient-to-r from-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">

        <!-- 🔁 How It Works -->
        <div class="text-center " style="margin-bottom: 70px;">
            <h2 class="sec-title" style="font-weight: bold;">How It Works</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto px-4">

                    <!-- Step 1 -->
                    <div class="rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black-700 font-bold text-lg mb-2">1. Submit Your Request</div>
                        <p class="text-gray-600 text-base">Reach out to our local representative via WhatsApp or email.
                            Simply share your travel dates
                            and preferences, and we’ll handle the rest.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black-700 font-bold text-lg mb-2">2. Get a Quote</div>
                        <p class="text-gray-600 text-base">We’ll send you a personalized travel package and price tailored
                            to your needs — sent to you
                            as quickly as possible.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black-700 font-bold text-lg mb-2">3. Confirm & Travel</div>
                        <p class="text-gray-600 text-base">Once you confirm, we take care of every detail — so you can sit
                            back, relax, and enjoy a
                            worry-free journey.</p>
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

                    <p class="text-center text-gray-600 mb-4">
                        .
                    </p>

                    <!-- Alerts -->
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

                    <form action="{{ route('vehicle.booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

                        <div class="form-grid">
                            <!-- Full Name -->
                            <div class="form-group md:col-span-2">
                                <label for="fullName">Full Name *</label>
                                <input type="text" id="fullName" name="fullName" required placeholder="John Doe">
                            </div>

                            <!-- Country -->
                            <div class="form-group">
                                <label for="country">Country *</label>
                                <input type="text" id="country" name="country" required placeholder="USA">
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" required
                                    placeholder="example@mail.com">
                            </div>

                            <!-- Phone -->
                            <div class="form-group">
                                <label for="phone">Phone *</label>
                                <input type="tel" id="phone" name="phone" required
                                    placeholder="+1 123-456-7890">
                            </div>

                            <!-- WhatsApp -->
                            <div class="form-group">
                                <label for="whatsapp">WhatsApp *</label>
                                <input type="text" id="whatsapp" name="whatsapp" required
                                    placeholder="+1 123-456-7890">
                            </div>

                            <!-- Start Date -->
                            <div class="form-group">
                                <label for="startDate">Start Date *</label>
                                <input type="date" id="startDate" name="startDate" required>
                            </div>

                            <!-- End Date -->
                            <div class="form-group">
                                <label for="endDate">End Date *</label>
                                <input type="date" id="endDate" name="endDate" required>
                            </div>

                            <!-- Message -->
                            <div class="form-group md:col-span-3">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" rows="4" placeholder="Tell us your preferences or questions..."></textarea>
                            </div>

                            <!-- Button -->
                            <div class="form-group md:col-span-3 text-center pt-4">
                                <button type="submit" class="btn btn-submit">
                                    Submit Request
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div>






    </section>


    <section style="background: linear-gradient(135deg, #071f2b 0%, #000000 100%);">
        <div class="advantages-section"
            style="m background: linear-gradient(135deg, rgba(0,10,20,0.6) 0%, rgba(19,19,30,0.6) 100%); padding: 40px 0; border-radius: 20px; box-shadow: 0 15px 30px rgba(0,0,0,0.2); position: relative; overflow: hidden; border: 1px solid rgba(0,162,255,0.15);">
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('assets/img/pattern-dark.png') repeat; opacity: 0.03; z-index: 0;">
            </div>

            <div class="container position-relative" style="z-index: 1;">
                <div class="section-header text-center mb-5">
                    <h3
                        style="font-family: 'Montserrat', sans-serif; font-size: 32px; font-weight: 700; color: #ffffff; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 2px;">
                        Why Choose Our Vehicles</h3>
                    <div
                        style="width: 60px; height: 3px; background: linear-gradient(90deg, #00A2FF, #0069d9); margin: 0 auto 20px; border-radius: 2px;">
                    </div>
                </div>

                <div class="row"
                    style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; margin: 0 15px;">
                    <!-- Advantage Card 1 -->
                    <div class="advantage-card"
                        style="flex: 1; min-width: 250px; max-width: 280px; background: linear-gradient(135deg, rgba(19,19,30,0.8) 0%, rgba(30,30,47,0.8) 100%); padding: 30px 25px; border-radius: 16px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.2); border: 1px solid rgba(0,162,255,0.1); transition: all 0.3s ease;">
                        <div class="icon-container"
                            style="width: 80px; height: 80px; margin: 0 auto 20px; background: linear-gradient(135deg, rgba(0,162,255,0.1) 0%, rgba(0,105,217,0.1) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 15px rgba(0,162,255,0.15); border: 1px solid rgba(0,162,255,0.2);">
                            <i class="fas fa-shield-alt" style="font-size: 30px; color: #00A2FF;"></i>
                        </div>
                        <h4
                            style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 700; color: #ffffff; margin-bottom: 15px;">
                            Safety First</h4>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 15px; color: #AAAAAA; line-height: 1.6;">
                            All our
                            vehicles undergo regular maintenance and safety checks to ensure your journey is worry-free.</p>
                    </div>

                    <!-- Advantage Card 2 -->
                    <div class="advantage-card"
                        style="flex: 1; min-width: 250px; max-width: 280px; background: linear-gradient(135deg, rgba(19,19,30,0.8) 0%, rgba(30,30,47,0.8) 100%); padding: 30px 25px; border-radius: 16px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.2); border: 1px solid rgba(0,162,255,0.1); transition: all 0.3s ease;">
                        <div class="icon-container"
                            style="width: 80px; height: 80px; margin: 0 auto 20px; background: linear-gradient(135deg, rgba(0,162,255,0.1) 0%, rgba(0,105,217,0.1) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 15px rgba(0,162,255,0.15); border: 1px solid rgba(0,162,255,0.2);">
                            <i class="fas fa-dollar-sign" style="font-size: 30px; color: #00A2FF;"></i>
                        </div>
                        <h4
                            style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 700; color: #ffffff; margin-bottom: 15px;">
                            Best Rates</h4>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 15px; color: #AAAAAA; line-height: 1.6;">
                            We offer
                            competitive prices with no hidden fees. Long-term rental discounts available.</p>
                    </div>

                    <!-- Advantage Card 3 -->
                    <div class="advantage-card"
                        style="flex: 1; min-width: 250px; max-width: 280px; background: linear-gradient(135deg, rgba(19,19,30,0.8) 0%, rgba(30,30,47,0.8) 100%); padding: 30px 25px; border-radius: 16px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.2); border: 1px solid rgba(0,162,255,0.1); transition: all 0.3s ease;">
                        <div class="icon-container"
                            style="width: 80px; height: 80px; margin: 0 auto 20px; background: linear-gradient(135deg, rgba(0,162,255,0.1) 0%, rgba(0,105,217,0.1) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 15px rgba(0,162,255,0.15); border: 1px solid rgba(0,162,255,0.2);">
                            <i class="fas fa-headset" style="font-size: 30px; color: #00A2FF;"></i>
                        </div>
                        <h4
                            style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 700; color: #ffffff; margin-bottom: 15px;">
                            24/7 Support</h4>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 15px; color: #AAAAAA; line-height: 1.6;">
                            Road
                            assistance and customer support available around the clock for your convenience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.classList.add('opacity-0');
                setTimeout(() => msg.remove(), 500);
            }
        }, 5000);
    </script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modalImage = document.getElementById("modalImage");
        const subImages = document.querySelectorAll(".sub-image");

        subImages.forEach(img => {
            img.addEventListener("click", function () {
                modalImage.src = this.getAttribute("data-img");
            });
        });
    });
</script>

@endsection
