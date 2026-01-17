@extends('frontend.layouts.app')

@section('title', 'VacayGuider | Vehicle Rental')

@section('content')

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }


        .message {
            max-width: 500px;
            margin: 20px auto;
            padding: 15px 20px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 16px;
        }

        .message.success {
            background-color: #e6ffed;
            color: #155724;
        }

        .message.error {
            background-color: #fdecea;
            border-left: 4px solid #dc3545;
            color: #721c24;
        }

        .message.warning {
            background-color: #fff4e5;
            border-left: 4px solid #f0ad4e;
            color: #856404;
        }

        .booking-container {
            max-width: 1200px;
            margin: 0 auto;

            backdrop-filter: blur(15px);
            border-radius: 20px;

            overflow: hidden;
        }

        .booking-header {

            color: rgb(0, 0, 0);
            padding: 3rem 2rem;
            position: relative;
            overflow: hidden;
        }



        .booking-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .booking-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0 0 0.5rem;
            position: relative;
            z-index: 2;
            color: rgb(0, 0, 0);

        }

        .booking-header p {
            font-size: 1.1rem;
            margin: 0;
            opacity: 0.9;
            position: relative;
            z-index: 2;
            color: rgb(0, 0, 0);
        }

        .progress-section {
            padding: 2rem;

            position: relative;
        }

        .step-progress {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            position: relative;
        }

        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            position: relative;
        }

        .step-number {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #e2e8f0;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.75rem;
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
        }

        .step-item.active .step-number {
            background: #3596d3;
            color: white;
            transform: scale(1.1);

        }

        .step-item.completed .step-number {
            background: #96c93e;
            color: white;
            transform: scale(1.05);
        }

        .step-title {
            font-size: 0.875rem;
            color: #64748b;
            text-align: center;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .step-item.active .step-title {
            color: #3596d3;
            font-weight: 600;
        }

        .progress-line {
            position: absolute;
            top: 22px;
            left: 50%;
            right: -50%;
            height: 3px;
            background: #e2e8f0;
            z-index: 1;
            border-radius: 2px;
            transition: all 0.4s ease;
        }

        .step-item.completed .progress-line {
            background: #96c93e;
        }

        .step-item:last-child .progress-line {
            display: none;
        }

        .form-section {
            padding: 0 2rem 2rem;
        }

        .step-content {
            background: white;
            border-radius: 16px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            animation: slideUp 0.5s ease;
            position: relative;
        }


        .greeting {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .summary {
            font-size: 1.1rem;
            color: #5a6c7d;
            line-height: 1.6;
            margin-bottom: 2.5rem;
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .submit-btn {
            background: linear-gradient(135deg, #0d4e6b, #1a5a78);
            color: white;
            border: none;
            padding: 16px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(13, 78, 107, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 78, 107, 0.4);
            background: linear-gradient(135deg, #1a5a78, #0d4e6b);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgb(37, 150, 190), rgb(150, 201, 62));
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .checkmark {
            width: 30px;
            height: 30px;
            stroke: white;
            stroke-width: 3;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }


        .greeting {
            font-family: font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .summary {
            font-family: font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            font-size: 1.1rem;
            color: #5a6c7d;
            line-height: 1.6;
            margin-bottom: 2.5rem;
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .step-content h4 {
            color: #1a202c;
            font-weight: 700;
            margin-bottom: 2rem;
            font-size: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }



        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.75rem;
            display: block;
            font-size: 0.95rem;
        }

        .form-control,
        .form-select {
            border: 1px solid #e2e8f0;
            /* border-radius: 12px; */
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafafa;
            font-weight: 500;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
            background: white;
            transform: translateY(-1px);
        }

        /* Fix Bootstrap validation icons for <select> fields */
        select.form-select.is-valid option,
        select.form-select.is-invalid option {
            background-image: none !important;
            /* remove icons from dropdown items */
        }

        /* Show icon only on the select box itself */
        select.form-select.is-valid,
        select.form-select.is-invalid {
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem 1rem;
            padding-right: 2.25rem;
            /* spacing for icon */
        }

        /* Green check for valid */
        select.form-select.is-valid {
            border-color: #198754;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23198754'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M5 13l4 4L19 7' /%3e%3c/svg%3e");
        }

        /* Red cross for invalid */
        select.form-select.is-invalid {
            border-color: #dc3545;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23dc3545'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 18L18 6M6 6l12 12' /%3e%3c/svg%3e");
        }



        .form-control.is-invalid {
            border-color: #f56565;
            box-shadow: 0 0 0 4px rgba(245, 101, 101, 0.1);
        }

        .form-control.is-valid {
            border-color: #96c93e;
            box-shadow: 0 0 0 4px rgba(72, 187, 120, 0.1);
        }

        .btn {
            border-radius: 12px;
            padding: 0.8rem 1.2rem;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.3s ease;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: #0d4e6b;
            color: white;
            border: 1px solid #0d4e6b;
            position: relative;
            overflow: hidden;
            border-radius: 24px;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
            border: none
        }

     


        .btn-primary:focus {

            color: white;
            background: #0d4e6b;
            border: 1px solid #0d4e6b !important;
        }

        .btn-secondary {
            background: white;
            color: rgb(0, 0, 0);
            border: 1px solid #0d4e6b;
            border-radius: 50px;
        }

        .btn-secondary:hover {
            background: #0d4e6b;
            transform: translateY(-2px);
            color: white;
        }

        .btn-success {
            background: #96c93e color: white;
            padding: 1.25rem 3rem;
            font-size: 1.1rem;
            position: relative;
            overflow: hidden;
        }

        .btn-success::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-success:hover::before {
            left: 100%;
        }

        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(72, 187, 120, 0.4);
            color: white;
        }

        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            margin-top: -30px;
            border-radius: 0 0 20px 20px;
        }

        .review-section {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            padding: 2rem;
            position: relative;
        }

        .review-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #48bb78, #38a169);
            border-radius: 16px 16px 0 0;
        }

        .review-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(226, 232, 240, 0.6);
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .review-label {
            font-weight: 600;
            color: #2d3748;
            flex: 1;
        }

        .review-value {
            color: #1a202c;
            font-weight: 500;
            flex: 1;
            text-align: right;
        }

        .hidden {
            display: none !important;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem 0;
            }

            .booking-container {
                margin: 0 1rem;
                border-radius: 16px;
            }

            .booking-header {
                padding: 2rem 1.5rem;
            }

            .booking-header h1 {
                font-size: 2rem;
            }

            .progress-section,
            .form-section {
                padding: 1.5rem;
            }

            .step-content {
                padding: 1.5rem;
            }

            .navigation-buttons {
                padding: 1.5rem;
                flex-direction: column;
                gap: 1rem;
            }

            .navigation-buttons .btn {
                width: 100%;
            }

            .step-progress {
                flex-wrap: wrap;
                gap: 1rem;
                justify-content: center;
            }

            .step-item {
                flex: none;
                min-width: 80px;
            }

            .progress-line {
                display: none;
            }
        }
    </style>

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

                .step-progress {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 25px;
                    padding-left: 10px;
                }

                .step-item {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    width: 100%;
                }

                .step-number {
                    width: 35px;
                    height: 35px;
                    font-size: 16px;
                }

                .step-title {
                    font-size: 15px;
                    font-weight: 600;
                }

                /* Remove horizontal line for mobile */
                .progress-line {
                    display: none;
                }

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
                margin-top: -90px !important;
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
                margin-top: 100px !important;
            }

            .breadcrumb-mobile::-webkit-scrollbar {
                display: none;
            }
        }

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
            background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
            color: white;
            border-color: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
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

        .hero-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            text-align: center;

            backdrop-filter: blur(10px);
        }

        .hero-image {
            width: 100%;
            max-width: 600px;
            height: 300px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .hero-title {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 20px;
        }

        .overview-text {
            font-size: 1.1rem;
            color: #34495e;

            margin: 0 auto;
            text-align: left;
        }

        .overview-text p {
            margin-bottom: 15px;
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
            border: 2px solid #e9ecef;
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

        /* .btn {
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
                    } */

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
            background: rgba(52, 152, 219, 0.1);
            padding: 25px;
            border-radius: 15px;
            margin: 25px 25px;
            text-align: center;
        }

        .payment-info p {
            font-size: 1.1rem;
            color: #2d3436;
            margin-bottom: 20px;
        }

        .success-section {

            color: white;
            text-align: center;
        }

        .success-section .step-number {
            background: linear-gradient(135deg, #2596be, #96c93e);
        }

        .bottom-image {
            text-align: center;
            margin: 40px 0;

        }

        .bottom-image img {
            width: 100%;
            max-width: 800px;
            height: 400px;
            object-fit: cover;
            border-radius: 20px;
            display: inline-block;

            box-shadow: 0 20px 40px rgba(86, 58, 58, 0.2);
        }

        .bottom-image p {
            font-size: 1.3rem;
            color: white;
            font-weight: 600;
            margin-top: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .info-badge {
            background: rgba(52, 152, 219, 0.1);
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .info-badge p {
            color: #2980b9;
            font-weight: 500;
            margin: 0;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .step-header {
                flex-direction: column;
                text-align: center;
            }

            .step-number {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>

    <div class="w-full ">
        <div class="mx-auto  px-4 sm:px-6 lg:px-8">
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

                                <span>Rent Vehicles</span>
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="position-relative bg-top-center overflow-hidden space" id="service-sec"
        style="margin-top: 2px; padding-bottom: 60px;background-color: #ffffff ;">
        <div class="bg-overlay"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; background: url('assets/img/pattern-dark.png') repeat; opacity: 0.05;">
        </div>

        <div class="container position-relative" style="z-index: 1;">
            <!-- Title Section with improved typography -->
            <div class="title-area text-center mb-5 title-mob" style="margin-top: -126px; ">


                <div class="title-area text-center " style="">
                    {{-- <span class="sub-title"
                            style="  font-family: 'Poppins', sans-serif; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;">Premium Car Rentals</span> --}}
                    <h2 class="sec-title"
                        style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Select Your Vehicle </h2>
                </div>
            </div>



            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
                    <div class="slider-area tour-slider slider-drag-wrap">

                        <!-- Navigation Buttons with improved styling -->
                        <div class="swiper-button-prev-rental"
                            style="background-color: rgba(255, 252, 252, 0.1); width: 54px; height: 54px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;  backdrop-filter: blur(5px);">
                            <i class="fas fa-chevron-left" style="color: #000000; font-size: 20px;"></i>
                        </div>
                        <div class="swiper-button-next-rental"
                            style="background-color: rgba(255, 255, 255, 0.1); width: 54px; height: 54px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; backdrop-filter: blur(5px);">
                            <i class="fas fa-chevron-right" style="color: #000000; font-size: 20px;"></i>
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
                                @foreach ($vehiclesslide as $vehicle)
                                    <div class="swiper-slide">
                                        <div class="cars-slider__item card-mob"
                                            style="background: linear-gradient(135deg, #071f2b 0%, #000000 100%); overflow: hidden; margin: 10px; transition: all 0.3s ease; position: relative; padding: 30px;  border: 1px solid rgba(0,162,255,0.1);border-radius: 10px;">

                                            <!-- Main Row Layout -->
                                            <div class="horizontal-layout"
                                                style="display: flex; align-items: center; justify-content: space-between; width: 100%;">

                                                <!-- Left Section -->
                                                <div class="content-section" style="flex: 1; padding-right: 20px;">
                                                    <div
                                                        style="display: inline-block; background: linear-gradient(135deg, rgb(53, 150, 211) 0%, rgb(37, 111, 157) 100%); padding: 4px 8px; border-radius: 10px; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 600; color: #fff; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; ">
                                                        {{ $vehicle->label ?? 'Premium ' }}
                                                    </div>

                                                    <h3
                                                        style="margin-bottom: 8px; font-family: 'Montserrat', sans-serif; color: #ffffff; font-weight: 700; font-size: 44px; ">
                                                        {{ $vehicle->make }}
                                                    </h3>
                                                    <h3
                                                        style="margin-bottom: 15px; font-family: 'Montserrat', sans-serif; color: #3596d3; font-weight: 800; font-size: 44px; ">
                                                        {{ $vehicle->name }}
                                                    </h3>

                                                    <div class="rent-undrline"
                                                        style="width: 60px; height: 6px; background: #e91e22; margin: 10px 0 20px; border-radius: 3px;">
                                                    </div>
                                                </div>

                                                <!-- Center Image Section -->
                                                <div class="image-section"
                                                    style="flex: 1; display: flex; justify-content: center; align-items: center; position: relative; height: 100%;">
                                                    <div
                                                        style="position: absolute; width: 300px; height: 300px; border-radius: 50%; background: radial-gradient(circle, rgba(0,162,255,0.15) 0%, rgba(0,162,255,0) 70%); z-index: 1;">
                                                    </div>
                                                    @php
                                                        $backendBaseUrl = config('app.backend_url');
                                                        $vehicleImageUrl = $vehicle->vehicle_image
                                                            ? $backendBaseUrl .
                                                                '/admin/storage/' .
                                                                ltrim($vehicle->vehicle_image, '/')
                                                            : asset('assets/img/bike3.png');
                                                    @endphp

                                                    <img src="{{ $vehicleImageUrl }}" alt="{{ $vehicle->name }}"
                                                        style="width: 100%; max-width: auto; height: 350px; object-fit: contain; z-index: 2; transform: scale(1.1); transition: transform 0.5s ease;">
                                                </div>


                                                <!-- Right Section -->
                                                <div class="price-features-section"
                                                    style="flex: 1; padding-left: 20px; display: flex; align-items: center; justify-content: center;">


                                                    <div class="demo-container">
                                                        <div class=" text-white font-bold text-2xl px-8 py-2 rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-300 relative overflow-hidden"
                                                            style="border-radius: 58px;background: #96c93e;">
                                                            <span class="relative z-10">USD
                                                                ${{ number_format($vehicle->price) }}</span>
                                                            <div
                                                                class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent transform -skew-x-12 translate-x-full hover:translate-x-[-100%] transition-transform duration-700">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <!-- Specifications Section -->
                                            <div class="specification priority-mobile"
                                                style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-top: 40px; padding: 20px;  box-shadow: 0 8px 20px rgba(0,0,0,0.2);background-color: rgba(0, 0, 0, 0.6);">

                                                <!-- Helmets -->
                                                <div class="specification-item"
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; text-align: left; font-family: 'Nunito Sans', sans-serif; color: #3596D3; font-weight: 700; font-size: 18px;">
                                                    <i class="fas fa-helmet-safety"
                                                        style="color: #3596D3; font-size: 20px; border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; "></i>
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
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; border-left: 1px solid rgba(255,255,255,0.1); border-right: 1px solid rgba(255,255,255,0.1); padding: 0 15px; text-align: left; font-family: 'Nunito Sans', sans-serif; font-weight: 700; font-size: 18px; color: #3596D3;">
                                                    <i class="fas fa-kit-medical"
                                                        style="color: #3596D3; font-size: 20px;border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center; "></i>
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
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; text-align: left; font-family: 'Nunito Sans', sans-serif; font-weight: 700; font-size: 18px; color: #3596D3;">
                                                    <i class="fas fa-cogs"
                                                        style="color: #3596D3; font-size: 20px; border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center;"></i>
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
                                                    style="display: flex; align-items: center; justify-content: center; gap: 12px; flex: 1; min-width: 120px; border-left: 1px solid rgba(255,255,255,0.1); padding: 0 15px; text-align: left; font-family: 'Nunito Sans', sans-serif; font-weight: 700; font-size: 18px; color: #3596D3;">
                                                    <i class="fas fa-road"
                                                        style="color: #3596D3; font-size: 20px;  border-radius: 50%; padding: 12px; width: 46px; height: 46px; display: flex; align-items: center; justify-content: center;"></i>
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
            <div class="reserve-button-container rvs-btn-mob"
                style="display: flex; justify-content: center; margin-top: 50px;">
                <a href="#" id="reserveButton" class="reserve-now-btn"
                    style="display: inline-block; background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%); color: white; font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 18px; text-transform: uppercase; padding: 18px 42px; border-radius: 10px; text-decoration: none; letter-spacing: 1.5px; box-shadow: 0 8px 20px rgba(0,162,255,0.3); transition: all 0.3s ease; position: relative; overflow: hidden;">
                    <span style="position: relative; z-index: 2;">RESERVE NOW</span>
                    <div class="btn-glow"
                        style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%); z-index: 1; animation: glow 2s infinite linear;">
                    </div>
                </a>
            </div>


        </div>




    </section>




    <!-- Tour Page with Sidebar Filter Section -->
    <section class="position-relative  overflow-hidden space" id="service-sec" data-bg-src=""
        style="background: #F5F5F5;padding-bottom: 44px;">
        <div class="container-fluid" style="margin-top: -82px;">
            <div class="row">
                <div class="title-area text-center mb-5 filter-title-mob" style="margin-top: -10px; ">
                    <div class="title-area text-center " style="">

                        <h2 class="sec-title"
                            style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                            Find Your Perfect Ride </h2>
                    </div>
                </div>

                <div class="row " style="margin-top: -45px;">


                    <!-- Filter Toggle Button (Visible only on mobile) -->
                    <div class="d-md-none w-100 px-3 mb-3">
                        <button id="toggleFilterBtn" class="w-100 d-flex align-items-center gap-2  rounded-lg p-2"
                            style="border: 1px solid #ddd; justify-content: center;background: #f8f9fa;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                            </svg>
                            <span style="font-size: 14px;">Filter</span>
                        </button>
                    </div>

                    <!-- Sidebar Filter Section - 1/4 width -->
                    <div class="col-md-3 sidebar-container" id="vehicleMobileSidebar">
                        <div class="sidebar-content p-4" style="width: 100%;">
                            <div class="filter-sidebar p-4"
                                style="border-radius: 10px; border: 1px solid #dee2e6;background: rgb(255, 255, 255);">
                                <!-- Mobile Close Button -->
                                <div class="d-flex justify-content-end align-items-center d-md-none mb-3">
                                    <button id="closeVehicleSidebarBtn" class="btn-sm text-danger border-0 shadow-none">
                                        <i class="fas fa-times fa-lg"></i>
                                    </button>
                                </div>

                                <!-- Filter Form -->
                                <form id="vehicleFilterForm">
                                    <div class="filter-section mb-4">
                                        <h5 class="filter-heading text-black" style="font-size: 16px;">
                                            Vehicle Type
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
                    </div>
                    <!-- Results Section -->
                    <div class="col-md-9" id="filteredVehicleResults">
                        @include('frontend.partials.vehicle_cards', ['vehicles' => $vehicles])

                    </div>



                </div>
            </div>
    </section>


    <section style="margin-top: 50px">
        <div class="container-fluid">

            <div class="title-area text-center mb-5" style="margin-top: -10px; ">


                <div class="title-area text-center " style="">
                    {{-- <span class="sub-title"
                        style="  font-family: monospace; font-size: clamp(1.125rem, 2.2vw, 1.5rem); font-weight: 500;color: #000000;"></span> --}}
                    <h2 class="sec-title"
                        style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                       Get
                        your Driving Permit</h2>
                </div>
            </div>

            <!-- Hero Section -->
            <div class="hero-section">
                <div class="container permint-post-mob">
                    <img src="{{ asset('assets/img/post_new.jpg') }}" alt="Driving in Sri Lanka" class="hero-image">


                    <div class="overview-text">
                        <div class="info-badge">
                            <p><strong>Important:</strong> Sri Lanka requires foreign nationals to verify their license
                                locally. You cannot legally drive using an IDP or foreign license alone.</p>
                        </div>
                        <p>
                            To ensure a seamless trip, we assist in arranging your temporary driving license in advance. By
                            choosing to arrange your license beforehand, you’ve made the right decision to save time and
                            enjoy every moment of your stay.
                        </p>
                    </div>


                </div>


            </div>


            <!-- Bottom Image -->
    </section>


   <section >
        <div class="booking-container"  style="background: rgb(245 245 245);padding: 15px;">
            <!-- Header -->
            <div class="booking-header text-center">
                <h1 style="font-family: monospace;">Apply for a Temporary Driving Permit</h1>
                <p>Submit your application and get your temporary driving license quickly and securely.<br>
                    Our team will process your request within 2–3 business days.</p>
            </div>

            <!-- Progress -->
            <div class="progress-section">
                <div class="step-progress">
                    <div class="step-item active" id="indicator-1">
                        <div class="step-number">1</div>
                        <div class="step-title">Personal Info</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="step-item" id="indicator-2">
                        <div class="step-number">2</div>
                        <div class="step-title">License Upload</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="step-item" id="indicator-3">
                        <div class="step-number">3</div>
                        <div class="step-title">Collection Method</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="step-item" id="indicator-4">
                        <div class="step-number">4</div>
                        <div class="step-title">Review & Submit</div>
                    </div>
                </div>
            </div>

            <!-- Message -->
            @if (session('success'))
                <div class="alert alert-success text-center" id="alert-success">
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

            <!-- Form -->
            <form id="drivingPermitForm" method="POST" action="{{ route('driving-permit.store') }}"
                enctype="multipart/form-data">
                @csrf

                <!-- Step 1: Personal Info -->
                <div class="step-content" id="step-1">
                    <h4>Personal Information</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Guest Name *</label>
                            <input type="text" name="guest_name" class="form-control" required
                                placeholder="Enter your full name">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Email Address *</label>
                            <input type="email" name="email" class="form-control" required
                                placeholder="your@email.com">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">License Number *</label>
                            <input type="text" name="license_no" class="form-control" required
                                placeholder="Your license number">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">WhatsApp Number *</label>
                            <input type="tel" name="whatsapp" class="form-control" required
                                placeholder="+94 71 234 5678">
                        </div>
                    </div>
                </div>

                <!-- Step 2: License Upload -->
                <div class="step-content hidden" id="step-2">
                    <h4>Upload License Images</h4>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label">Front Side of License *</label>
                            <input type="file" name="license_front" accept="image/*" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label">Back Side of License *</label>
                            <input type="file" name="license_back" accept="image/*" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label">Picture of Yourself (Upper Body) *</label>
                            <input type="file" name="selfie" accept="image/*" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Collection Method -->
                <div class="step-content hidden" id="step-3">
                    <h4>Choose Collection Method</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Collection Method *</label>
                            <select name="collection_method" class="form-select" required>
                                <option value="">— Select Option —</option>
                                <option value="pick_up">Pick Up from Office</option>
                                <option value="delivery">Home/Hotel Delivery</option>
                            </select>
                        </div>
                    </div>

                    <div class="alert alert-info mt-3">
                        <strong>Processing Fee:</strong> $40<br>
                        <strong>Processing Time:</strong> 2–3 business days
                    </div>
                </div>

                <!-- Step 4: Review & Submit -->
                <div class="step-content hidden" id="step-4">
                    <div class="icon">
                        <svg class="checkmark" viewBox="0 0 24 24">
                            <polyline points="20,6 9,17 4,12"></polyline>
                        </svg>
                    </div>
                    <h4 class="text-center">Review & Confirm</h4>
                    <p class="text-center">Please confirm all your details before submitting your application.</p>

                    <div class="text-center mt-4">
                        <button type="submit" class="submit-btn btn btn-primary">
                            Submit Application
                        </button>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary hidden" id="prevBtn">Previous</button>
                    <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                </div>
            </form>
        </div>
    </div>

    <div class="steps-container">


        <Div class="row" style="gap: 0px">
            <!-- Step 2: Payment -->
            <div class="step-card col-md-6" style="  box-shadow: none !important;">
                <div class="step-header">
                    <div class="step-number" style="background: #3596d3; color:#ffffff;">02</div>
                    <h2 class="step-title ml-2" style="font-size: 1.2rem;">Make the Payment</h2>
                </div>

                <div class="payment-info">
                    <p>
                        <strong>Processing Fee: $40</strong><br>
                        Processing Time: 2–3 business days
                    </p>
                    <p>Once you've submitted the form above, proceed with the secure payment to process your
                        temporary
                        driving license.</p>
                </div>

            </div>

            <!-- Step 3: Enjoy -->
            <div class="step-card step-card-mob  col-md-6" style="  box-shadow: none !important;">
                <div class="step-header">
                    <div class="step-number" style="background: #3596d3; color:#ffffff;">03</div>
                    <h2 class="step-title ml-2" style="font-size: 1.2rem;">Enjoy Your Ride</h2>
                </div>


                <div class="payment-info" style="background: rgba(52, 152, 219, 0.1);">
                    <p>
                        You will receive your driving license at the requested location on time.
                        For any clarifications, feel free to contact us
                    </p>
                    <p> Ready to explore the beautiful roads of Sri Lanka with complete peace of mind!</p>
                </div>
            </div>
        </Div>
    </div>
    </div>


    <section style="background: linear-gradient(135deg, #071f2b 0%, #000000 100%);"margin-top: -80px;">
        <div class="advantages-section"
            style="margin-top: 80px; background: linear-gradient(135deg, rgba(0,10,20,0.6) 0%, rgba(19,19,30,0.6) 100%); padding: 40px 0; border-radius: 20px; box-shadow: 0 15px 30px rgba(0,0,0,0.2); position: relative; overflow: hidden; border: 1px solid rgba(0,162,255,0.15);">
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('assets/img/pattern-dark.png') repeat; opacity: 0.03; z-index: 0;">
            </div>

            <div class="container position-relative" style="z-index: 1;">
                <div class="section-header text-center mb-5">
                    <h3
                        style="font-family: monospace; font-size: 32px; font-weight: 700; color: #ffffff; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 2px;">
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
                            <i class="fas fa-shield-alt" style="font-size: 30px; color: #3596D3;"></i>
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
                            <i class="fas fa-dollar-sign" style="font-size: 30px; color: #3596D3;"></i>
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
                            <i class="fas fa-headset" style="font-size: 30px; color: #3596D3;"></i>
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

    <script>
        setTimeout(() => {
            const successAlert = document.getElementById('alert-success');
            const errorAlert = document.getElementById('alert-danger');

            if (successAlert) {
                successAlert.style.display = 'none';
            }

            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 5000); // 5000ms = 5 seconds
    </script>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleBtn = document.getElementById("toggleFilterBtn");
            const sidebar = document.getElementById("vehicleMobileSidebar");
            const closeBtn = document.getElementById("closeVehicleSidebarBtn");
            const overlay = document.getElementById("vehicleSidebarOverlay");

            // Open sidebar
            toggleBtn.addEventListener("click", function() {
                sidebar.classList.add("show");
                overlay.classList.add("active");
                document.body.classList.add("sidebar-open");
            });

            // Close sidebar
            function closeSidebar() {
                sidebar.classList.remove("show");
                overlay.classList.remove("active");
                document.body.classList.remove("sidebar-open");
            }

            closeBtn.addEventListener("click", closeSidebar);
            overlay.addEventListener("click", closeSidebar);
        });
    </script>
    <script>
        class DrivingPermitForm {
            constructor() {
                this.currentStep = 1;
                this.totalSteps = 4;
                this.init();
            }

            init() {
                document.getElementById('nextBtn').addEventListener('click', () => this.nextStep());
                document.getElementById('prevBtn').addEventListener('click', () => this.prevStep());
                document.getElementById('drivingPermitForm').addEventListener('submit', (e) => this.handleSubmit(e));
                this.showStep(1);
            }

            showStep(step) {
                for (let i = 1; i <= this.totalSteps; i++) {
                    document.getElementById(`step-${i}`).classList.add('hidden');
                    document.getElementById(`indicator-${i}`).classList.remove('active', 'completed');
                }
                document.getElementById(`step-${step}`).classList.remove('hidden');
                document.getElementById(`indicator-${step}`).classList.add('active');
                for (let i = 1; i < step; i++) document.getElementById(`indicator-${i}`).classList.add('completed');
                document.getElementById('prevBtn').classList.toggle('hidden', step === 1);
                document.getElementById('nextBtn').classList.toggle('hidden', step === this.totalSteps);
            }

            nextStep() {
                const currentFields = document.querySelectorAll(
                    `#step-${this.currentStep} input[required], #step-${this.currentStep} select[required]`);
                let valid = true;
                currentFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        valid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });

                if (!valid) return;

                if (this.currentStep < this.totalSteps) {
                    this.currentStep++;
                    this.showStep(this.currentStep);
                }
            }

            prevStep() {
                if (this.currentStep > 1) {
                    this.currentStep--;
                    this.showStep(this.currentStep);
                }
            }

            async handleSubmit(e) {
                e.preventDefault();
                const form = e.target;
                const formData = new FormData(form);
                const submitBtn = form.querySelector('.submit-btn');
                submitBtn.disabled = true;
                submitBtn.innerText = 'Submitting...';

                try {
                    const res = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                            'X-Requested-With': 'XMLHttpRequest', // Important for Laravel
                            'Accept': 'application/json',
                        },
                        body: formData,
                    });

                    let data;
                    try {
                        data = await res.json();
                    } catch (jsonErr) {
                        throw new Error('Invalid JSON response. Maybe a redirect occurred.');
                    }

                    if (res.ok) {
                        // Immediately replace form with success message
                        document.querySelector('.booking-container').innerHTML = `
                <div class="text-center p-5">
                    <h3>✅ Your application was submitted successfully!</h3>
                    <p>Our team will process it within 2–3 business days.</p>
                </div>
            `;
                    } else {
                        const message = data.message || 'Please check your input fields.';
                        Swal.fire('Error', message, 'error');
                    }

                } catch (err) {
                    console.error(err);
                    Swal.fire('Error', err.message || 'Something went wrong. Please try again.', 'error');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerText = 'Submit Application';
                }
            }


        }

        document.addEventListener('DOMContentLoaded', () => {
            new DrivingPermitForm();
        });
    </script>

@endsection
