@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')



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
    </div>






    <!-- Tour Page with Sidebar Filter Section -->
    <section class="position-relative overflow-hidden space" id="service-sec" data-bg-src="">
        <div class="container" style="margin-top: -82px;">
            <div class="row">
                <!-- <div class="col-lg-6 offset-lg-3" style="margin-bottom: -55px;">
                                                    <div class="title-area text-center">
                                                        <h2 class="sec-title" style="font-weight: bold;">Discover the Wonders of Sri Lanka</h2>
                                                    </div>
                                                </div> -->
            </div>

            <div class="row mt-5">

                <!-- Sidebar Filter Section - 1/4 width -->
                <div class="col-md-3">
                    <div class="filter-sidebar p-4 shadow" style="background-color: #f8f9fa; border-radius: 15px; ">
                        <form id="filterForm">
                            <!-- Days Filter - Improved with select buttons -->
                            <!-- Number of Days Filter -->
                            <!-- Days Range Filter -->
                            <div class="filter-section mb-4">
                                <h5 class="filter-heading">
                                    <i class="fas fa-tag me-2"></i>Number of Days
                                </h5>

                                <div class="d-flex justify-content-between mb-2">
                                    <span id="durationMinLabel">{{ $minDay }} Day</span>
                                    <span id="durationMaxLabel">{{ $maxDay }} Days</span>
                                </div>

                                <div class="form-group" style="margin-bottom: -6px;">
                                    <input type="range" class="form-range" id="daysRangeSlider" name="days"
                                        min="{{ $minDay }}" max="{{ $maxDay }}" value="{{ $minDay }}"
                                        oninput="updateDayLabel(this.value)" />
                                </div>

                                <div class="text-center mt-1">
                                    <small>Selected: <span id="selectedDay">{{ $minDay }}</span> Days</small>
                                </div>
                            </div>


                            <div class="filter-section mb-4">
                                <h5 class="filter-heading">
                                    <i class="fas fa-tag me-2"></i>Theme
                                </h5>
                                <div class="ps-2" style="border-bottom: 2px solid #e1dede; padding-bottom: 10px;">
                                    @foreach ($allThemes as $theme)
                                        <div class="form-check mb-2 d-flex align-items-center">
                                            <input class="form-check-input" name="themes[]" value="{{ $theme }}"
                                                type="checkbox" id="theme_{{ $loop->index }}">
                                            <label class="form-check-label ms-2" for="theme_{{ $loop->index }}">
                                                {{ ucfirst($theme) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Type of Tours Filter -->
                            <div class="filter-section mb-4">
                                <h5 class="filter-heading">
                                    <i class="fas fa-tag me-2"></i>Tour Type
                                </h5>
                                <div class="ps-2">
                                    @foreach ($allTypes as $type)
                                        <div class="form-check mb-2 d-flex align-items-center">
                                            <input class="form-check-input" name="types[]" value="{{ $type }}"
                                                type="checkbox" id="type_{{ $loop->index }}">
                                            <label class="form-check-label ms-2" for="type_{{ $loop->index }}">
                                                {{ ucfirst($type) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tour Cards Section - 3/4 width -->
                <div class="col-md-9" id="filteredResults">
                    <div class="row">


                        @foreach ($packages as $package)
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('tour.details', $package->id) }}" class="tour-box-link"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="tour-box style2 th-ani"
                                        style="cursor: pointer; transition: transform 0.3s ease; border-radius: 10px; overflow: hidden; min-height: 320px; position: relative;">

                                        @php
                                            $imagePath = $package->picture ? 'storage/' . $package->picture : null;
                                            $fallbackImage = asset('assets/img/tour/yala.jpg'); // Your dummy tour image
                                            $imageUrl =
                                                $imagePath && file_exists(public_path($imagePath))
                                                    ? asset($imagePath)
                                                    : $fallbackImage;
                                        @endphp
                                        <!-- Image Section -->
                                        <div class="tour-box_img global-img" style="position: relative;">
                                            <img src="{{ $imageUrl }}" alt="{{ $package->place ?? 'Tour Image' }}"
                                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                                        </div>
                                        <!-- Content Section -->
                                        <div class="tour-content" style="padding: 15px;">
                                            <div class="tour-header d-flex align-items-center justify-content-between"
                                                style="margin-top: -12px; margin-bottom: -8px;">
                                                <p class="tour-country m-0 d-flex align-items-center">
                                                    Sri Lanka
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

                                            <a href="{{ route('tour.details', $package->id) }}" class="text-primary small"
                                                style="font-weight: 500;">View More</a>
                                        </div>

                                        <!-- Tour Info (Example: Days/Nights from summaries) -->
                                        <div class="d-flex align-items-right"
                                            style="justify-content: right; margin-bottom: 5px; padding-right: 15px; padding-bottom: 15px;">
                                            <i class="fas fa-calendar-check text-danger me-2"></i>
                                            <span class="text-dark fw-semibold">
                                                {{ $package->days }} Days,
                                                {{ $package->nights }} Nights
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach


                        <!-- Pagination -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-auto">
                                {{ $packages->links() }}
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



            </div>

            <div class="text-center mt-10">
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


    </style>




    <script>
        let daysTouched = false;

        const rangeSlider = document.getElementById('daysRangeSlider');
        rangeSlider.addEventListener('input', (e) => {
            updateDayLabel(e.target.value);
            daysTouched = true;
        });

        function fetchFilteredResults() {
            const form = document.getElementById('filterForm');
            const formData = new FormData(form);
            const params = new URLSearchParams();

            // Tour types
            form.querySelectorAll('input[name="types[]"]:checked').forEach(input => {
                params.append('types[]', input.value);
            });

            // Themes
            form.querySelectorAll('input[name="themes[]"]:checked').forEach(input => {
                params.append('themes[]', input.value);
            });

            // Only append 'days' if user interacted
            if (daysTouched) {
                const days = form.querySelector('input[name="days"]');
                if (days) {
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
                    document.getElementById('filteredResults').innerHTML = data;
                });
        }

        // Optional: handle range slider label update
        function updateDayLabel(value) {
            document.getElementById('selectedDay').innerText = value;
        }

        // On page load: reset filters, but DO NOT trigger filter fetch
        window.addEventListener('DOMContentLoaded', () => {
            // Clear checkboxes
            document.querySelectorAll('#filterForm input[type=checkbox]').forEach(checkbox => {
                checkbox.checked = false;
            });

            // Reset range to minimum and update day label (without fetch call)
            const rangeSlider = document.getElementById('daysRangeSlider');
            rangeSlider.value = rangeSlider.min;
            updateDayLabel(rangeSlider.value); // only update label, no fetch

            // Attach event listener AFTER resetting
            document.getElementById('filterForm').addEventListener('change', fetchFilteredResults);
        });


        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.classList.add('opacity-0');
                setTimeout(() => msg.remove(), 500);
            }
        }, 5000);
    </script>



@endsection
