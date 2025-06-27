@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
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
    </style>



    <section class="position-relative bg-top-center overflow-hidden space" id="service-sec"
        style="margin-top: -150px; padding-bottom: 60px;background-color: #F5F5F5 ;">
        <div class="bg-overlay"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; background: url('assets/img/pattern-dark.png') repeat; opacity: 0.05;">
        </div>

        <div class="container position-relative" style="z-index: 1;">
            <!-- Title Section with improved typography -->
            <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top: 130px;">
                <!-- Enhanced SELECT YOUR VEHICLE Heading -->
                <!-- <span class="sub-title" style="font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500; color: #0069d9; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 8px;">Premium Car Rentals</span> -->
                <span class="sub-title fw-semibold" style="">Premium Car Rentals</span>
                <h2 class="sec-title"
                    style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; margin-bottom: 20px; text-shadow: 0 2px 15px rgba(0,162,255,0.3);">
                    Select Your Vehicle</h2>
                <div class="title-separator"
                    style="width: 80px; height: 3px; background: linear-gradient(90deg, #0069d9, #00a2ff); margin: 0 auto;">
                </div>
            </div>



            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
                    <div class="slider-area tour-slider slider-drag-wrap">

                        <!-- Navigation Buttons with improved styling -->
                        <div class="swiper-button-prev-rental"
                            style="background-color: rgba(0,162,255,0.1); width: 54px; height: 54px; border-radius: 50%; box-shadow: 0 3px 12px rgba(0,162,255,0.2); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 1px solid rgba(0,162,255,0.3); backdrop-filter: blur(5px);">
                            <i class="fas fa-chevron-left" style="color: #00A2FF; font-size: 16px;"></i>
                        </div>
                        <div class="swiper-button-next-rental"
                            style="background-color: rgba(0,162,255,0.1); width: 54px; height: 54px; border-radius: 50%; box-shadow: 0 3px 12px rgba(0,162,255,0.2); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 1px solid rgba(0,162,255,0.3); backdrop-filter: blur(5px);">
                            <i class="fas fa-chevron-right" style="color: #00A2FF; font-size: 16px;"></i>
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
                                            style="background: linear-gradient(135deg, rgba(19,19,30,0.95) 0%, rgba(30,30,47,0.95) 100%); border-radius: 18px; overflow: hidden; margin: 10px; transition: all 0.3s ease; position: relative; padding: 30px;  border: 1px solid rgba(0,162,255,0.1);">

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
                                                        style="width: 100%; max-width: auto; height: 350px; object-fit: contain; z-index: 2; transform: scale(1.1); transition: transform 0.5s ease; filter: drop-shadow(0 10px 25px rgba(0,162,255,0.25));">
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
                                            <!-- Specifications Section -->
                                            <div class="specification priority-mobile"
                                                style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-top: 40px; padding: 20px; border-radius: 14px; box-shadow: 0 8px 20px rgba(0,0,0,0.2); background: linear-gradient(135deg, rgba(19,19,30,0.7) 0%, rgba(30,30,47,0.7) 100%); backdrop-filter: blur(5px); border: 1px solid rgba(0,162,255,0.1);">

                                                <!-- Helmets -->
                                                <div class="specification-item"
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; text-align: left; font-family: 'Nunito Sans', sans-serif; color: #00A2FF; font-weight: 700; font-size: 18px;">
                                                    <i class="fas fa-helmet-safety"
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,162,255,0.2); border: 1px solid rgba(0,162,255,0.3);"></i>
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
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,162,255,0.2); border: 1px solid rgba(0,162,255,0.3);"></i>
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
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,162,255,0.2); border: 1px solid rgba(0,162,255,0.3);"></i>
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
                                                        style="color: #00A2FF; font-size: 20px; background: linear-gradient(135deg, rgba(0,162,255,0.15) 0%, rgba(0,105,217,0.15) 100%); border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,162,255,0.2); border: 1px solid rgba(0,162,255,0.3);"></i>
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
    <section class="position-relative overflow-hidden space" id="service-sec" data-bg-src="">
        <div class="container" style="margin-top: -82px;">
            <div class="row">
                <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top: 100px;">
                    <!-- <span class="sub-title" style="font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500; color: #0069d9; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 8px;">Premium Car Rentals</span> -->
                    <span class="sub-title fw-semibold">Premium Car Rentals</span>
                    <h2 class="sec-title"
                        style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 700; color: #1a2b49; margin-bottom: 20px;">
                        Find Your Perfect Ride</h2>
                    <div class="title-separator"
                        style="width: 80px; height: 3px; background: linear-gradient(90deg, #0069d9, #00a2ff); margin: 0 auto;">
                    </div>
                </div>

                <div class="row mt-5">


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
                        @include('frontend.partials.vehicle_cards', ['vehicles' => $vehicles])

                    </div>



                </div>
            </div>
    </section>

    <section style="background: linear-gradient(180deg, #0B0B13 0%, #121219 100%);">
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
