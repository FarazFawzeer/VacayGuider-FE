@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        .bg-smoke {
            background-color: #F5F5F5 !important;
        }

        .tab-button {
            font-size: 16px;
            font-weight: 600;
            padding: 10px 20px;
            background-color: #f5f5f5;
            border-radius: 25px;
            margin-right: 10px;
            cursor: pointer;
        }

        .tab-button[aria-selected="true"] {
            background-color: #94d106;
            color: white;
        }

        .tabpanel {
            padding: 30px;
            background-color: #f5f5f5;
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
            gap: 16px;
            margin-top: 2rem;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .nav-button {
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 160px;
            color: #3284A4;

        }

        .nav-button:hover {
            background-color: rgba(91, 107, 209, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .active {
            background-color: #3284A4;
            color: white;
        }

        /* Optional icon styling */
        .nav-button i {
            margin-right: 8px;
            font-size: 16px;
        }

        /* For responsive design */
        @media (max-width: 576px) {
            .nav-container {

                flex-direction: column;
                width: 100%;
            }

            .nav-button {
                width: 100%;
            }
        }

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

    <div class="container-fluid about-hero text-white position-relative"
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
    </div>


    <!-- Blog Start -->
    <div class="container py-5">

        <div class="row ">
            <div class="col-lg-8 ">
                <!-- Blog Detail Start -->
                <div class="blog-item ">
                    <div class="position-relative">

                        <div class="blog-date ">
                            <small class="text-uppercase text-success " style="font-size: 18px;font-weight: 900;">Sri
                                Lanka</small>
                            <h5 class="mt-2" style="font-size: 28px;">
                                <strong style="font-weight: 900;">Tailor-Made</strong> Tour for {{ $package->days }} Nights
                                & {{ $package->nights }}
                                Days
                            </h5>
                        </div>


                        <img class="img-fluid w-100 mt-3" src="{{ asset('storage/' . $package->picture) }}"
                            alt="{{ $package->place }}" style="height: 500px;">
                    </div>
                </div>



                <div class="pb-3 bg-smoke shadow">

                    <div class=" mb-3" style="padding: 30px;">

                        <h2 class="mb-3">{{ $package->heading }}</h2>
                        <p>{{ $package->description }}</p>


                        <div class="nav-container">
                            <button id="summary-btn" class="nav-button active" onclick="showSection('summary')">
                                Summary
                            </button>
                            <button id="itinerary-btn" class="nav-button" onclick="showSection('itinerary')">
                                Itinerary
                            </button>
                        </div>

                        <div class="tour-summaries  mt-5" id="summary-section" style="">
                            <h2 class="mb-3 ml-3 mt-3" style="font-weight: bold;">Tour Summary</h2>
                            @foreach ($tourSummaries as $summary)
                                <div class="rounded-xl p-4">
                                    <!-- Tour Info: Day / City / Theme -->
                                    <div class="tour-summary-details flex flex-wrap items-center gap-4 mt-3">
                                        <!-- Day -->
                                        <div class="flex items-center space-x-3 text-gray-700">
                                            <img width="26" height="26"
                                                src="https://img.icons8.com/laces/64/40C057/calendar.png" alt="calendar" />
                                            <div>
                                                <span class="font-bold text-lg text-green-600">Day</span>
                                                <span class="ml-2 font-semibold text-xl">{{ $summary->day }}</span>
                                            </div>
                                        </div>

                                        <!-- City -->
                                        <div class="flex items-center space-x-3 text-gray-700">
                                            <img width="26" height="26"
                                                src="https://img.icons8.com/laces/64/40C057/marker.png" alt="marker" />
                                            <div>
                                                <span class="font-bold text-lg text-green-600">City</span>
                                                <span class="ml-2 font-semibold text-xl">{{ $summary->city }}</span>
                                            </div>
                                        </div>

                                        <!-- Theme -->
                                        <div class="flex items-center space-x-3 text-gray-700">
                                            <img width="26" height="26"
                                                src="https://img.icons8.com/quill/100/40C057/trekking.png" alt="trekking" />
                                            <div>
                                                <span class="font-bold text-lg text-green-600">Theme</span>
                                                <span class="ml-2 font-semibold text-xl">{{ $summary->theme }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Images & Key Activities -->
                                    <div class="rounded-xl p-6">
                                        <div class="flex flex-col space-y-6">
                                            <!-- Image Gallery -->
                                            @if (!empty($summary->images))
                                                <div class="flex flex-wrap justify-center gap-4">
                                                    @foreach ($summary->images as $img)
                                                        <img src="{{ asset($img) }}" alt="Tour Image"
                                                            class="w-full sm:w-1/2 md:w-1/4 h-48 object-cover rounded-lg">
                                                    @endforeach
                                                </div>
                                            @endif

                                            <!-- Key Activities -->
                                            <div>
                                                <h2 class="text-xl font-bold text-gray-800 mb-4">Key Activities</h2>
                                                @if (!empty($summary->key_attributes) && is_array($summary->key_attributes))
                                                    <ul class="space-y-2 text-gray-700">
                                                        @foreach ($summary->key_attributes as $activity)
                                                            <li class="flex items-center">
                                                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                {{ $activity }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>


                        @foreach ($package->detailItineraries as $itinerary)
                            <div class="detail-itineraries mt-5" id="itinerary-section"
                                style="display: none;padding: 28px; border-radius: 22px;">
                                <h2 class="text-3xl font-bold text-start mb-6 text-gray-800">
                                    • {{ strtoupper($itinerary->place_name) }}
                                </h2>

                                <!-- Itinerary Images from Highlights -->
                                @foreach ($itinerary->highlights->take(3) as $highlight)
                                    <div class="flex justify-center space-x-4 mb-6">
                                        @foreach ($highlight->images as $img)
                                            <img src="{{ asset($img) }}" alt="Highlight Image"
                                                class="rounded-lg shadow-lg w-1/3 h-40 object-cover">
                                        @endforeach
                                    </div>
                                @endforeach

             
                                <!-- Day Programme -->
                                <h3 class="text-2xl font-semibold mb-4 text-gray-700">
                                    Day {{ $itinerary->day }} Programme – {{ strtoupper($itinerary->place_name) }}
                                </h3>

                                <!-- Program Points -->
                                @if (!empty($programPoints))
                                    <ul class="list-disc pl-8 mb-6 space-y-2">
                                        @foreach ($itinerary->program_points as $point)
                                            <li class="text-base text-gray-600">{{ $point }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- Overnight Stay and Details -->
                                <div class="bg-green-50 p-6 rounded-lg border border-green-200"
                                    style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-bed text-xl text-gray-700 mr-3"></i>
                                        <span class="font-semibold text-gray-900">
                                            Overnight Stay -
                                            <span class="text-gray-700">{{ $itinerary->overnight_stay }}</span>
                                        </span>
                                    </div>

                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-utensils text-xl text-gray-700 mr-3"></i>
                                        <span class="font-semibold text-gray-900">
                                            Meal Plan -
                                            <span class="text-gray-700">{{ $itinerary->meal_plan }}</span>
                                        </span>
                                    </div>

                                    <div class="flex items-center">
                                        <i class="fas fa-clock text-xl text-gray-700 mr-3"></i>
                                        <span class="font-semibold text-gray-900">
                                            Approximate Travel Time -
                                            <span class="text-gray-700">{{ $itinerary->approximate_travel_time }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    




                        <div id="tour-accordion" class="mt-5" style="scroll-margin:90px">
                            <!-- Tab List -->
                            <div class="flex justify-center mb-4" aria-label="Tour Details">
                                <div class="p-1 h-fit gap-4 items-center bg-default-100 rounded-large flex overflow-x-auto scrollbar-hide"
                                    role="tablist" aria-orientation="horizontal">
                                    <!-- Tab Button 1 -->
                                    <button
                                        class="tab-button px-4 py-2 text-lg  shadow-sm  font-semibold transition-all duration-300 ease-in-out transform hover:scale-105 active:bg-default-200"
                                        aria-selected="true" role="tab" id="tab-highlights" data-key="highlights"
                                        aria-controls="tabpanel-highlights">
                                        <span class="tab-content">Inclusions</span>
                                    </button>
                                    <!-- Tab Button 2 -->
                                    <button
                                        class="tab-button px-4 py-2 text-lg  shadow-sm transition-all duration-300 ease-in-out transform hover:scale-105 active:bg-default-200"
                                        role="tab" id="tab-itinerary" data-key="itinerary"
                                        aria-controls="tabpanel-itinerary">
                                        <span class="tab-content">Exclusions</span>
                                    </button>
                                    <!-- Tab Button 3 -->
                                    <button
                                        class="tab-button px-4 py-2 text-lg  shadow-sm   font-semibold transition-all duration-300 ease-in-out transform hover:scale-105 active:bg-default-200"
                                        role="tab" id="tab-pricing" data-key="pricing"
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
                                            • Airport pick up
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Assistance at the Airport
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Accommodation with breakfast and dinner basis on mentioned hotels
                                            below
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Private luxury car (air-conditioned)
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Private English-Speaking driver for the entire journey
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • All government taxes
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Fuel & local insurance for the vehicle
                                        </li>
                                        <li style="margin-bottom: 20px;">
                                            • Airport drop off
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
                                            • Air tickets NOT included
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Sightseeing entrance charges
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Meals not mentioned in the itinerary
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Camera & video permits
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Insurances
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Guide/Driver tips
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Personal expenses
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Late check-outs & early check-in charges
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Visa cost (mandatory charge for immigration: 25 USD per person)
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • Shopping expenses
                                        </li>
                                        <li style="margin-bottom: 10px;">
                                            • PCR tests
                                        </li>
                                        <li style="margin-bottom: 20px;">
                                            • Above cost is valid for 14 pax or above only
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
                                        <li style="margin-bottom: 10px;"> • <strong>In case of
                                                cancellation:</strong> The following cancellation charges will be
                                            applicable</li>

                                        <li style="margin-bottom: 10px;"> • Cancellations made with less than 30
                                            days from the start of a tour: Zero refund.</li>
                                        <li style="margin-bottom: 10px;"> • No Show: Zero refund.</li>
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

                                <p style="margin: 0 0 10px 0;">
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


                                <p style="margin: 0; font-weight: bold;">Thank You</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Comment Form End -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="position-sticky"style="top: 130px;">
                    <div class="row g-3 align-items-center bg-smoke shadow  p-4 rounded">

                        <!-- Destination -->
                        <div class="col-6">

                            <div class="d-flex align-items-center">
                                <img src="https://d2xmwf00c85p5s.cloudfront.net/Flag_Sri_Lanka_8a368b9ec8.webp"
                                    alt="Sri Lanka Flag" class="rounded-circle"
                                    style="border-radius:50%; width: 32px; height: 32px;">
                                <p class="mb-0 ms-2 fw-semibold">Sri Lanka</p>
                            </div>
                        </div>

                        <!-- Tour Type -->
                        <div class="col-6">

                            <span class="d-inline-block text-center  px-3 py-2 rounded  fw-semibold"
                                style="background-color: #94d106;color: #FFF;">Tailor Made</span>
                        </div>

                        <!-- Duration -->
                        <div class="col-6 text-center">

                            <p class="mb-0 fw-semibold">{{ $package->days }} Days & {{ $package->nights }} Nights</p>

                        </div>


                        <div class="mt-4 mb-3 d-flex justify-content-center gap-2">
                            <button class="btn btn-sm px-3 py-2 shadow "
                                onclick="scrollToSection('summary-section', this)"
                                style="background-color: #d0d0d0; color: #555; border: 1px solid #555; font-weight: bold;font-size: 16px;border-radius: 25px;">
                                Summary
                            </button>

                            <button class="btn btn-sm px-3 py-2 shadow" onclick="scrollToSection('tour-accordion', this)"
                                style="background-color: #d0d0d0;color: #555; border: 1px solid #555;font-weight: bold;font-size: 16px; border-radius: 25px;">
                                Inclusions
                            </button>
                        </div>





                        <!-- Booking Options Section -->
                        <div class="mt-4  mb-3 text-center">
                            <h6 class="fw-bold text-dark">Plan Your Trip with Ease</h6>
                            <p class="text-muted small">
                                Choose from flexible booking options with hassle-free cancellations.
                                Our experts are available 24/7 to assist you in customizing your trip.
                            </p>
                        </div>

                        <!-- Scroll to Booking Button -->
                        <div class="text-center mt-3 mb-3">
                            <a href="#booking-section" class="th-btn"
                                style="outline: 2px solid #000; background-color: black; color: white;">
                                Let's Go
                            </a>
                        </div>



                    </div>


                </div>
            </div>


        </div>
        <!-- Blog End -->

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


        <div class="max-w-4xl mx-auto">


            <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-center text-blue-900 mb-4">Check Your Reservation</h2>
                <p class="text-center text-gray-600 mb-6 sm:mb-8">Fill out the form below to check availability and receive
                    a personalized quote.</p>

     <div id="success-message"
                    class="bg-green-100 text-green-800 p-4 rounded mb-4 transition-opacity duration-500">
                    {{ session('success') }}
                </div>

                <form method="POST" action="{{ route('package.booking.store') }}" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                      @csrf
    <input type="hidden" name="package" value="{{ $package->id }}">
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



            </div>

            <div class="text-center mt-10">
                <p class="text-sm text-gray-500">🌟 Rated 4.8/5 by over 1,200 happy travelers</p>
                <p class="text-xs text-gray-400 mt-1">Your data is secure and never shared. We value your privacy.</p>
            </div>



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
            const itinerary = document.getElementById('itinerary-section');
            const summaryBtn = document.getElementById('summary-btn');
            const itineraryBtn = document.getElementById('itinerary-btn');

            if (section === 'summary') {
                summary.style.display = 'block';
                itinerary.style.display = 'none';
                summaryBtn.classList.add('active');
                itineraryBtn.classList.remove('active');
            } else {
                summary.style.display = 'none';
                itinerary.style.display = 'block';
                summaryBtn.classList.remove('active');
                itineraryBtn.classList.add('active');
            }
        }
    </script>
    <script>
        const tabs = document.querySelectorAll('[role="tab"]');
        const panels = document.querySelectorAll('.tabpanel');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.setAttribute('aria-selected', 'false'));
                tab.setAttribute('aria-selected', 'true');

                panels.forEach(panel => {
                    panel.style.display = 'none';
                });
                const panelId = tab.getAttribute('aria-controls');
                document.getElementById(panelId).style.display = 'block';
            });
        });

        function scrollToSection(sectionId, btn) {
            var headerOffset = 150; // Adjust based on your header height
            var section = document.getElementById(sectionId);

            if (section) {
                var sectionPosition = section.getBoundingClientRect().top + window.scrollY;
                var offsetPosition = sectionPosition - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            }

            // Remove 'active-btn' from all buttons
            document.querySelectorAll('.btn').forEach(button => {
                button.classList.remove('active-btn');
            });

            // Add 'active-btn' class to the clicked button
            btn.classList.add('active-btn');
        }

         setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.classList.add('opacity-0');
                setTimeout(() => msg.remove(), 500);
            }
        }, 5000);
    </script>

@endsection
