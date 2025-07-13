@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        .h3,
        h3 {
            font-size: 24px;
            line-height: 1.278;
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

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .airline-logos {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            justify-content: center;
        }

        .airline-logo-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .airline-logo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            width: 140px;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .airline-logo {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .airline-name {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
            font-size: 16px;
        }

        @media (max-width: 992px) {
            .airline-logos {
                grid-template-columns: repeat(3, 1fr);
            }

            .logo-container {
                width: 120px;
                height: 120px;
            }
        }

        @media (max-width: 768px) {
            .airline-logos {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .logo-container {
                width: 100px;
                height: 100px;
            }
        }

        @media (max-width: 480px) {
            .airline-logos {
                grid-template-columns: repeat(1, 1fr);
                gap: 10px;
            }

            .logo-container {
                width: 80px;
                height: 80px;
            }

            .airline-logo-item {
                padding: 10px;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }






        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
        }

        .logo-icon {
            margin-right: 10px;
            font-size: 2rem;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        /* nav ul li {
                                            margin-left: 1.5rem;
                                        } */

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ffd700;
        }

        /* Hero Section */
        .hero {
            background-image: url('/api/placeholder/1200/400');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            color: white;
            max-width: 600px;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        /* Search Section */
        .search-section {
            background-color: white;
            padding: 2rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            margin-top: -50px;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .search-container {
            width: 90%;
            max-width: 1100px;
            margin: 0 auto;
        }

        .search-tabs {
            display: flex;
            margin-bottom: 1.5rem;
        }

        .tab {
            padding: 1rem 1.5rem;
            background-color: #e9ecef;
            cursor: pointer;
            border-radius: 5px 5px 0 0;
            font-weight: 500;
            margin-right: 5px;
        }

        .tab.active {
            background-color: #0062cc;
            color: white;
        }

        .search-box {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0 5px 5px 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .search-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 1rem;
        }

        .search-group {
            flex: 1;
            min-width: 200px;
        }

        .search-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }

        .search-group input,
        .search-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .search-btn {
            background-color: #ff6b00;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }

        .search-btn:hover {
            background-color: #e05f00;
        }

        /* Features Section */
        .features {
            padding: 3rem 0;
            background-color: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2.5rem;
            color: #0033a0;
        }

        .features-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .feature-card {
            flex-basis: calc(33.333% - 20px);
            background: linear-gradient(to bottom right, #fff8eb, #fff2d9);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #f39c12;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #0062cc;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            margin-bottom: 0.8rem;
            color: #333;
        }






        /* Responsive Design */
        @media (max-width: 992px) {
            .feature-card {
                flex-basis: calc(50% - 15px);
            }


        }

        @media (max-width: 768px) {





            .search-row {
                flex-direction: column;
                gap: 10px;
            }

            .feature-card {
                flex-basis: 100%;
            }


        }
    </style>
    </style>
    {{-- 
    <div class="container-fluid about-hero text-white position-relative"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/img/avenue-815297_1920.jpg') center center / cover no-repeat; 
     display: flex;
     align-items: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-style7">
                        <span class="sub-title style1 text-white d-block mb-2">Air Line</span>
                        <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">Choose Your Airline</h1>
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

                                <span>Airline</span>
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="partner-airlines" style="background: rgb(245, 245, 245);padding-bottom: 80px;">
        <div class="container">

            <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top: 48px;">

                <div class="title-area text-center " style="">
                    <h2 class="sec-title"
                        style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Choose Your Airline</h2>
                </div>
            </div>
            <div class="airline-logos">
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Air Asia.png" alt="Air Asia" class="airline-logo">
                    </div>
                    <p class="airline-name">Air Asia</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/air india.png" alt="Air India" class="airline-logo">
                    </div>
                    <p class="airline-name">Air India</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Airarabia.png" alt="Air Arabia" class="airline-logo">
                    </div>
                    <p class="airline-name">Air Arabia</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/azur air.png" alt="Azur Air" class="airline-logo">
                    </div>
                    <p class="airline-name">Azur Air</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/china.png" alt="China Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">China Airlines</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Emirates.png" alt="Emirates" class="airline-logo">
                    </div>
                    <p class="airline-name">Emirates</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Etihad.png" alt="Etihad" class="airline-logo">
                    </div>
                    <p class="airline-name">Etihad</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/FitsAir.png" alt="FitsAir" class="airline-logo">
                    </div>
                    <p class="airline-name">FitsAir</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/flydubai.png" alt="Flydubai" class="airline-logo">
                    </div>
                    <p class="airline-name">Flydubai</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/indigo.png" alt="IndiGo" class="airline-logo">
                    </div>
                    <p class="airline-name">IndiGo</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/jazeera.png" alt="Jazeera Airways" class="airline-logo">
                    </div>
                    <p class="airline-name">Jazeera Airways</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/malaysia.png" alt="Malaysia Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">Malaysia Airlines</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Qatar Airways.jpeg" alt="Qatar Airways" class="airline-logo">
                    </div>
                    <p class="airline-name">Qatar Airways</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/salam air.png" alt="Salam Air" class="airline-logo">
                    </div>
                    <p class="airline-name">Salam Air</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/seychelle.png" alt="Air Seychelles" class="airline-logo">
                    </div>
                    <p class="airline-name">Air Seychelles</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/singapore.png" alt="Singapore Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">Singapore Airlines</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/SriLankan.png" alt="SriLankan Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">SriLankan Airlines</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/thai.png" alt="Thai Airways" class="airline-logo">
                    </div>
                    <p class="airline-name">Thai Airways</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/turkish.png" alt="Turkish Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">Turkish Airlines</p>
                </div>
            </div>

        </div>
    </section>



    <!-- Features Section -->
    <section class="features">
        <div class="container">

            <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top:48px;">

                <div class="title-area text-center " style="">
                    <h2 class="sec-title"
                        style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Why Choose Us</h2>
                </div>
            </div>
            <div class="features-container">
                <div class="feature-card">
                    <div class="feature-icon">🔄</div>
                    <h3>Free Date Change</h3>
                    <p>Enjoy flexibility with our free date change policy on select flights. Plans change, and we
                        understand.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Best Price </h3>
                    <p>Find a lower price elsewhere? We'll match it and give you extra discount.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎁</div>
                    <h3>Loyalty Rewards</h3>
                    <p>Earn points with every flight and redeem them for free flights, upgrades, and more.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <h3>Secure Payment</h3>
                    <p>Book with confidence using our secure payment system with multiple payment options.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌎</div>
                    <h3>Global Coverage</h3>
                    <p>Flying to over 150 destinations worldwide with convenient connections.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎫</div>
                    <h3>Instant E-Tickets</h3>
                    <p>Receive your electronic tickets instantly upon confirmation of your booking.</p>
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


        <div class="">


            <div class="steps-container">
                <div class="step-card bg-white rounded-2xl shadow-xl p-6 sm:p-8">
                    <div class="step-header text-center mb-6">
                        <div class="step-number">01</div>
                        <h2 class="step-title text-blue-900 text-3xl sm:text-4xl font-extrabold">Check Your Reservation
                        </h2>
                    </div>

                    <p class="text-center text-gray-600 mb-6 sm:mb-8">

                    </p>

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

                    <!-- Form Starts -->
                    <form class="form-grid grid grid-cols-1 md:grid-cols-3 gap-6" method="POST"
                        action="{{ route('airline.booking.store') }}">
                        @csrf
                        <!-- Full Name -->
                        <div class="form-group md:col-span-2">
                            <label for="fullName">Full Name *</label>
                            <input type="text" id="fullName" name="fullName" required placeholder="John Doe">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required placeholder="example@mail.com">
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone">Phone *</label>
                            <input type="tel" id="phone" name="phone" required placeholder="+1 123-456-7890">
                        </div>

                        <!-- WhatsApp -->
                        <div class="form-group">
                            <label for="whatsapp">WhatsApp *</label>
                            <input type="text" id="whatsapp" name="whatsapp" required placeholder="+1 123-456-7890">
                        </div>

                        <!-- Country -->
                        <div class="form-group">
                            <label for="country">Country *</label>
                            <input type="text" id="country" name="country" required placeholder="USA">
                        </div>

                        <!-- Trip Type -->
                        <div class="form-group">
                            <label for="tripType">Trip Type *</label>
                            <select id="tripType" name="tripType" required>
                                <option value="">Select Trip Type</option>
                                <option value="oneway">One Way</option>
                                <option value="roundtrip">Round Trip</option>
                            </select>
                        </div>

                        <!-- Airline -->
                        <div class="form-group">
                            <label for="airline">Preferred Airline</label>
                            <select id="airline" name="airline">
                                <option value="">Select an Airline</option>
                                <option value="SriLankan Airlines">SriLankan Airlines</option>
                                <option value="Emirates">Emirates</option>
                                <option value="Qatar Airways">Qatar Airways</option>
                                <option value="Singapore Airlines">Singapore Airlines</option>
                                <option value="Turkish Airlines">Turkish Airlines</option>
                                <option value="Air India">Air India</option>
                                <option value="Etihad Airways">Etihad Airways</option>
                                <option value="Thai Airways">Thai Airways</option>
                                <option value="Cathay Pacific">Cathay Pacific</option>
                                <option value="Malaysia Airlines">Malaysia Airlines</option>
                            </select>
                        </div>

                        <!-- From Airport -->
                        <div class="form-group">
                            <label for="from">From *</label>
                            <input type="text" id="from" name="from" required
                                placeholder="e.g., Colombo (CMB)">
                        </div>

                        <!-- To Airport -->
                        <div class="form-group">
                            <label for="to">To *</label>
                            <input type="text" id="to" name="to" required
                                placeholder="e.g., Dubai (DXB)">
                        </div>

                        <!-- Departure Date -->
                        <div class="form-group">
                            <label for="departureDate">Departure Date *</label>
                            <input type="date" id="departureDate" name="departureDate" required>
                        </div>

                        <!-- Return Date -->
                        <div class="form-group">
                            <label for="returnDate">Return Date</label>
                            <input type="date" id="returnDate" name="returnDate">
                        </div>

                        <!-- Passengers -->
                        <div class="form-group">
                            <label for="passengers">Passengers *</label>
                            <input type="number" id="passengers" name="passengers" required min="1"
                                value="1">
                        </div>

                        <!-- Message -->
                        <div class="form-group md:col-span-3">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="4" placeholder="Any special requests or instructions..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group md:col-span-3 text-center pt-4">
                            <button type="submit" class="btn btn-submit">
                                Submit Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="text-center  style="style="margin-top: 45px;">
                <p class="text-sm text-gray-500">🌟 Rated 4.8/5 by over 1,200 happy travelers</p>
                <p class="text-xs text-gray-400 mt-1">Your data is secure and never shared. We value your privacy.</p>
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
@endsection
