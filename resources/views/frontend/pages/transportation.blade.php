@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
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

        h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, #1a5276, #3498db);
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
            background: linear-gradient(to bottom right, #fff8eb, #fff2d9);
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #f39c12;
            border-right: 4px solid #f39c12;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }


        .feature-item:hover {
            transform: translateY(-5px);
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
            background-color: black;
            color: white;
            border-color: black;
        }

        .pagination .page-link {

            color: black;

        }

        .space,
        .space-bottom {
            padding-bottom: 40px;
        }
    </style>

    <div class="container-fluid about-hero text-white position-relative"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/img/architecture-1837176_1920.jpg') center center / cover no-repeat; 
     display: flex;
     align-items: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-style7">
                        <span class="sub-title style1 text-white d-block mb-2">Tarnportation</span>
                        <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">Airport Transfers & Island-Wide Rides
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <section id="transportation" class="py-12  from-blue-50 to-green-50">
        <div class="container mx-auto px-4">


            <div class="title-area text-center mb-5" style=" padding-bottom: 20px">
                <!-- <span class="sub-title" style="font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500; color: #0069d9; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 8px;">Premium Car Rentals</span> -->
                {{-- <span class="sub-title fw-semibold">Tarnportation</span> --}}
                <h2 class="sec-title"
                    style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #1a2b49; margin-bottom: 20px;">
                    We deliver comfort every
                            mile.
                    </h2>

            </div>

            <!-- Three Column Layout: Left Content | Map | Right Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                <!-- Left Content -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Service Type 1: Airport Transfers -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <div class="flex items-start">
                            <div class="icon-container p-3 rounded-2xl mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-gray-800 mb-2">Airport Transfers</h4>
                                <ul class="space-y-1 text-sm">
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        From/to International Airport
                                    </li>
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        Meet service with flight tracking
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Service Type 2: Island-Wide Transfers -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <div class="flex items-start">
                            <div class="icon-container p-3 rounded-2xl mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-gray-800 mb-2">Island-Wide Transfers</h4>
                                <ul class="space-y-1 text-sm">
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        Point-to-point travel anywhere
                                    </li>
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        24/7 availability
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Service Type 3: City Tours & Day Trips -->
                    <div class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <div class="flex items-start">
                            <div class="icon-container p-3 rounded-2xl mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-gray-800 mb-2">City Tours & Day Trips</h4>
                                <ul class="space-y-1 text-sm">
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        Customizable sightseeing tours
                                    </li>
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        Half-day and full-day options
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                    <div class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <div class="flex items-start">
                            <div class="icon-container p-3 rounded-2xl mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-gray-800 mb-2">Hotel Transfers</h4>
                                <ul class="space-y-1 text-sm">
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        Reliable pickup/drop-off to hotels
                                    </li>
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        Luggage assistance and coordination
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Service Type 5: Hourly/Distance-Based Rentals -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <div class="flex items-start">
                            <div class="icon-container p-3 rounded-2xl mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-gray-800 mb-2">Hourly/Distance Rentals</h4>
                                <ul class="space-y-1 text-sm">
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        Vehicles by hour or kilometer
                                    </li>
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        Ideal for meetings and events
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Features -->
                    <div
                        class="service-card bg-smoke hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-25 p-6 rounded-xl border border-gray-100 shadow-lg">
                        <div class="flex items-start">
                            <div class="icon-container p-3 rounded-2xl mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-gray-800 mb-2">Premium Features</h4>
                                <ul class="space-y-1 text-sm">
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        GPS tracking and live updates
                                    </li>
                                    <li class="text-gray-600 leading-relaxed flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 flex-shrink-0"></span>
                                        English-speaking drivers
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative overflow-hidden bg-smoke space" id="service-sec" data-bg-src="">
        <div class="container" style="margin-top: -82px;">
            <div class="row">
                <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top: 100px;">
                    <!-- <span class="sub-title" style="font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500; color: #0069d9; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 8px;">Premium Car Rentals</span> -->
                    <span class="sub-title fw-semibold">Premium Vehicles</span>
                    <h2 class="sec-title"
                        style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #1a2b49; ">
                        Find Your Perfect Ride</h2>

                </div>

                <div class="row mt-3">


                    <!-- Sidebar Filter Section - 1/4 width -->
                    <div class="col-md-3">
                        <div class="filter-sidebar p-4 shadow" style="background-color: #f8f9fa; border-radius: 15px; ">
                            <form id="vehicleFilterForm">
                                <div class="filter-section mb-4">
                                    <h5 style="font-size: 18px; font-weight: 700; color: #000000; margin-bottom: 15px;">
                                        <i class="fas fa-tag me-2" style="color: #000000;"></i>Vehicle Type
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

                    <!-- Results Section -->
                    <div class="col-md-9" id="filteredVehicleResults">
                        <div class="row">
                            @foreach ($vehicles as $vehicle)
                                @php
                                    $vehicleType = strtolower($vehicle->type); // e.g., car, bike, etc.
                                    $imagePath = $vehicle->image ? 'storage/' . $vehicle->image : null;
                                    $fallbackImage = 'assets/img/dummy/' . ($vehicleType ?: 'default') . '.jpg';
                                @endphp
                                <div class="col-12 col-sm-6 col-md-4 mb-4 vehicle-card" data-type="{{ $vehicle->type }}">
                                    <div class="tour-box style2 th-ani"
                                        style="cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border-radius: 16px; overflow: hidden; min-height: 320px; position: relative; background: #ffffff; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid rgba(0, 0, 0, 0.06); transform: translateY(0px);"
                                        onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 40px rgba(0, 0, 0, 0.15)'"
                                        onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.08)'">

                                        <!-- Vehicle Image -->
                                        <div class="tour-box_img global-img"
                                            style="position: relative; overflow: hidden;">
                                            <img src="{{ $vehicle->image && file_exists(public_path($imagePath)) ? asset($imagePath) : asset($fallbackImage) }}"
                                                alt="{{ $vehicle->name }}"
                                                style="width: 100%; height: 220px; object-fit: cover; transition: transform 0.3s ease;"
                                                onmouseover="this.style.transform='scale(1.05)'"
                                                onmouseout="this.style.transform='scale(1)'">
                                            <div
                                                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.1) 100%);">
                                            </div>

                                            <!-- Price Label -->
                                            <div
                                                style="position: absolute; top: 12px; right: 12px; background: rgba(5, 150, 105, 0.95); color: white; padding: 8px 12px; border-radius: 20px; font-size: 14px; font-weight: 700; backdrop-filter: blur(10px); box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
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
                                                style="display: inline-block; padding: 12px 24px; font-size: 14px; font-weight: 600; border-radius: 8px; background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white; text-decoration: none; border: none; transition: all 0.2s ease; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3); letter-spacing: 0.02em;"
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


    <section id="transportation" class="py-5 bg-white">
        <div class="container mx-auto">
            <div class="booking-section  ">


                <div class="title-area text-center mb-5" style="">
                    <!-- <span class="sub-title" style="font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500; color: #0069d9; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 8px;">Premium Car Rentals</span> -->
                    <span class="sub-title fw-semibold">Services</span>
                    <h2 class="sec-title"
                        style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #1a2b49; ">
                        Pre-Booking Transportation </h2>

                </div>
                <p class="text-center mt-3 mb-3"> Ensure a smooth start to your journey with our <strong>Pre-Booking
                        Transportation Services</strong>. Whether you're arriving at the airport or planning day-to-day
                    travel during your stay, our reliable options are designed for convenience and peace of mind. Choose
                    from <strong>private airport transfers</strong>, <strong>chauffeur-driven vehicles</strong>, or
                    <strong>self-drive car rentals</strong> — all bookable in advance to save time and avoid last-minute
                    stress. With <strong>Vacay Guider</strong>, you can travel confidently knowing your transport is
                    secured, punctual, and tailored to your itinerary.
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
@endsection
