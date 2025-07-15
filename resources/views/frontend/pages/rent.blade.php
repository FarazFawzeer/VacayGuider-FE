@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        .ps-2 {
            padding-left: 0 !important;
        }

        .form-check {
            padding-left: 0;
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
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: white;
            border-color:  linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
        }

        .pagination .page-link {

            color: black;

        }

        .space,
        .space-bottom {
            padding-bottom: 0;
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

        .hero-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            text-align: center;

            backdrop-filter: blur(10px);
        }

        .hero-image {
            width: 100%;
            max-width: 600px;
            height: 300px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .hero-title {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 20px;
        }

        .overview-text {
            font-size: 1.1rem;
            color: #34495e;

            margin: 0 auto;
            text-align: left;
        }

        .overview-text p {
            margin-bottom: 15px;
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
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
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
            border: 2px solid #e9ecef;
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
            background: linear-gradient(135deg, #000000, #000000);
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

            color: white;
            text-align: center;
        }

        .success-section .step-number {
            background: #3596d3;
        }

        .bottom-image {
            text-align: center;
            margin: 40px 0;

        }

        .bottom-image img {
            width: 100%;
            max-width: 800px;
            height: 400px;
            object-fit: cover;
            border-radius: 20px;
            display: inline-block;

            box-shadow: 0 20px 40px rgba(86, 58, 58, 0.2);
        }

        .bottom-image p {
            font-size: 1.3rem;
            color: white;
            font-weight: 600;
            margin-top: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .info-badge {
            background: rgba(52, 152, 219, 0.1);
            border-left: 4px solid #3498db;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .info-badge p {
            color: #2980b9;
            font-weight: 500;
            margin: 0;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .step-header {
                flex-direction: column;
                text-align: center;
            }

            .step-number {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>

    <div class="w-full ">
        <div class="mx-auto  px-4 sm:px-6 lg:px-8">
            <div class="py-3">
                <nav aria-label="Breadcrumb navigation" class="breadcrumb-mobile">
                    <ol class="flex items-center space-x-1 text-sm font-medium">
                        <!-- Home Link -->
                        <li class="flex items-center">
                            <a href="{{ url('/') }}"
                                class="breadcrumb-item group flex items-center space-x-2 text-gray-500 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 rounded-lg px-2 py-1.5 transition-all duration-200">
                                <!-- Home Icon -->
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

                        <!-- Current Page -->
                        <li class="flex items-center">
                            <span
                                class="current-page flex items-center space-x-1.5 text-gray-800 font-semibold px-3 py-1.5 rounded-md border border-gray-200"
                                aria-current="page">
                                <!-- About Icon -->

                                <span>Rent Vehicles</span>
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
            <div class="title-area text-center mb-5" style="margin-top: -126px; ">


                <div class="title-area text-center " style="">
                    {{-- <span class="sub-title"
                            style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Premium Car Rentals</span> --}}
                    <h2 class="sec-title"
                        style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Select Your Vehicle </h2>
                </div>
            </div>



            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
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
                                            style="background: linear-gradient(135deg, #071f2b 0%, #000000 100%); overflow: hidden; margin: 10px; transition: all 0.3s ease; position: relative; padding: 30px;  border: 1px solid rgba(0,162,255,0.1);">

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
                                                        style="width: 100%; max-width: auto; height: 350px; object-fit: contain; z-index: 2; transform: scale(1.1); transition: transform 0.5s ease; ">
                                                </div>


                                                <!-- Right Section -->
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
                                            <div class="specification priority-mobile"
                                                style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-top: 40px; padding: 20px;  box-shadow: 0 8px 20px rgba(0,0,0,0.2);background-color: rgba(0, 0, 0, 0.6);">

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


            <script>
                const vehiclesData = @json(
                    $vehicles->map(function ($vehicle) {
                        return ['id' => $vehicle->id];
                    }));
            </script>
            <!-- Improved RESERVE NOW Button -->
            <div class="reserve-button-container" style="display: flex; justify-content: center; margin-top: 50px;">
                <a href="#" id="reserveButton" class="reserve-now-btn"
                    style="display: inline-block; background: linear-gradient(135deg, #FF4D4D, #CC0000); color: white; font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 18px; text-transform: uppercase; padding: 18px 42px; border-radius: 10px; text-decoration: none; letter-spacing: 1.5px; box-shadow: 0 8px 20px rgba(0,162,255,0.3); transition: all 0.3s ease; position: relative; overflow: hidden;">
                    <span style="position: relative; z-index: 2;">RESERVE NOW</span>
                    <div class="btn-glow"
                        style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%); z-index: 1; animation: glow 2s infinite linear;">
                    </div>
                </a>
            </div>


        </div>




    </section>




    <!-- Tour Page with Sidebar Filter Section -->
    <section class="position-relative  overflow-hidden space" id="service-sec" data-bg-src=""
        style="background: #F5F5F5;padding-bottom: 44px;">
        <div class="container-fluid" style="margin-top: -82px;">
            <div class="row">
                <div class="title-area text-center mb-5" style="margin-top: -10px; ">
                    <div class="title-area text-center " style="">

                        <h2 class="sec-title"
                            style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                            Find Your Perfect Ride </h2>
                    </div>
                </div>

                <div class="row " style="margin-top: -45px;">


                    <!-- Sidebar Filter Section - 1/4 width -->
                    <div class="col-md-3">
                        <div class="filter-sidebar p-4 shadow" style="background-color: #f8f9fa; border-radius: 15px; ">
                            <form id="vehicleFilterForm">
                                <div class="filter-section mb-4">
                                    <h5 class="filter-heading text-black" style="font-size: 16px">
                                        Vehicle Type
                                    </h5>
                                    <div class="ps-2">
                                        <div class="ps-2"
                                            style="border-bottom: 2px solid #e1dede; padding-bottom: 10px;">
                                            @foreach ($vehicleTypes as $type)
                                                <div class="form-check mb-2 d-flex align-items-center">
                                                    <input class="form-check-input" name="types[]"
                                                        value="{{ $type }}" type="checkbox"
                                                        id="vehicle_type_{{ $loop->index }}"
                                                        style="font-size: 14px; color:#000; border: 2px solid #000; ">
                                                    <label class="form-check-label ms-2"
                                                        for="vehicle_type_{{ $loop->index }}"
                                                        style="font-size: 14px; color:#000; ">
                                                        {{ ucfirst($type) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Results Section -->
                    <div class="col-md-9" id="filteredVehicleResults">
                        @include('frontend.partials.vehicle_cards', ['vehicles' => $vehicles])

                    </div>



                </div>
            </div>
    </section>


    <section style="margin-top: 50px">
        <div class="container-fluid">

            <div class="title-area text-center mb-5" style="margin-top: -10px; ">


                <div class="title-area text-center " style="">
                    <span class="sub-title"
                        style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Get
                        your Driving Permit</span>
                    <h2 class="sec-title"
                        style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Apply your Driving Permit</h2>
                </div>
            </div>

            <!-- Hero Section -->
            <div class="hero-section">
                <div class="container">
                    <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="Driving in Sri Lanka" class="hero-image">
                    {{-- <h1 class="hero-title">Get Your Sri Lanka Driving License</h1>
                <p class="hero-subtitle">Start your journey with confidence!</p> --}}

                    <div class="overview-text">
                        <div class="info-badge">
                            <p><strong>Important:</strong> Sri Lanka requires foreign nationals to verify their license
                                locally.
                                You cannot legally drive using an IDP or foreign license alone.</p>
                        </div>
                        <p>
                            To help make your trip seamless, we assist in arranging your temporary driving license in
                            advance.
                            By choosing to arrange your license beforehand, you've made the right decision to save time and
                            enjoy every moment of your stay.To help make your trip seamless, we assist in arranging your
                            temporary driving license in advance. By choosing to arrange your license beforehand, you've
                            made
                            the right decision to save time and enjoy every moment of your stay
                        </p>
                    </div>
                    <div class="bottom-image">
                        <img src="https://images.unsplash.com/photo-1586500036706-41963de24d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                            alt="Sri Lanka scenic roads">

                    </div>

                </div>


                <!-- Steps Container -->
                <div class="steps-container">
                    <!-- Step 1: Form -->
                    <div class="step-card">
                        <div class="step-header">
                            <div class="step-number">01</div>
                            <h2 class="step-title">Fill the Request Form</h2>
                        </div>
                        <!-- Alerts -->
                        @if (session('success'))
                            <div class="alert alert-success" id="alert-success">
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
                        <form action="{{ route('driving-permit.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="guest_name">Guest Name *</label>
                                    <input type="text" id="guest_name" name="guest_name" required
                                        placeholder="Enter your full name">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address *</label>
                                    <input type="email" id="email" name="email" required
                                        placeholder="your.email@example.com">
                                </div>

                                <div class="form-group">
                                    <label for="license_no">License Number *</label>
                                    <input type="text" id="license_no" name="license_no" required
                                        placeholder="Your license number">
                                </div>

                                <div class="form-group">
                                    <label for="whatsapp">WhatsApp Number *</label>
                                    <input type="tel" id="whatsapp" name="whatsapp" required
                                        placeholder="+1 234 567 8900">
                                </div>

                                <div class="form-group">
                                    <label for="license_front">Front Side of Your License *</label>
                                    <input type="file" id="license_front" name="license_front" required
                                        accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label for="license_back">Back Side of Your License *</label>
                                    <input type="file" id="license_back" name="license_back" required
                                        accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label for="selfie">Picture of Yourself - Upper Body *</label>
                                    <input type="file" id="selfie" name="selfie" required accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label for="collection_method">Collection Method *</label>
                                    <select id="collection_method" name="collection_method" required>
                                        <option value="">—Please choose an option—</option>
                                        <option value="pick_up">Pick Up from Office</option>
                                        <option value="delivery">Home/Hotel Delivery</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-submit" style="background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);">Submit Application</button>
                            </div>
                        </form>
                    </div>

                    <Div class="row" style="gap: 0px">
                        <!-- Step 2: Payment -->
                        <div class="step-card col-md-6" style="  box-shadow: none !important;">
                            <div class="step-header">
                                <div class="step-number">02</div>
                                <h2 class="step-title">Make the Payment</h2>
                            </div>

                            <div class="payment-info">
                                <p>
                                    <strong>Processing Fee: $40</strong><br>
                                    Processing Time: 2–3 business days
                                </p>
                                <p>Once you've submitted the form above, proceed with the secure payment to process your
                                    temporary
                                    driving license.</p>
                            </div>

                            {{-- <div style="text-align: center;">
                        <a href="#" class="btn">Pay $40 </a>
                    </div>

                    <p style="margin-top: 20px; text-align: center; color: #7f8c8d;">
                        💬 Have questions? Contact us via WhatsApp for instant support.
                    </p> --}}
                        </div>

                        <!-- Step 3: Enjoy -->
                        <div class="step-card success-section col-md-6" style="  box-shadow: none !important;">
                            <div class="step-header">
                                <div class="step-number">03</div>
                                <h2 class="step-title">Enjoy Your Ride</h2>
                            </div>

                            {{-- <p style="font-size: 1.2rem; margin-bottom: 10px; color: #ffff;">
                        You will receive your driving license at the requested location on time.
                        For any clarifications, feel free to contact us.
                    </p>

                    <p style="font-size: 1.1rem; opacity: 0.9;color: #ffff;">
                        Ready to explore the beautiful roads of Sri Lanka with complete peace of mind!
                    </p> --}}

                            <div class="payment-info" style="background: #96c83d;">
                                <p>
                                    You will receive your driving license at the requested location on time.
                                    For any clarifications, feel free to contact us
                                </p>
                                <p> Ready to explore the beautiful roads of Sri Lanka with complete peace of mind!</p>
                            </div>
                        </div>
                    </Div>
                </div>
            </div>
            <!-- Bottom Image -->
    </section>


    <section style="background: linear-gradient(180deg, #0B0B13 0%, #121219 100%);margin-top: -80px;">
        <div class="advantages-section"
            style="margin-top: 80px; background: linear-gradient(135deg, rgba(0,10,20,0.6) 0%, rgba(19,19,30,0.6) 100%); padding: 40px 0; border-radius: 20px; box-shadow: 0 15px 30px rgba(0,0,0,0.2); position: relative; overflow: hidden; border: 1px solid rgba(0,162,255,0.15);">
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
        function fetchFilteredVehicles() {
            const formData = new FormData(document.getElementById('vehicleFilterForm'));
            const params = new URLSearchParams();

            for (const [key, value] of formData.entries()) {
                params.append(key, value);
            }

            fetch("{{ route('filter.vehicles') }}?" + params.toString(), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(data => {
                    document.getElementById('filteredVehicleResults').innerHTML = data;
                });
        }

        // Run filter when checkboxes change
        window.addEventListener('DOMContentLoaded', () => {
            document.getElementById('vehicleFilterForm').addEventListener('change', fetchFilteredVehicles);
        });

        window.addEventListener('DOMContentLoaded', () => {
            // Reset all filters (clear checkboxes) on page load
            document.getElementById('vehicleFilterForm').reset();

            // Attach the filter event listener after reset
            document.getElementById('vehicleFilterForm').addEventListener('change', fetchFilteredVehicles);
        });
    </script>

    <script>
        setTimeout(() => {
            const successAlert = document.getElementById('alert-success');
            const errorAlert = document.getElementById('alert-danger');

            if (successAlert) {
                successAlert.style.display = 'none';
            }

            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 5000); // 5000ms = 5 seconds
    </script>


    {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Initialize Swiper
            const swiper = new Swiper('.th-slider', {
                
                navigation: {
                    nextEl: '.swiper-button-next-rental',
                    prevEl: '.swiper-button-prev-rental'
                },
                loop: false,
          
                 // Important for correct index mapping
                // Other options...
            });
            
            const reserveBtn = document.getElementById('reserveButton');
            
            // Update button URL when slide changes
            swiper.on('slideChange', function() {
                updateReserveButtonUrl(swiper.activeIndex);
            });
            
            // Initialize with first vehicle
            if (vehiclesData.length > 0) {
                updateReserveButtonUrl(0);
            }
            
            // Handle button click
            reserveBtn.addEventListener('click', function(e) {
                if (this.href === '#') {
                    e.preventDefault();
                    return;
                }
                
                // Optional: Add loading state
                this.querySelector('.loading-spinner').style.display = 'inline-block';
                this.querySelector('span:not(.loading-spinner)').style.display = 'none';
            });
            
            function updateReserveButtonUrl(index) {
                if (vehiclesData[index]) {
                    reserveBtn.href = `/rent-detail/${vehiclesData[index].id}`;
                    reserveBtn.querySelector('.loading-spinner').style.display = 'none';
                    reserveBtn.querySelector('span:not(.loading-spinner)').style.display = 'inline';
                }
            }
            
        } catch (error) {
            console.error('Swiper initialization error:', error);
        }
    });
</script> --}}

@endsection
