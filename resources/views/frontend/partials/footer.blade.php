    <!--======= =======================
 Footer Area
==============================-->

    <style>
        @media (max-width: 767.98px) {

            .widget_title {
                text-align: center;
            }

            .widget-mob {
                text-align: center;
            }

            .widget-mob .about-logo {}

            .widget-mob .th-social {
                justify-content: center;
                display: flex;
                gap: 10px;
                /* Optional: space between icons */
            }
        }


        .th-social a {
            display: inline-block;
            width: var(--icon-size, 32px);
            height: var(--icon-size, 32px);
            line-height: var(--icon-size, 32px);
            background: none;
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
            background: none;
            border-radius: 50%;
            text-align: center;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .widget-area {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .copyright-wrap {
            padding: 5px 0;
            background-color: #262A36;
        }
        .sub-title {
  display: block;
  color: var(--title-color);
  font-size: 20px;
  line-height: 40px;
  font-weight: 700;
  font-family: 'Dancing Script', cursive;
  position: relative;
  margin-bottom: -4px;
}
    </style>
    <footer class="footer-wrapper footer-layout1" style="background-color: #262A36;">
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

                                <p class="about-text" style="color: #888C97;">Rapidiously myocardinate cross-platform
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
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li class="mob-li"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="mob-li"><a href="{{ url('/about') }}">About us</a></li>
                                    <li class="mob-li"><a href="{{ url('/inbound') }}">Tour Packages</a></li>
                                    <li class="mob-li"><a href="{{ url('/rent') }}">Rent Vehicles</a></li>
                                    <li class="mob-li"><a href="{{ url('/contact') }}">Tour Booking Now</a></li>
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
                                        <p><a href="tel:+01234567890" class="info-box_link">+94 114 272 372</a></p>
                                        <p><a href="tel:+09876543210" class="info-box_link">+94 711 999 444</a></p>
                                        <p><a href="tel:+09876543210" class="info-box_link">+94 777 035 325 </a></p>
                                    </div>
                                </div>
                                <div class="info-box_text">
                                    <div class="icon">
                                        <img src="{{ asset('assets/img/icon/envelope.svg') }}" alt="img">
                                    </div>

                                    <div class="details">
                                        <p><a href="mailto:info@vacayguider.com "
                                                class="info-box_link">info@vacayguider.com </a></p>
                                    </div>
                                </div>
                                <div class="info-box_text">
                                    <div class="icon"><img src="{{ asset('assets/img/icon/location-dot.svg') }}"
                                            alt="img"></div>
                                    <div class="details">
                                        <p>22/14C, Asarappa Road, Negombo, Sri Lanka</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <div class="copyright-wrap text-center " style="background-color: #028ccc;">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="">
            <p class="copyright-text m-0 text-white">
                Copyright 2025 <a href="home-travel.html" class="text-white text-decoration-underline">VaccayGuider</a>. All Rights Reserved.
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
