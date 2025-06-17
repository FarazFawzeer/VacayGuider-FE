@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        /* Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@700&display=swap');

        /* Apply Jost font and weight */
        .contact-section h2,
        .contact-section h5,
        .contact-section h6 {
            font-family: 'Jost', sans-serif;
            font-weight: 700;
        }

        /* Colorful icon buttons */
        .contact-section .btn-sm-square i {
            font-size: 1rem;
        }

        .contact-section .btn-sm-square:nth-child(1) {
            background-color: #3b5998;
            /* Facebook */
            border: none;
        }

        .contact-section .btn-sm-square:nth-child(2) {
            background-color: #00acee;
            /* Twitter */
            border: none;
        }

        .contact-section .btn-sm-square:nth-child(3) {
            background-color: #E1306C;
            /* Instagram */
            border: none;
        }

        .contact-section .btn-sm-square:nth-child(4) {
            background-color: #0072b1;
            /* LinkedIn */
            border: none;
        }

        /* Icon block styling */
        .contact-section .d-flex i {
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: white;
            font-size: 1.2rem;
        }

        /* Optional: Add some hover effects */
        .contact-section .btn-sm-square:hover {
            opacity: 0.9;
        }

        body {
            font-family: var(--body-font);
            font-size: 16px;
            font-weight: 400;
            color: var(--body-color);
            line-height: 18px;
        }

  

        .header-layout1 .currency-menu {
            border: 1px solid var(--light-color);
            border-radius: 100px;
            padding: 3px 14px;
            max-width: 98px;
            text-transform: capitalize;
        }

        .currency-menu .nice-select {
            font-family: var(--body-font);
            color: #FFF;
            font-weight: 400;
            font-size: 11px;
            line-height: 16px;
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
            background: linear-gradient(45deg, #feb47b, #ff7e5f);
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
            color: rgb(251, 207, 0);
            margin-left: 2px;
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
            border-radius: 0px;
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
            font-size: 28px;
            line-height: 1.327;
        }

        .sub-title {
            display: block;
            color: var(--title-color);
            font-size: 25px;
            line-height: 40px;
            font-weight: 400;
            font-family: var(--style-font);
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

        /* body {
                                background-color: var(--background);
                                color: var(--foreground);
                                font-family: system-ui, -apple-system, sans-serif;
                            } */


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

        .form-floating > .form-select {
  padding-top:0;
  padding-bottom:0;
}
    </style>
    <div class="container-fluid about-hero text-white position-relative"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/img/telephone-612061_1920.jpg') center center / cover no-repeat; 
     display: flex;
     align-items: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-style7">
                        <span class="sub-title style1 text-white d-block mb-2">Home</span>
                        <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Contact Start -->
    <div class="container-fluid bg-light py-5 contact-section">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <!-- Left Content -->
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <h5 class="sub-title mb-3">Get In Touch</h5>
                    <h2 class="display-5 mb-4">tart your conversation — reach out to us </h2>
                    <p class="mb-4 text-muted">We’d love to hear from you. Whether you have questions regarding our
                        services, pricing
                        or else our dedicated team is ready to provide prompt and professional assistance at
                        every stage of your journey.</p>

                    <div class="d-flex gap-3 mb-4">
                        <a href="#" class="btn btn-primary btn-sm-square"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-primary btn-sm-square"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-primary btn-sm-square"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-primary btn-sm-square"><i class="fab fa-linkedin-in"></i></a>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <div class="bg-white p-3 d-flex shadow">
                                <i class="fas fa-map-marker-alt fa-2x text-success me-3"></i>
                                <div>
                                    <h6 class="mb-1">Address</h6>
                                    <p class="mb-0 text-muted">22/14C, Asarappa Road, Negombo, Sri Lanka</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-white p-3 d-flex shadow">
                                <i class="fas fa-envelope fa-2x text-success me-3"></i>
                                <div>
                                    <h6 class="mb-1">Email</h6>
                                    <p class="mb-0 text-muted">info@vacayguider.co</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-white p-3 d-flex shadow">
                                <i class="fa fa-phone-alt fa-2x text-success me-3"></i>
                                <div>
                                    <h6 class="mb-1">Phone</h6>
                                    <p class="mb-0 text-muted">+94 114 272 372</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Form -->
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                    <p class="mb-4 fs-5 text-secondary">
                        Got a question or planning a trip?
                        Fill out the form and our team will get back to you soon. We’re here to help with inquiries,
                        feedback, or travel plans — let’s make your journey amazing!
                    </p>

                    @if(session('success'))
    <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating shadow-sm rounded">
                                    <input type="text" class="form-control"id="name" name="name" placeholder="Your Name"
                                        required>
                                    <label for="name" class="ps-3">Your Name</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm rounded">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email"
                                        required>
                                    <label for="email" class="ps-3">Your Email</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm rounded">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                                    <label for="phone" class="ps-3">Your Phone</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm rounded">
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                                    <label for="country" class="ps-3">Country</label>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-floating shadow-sm rounded">
                                    <select class="form-select"  id="service" name="service" required>
                                        <option value="" disabled selected>Select a service</option>
                                        <option value="Inbound tours">Inbound tours</option>
                                        <option value="Outbound tours">Outbound tours</option>
                                        <option value="Transportations">Transportations</option>
                                        <option value="Rent Vehicles">Rent Vehicles</option>
                                        <option value="Air tickets">Air tickets</option>
                                        <option value="Other">Other</option>
                                    </select>
                                   
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating shadow-sm rounded">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 130px;"></textarea>
                                    <label for="message" class="ps-3">Message</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-dark w-100 py-3 shadow-sm fs-5">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>

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
    setTimeout(function () {
        let alert = document.getElementById('successAlert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            alert.style.opacity = '0';
        }
    }, 5000); // 5000ms = 5 seconds
</script>


@endsection
