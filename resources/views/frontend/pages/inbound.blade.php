@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
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

        #daysRangeSlider::-webkit-slider-thumb {
            background-color: #000000;
            /* Blue */
            border: none;
        }

        #daysRangeSlider::-moz-range-thumb {
            background-color: #000000;
            border: none;
        }

        #daysRangeSlider::-ms-thumb {
            background-color: #000000;
            border: none;
        }

        .form-check-label {
            margin-bottom: 0;
            font-size: 14px;
            color: black;
        }

        input[type="checkbox"]:checked+label {
            color: #000;
        }

        .form-check-input:checked {
            background-color: #000;
            border-color: #000;
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



        .ps-2 {
            padding-left: 0 !important;
        }

        .form-check {
            padding-left: 0;
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
            background: #6dab3c;
            color: white;
            text-align: center;
        }

        .success-section .step-number {
            background: linear-gradient(135deg, #00cec9, #00b894);
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


    {{-- 
    <div class="container-fluid about-hero text-white position-relative"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('assets/img/avenue-815297_1920.jpg') }}')  center center / cover no-repeat;;
     display: flex;
     align-items: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-style7">
                        <span class="sub-title style1 text-white d-block mb-2">Inbound</span>
                        <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">Discover the Wonders of Sri
                            Lanka</h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

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

                                <span>Inbound Tours</span>
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>





    <!-- Tour Page with Sidebar Filter Section -->
    <section class="position-relative overflow-hidden space" id="service-sec" data-bg-src="">
        <div class="container-fluid" style="margin-top: -104px;">
            <div class="row">
                <div class="title-area text-center " style="">
                    <h2 class="sec-title"
                        style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Discover the Wonders of Sri Lanka </h2>
                </div>
            </div>

            <div class="row " style="margin-top: -20px;">

                <!-- Sidebar Filter Section - 1/4 width -->
                <div class="col-md-3">
                    <div class="filter-sidebar p-4 shadow" style="background-color: #f8f9fa; border-radius: 15px;">
                        <form id="filterForm">
                            <!-- Tour Category Selection -->
                            <div class="filter-section mb-4">
                                <div class="ps-1">
                                    @php
                                        $options = [
                                            'special' => 'Special',
                                            'city' => 'City',
                                            'tailor' => 'Tailor Made',
                                            'customize' => 'Customize',
                                        ];
                                    @endphp
                                    @foreach ($options as $key => $label)
                                        <div
                                            class="form-check mb-2 d-flex align-items-start align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <input class="form-check-input tour-option-radio" type="checkbox"
                                                    name="tour_category" id="category_{{ $key }}"
                                                    value="{{ $key }}" {{ $loop->first ? 'checked' : '' }}
                                                    data-section="{{ $key }}">
                                                <label class="form-check-label ms-2" for="category_{{ $key }}">
                                                    {{ $label }}
                                                </label>
                                            </div>

                                            @if ($key === 'tailor')
                                                <span class="tailor-arrow" style="font-size: 16px;">&#9656;</span>
                                                {{-- ▶ --}}
                                            @endif
                                        </div>

                                        @if ($key === 'tailor')
                                            <!-- Tailor Made Sub-Filters (indented under Tailor) -->
                                            <div id="tailor-section"
                                                class="filter-section-content d-none ms-4 mt-2 border-start ps-3">
                                                <!-- Days Filter -->
                                                <div class="filter-section mb-3">
                                                    <h6 class="text-black" style="font-size: 14px;">Number of Days</h6>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span id="durationMinLabel"
                                                            style="font-size: 13px;">{{ $minDay }} Day</span>
                                                        <span id="durationMaxLabel"
                                                            style="font-size: 13px;">{{ $maxDay }} Days</span>
                                                    </div>
                                                    <input type="range" class="form-range" id="daysRangeSlider"
                                                        name="days" min="{{ $minDay }}" max="{{ $maxDay }}"
                                                        value="" />
                                                    <div class="text-center">
                                                        <small>Selected: <span id="selectedDay">Not selected</span>
                                                            Days</small>
                                                    </div>
                                                </div>

                                                <!-- Themes Filter -->
                                                <div class="filter-section mb-2">
                                                    <h6 class="text-black" style="font-size: 14px;">Theme</h6>
                                                    <div class="ps-2">
                                                        @foreach ($allThemes as $theme)
                                                            <div class="form-check mb-2 d-flex align-items-center">
                                                                <input class="form-check-input" name="theme[]"
                                                                    value="{{ $theme }}" type="checkbox"
                                                                    id="theme_{{ $loop->index }}">
                                                                <label class="form-check-label ms-2"
                                                                    for="theme_{{ $loop->index }}">
                                                                    {{ ucfirst($theme) }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>


                        </form>

                    </div>
                </div>


                <!-- Tour Cards Section - 3/4 width -->
                <div class="col-md-9" id="filteredResults">
                    <div id="all-tours">
                        {{-- Show all three on page load --}}

                        <!-- Special Tours -->
                        <h1 class="page-title text-start ml-2"
                            style="font-family: 'Poppins', sans-serif;font-size: 32px; font-weight: 600; color: #1a1a1a;">
                            Special Tours</h1>
                        <div class="row">
                            @forelse ($specialTours as $package)
                                @include('frontend.components.tour-cards', ['package' => $package])
                            @empty
                                <div class="col-12 text-center">No special tours found.</div>
                            @endforelse
                        </div>
                        <!-- City Tours -->
                        <h1 class="page-title text-start ml-2"
                            style="font-family: 'Poppins', sans-serif;font-size: 32px; font-weight: 600; color: #1a1a1a;margin-top: 45px;">
                            City Tours</h1>
                        <div class="row">
                            @forelse ($cityTours as $package)
                                @include('frontend.components.tour-cards', ['package' => $package])
                            @empty
                                <div class="col-12 text-center">No city tours found.</div>
                            @endforelse
                        </div>

                        <!-- Tailor Made Tours -->
                        <h1 class="page-title text-start ml-2"
                            style="font-family: 'Poppins', sans-serif;font-size: 32px; font-weight: 600; color: #1a1a1a;margin-top: 45px;">
                            Tailor Made Tours</h1>
                        <div class="row">
                            @forelse ($tailorTours as $package)
                                @include('frontend.components.tour-cards', ['package' => $package])
                            @empty
                                <div class="col-12 text-center">No tailor-made tours found.</div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Filtered Section (used when user clicks Special, City, Tailor) -->
                    <div id="single-tour-section" class="d-none">
                        <h1 class="page-title text-start ml-2" id="selectedTourTitle"
                            style="font-family: 'Poppins', sans-serif;font-size: 32px; font-weight: 600; color: #1a1a1a;">
                        </h1>
                        <div id="tourPackageList"></div>
                    </div>



                    <!-- Customize Tour Form -->
                    <div id="customize-tour-form" class="d-none">
                        <div class="card p-4 shadow">
                            <h3 class="mb-3"
                                style="font-family: 'Poppins', sans-serif;font-size: 32px; font-weight: 600; color: #1a1a1a;">
                                Customize Your Tour</h3>
                            <form id="customizeForm" style="margin-top: 30px;">
                                <!-- Row 1: Name + Email -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="custom_name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="custom_name" name="custom_name"
                                            placeholder="Ex: John" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="custom_email" class="form-label">Your Email</label>
                                        <input type="email" class="form-control" id="custom_email" name="custom_email"
                                            placeholder="Ex: john@gmail.com" required>
                                    </div>
                                </div>

                                <!-- Row 2: Phone + Dates -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="custom_phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="custom_phone" name="custom_phone"
                                            placeholder="Ex: 0xxxxxxxxx" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="custom_dates" class="form-label">Preferred Travel Dates</label>
                                        <input type="text" class="form-control" id="custom_dates" name="custom_dates"
                                            placeholder="e.g., 12th Dec to 18th Dec">
                                    </div>
                                </div>

                                <!-- Row 3: Travelers + empty (optional future use) -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="custom_travelers" class="form-label">Number of Travelers</label>
                                        <input type="number" class="form-control" id="custom_travelers"
                                            name="custom_travelers" min="1" placeholder="e.g., 2 Adults, 1 Child">
                                    </div>
                                    <div class="col-md-6 mb-3"></div>
                                </div>

                                <!-- Message (Full Row) -->
                                <div class="mb-3">
                                    <label for="custom_message" class="form-label">Message</label>
                                    <textarea class="form-control" id="custom_message" name="custom_message" rows="4"
                                        placeholder="Describe your tour..."></textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-sm" style="background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);">Submit</button>
                            </form>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </section>



    <section class="bg-gradient-to-r from-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8" style="padding-bottom: 20px;">

        <!-- 🔁 How It Works -->
        <div class="text-center " style="margin-bottom: 70px;">
            <h2 class="sec-title" style="font-weight: bold;">How It Works</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto px-4">

                    <!-- Step 1 -->
                    <div class="rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black-700 font-bold text-lg mb-2">1. Submit Your Request</div>
                        <p class="text-gray-600 text-base">Use the form below to tell us your travel dates and preferences.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black-700 font-bold text-lg mb-2">2. Get a Quote</div>
                        <p class="text-gray-600 text-base">We’ll send you a personalized package and price within 24 hours.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black-700 font-bold text-lg mb-2">3. Confirm & Travel</div>
                        <p class="text-gray-600 text-base">Once confirmed, we handle everything so you can enjoy your trip
                            worry-free.</p>
                    </div>

                </div>
        </div>


        <div class="">


            {{-- <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-center text-blue-900 mb-4">Check Your Reservation</h2>
                <p class="text-center text-gray-600 mb-6 sm:mb-8">Fill out the form below to check availability and receive
                    a personalized quote.</p>


                <div id="success-message"
                    class="bg-green-100 text-green-800 p-4 rounded mb-4 transition-opacity duration-500">
                    {{ session('success') }}
                </div>
                <form method="POST" action="{{ route('package.booking.store') }}"
                    class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @csrf
                    <!-- Full Name -->
                    <div class="md:col-span-2">
                        <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="fullName" name="fullName" required placeholder="John Doe"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                        <input type="text" id="country" name="country" required placeholder="USA"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" required placeholder="example@mail.com"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input type="tel" id="phone" name="phone" required placeholder="+1 123-456-7890"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- WhatsApp -->
                    <div>
                        <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">WhatsApp</label>
                        <input type="text" id="whatsapp" name="whatsapp" required placeholder="+1 123-456-7890"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- Adults -->
                    <div>
                        <label for="adults" class="block text-sm font-medium text-gray-700 mb-1">Adults</label>
                        <input type="number" id="adults" name="adults" min="0" required placeholder="2"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- Children -->
                    <div>
                        <label for="children" class="block text-sm font-medium text-gray-700 mb-1">Children</label>
                        <input type="number" id="children" name="children" min="0" placeholder="1"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- Infants -->
                    <div>
                        <label for="infants" class="block text-sm font-medium text-gray-700 mb-1">Infants</label>
                        <input type="number" id="infants" name="infants" min="0" placeholder="0"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- Choose Package -->
                    <div>
                        <label for="package" class="block text-sm font-medium text-gray-700 mb-1">Choose Package</label>
                        <select id="package" name="package" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="">Select a package</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->heading }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Start Date -->
                    <div>
                        <label for="startDate" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                        <input type="date" id="startDate" name="startDate" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- End Date -->
                    <div>
                        <label for="endDate" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                        <input type="date" id="endDate" name="endDate" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- Message -->
                    <div class="md:col-span-3">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea id="message" name="message" rows="4" placeholder="Tell us your preferences or questions..."
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
                    </div>

                    <!-- Button -->
                    <div class="md:col-span-3 text-center pt-4">
                        <button type="submit"
                            class="w-full md:w-auto px-10 py-3 bg-black text-white font-bold rounded-xl bg-black transition duration-300">
                            Submit Request
                        </button>
                    </div>
                </form>



            </div> --}}
            <div class="steps-container">
                <div class="step-card">
                    <div class="step-header text-center">
                        <div class="step-number">01</div>
                        <h2 class="step-title text-blue-900 text-center">Check Your Reservation</h2>
                    </div>

                    {{-- <p class="text-center text-gray-600 mb-4">Fill out the form below to check availability and receive a
                        personalized quote.</p> --}}

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

                    <form method="POST" action="{{ route('package.booking.store') }}">
                        @csrf
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

                            <!-- Adults -->
                            <div class="form-group">
                                <label for="adults">Adults *</label>
                                <input type="number" id="adults" name="adults" min="0" required
                                    placeholder="2">
                            </div>

                            <!-- Children -->
                            <div class="form-group">
                                <label for="children">Children</label>
                                <input type="number" id="children" name="children" min="0" placeholder="1">
                            </div>

                            <!-- Infants -->
                            <div class="form-group">
                                <label for="infants">Infants</label>
                                <input type="number" id="infants" name="infants" min="0" placeholder="0">
                            </div>

                            <!-- Choose Package -->
                            <div class="form-group">
                                <label for="package">Choose Package *</label>
                                <select id="package" name="package" required>
                                    <option value="">Select a package</option>
                                    @foreach ($packages as $package)
                                        <option value="{{ $package->id }}">{{ $package->heading }}</option>
                                    @endforeach
                                </select>
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
                                <button type="submit" class="btn btn-submit" style="background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);">
                                    Submit Request
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-15">
                <p class="text-sm text-gray-500">🌟 Rated 4.8/5 by over 1,200 happy travelers</p>
                <p class="text-xs text-gray-400 mt-1">Your data is secure and never shared. We value your privacy.</p>
            </div>



        </div>






    </section>


    <style>
        .th-btn:hover {
            color: #ffffff;
            background-color: #0083a3 !important;
        }

        .hero-form {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            -webkit-backdrop-filter: blur(15px);
            backdrop-filter: blur(15px);
            border-radius: 24px;
            padding: 40px;
            margin-left: -26px;
        }

        .support-badge {
            margin-top: 5px;
        }






        .tour-country {
            font-size: 14px;
            font-weight: 600;
            color: #3596D3;
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
            color: #fbbf24;
            margin-left: -2px;
            /* Adds slight spacing between stars */
        }

        .tour-box {
            position: relative;
            background-color: var(--white-color);
            border: none;
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

        .pagination .page-link {
            color: black;
            border: 1px solid black;
        }

        .pagination .page-item.active .page-link {
            background-color: black;
            color: white;
            border-color: black;
        }

        .pagination .page-item .page-link:hover {
            background-color: #333;
            color: white;
        }

        select,
        .form-control,
        .form-select,
        textarea,
        input {

            /* border: none; */

        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;

            color: white;
            font-size: 2.5rem;
            font-weight: 700;

        }
    </style>
    <style>
        .tour-option-box {
            display: inline-block;
            border: 2px solid #000;
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 10px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s, color 0.3s;
            text-align: center;
            font-weight: 500;
        }

        .tour-option-radio {
            display: none;
        }

        .tour-option-radio:checked+.tour-option-box {
            background-color: #000;
            color: #fff;
        }

        .tour-option-wrapper {
            margin-bottom: 10px;
        }
    </style>



    <script>
        let daysTouched = false;

        function updateDayLabel(value) {
            const label = document.getElementById('selectedDay');
            label.innerText = value ? value : 'Not selected';
        }

        function fetchFilteredResults() {
            const form = document.getElementById('filterForm');
            const params = new URLSearchParams();


            form.querySelectorAll('input[name="theme[]"]:checked').forEach(input => {
                params.append('theme[]', input.value);
            });

            // ✅ Only include days if user touched the slider
            if (daysTouched) {
                const days = form.querySelector('input[name="days"]');
                if (days && days.value) {
                    params.append('days', days.value);
                }
            }

            fetch("{{ route('filter.tours') }}?" + params.toString(), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(data => {
                    document.getElementById('tourPackageList').innerHTML = data;
                });
        }

        // 🔁 Handle Radio Button Selection
        document.querySelectorAll('.tour-option-radio').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // ✅ Uncheck all others
                document.querySelectorAll('.tour-option-radio').forEach(cb => {
                    if (cb !== this) cb.checked = false;
                });

                const checkedBox = document.querySelector('.tour-option-radio:checked');

                // Clear all UI sections
                document.getElementById('all-tours').classList.add('d-none');
                document.getElementById('single-tour-section').classList.add('d-none');
                document.getElementById('customize-tour-form').classList.add('d-none');
                document.getElementById('tailor-section')?.classList.add('d-none');
                document.getElementById('selectedTourTitle').innerText = '';

                if (!checkedBox) {
                    // ✅ Nothing is selected - reset UI
                    document.getElementById('all-tours').classList.remove('d-none');
                    return;
                }

                const selected = checkedBox.value;

                if (selected === 'customize') {
                    document.getElementById('customize-tour-form').classList.remove('d-none');
                } else {
                    document.getElementById('single-tour-section').classList.remove('d-none');
                    const label = document.querySelector(`label[for="category_${selected}"]`);
                    document.getElementById('selectedTourTitle').innerText = label?.innerText ?? '';

                    if (selected === 'tailor') {
                        document.getElementById('tailor-section')?.classList.remove('d-none');
                    }

                    fetchCategoryTours(selected);
                }
            });
        });




        function fetchCategoryTours(category) {
            fetch("{{ route('tours.by-category', ':category') }}".replace(':category', category), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('tourPackageList').innerHTML = html;
                });
        }

        // 🧹 Reset on page load
        // 🧹 Reset on page load
        window.addEventListener('DOMContentLoaded', () => {
            // Clear all checkboxes and radio buttons
            document.querySelectorAll('#filterForm input[type=checkbox]').forEach(cb => cb.checked = false);
            document.querySelectorAll('#filterForm input[type=radio]').forEach(rb => rb.checked = false);

            // ✅ Don't set range value; show "Not selected"
            const rangeSlider = document.getElementById('daysRangeSlider');
            if (rangeSlider) {
                rangeSlider.value = ""; // <-- IMPORTANT: clear default
                updateDayLabel(""); // <-- show "Not selected"
                rangeSlider.addEventListener('input', (e) => {
                    daysTouched = true;
                    updateDayLabel(e.target.value);
                });
            }

            // Show full list by default
            document.getElementById('all-tours').classList.remove('d-none');

            // Trigger fetch on form changes
            document.getElementById('filterForm').addEventListener('change', fetchFilteredResults);
        });

        document.getElementById('customizeForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            fetch("{{ route('custom.tour.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Request Submitted!',
                            text: 'Your custom tour request has been successfully sent.',
                            confirmButtonColor: '#3085d6',
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        form.reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: 'Something went wrong. Try again.',
                        });
                    }
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: 'Please try again later.',
                    });
                });
        });
    </script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection
