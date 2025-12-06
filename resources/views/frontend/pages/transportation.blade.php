@extends('frontend.layouts.app')

@section('title', 'VacayGuider | Transportation')

@section('content')

    <style>
        @media (max-width: 480px) {

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
                margin-top: -38px !important;
            }

            .sub-title {
                margin-bottom: 0px !important;

            }

            .filter-mob {
                margin-top: -20px;
                padding-bottom: 10px;

            }

            .title-area-mob {
                margin-top: 14px !important;

            }

            .rent-sub-tittle {
                margin-top: -60px !important;
            }

            element {}

            .demo-container {
                max-width: 1200px;
                margin: 0 auto;
                text-align: center;
            }

            .demo-container {

                height: 80px !important;

            }

        }


        .service-card {
            background: linear-gradient(135deg, #f6faff 0%, #ddeeff 100%);
        }

        .map-section {
            /* background-color: var(--secondary); */
            /* background:  url('/assets/img/map-bg-3.jpg'); */

          
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

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

        .service-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .service-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .icon-container {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .cta-button {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.4);
        }

        .title-underline {
            background: linear-gradient(90deg, #3b82f6 0%, #1d4ed8 100%);
        }
    </style>
    <style>
        .icon-container {
            background: linear-gradient(135deg, #3B82F6, #1E40AF);
        }

        .cta-button {
            background: linear-gradient(135deg, #3B82F6, #1E40AF);
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .service-card {
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .bg-smoke {
            background-color: #F5F5F5 !important;
        }

        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }




        h2 {
            color: #1a5276;
            margin-bottom: 20px;
            font-size: 32px;
            text-align: center;
            position: relative;
            padding-bottom: 10px;
        }


        h3 {
            color: #2980b9;
            margin-bottom: 15px;
            font-size: 22px;
        }

        p {
            margin-bottom: 15px;
            color: #555;
            font-size: 16px;
        }

        /* Map Section */
        .map-container {

            border-radius: 12px;
            padding: 30px;

            margin-bottom: -28px;
            text-align: center;
        }

        .map-image {
            width: auto;
            max-width: 600px;
            height: 600px !important;
            border-radius: 8px;
            margin: 20px 0;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        /* Transport Section */
        .transport-section {

            border-radius: 12px;
            padding: 30px;
            margin-bottom: 40px;
        }

        .transport-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .transport-card {
            background: linear-gradient(to bottom right, #f7fbff, #e6f7ff);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            border-left: 5px solid #3498db;
        }

        .transport-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .transport-card ul {
            margin-top: 15px;
            padding-left: 20px;
            list-style-type: disc;
            list-style-position: outside;
        }

        .transport-card li {
            margin-bottom: 8px;
            color: #555;
            display: list-item;
            padding-left: 5px;
        }

        .transport-card li::marker {
            color: #2980b9;
        }

        /* Booking Section */
        .booking-section {

            border-radius: 12px;
            padding: 30px;

        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .feature-item {
            text-align: center;
            padding: 25px;
            background: rgba(52, 152, 219, 0.1);
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }


     

        .feature-icon {
            font-size: 36px;
            margin-bottom: 15px;
            color: #2980b9;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {

            .transport-grid,
            .feature-grid {
                grid-template-columns: 1fr;
            }

            h2 {
                font-size: 26px;
            }

            h3 {
                font-size: 20px;
            }

        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: white;
            border-color: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
        }

        .pagination .page-link {

            color: black;

        }

        .space,
        .space-bottom {
            padding-bottom: 40px;
        }
    </style>

    {{-- <div class="container-fluid about-hero text-white position-relative"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/img/architecture-1837176_1920.jpg') center center / cover no-repeat; 
     display: flex;
     align-items: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-style7">
                        <span class="sub-title style1 text-white d-block mb-2">Tarnportation</span>
                        <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">Airport Transfers &
                            Island-Wide Rides
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}






    <section id="transportation" class="py-12  from-blue-50 to-green-50 map-section">

        <div class="w-full " style="margin-top: -39px; padding-bottom: 50px;">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-3">
                    <nav aria-label="Breadcrumb navigation" class="breadcrumb-mobile">
                        <ol class="flex items-center space-x-1 text-sm font-medium">
                            <!-- Home Link -->
                            <li class="flex items-center">
                                <a href="{{ url('/') }}"
                                    class="breadcrumb-item group flex items-center space-x-2 text-gray-500 hover:text-black focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 rounded-lg px-2 py-1.5 transition-all duration-200">
                                    <!-- Home Icon -->
                                    <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-500 transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="group-hover:text-black">Home</span>
                                </a>
                            </li>

                            <!-- Separator -->
                            <li class="flex items-center">
                                <svg class="w-3 h-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </li>

                            <!-- Current Page -->
                            <li class="flex items-center">
                                <span
                                    class="current-page flex items-center space-x-1.5 text-gray-800 font-semibold px-3 py-1.5 rounded-md border border-gray-200"
                                    aria-current="page">
                                    <!-- About Icon -->

                                    <span>Tarnportation</span>
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4">

            <div class="title-area text-center mb-5 title-mob" style="margin-top: -50px; ">


                <div class="title-area text-center  " style="">
                    {{-- <span class="sub-title"
                            style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Premium Car Rentals</span> --}}
                    <h2 class="sec-title"
                        style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        We Deliver Comfort Every
                        Mile</h2>
                </div>

                <p class="text-center " style="margin-top: -40px;margin-bottom: 50px; color:#000; ">
                    Enjoy professional and reliable transportation services from Bandaranaike International
                    Airport to any destination across Sri Lanka — and from anywhere on the island back to the
                    airport. Punctual, comfortable, and tailored to your travel needs.
                </p>
            </div>


            <!-- Three Column Layout: Left Content | Map | Right Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                <!-- Left Content -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Service Type 1: Airport Transfers -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">

                        <!-- Centered Icon + Heading -->
                        <div class="flex justify-center items-center ">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2"
                                style="margin-top: -14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>

                            <!-- Heading -->
                            <h4 class="font-bold text-lg text-gray-800 leading-none">Airport Transfers</h4>
                        </div>

                        <!-- Description List (aligned left) -->
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                From/to Bandaranaike International Airport
                            </li>
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                Meet & Greet service with flight tracking
                            </li>
                        </ul>

                    </div>


                    <!-- Service Type 2: Island-Wide Transfers -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <!-- Centered Icon + Heading -->
                        <div class="flex justify-center items-center mb-3">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2"
                                style="margin-top: -14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                            <!-- Heading -->
                            <h4 class="font-bold text-lg text-gray-800 leading-none">Island-Wide Transfers</h4>
                        </div>

                        <!-- Description List -->
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                Point-to-point travel anywhere in Sri Lanka
                            </li>
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                24/7 availability
                            </li>
                        </ul>
                    </div>

                    <!-- Service Type 3: City Tours & Day Trips -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <!-- Centered Icon + Heading -->
                        <div class="flex justify-center items-center mb-3">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2"
                                style="margin-top: -14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>

                            <!-- Heading -->
                            <h4 class="font-bold text-lg text-gray-800 leading-none">City Tours & Day Trips</h4>
                        </div>

                        <!-- Description List -->
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                Customizable sightseeing tours in cities like Colombo, Kandy, Galle, etc.
                            </li>
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                Half-day and full-day options
                            </li>
                        </ul>
                    </div>

                </div>

                <!-- Center Map Section -->
                <div class="lg:col-span-1 flex justify-center">
                    <div class="relative overflow-hidden ">
                        <img src="assets/img/map-car.png" alt="Sri Lanka Transport Map"
                            class="w-full h-auto object-cover max-w-sm">
                    </div>
                </div>

                <!-- Right Content -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Service Type 4: Hotel Transfers -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <!-- Centered Icon + Heading -->
                        <div class="flex justify-center items-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2"
                                style="margin-top: -14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h4 class="font-bold text-lg text-gray-800 leading-none">Hotel Transfers</h4>
                        </div>

                        <ul class="space-y-2 text-sm">
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                Reliable pickup/drop-off to and from hotels and resorts
                            </li>
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                Luggage assistance and coordination
                            </li>
                        </ul>
                    </div>

                    <!-- Service Type 5: Hourly/Distance Rentals -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <div class="flex justify-center items-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2"
                                style="margin-top: -14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h4 class="font-bold text-lg text-gray-800 leading-none">Hourly/Distance Rentals</h4>
                        </div>

                        <ul class="space-y-2 text-sm">
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                Vehicles available by the hour or kilometer
                            </li>
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                Ideal for meetings, events, or flexible travel plans
                            </li>
                        </ul>
                    </div>

                    <!-- Service Type 6: Premium Features -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <div class="flex justify-center items-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2"
                                style="margin-top: -14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <h4 class="font-bold text-lg text-gray-800 leading-none">Premium Features</h4>
                        </div>

                        <ul class="space-y-2 text-sm">
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                GPS tracking and live updates
                            </li>
                            <li class="flex items-start text-gray-600 leading-relaxed">
                                <span class="w-2 h-2 mt-2 bg-black rounded-full mr-2 flex-shrink-0"></span>
                                English-speaking drivers
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="sidebar-overlay"></div>

    <section class="position-relative overflow-hidden bg-smoke space" id="service-sec" data-bg-src="">
        <div class="container-fluid" style="margin-top: -82px;">
            <div class="row">


                <div class="title-area text-center" style=" ">


                    <div class="title-area title-area-mob text-center " style="">
                        <span class="sub-title"
                            style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Premium
                            Vehicles</span>
                        <h2 class="sec-title"
                            style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                            Find Your Perfect Ride </h2>
                    </div>
                </div>


                <div class="row " style="margin-top: -45px;">

                    <!-- Filter Toggle Button (Visible only on mobile) -->
                    <div class="d-md-none w-100 px-3 mb-3 filter-mob">
                        <button id="toggleFilterBtn" class="w-100 d-flex align-items-center gap-2  rounded-lg p-2"
                            style="border: 1px solid #ddd; justify-content: center;background: #f8f9fa;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                            </svg>
                            <span style="font-size: 14px;">Filter</span>
                        </button>
                    </div>

                    <!-- Sidebar Filter Section - 1/4 width -->
                    <div class="col-md-3 sidebar-container" id="vehicleSidebar">
                        <div class="sidebar-content p-4" style="width: 100%;">
                            <div class="filter-sidebar p-4"
                                style="border-radius: 10px; border: 1px solid #dee2e6; background: rgb(255, 255, 255);">

                                <div class="d-flex justify-content-end align-items-center d-md-none mb-3">
                                    <button id="closeVehicleSidebarBtn" class="btn-sm text-danger border-0 shadow-none">
                                        <i class="fas fa-times fa-lg"></i>
                                    </button>
                                </div>

                                <form id="vehicleFilterForm">
                                    <div class="filter-section mb-4">
                                        <h5 class="filter-heading text-black" style="font-size: 16px;">
                                            Vehicle Type
                                        </h5>
                                        <div class="ps-2">
                                            <div class="ps-2"
                                                style="border-bottom: 2px solid #e1dede; padding-bottom: 10px;">
                                                @foreach ($vehicleTypes as $type)
                                                    <div class="form-check mb-2 d-flex align-items-center">
                                                        <input class="form-check-input" name="types[]"
                                                            value="{{ $type }}" type="checkbox"
                                                            id="vehicle_type_{{ $loop->index }}">
                                                        <label class="form-check-label ms-2"
                                                            for="vehicle_type_{{ $loop->index }}">
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
                    </div>



                    <!-- Results Section -->
                    <div class="col-md-9" id="filteredVehicleResults">
                        <div class="row justify-content-center">
                            @foreach ($vehicles as $vehicle)
                                   @php
                    $backendBaseUrl = config('app.backend_url');
                    $vehicleImageUrl = $vehicle->vehicle_image
                        ? $backendBaseUrl . '/storage/' . ltrim($vehicle->vehicle_image, '/')
                        : asset('assets/img/bike3.png');
                @endphp
                                <div class="col-12 col-sm-6 col-md-4 mb-4 vehicle-card" data-type="{{ $vehicle->type }}">
                                    <div class="tour-box style2 th-ani"
                                        style="cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border-radius: 16px; overflow: hidden; min-height: 320px; position: relative; background: #ffffff; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid rgba(0, 0, 0, 0.06); transform: translateY(0px);"
                                        onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 40px rgba(0, 0, 0, 0.15)'"
                                        onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.08)'">

                                        <!-- Vehicle Image -->
                                        <div class="tour-box_img global-img"
                                            style="position: relative; overflow: hidden;">
                                            <img src="{{ $vehicleImageUrl }}"
                                                alt="{{ $vehicle->name }}"
                                                style="width: 100%; height: 220px; object-fit: cover; transition: transform 0.3s ease;"
                                                onmouseover="this.style.transform='scale(1.05)'"
                                                onmouseout="this.style.transform='scale(1)'">
                                            <div
                                                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.1) 100%);">
                                            </div>

                                            <!-- Price Label -->
                                            <div
                                                style="position: absolute; top: 12px; right: 12px; background:#96c93e; color: white; padding: 8px 12px; border-radius: 10px; font-size: 14px; font-weight: 700; backdrop-filter: blur(10px); box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                                                <span style="font-size: 16px;">$ {{ $vehicle->price }}</span>
                                                <span style="font-size: 12px; opacity: 0.9;">/ day</span>
                                            </div>
                                        </div>

                                        <!-- Vehicle Content -->
                                        <div class="tour-content" style="padding: 20px 18px; text-align: center;">
                                            <h3 class="box-title"
                                                style="font-size: 20px; font-weight: 700; margin-bottom: 20px; color: #1a1a1a; letter-spacing: -0.02em; line-height: 1.3;">
                                                {{ $vehicle->name }}
                                            </h3>

                                            <a href="{{ route('transportation.details', $vehicle->id) }}"
                                                class="btn btn-primary btn-sm"
                                                style="display: inline-block; padding: 12px 24px; font-size: 14px; font-weight: 600; border-radius: 10px; background: linear-gradient(135deg, rgb(13, 78, 107) 0%, rgb(10, 61, 82) 100%); color: white; text-decoration: none; border: none; transition: all 0.2s ease; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3); letter-spacing: 0.02em;"
                                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59, 130, 246, 0.4)'"
                                                onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 2px 8px rgba(59, 130, 246, 0.3)'">
                                                Continue Booking
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="row justify-content-center mt-4">
                                <div class="col-auto">
                                    {{ $vehicles->links() }}
                                </div>
                            </div>
                        </div>


                    </div>



                </div>
            </div>
    </section>
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
                            and preferences, and we’ll handle the rest
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






    </section>

    <section id="transportation" class="py-5 bg-white">
        <div class="container mx-auto">
            <div class="booking-section  ">




                <div class="title-area text-center " style="">
                    {{-- <span class="sub-title"
                        style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">
                        Services</span> --}}
                    <h2 class="sec-title"
                        style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Pre-Booking Transportation </h2>
                </div>
                <p class="text-center mt-3 mb-3"> Ensure a smooth start to your journey with our <strong>Pre-Booking
                        Ensure a smooth start to your journey with our pre-booking transportation services. Whether you’re arriving at the airport or planning day-to-day travel during your stay, our reliable options are designed for convenience and peace of mind. Choose from private airport transfers, chauffeur-driven vehicles, or self-drive car rentals—all bookable in advance to save time and avoid last-minute stress. With VacayGuider, you can travel confidently, knowing your transport is secured, punctual, and tailored to your itinerary.
                </p>

                <div class="feature-grid" style="margin-top: 50px;">
                    <div class="feature-item">
                        <div class="feature-icon">🛡️</div>
                        <h3>Safe Travel</h3>
                        <p>Verified drivers and well-maintained vehicles with safety features and insurance coverage for
                            complete peace of mind.</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">💰</div>
                        <h3>Budget-Friendly Options</h3>
                        <p>Affordable transportation solutions with transparent pricing and no hidden costs for every
                            budget.</p>
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

            fetch("{{ route('filter.transportation') }}?" + params.toString(), {
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
        document.addEventListener("DOMContentLoaded", function() {
            const toggleBtn = document.getElementById("toggleFilterBtn");
            const sidebar = document.getElementById("vehicleSidebar"); // fixed ID
            const closeBtn = document.getElementById("closeVehicleSidebarBtn");
            const overlay = document.getElementById("vehicleSidebarOverlay");

            toggleBtn.addEventListener("click", function() {
                sidebar.classList.add("show");
                overlay.classList.add("active");
                document.body.classList.add("sidebar-open");
            });

            function closeSidebar() {
                sidebar.classList.remove("show");
                overlay.classList.remove("active");
                document.body.classList.remove("sidebar-open");
            }

            closeBtn.addEventListener("click", closeSidebar);
            overlay.addEventListener("click", closeSidebar);
        });
    </script>

@endsection
