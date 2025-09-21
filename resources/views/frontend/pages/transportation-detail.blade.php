@extends('frontend.layouts.app')

@section('title', 'VacayGuider | Transportaion')

@section('content')

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'slide-in': 'slide-in 0.8s ease-out',
                        'fade-up': 'fade-up 0.6s ease-out',
                        'shimmer': 'shimmer 2s linear infinite',
                        'bounce-gentle': 'bounce-gentle 2s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        },
                        'slide-in': {
                            '0%': {
                                transform: 'translateX(-100%)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            }
                        },
                        'fade-up': {
                            '0%': {
                                transform: 'translateY(30px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        shimmer: {
                            '0%': {
                                transform: 'translateX(-100%)'
                            },
                            '100%': {
                                transform: 'translateX(100%)'
                            }
                        },
                        'bounce-gentle': {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-5px)'
                            }
                        }
                    },
                    backdropBlur: {
                        xs: '2px',
                    }
                }
            }
        }
    </script>
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

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .spec-card {
            position: relative;
            overflow: hidden;
        }

        .spec-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
            transition: left 0.6s ease-in-out;
        }

        .spec-card:hover::before {
            left: 100%;
        }

        .icon-container {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-effect {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .professional-shadow {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1), 0 2px 16px rgba(0, 0, 0, 0.05);
        }

        .hover-lift:hover {
            transform: translateY(-8px) scale(1.02);
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

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-border {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #06b6d4);
            background-size: 300% 300%;
            animation: gradient-animation 3s ease infinite;
        }

        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>

    {{-- <div class="container-fluid about-hero text-white position-relative"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('assets/img/architecture-1837176_1920.jpg') }}') center center / cover no-repeat; 
     display: flex;
     align-items: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-style7">
                        <span class="sub-title style1 text-white d-block mb-2">Tarnportation</span>
                        <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">We deliver comfort every
                            mile.
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="w-full ">

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
                            <a href="{{ url('/transportaion') }}"
                                class="breadcrumb-item text-gray-500 hover:text-blue-600 px-2 py-1.5 rounded transition-all duration-200">
                                Transportaion
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
                                {{ $vehicle->model ?? 'Tour Details' }}
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="transportation" class="relative py-20 overflow-hidden">
        <!-- Background Elements -->
        {{-- <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-purple-50"></div>
        <div
            class="absolute top-0 left-0 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float">
        </div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"
            style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-cyan-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"
            style="animation-delay: 4s;"></div> --}}

        <div class="container ">
            <!-- Section Header -->


        
              



                <!-- Vehicle Details Section -->
                <div class=" w-full flex flex-col animate-fade-up" style="animation-delay: 0.3s;">
                    
                              <!-- Header with Price -->
                        <div class="flex items-start justify-between flex-wrap gap-4">
                            <!-- Vehicle Info -->
                            <div class="flex-1 min-w-0">
                                <h2
                                    class="text-2xl lg:text-2xl font-bold text-black bg-clip-text text-transparent mb-3 text-shadow leading-tight">
                                    {{ $vehicle->make }}
                                </h2>
                                <h1
                                    class="text-4xl lg:text-4xl font-bold text-black bg-clip-text text-transparent mb-3 text-shadow leading-tight">
                                    {{ $vehicle->name }}
                                </h1>

                            </div>

                            <!-- Price Info -->
                            <div class="relative">
                                <div class=" text-white font-bold text-2xl px-8 py-4 rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-300 relative overflow-hidden"
                                    style="border-radius: 58px;background: #96c93e;">
                                    <span class="relative z-10">${{ number_format($vehicle->price) }}/day</span>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent transform -skew-x-12 translate-x-full hover:translate-x-[-100%] transition-transform duration-700">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                    <!-- Vehicle Main Image -->
@php
    $backendBaseUrl = config('app.backend_url');
    $vehicleType = strtolower($vehicle->type); // car, bike, etc.

    // Main image URL
    $finalImage = !empty($vehicle->vehicle_image)
        ? $backendBaseUrl . '/storage/' . ltrim($vehicle->vehicle_image, '/')
        : asset('assets/img/dummy/' . ($vehicleType ?: 'default') . '.jpg');

    // Prepare sub-images array
    $subImages = [];
    if (!empty($vehicle->sub_image)) {
        $decoded = json_decode($vehicle->sub_image, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            $subImages = $decoded;
        } else {
            $subImages = explode(',', $vehicle->sub_image);
        }

        // Clean extra quotes and spaces
        $subImages = array_map(fn($img) => trim($img, " \t\n\r\0\x0B\""), $subImages);
    }

    // Build full URLs for sub-images
    $subImageUrls = array_map(
        fn($img) => $backendBaseUrl . '/storage/' . ltrim($img, '/'),
        $subImages,
    );
@endphp

<!-- Main Image -->
<div class="relative overflow-hidden mb-4 group text-center" style="margin-top: -50px;">
    <img src="{{ $finalImage }}" alt="{{ $vehicle->name }}"
        class="mx-auto block object-contain transition-transform duration-500 group-hover:scale-105 rounded-3xl cursor-pointer"
        style=" max-width: 100%;"
        data-bs-toggle="modal" data-bs-target="#imageModal" data-img="{{ $finalImage }}">
</div>

<!-- Sub Images Grid (4 per row) -->
@if (count($subImageUrls) > 0)
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sub-img-mob" style="margin-top: -70px">
        @foreach ($subImageUrls as $url)
            <img src="{{ $url }}" alt="Sub Image"
                class="object-cover rounded-lg cursor-pointer transition-transform duration-300 hover:scale-105"
                style=" width: 100%;"
                data-bs-toggle="modal" data-bs-target="#imageModal" data-img="{{ $url }}">
        @endforeach
    </div>
@endif

<!-- Image Modal (Popup) -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark border-0">
            <div class="modal-body text-center p-0">
                <img id="modalImage" src="" class="img-fluid rounded" alt="Large Image">
            </div>
        </div>
    </div>
</div>



                    <!-- Vehicle Info -->
                    <div class="flex-1 space-y-8" style="margin-top: 65px;">
                     


                        <!-- Enhanced Vehicle Specs Grid -->
                        <div class="max-w-7xl mx-auto">

                            <!-- Main Desktop Grid -->
                            <div class="hidden md:grid md:grid-cols-3 gap-8 mb-16">
                                <!-- Vehicle Type Card -->
                                <div
                                    class="spec-card glass-effect hover-lift rounded-2xl p-6 professional-shadow transition-all duration-500 group">
                                    <div class="flex flex-col items-center text-center space-y-4">
                                        <div
                                            class="icon-container w-16 h-16 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-8 h-8 " fill="currentColor" viewBox="0 0 24 24"
                                                style="color: #3596d3;">
                                                <path
                                                    d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11C5.84 5 5.28 5.42 5.08 6.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-1.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-2">
                                                Vehicle Type</p>
                                            <p class="text-xl font-bold text-slate-800">Sedan</p>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl">
                                    </div>
                                </div>

                                <!-- Availability Card -->
                                <div
                                    class="spec-card glass-effect hover-lift rounded-2xl p-6 professional-shadow transition-all duration-500 group">
                                    <div class="flex flex-col items-center text-center space-y-4">
                                        <div
                                            class="icon-container w-16 h-16 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-8 h-8 " fill="currentColor" viewBox="0 0 24 24"
                                                style="color: #3596d3;">
                                                <path fill-rule="evenodd"
                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-2">
                                                Availability</p>
                                            <div class="flex items-center justify-center space-x-2">
                                                <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                                                <p class="text-xl font-bold text-emerald-600">Available Now</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl">
                                    </div>
                                </div>

                                <!-- Capacity Card -->
                                <div
                                    class="spec-card glass-effect hover-lift rounded-2xl p-6 professional-shadow transition-all duration-500 group">
                                    <div class="flex flex-col items-center text-center space-y-4">
                                        <div
                                            class="icon-container w-16 h-16 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-8 h-8 " fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" style="color: #3596d3;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-2">
                                                Capacity</p>
                                            <p class="text-xl font-bold text-slate-800">5 Passengers</p>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl">
                                    </div>
                                </div>


                            </div>

                            <!-- Mobile/Tablet Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:hidden">
                                <!-- Vehicle Type Card - Mobile -->
                                <div
                                    class="spec-card glass-effect hover-lift rounded-2xl p-6 professional-shadow transition-all duration-500 group">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="icon-container w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-7 h-7 " fill="currentColor" viewBox="0 0 24 24"
                                                style="color: #3596d3;">
                                                <path
                                                    d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11C5.84 5 5.28 5.42 5.08 6.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-1.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-1">
                                                Vehicle Type</p>
                                            <p class="text-lg font-bold text-slate-800">Sedan</p>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl">
                                    </div>
                                </div>

                                <!-- Availability Card - Mobile -->
                                <div
                                    class="spec-card glass-effect hover-lift rounded-2xl p-6 professional-shadow transition-all duration-500 group">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="icon-container w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-7 h-7 " fill="currentColor" viewBox="0 0 24 24"
                                                style="color: #3596d3;">
                                                <path fill-rule="evenodd"
                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-1">
                                                Availability</p>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                                                <p class="text-lg font-bold text-emerald-600">Available Now</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl">
                                    </div>
                                </div>

                                <!-- Capacity Card - Mobile -->
                                <div
                                    class="spec-card glass-effect hover-lift rounded-2xl p-6 professional-shadow transition-all duration-500 group">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="icon-container w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-7 h-7 " fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" style="color: #3596d3;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-1">
                                                Capacity</p>
                                            <p class="text-lg font-bold text-slate-800">5 Passengers</p>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- Enhanced Description -->
                        <div
                            class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-purple-50 to-indigo-50 p-8 rounded-3xl border border-blue-100/50 shadow-lg">
                            <div class="relative z-10">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8  rounded-lg flex items-center justify-center mr-3"
                                        style="margin-top: -9px;background: linear-gradient(135deg, #2596be, #96c93e);">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900">Premium Features & Comfort</h3>
                                </div>
                                <p class="text-gray-700 leading-relaxed text-lg">
                                    {{ $vehicle->description ?? 'Experience unparalleled comfort and reliability with this meticulously maintained premium sedan. Perfect for exploring Sri Lanka\'s breathtaking landscapes and vibrant cities.' }}
                                </p>
                                <!-- Feature Tags -->
                                <div class="flex flex-wrap gap-3 mt-6">
                                    <span
                                        class="px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-sm font-semibold text-gray-700 border border-gray-200">🚗
                                        GPS Navigation</span>
                                    <span
                                        class="px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-sm font-semibold text-gray-700 border border-gray-200">❄️
                                        AC Climate Control</span>
                                    <span
                                        class="px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-sm font-semibold text-gray-700 border border-gray-200">🛡️
                                        Full Insurance</span>
                                    <span
                                        class="px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-sm font-semibold text-gray-700 border border-gray-200">🔧
                                        24/7 Support</span>
                                </div>
                            </div>

                            <!-- Background Pattern -->
                            <div class="absolute top-0 right-0 w-32 h-32 opacity-10">
                                <svg viewBox="0 0 100 100" class="w-full h-full text-blue-500">
                                    <defs>
                                        <pattern id="grid" width="10" height="10"
                                            patternUnits="userSpaceOnUse">
                                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="currentColor"
                                                stroke-width="1" />
                                        </pattern>
                                    </defs>
                                    <rect width="100" height="100" fill="url(#grid)" />
                                </svg>
                            </div>
                        </div>

                        <!-- Enhanced Action Button -->
                        <div class="pt-6">
                            <button
                                class="relative w-full group overflow-hidden bg-black text-white font-bold text-xl py-6 px-8 rounded-2xl shadow-2xl hover:shadow-3xl transform hover:scale-[1.02] transition-all duration-300 bg-size-200 hover:bg-pos-100"
                                style="background-size: 200% 100%; background-position: 0% 0%;background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);"
                                onmouseover="this.style.backgroundPosition = '100% 0%'"
                                onmouseout="this.style.backgroundPosition = '0% 0%'">
                                <span class="relative z-10 flex items-center justify-center space-x-3">

                                    <span>Book Now</span>

                                </span>

                                <!-- Animated shine effect -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                                </div>

                                <!-- Ripple effect -->
                                <div
                                    class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="absolute inset-0 rounded-2xl bg-white/10 animate-ping"></div>
                                </div>
                            </button>

                            <!-- Additional Info -->
                            <div class="flex items-center justify-center space-x-6 mt-6 text-sm text-gray-600">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Cancellation</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Confirmation</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Best Price </span>
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

                    @if (session('success'))
                        <div class="alert alert-success" id="success-message">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('transport.booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

                        <div class="form-grid">
                            <!-- Full Name -->
                            <div class="form-group md:col-span-2">
                                <label for="fullName">Full Name *</label>
                                <input type="text" id="fullName" name="fullName" required placeholder="John Doe">
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

                            <!-- Country -->
                            <div class="form-group">
                                <label for="country">Country *</label>
                                <input type="text" id="country" name="country" required placeholder="USA">
                            </div>

                            <!-- Start Date -->
                            <div class="form-group">
                                <label for="startDate">Start Date *</label>
                                <input type="date" id="startDate" name="startDate" required>
                            </div>

                            <!-- Start Time -->
                            <div class="form-group">
                                <label for="startTime">Start Time *</label>
                                <input type="time" id="startTime" name="startTime" required>
                            </div>

                            <!-- End Date -->
                            <div class="form-group">
                                <label for="endDate">End Date *</label>
                                <input type="date" id="endDate" name="endDate" required>
                            </div>

                            <!-- End Time -->
                            <div class="form-group">
                                <label for="endTime">End Time *</label>
                                <input type="time" id="endTime" name="endTime" required>
                            </div>

                            <!-- Pickup Location -->
                            <div class="form-group">
                                <label for="pickupLocation">Pickup Location *</label>
                                <input type="text" id="pickupLocation" name="pickupLocation" required
                                    placeholder="Enter pickup address">
                            </div>

                            <!-- Drop Location -->
                            <div class="form-group">
                                <label for="dropLocation">Drop Location *</label>
                                <input type="text" id="dropLocation" name="dropLocation" required
                                    placeholder="Enter drop-off address">
                            </div>

                            <!-- Service Type -->
                            <div class="form-group">
                                <label for="serviceType">Service Type *</label>
                                <select id="serviceType" name="serviceType" required>
                                    <option value="">Select Service</option>
                                    <option value="transport">Transport</option>
                                    <option value="hourly">Hourly Based</option>
                                </select>
                            </div>

                            <!-- Hour Count (for Hourly Based) -->
                            <div id="hourInputWrapper" class="form-group hidden">
                                <label for="hourCount">Hours</label>
                                <input type="number" id="hourCount" name="hourCount" min="1"
                                    placeholder="e.g. 3">
                            </div>

                            <!-- Message -->
                            <div class="form-group md:col-span-3">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" rows="4" placeholder="Tell us your preferences or questions..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group md:col-span-3 text-center pt-4">
                                <button type="submit" class="btn btn-submit"
                                    style="background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);">
                                    Submit Request
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>






        </div>



    </section>

    <script>
        document.getElementById('serviceType').addEventListener('change', function() {
            const hourWrapper = document.getElementById('hourInputWrapper');
            if (this.value === 'hourly') {
                hourWrapper.classList.remove('hidden');
            } else {
                hourWrapper.classList.add('hidden');
            }
        });
    </script>


    <script>
        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.classList.add('opacity-0');
                setTimeout(() => msg.remove(), 500);
            }
        }, 5000);
    </script>

    <!-- Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modalImage = document.getElementById("modalImage");
        const imageTriggers = document.querySelectorAll("[data-bs-target='#imageModal']");

        imageTriggers.forEach(img => {
            img.addEventListener("click", function () {
                modalImage.src = this.getAttribute("data-img");
            });
        });
    });
</script>

@endsection
