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
    </style>




    <section class="position-relative bg-top-center overflow-hidden space" id="service-sec"
        style="margin-top: -150px; padding-bottom: 60px; background: linear-gradient(180deg, #0B0B13 0%, #121219 100%);">
        <div class="bg-overlay"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; background: url('assets/img/pattern-dark.png') repeat; opacity: 0.05;">
        </div>

        <div class="container position-relative" style="z-index: 1;">
            <!-- Title Section with improved typography -->
            <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top: 130px;">
                <!-- Enhanced SELECT YOUR VEHICLE Heading -->
                <h2 class="sec-title"
                    style="font-family: 'Montserrat', sans-serif; font-size: 46px; font-weight: 800; color: #ffffff; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 3px; text-shadow: 0 2px 15px rgba(0,162,255,0.3);">
                    Book YOUR VEHICLE</h2>
                <div
                    style="width: 80px; height: 4px; background: linear-gradient(90deg, #00A2FF, #0069d9); margin: 0 auto 25px; border-radius: 2px;">
                </div>

            </div>



            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
                    <div class="slider-area tour-slider slider-drag-wrap">



                        <div class="swiper-wrapper">




                            <div class="swiper-slide">
                                <div class="cars-slider__item"
                                    style="background: linear-gradient(135deg, rgba(19,19,30,0.95) 0%, rgba(30,30,47,0.95) 100%); border-radius: 18px; overflow: hidden; margin: 10px; transition: all 0.3s ease; position: relative; padding: 30px; box-shadow: 0 15px 30px rgba(0,0,0,0.3), 0 0 60px rgba(0,162,255,0.1) inset; border: 1px solid rgba(0,162,255,0.1);">

                                    <!-- Main Row Layout -->
                                    <div class="horizontal-layout"
                                        style="display: flex; align-items: center; justify-content: space-between; width: 100%;">

                                        <!-- Left Section -->
                                        <div class="content-section" style="flex: 1; padding-right: 20px;">
                                            <div
                                                style="display: inline-block; background: linear-gradient(135deg, #FF4D4D, #CC0000);padding: 8px 14px; border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 600; color: #fff; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 3px 10px rgba(0,162,255,0.3);">
                                                {{ $vehicle->category ?? 'Premium Bike' }}
                                            </div>

                                            <h3
                                                style="margin-bottom: 8px; font-family: 'Montserrat', sans-serif; color: #ffffff; font-weight: 700; font-size: 44px; text-shadow: 0 2px 10px rgba(0,162,255,0.4);">
                                                {{ $vehicle->make ?? 'Test' }}
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
                                            <div
                                                style="background: linear-gradient(135deg, rgba(19,19,30,0.8) 0%, rgba(30,30,47,0.8) 100%); padding: 20px 25px; border-radius: 16px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.3); max-width: 180px; border: 1px solid rgba(0,162,255,0.2);">

                                                <div
                                                    style="font-family: 'Montserrat', sans-serif; color: #00A2FF; font-weight: 800; font-size: 46px; line-height: 1; margin-bottom: 4px; text-shadow: 0 2px 10px rgba(0,162,255,0.4);">
                                                    <span
                                                        style="font-size: 30px; vertical-align: top; margin-right: 2px;">$</span>{{ $vehicle->price }}
                                                </div>
                                                <div
                                                    style="font-family: 'Poppins', sans-serif; color: #AAAAAA; font-size: 15px; font-weight: 500;">
                                                    per day</div>
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
                                                <span style="color: #AAAAAA; font-weight: 600; font-size: 14px;">First-Aid
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


        <div class="max-w-4xl mx-auto">


            <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-center text-blue-900 mb-4">Check Your Reservation</h2>
                <p class="text-center text-gray-600 mb-6 sm:mb-8">Fill out the form below to check availability and receive
                    a
                    personalized quote.</p>


                <div id="success-message"
                    class="bg-green-100 text-green-800 p-4 rounded mb-4 transition-opacity duration-500">
                    {{ session('success') }}
                </div>
                <form form action="{{ route('vehicle.booking.store') }}" method="POST"
                    class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @csrf
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
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



                    <!-- Start Date -->
                    <div class="md:col-span-1">
                        <label for="startDate" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                        <input type="date" id="startDate" name="startDate" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                    </div>

                    <!-- End Date -->
                    <div class="md:col-span-1">
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

            <div class="text-center " style="margin-top: 50px">
                <p class="text-sm text-gray-500">🌟 Rated 4.8/5 by over 1,200 happy travelers</p>
                <p class="text-xs text-gray-400 mt-1">Your data is secure and never shared. We value your privacy.</p>
            </div>



        </div>






    </section>

    <section style="background: linear-gradient(180deg, #0B0B13 0%, #121219 100%);">
        <div class="advantages-section"
            style=" background: linear-gradient(135deg, rgba(0,10,20,0.6) 0%, rgba(19,19,30,0.6) 100%); padding: 40px 0; border-radius: 20px; box-shadow: 0 15px 30px rgba(0,0,0,0.2); position: relative; overflow: hidden; border: 1px solid rgba(0,162,255,0.15);">
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
@endsection
