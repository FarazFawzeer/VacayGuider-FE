    <!--======= =======================
 Footer Area
==============================-->

    <style>
        .footer-wrapper {
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: white;
        }

        .footer-content {
            padding: 50px 0 30px;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-section img {
            max-height: 120px;
            width: auto;
        }

        .description-section {
            text-align: center;
            margin-bottom: 35px;
        }

        .description-text {
            color: #fff;
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .quick-links-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .quick-links-title {
            color: #888888;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .links-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .quick-link {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .quick-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
            text-decoration: none;
        }

        .social-section {
            text-align: center;
            margin-bottom: 30px;
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

        /* NEW: Contact Information Section Styles */
        .contact-info-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .contact-details {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .phone-numbers,
        .email-info,
        .address-info {
            flex: 1;
            min-width: 200px;
            max-width: 400px;
        }

        .contact-title {
            color: #888888;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .contact-item {
            color: #fff;
            font-size: 16px;
            font-weight: 600px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .contact-item i {
            color: #8a8a97;
            font-size: 14px;
            width: 16px;
            text-align: center;
        }

        .contact-item a {
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .contact-item a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .copyright-wrap {
            background-color: #0a3d52;
            padding: 20px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .copyright-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .copyright-text {
            color: white;
            margin: 0;
            font-size: 14px;
        }

        .copyright-text a {
            color: white;
            text-decoration: underline;
        }

        .payment-logos {
            text-align: center;
            justify-content: center;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .payment-logo {
          
            padding: 5px 10px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 50px;
            height: 30px;
        }

        .payment-logo img {
            max-width: 100%;
            max-height: 90px;
            width: auto;
        }

        @media (max-width: 768px) {
            .links-row {
                gap: 20px;
            }

            .quick-link {
                font-size: 14px;
            }

            .copyright-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .payment-logos {
                justify-content: center;
            }

            /* Contact section mobile styles */
            .contact-details {
                flex-direction: column;
                gap: 25px;
            }

            .phone-numbers,
            .email-info,
            .address-info {
                min-width: auto;
                max-width: 100%;
            }

            .contact-title {
                font-size: 16px;
            }

            .contact-item {
                font-size: 13px;
            }
        }

        @media (max-width: 576px) {
            .links-row {
                flex-direction: column;
                gap: 15px;
            }

            .footer-content {
                padding: 30px 0 20px;
            }

            /* Contact section small mobile styles */
            .contact-details {
                gap: 20px;
            }

            .contact-item {
                font-size: 12px;
            }
        }
    </style>
    {{-- <footer class="footer-wrapper footer-layout1" style="background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between" style="border-top: 1px solid #E1E4E6; padding: 36px;">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <div class="th-widget-about widget-mob">
                                <div class="about-logo">
                                    <a href="home-travel.html"><img src="{{ asset('assets/img/logolatest1.png') }}"
                                            alt="Tourm"></a>
                                </div>

                                <p class="about-text" style=" color:#fff;">Rapidiously myocardinate cross-platform
                                    intellectual capital
                                    model. Appropriately create interactive infrastructures</p>
                                <div class="th-social">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                                    <a href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget mob-links">
                            <h3 class="widget_title" style="color: whitesmoke;">Quick Links</h3>
                            <div class="menu-all-pages-container" style=" color:#fff;">
                                <ul class="menu">
                                    <li class="mob-li"><a href="{{ url('/') }}" style=" color:#fff;">Home</a></li>
                                    <li class="mob-li"><a href="{{ url('/about') }}" style=" color:#fff;">About us</a>
                                    </li>
                                    <li class="mob-li"><a href="{{ url('/inbound') }}" style=" color:#fff;">Tour
                                            Packages</a></li>
                                    <li class="mob-li"><a href="{{ url('/rent') }}" style=" color:#fff;">Rent
                                            Vehicles</a></li>
                                    <li class="mob-li"><a href="{{ url('/contact') }}" style=" color:#fff;">Tour Booking
                                            Now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title" style="color: whitesmoke;">Address</h3>
                            <div class="th-widget-contact">
                                <div class="info-box_text">
                                    <div class="icon">
                                        <img src="{{ asset('assets/img/icon/phone.svg') }}" alt="img">
                                    </div>

                                    <div class="details">
                                        <p><a href="tel:+01234567890" class="info-box_link" style=" color:#fff;">+94 114
                                                272 372</a></p>
                                        <p><a href="tel:+09876543210" class="info-box_link" style=" color:#fff;">+94 711
                                                999 444</a></p>
                                        <p><a href="tel:+09876543210" class="info-box_link" style=" color:#fff;">+94 777
                                                035 325 </a></p>
                                    </div>
                                </div>
                                <div class="info-box_text">
                                    <div class="icon">
                                        <img src="{{ asset('assets/img/icon/envelope.svg') }}" alt="img">
                                    </div>

                                    <div class="details">
                                        <p><a href="mailto:info@vacayguider.com " class="info-box_link"
                                                style=" color:#fff;">info@vacayguider.com </a></p>
                                    </div>
                                </div>
                                <div class="info-box_text">
                                    <div class="icon"><img src="{{ asset('assets/img/icon/location-dot.svg') }}"
                                            alt="img"></div>
                                    <div class="details">
                                        <p style=" color:#fff;">22/14C, Asarappa Road, Negombo, Sri Lanka</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap text-center " style="background-color: #0a3d52">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center">
                    <p class="copyright-text m-0 text-white">
                        Copyright 2025 <a href="home-travel.html"
                            class="text-white text-decoration-underline">VacayGuider</a>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>


    </footer> --}}

    <footer class="footer-wrapper">
        <div class="footer-content">
            <div class="container-fluid">
                <!-- Logo Section -->
                <div class="logo-section  d-flex justify-content-center">
                    <a href="home-travel.html" style=" text-align: center;">
                        <img src="{{ asset('assets/img/vacayguider.png') }}" alt="VacayGuider Logo">
                    </a>
                </div>

                <!-- Description Section -->
                <div class="description-section">
                    <p class="description-text">
                        VacayGuider crafts unforgettable escapes, where hidden gems meet seamless journeys, and every
                        trip becomes your best story.
                    </p>
                </div>

                <!-- Quick Links Section -->
                <div class="quick-links-section">
                    <h3 class="quick-links-title">Quick Links</h3>
                    <div class="links-row">
                        <a href="{{ url('/') }}" class="quick-link">Home</a>
                        <a href="{{ url('/about') }}" class="quick-link">About Us</a>
                        <a href="{{ url('/outbound') }}" class="quick-link">Outbound Tours</a>
                        <a href="{{ url('/rent') }}" class="quick-link">Rent Vehicle</a>
                        <a href="{{ url('/transportation') }}" class="quick-link">Transportation</a>
                        <a href="{{ url('/airline') }}" class="quick-link">Airline</a>
                        <a href="{{ url('/blog') }}" class="quick-link">Blog</a>
                        <a href="{{ url('/contact') }}" class="quick-link">Contact</a>
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="social-section">
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


                <!-- Contact Information Section -->
                {{-- <div class="contact-info-section">
                    <div class="contact-details">
                        <div class="phone-numbers">
                            <h4 class="contact-title">Phone</h4>
                            <div class="contact-item">
            
                                <a href="tel:+94114272372">+94 114 272 372</a> | <a href="tel:+94711999444">+94 711 999
                                    444
                            </div>


                        </div>

                        <div class="email-info">
                            <h4 class="contact-title">Email</h4>
                            <div class="contact-item">
  
                                <a href="mailto:info@vacayguider.com">info@vacayguider.com</a>
                            </div>
                        </div>


                        <div class="address-info">
                            <h4 class="contact-title">Address</h4>
                            <div class="contact-item">
                  
                                No : 22/14C, Asarappa Road, Negombo, Sri Lanka
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="payment-logos d-flex align-items-center gap-3">
                    <div class="payment-logo">
                        <img src="{{ asset('assets/img/payment.png') }}" alt="Visa" style="">

                    </div>
                    {{-- <div class="payment-logo">
                        <img src="/images/payments/mastercard.png" alt="MasterCard" style="height: 24px;">
                    </div>
                    <div class="payment-logo">
                        <img src="/images/payments/paypal.png" alt="PayPal" style="height: 24px;">
                    </div>
                    <div class="payment-logo">
                        <img src="/images/payments/amex.png" alt="Amex" style="height: 24px;">
                    </div>
                    <div class="payment-logo">
                        <img src="/images/payments/googlepay.png" alt="Google Pay" style="height: 24px;">
                    </div> --}}
                </div>

            </div>
        </div>

        <!-- Copyright Section -->
        <div class="copyright-wrap">
            <div class="container-fluid">
                <div class="copyright-content">
                    <p class="copyright-text">
                        Copyright 2025 <a href="home-travel.html">VacayGuider</a>. All Rights Reserved.
                    </p>

                </div>
            </div>
        </div>
    </footer>

    <!--********************************
   Code End  Here
 ******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>



    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- Swiper Js -->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>


    <!-- imagesloaded -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- gsap -->
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>

    <!-- circle-progress -->
    <script src="{{ asset('assets/js/circle-progress.js') }}"></script>

    <script src="{{ asset('assets/js/matter.min.js') }}"></script>
    <script src="{{ asset('assets/js/matterjs-custom.js') }}"></script>


    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- nice select -->
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>


    <!-- Main Js File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
