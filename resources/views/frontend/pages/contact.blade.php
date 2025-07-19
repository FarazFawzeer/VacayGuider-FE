@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        /* Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@700&display=swap');


        .contact-card {

            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 10px;

            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);

        }



        .contact-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .contact-item:hover::before {
            transform: scaleX(1);
        }

        .contact-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .contact-item:hover .contact-icon {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
        }

        .contact-icon i {
            color: white;
            font-size: 24px;
        }

        .contact-content h6 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 18px;
        }

        .contact-content p {
            color: #6c757d;
            margin: 0;
            font-size: 16px;
            line-height: 1.5;
        }

        .contact-content a {
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-content a:hover {
            color: #28a745;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: white;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .section-title p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .contact-section {
                padding: 40px 0;
            }

            .contact-card {
                padding: 30px 20px;
            }

            .contact-item {
                padding: 25px 20px;
                margin-bottom: 20px;
            }

            .contact-icon {
                width: 50px;
                height: 50px;
                margin-right: 15px;
            }

            .contact-icon i {
                font-size: 20px;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }

        .animate-fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .animate-fade-in:nth-child(1) {
            animation-delay: 0.2s;
        }

        .animate-fade-in:nth-child(2) {
            animation-delay: 0.4s;
        }

        .animate-fade-in:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .social-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .contact-item i {
            color: #ffffff !important;
            font-size: 14px;
            width: 16px;
            text-align: center;
        }

        .social-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .th-social {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .th-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            color: #fff;
            border-radius: 50%;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        /* Brand colors */
        .th-social a.facebook {
            background-color: #3b5998;
        }

        .th-social a.twitter {
            background-color: #1da1f2;
        }

        .th-social a.linkedin {
            background-color: #0077b5;
        }

        .th-social a.whatsapp {
            background-color: #25d366;
        }

        .th-social a.instagram {
            background-color: #e4405f;
        }

        .th-social a.tiktok {
            background-color: #000000;
        }

        .th-social a.youtube {
            background-color: #ff0000;
        }

        /* Hover effect: slight lift */
        .th-social a:hover {
            transform: translateY(-2px);
            filter: brightness(1.2);
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
            background: linear-gradient(45deg, #94c73e, #94c73e);
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
    </style>


    <div class="w-full ">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
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

                                <span>Contact Us</span>
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>





    <!-- Contact Start -->
    <div class="container-fluid  py-5 contact-section" style="margin-top: -100px;">
        <div class="container-fluid py-5">
            <div class="row g-5 align-items-center">
                <!-- Left Content -->
                <div class="" data-wow-delay="0.2s">

                    <div class="title-area text-center inbound-title">
                        {{-- <span class="sub-title"
                            style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Get
                            In Touch</span> --}}
                        <h2 class="sec-title"
                            style="font-family: 'Poppins', sans-serif;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                            Sart Your Conversation </h2>
                    </div>



                    <p class="mb-4 text-center" style="color: #000000">We’d love to hear from you. Whether you have questions regarding our
                        services, pricing
                        or else our dedicated team is ready to provide prompt and professional assistance at
                        every stage of your journey.</p>


                    <div class="social-section" style="margin-top: 0px;">
                        <div class="th-social">
                            <a href="https://web.facebook.com/profile.php?id=61550739082103" class="facebook"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="https://x.com/VacayGuider" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="https://lk.linkedin.com/in/vacay-guider-9035432aa" class="linkedin"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a href="https://wa.me/message/MJSQHL4GVAJMI1" class="whatsapp"><i
                                    class="fab fa-whatsapp"></i></a>
                            <a href="https://www.instagram.com/vacayguider/" class="instagram"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://www.tiktok.com/@vacayguider" class="tiktok"><i class="fab fa-tiktok"></i></a>
                            <a href="https://www.youtube.com/@VacayGuider" class="youtube"><i
                                    class="fab fa-youtube"></i></a>
                        </div>
                    </div>

                     <div class="row justify-content-center" style="margin-top: 40px;">
                    <div class="col-lg-10">
                        <div class="contact-card">
                            <div class="row g-4">
                                <!-- Visit Our Office -->
                                <div class="col-md-4  d-flex">
                                    <div class="contact-item animate-fade-in w-100"
                                        style=" background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;">
                                        <div class="d-flex align-items-center">
                                            <div class="contact-icon">
                                                <i class="fas fa-map-marker-alt" style=""></i>
                                            </div>
                                            <div class="contact-content">
                                                <h6>Visit Our Office</h6>
                                                <p>22/14C, Asarappa Road, Negombo, Sri Lanka</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Us -->
                                <div class="col-md-4 d-flex">
                                    <div class="contact-item animate-fade-in w-100"
                                        style=" background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;">
                                        <div class="d-flex align-items-center">
                                            <div class="contact-icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="contact-content">
                                                <h6>Email Us</h6>
                                                <p><a href="mailto:info@vacayguider.co"
                                                        style="color: #6c757d;">info@vacayguider.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Call Us -->
                                <div class="col-md-4 d-flex">
                                    <div class="contact-item animate-fade-in w-100"
                                        style=" background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;">
                                        <div class="d-flex align-items-center">
                                            <div class="contact-icon">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <div class="contact-content" style="color: #6c757d;">
                                                <h6>Call Us</h6>
                                                <p><a href="tel:+94114272372" style="color: #6c757d;">+94 114 272
                                                        372</a></p>
                                                <p><a href="tel:+94711999444" style="color: #6c757d;">+94 711 999
                                                        444</a></p>
                                                <p><a href="tel:+94777035325" style="color: #6c757d;">+94 777 035
                                                        325</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .row -->
                        </div> <!-- .contact-card -->
                    </div>
                </div>

                    <p class="mb-4  text-center" style="color: #000000">
                        <strong>Got a question or planning a trip?</strong>
                        Fill out the form and our team will get back to you soon. We’re here to help with inquiries,
                        feedback, or travel plans — let’s make your journey amazing!
                    </p>

                </div>

                <!-- Right Form -->
                <div class="" data-wow-delay="0.4s" style="margin-top: -20px;">
                    {{-- <p class="mb-4 fs-5 text-secondary">
                        Got a question or planning a trip?
                        Fill out the form and our team will get back to you soon. We’re here to help with inquiries,
                        feedback, or travel plans — let’s make your journey amazing!
                    </p> --}}

                    @if (session('success'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="steps-container">
                        <div class="step-card bg-white rounded-2xl shadow-xl p-6 sm:p-8">
                            <div class="step-header text-center mb-6">
                                <div class="step-number">!</div>
                                <h2 class="step-title text-blue-900 text-3xl sm:text-4xl font-extrabold">Check Your
                                    Reservation
                                </h2>
                            </div>
                            <form method="POST" action="{{ route('contact.submit') }}"
                                class="form-grid grid grid-cols-1 md:grid-cols-3 gap-6">
                                @csrf

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name" class="block font-semibold text-gray-700 mb-1">Your Name
                                        *</label>
                                    <input type="text" id="name" name="name" required placeholder="Your Name"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email" class="block font-semibold text-gray-700 mb-1">Your Email
                                        *</label>
                                    <input type="email" id="email" name="email" required placeholder="Your Email"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                                </div>

                                <!-- Phone -->
                                <div class="form-group">
                                    <label for="phone" class="block font-semibold text-gray-700 mb-1">Your
                                        Phone</label>
                                    <input type="tel" id="phone" name="phone" placeholder="Phone"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                                </div>

                                <!-- Country -->
                                <div class="form-group">
                                    <label for="country" class="block font-semibold text-gray-700 mb-1">Country</label>
                                    <input type="text" id="country" name="country" placeholder="Country"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                                </div>

                                <!-- Service -->
                                <div class="form-group md:col-span-2">
                                    <label for="service" class="block font-semibold text-gray-700 mb-1">Select a Service
                                        *</label>
                                    <select id="service" name="service" required
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                                        <option value="" disabled selected>Select a service</option>
                                        <option value="Inbound tours">Inbound tours</option>
                                        {{-- <option value="Outbound tours">Outbound tours</option> --}}
                                        <option value="Rent Vehicles">Vehicle Renta</option>
                                        <option value="Transportations">Transportations</option>

                                        <option value="Air tickets">Air Ticketing</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <!-- Message -->
                                <div class="form-group md:col-span-2">
                                    <label for="message" class="block font-semibold text-gray-700 mb-1">Message</label>
                                    <textarea id="message" name="message" rows="5" placeholder="Leave a message here"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"
                                        style="min-height: 130px;"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group md:col-span-2 text-center pt-4">
                                    <button type="submit" class="btn btn-submit"
                                        style="background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%); ">
                                        Send Message
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>



               


                <!-- Map -->
                <div class="col-12 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="overflow-hidden rounded mt-4 shadow">
                        {{-- <iframe class="w-100" style="height: 400px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4707.183833396513!2d79.83274714459975!3d7.211837711148969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2ee997646d897%3A0x8adfcb85f471e77d!2s22%2C%2014%20Asarappa%20Rd%2C%20Negombo!5e0!3m2!1sen!2slk!4v1749652066394!5m2!1sen!2slk"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <script>
        setTimeout(function() {
            let alert = document.getElementById('successAlert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                alert.style.opacity = '0';
            }
        }, 5000); // 5000ms = 5 seconds
    </script>


@endsection
