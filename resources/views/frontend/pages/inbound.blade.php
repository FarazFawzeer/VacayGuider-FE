@extends('frontend.layouts.app')

@section('title', 'VacayGuider | Inbound Tours')

@section('content')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        @media (max-width: 576px) {

            .breadcrumb-mobile {
                overflow-x: auto;
                scrollbar-width: none;
                -ms-overflow-style: none;
                margin-top: 100px !important;
            }

            /* ol,
            ul {
                padding-left: 2rem !important;
            } */

            .inbound-title {
                margin-top: 32px !important;
                margin-block: 20px;
                margin-bottom: 16px;
            }

            /* Reduce container padding */
           

            /* Header text */
            .booking-header h1 {
                font-size: 22px;
                line-height: 28px;
            }

            .booking-header p {
                font-size: 14px;
                line-height: 20px;
                margin-top: 20px !important;
            }

            /* Step Progress Bar */
            .step-progress {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .step-item {
                display: flex;
                align-items: center;
                width: 100%;
            }

            .step-number {
                width: 32px;
                height: 32px;
                font-size: 14px;
            }

            .step-title {
                font-size: 14px;
                margin-left: 10px;
            }

            .progress-line {
                display: none;
            }

            /* Form Inputs */
            .form-control,
            .form-select {
                width: 100% !important;
            }

            /* Fix Phone + WhatsApp fields */
            #phone,
            #whatsapp {
                width: 100% !important;
            }

            .row>div {
                margin-bottom: 15px;
            }

            /* Review Page Fix */
            #reviewGreeting {
                font-size: 20px;
            }

            #reviewSummary {
                font-size: 14px;
                padding: 0 10px;
            }

            /* Navigation Buttons */
            .navigation-buttons {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }

            .navigation-buttons button {
                width: 48%;
            }
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
            s color: #155724;
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

        .btn-primary:hover {
            transform: translateY(-2px);

            color: white;
            background: #0d4e6b;

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
        .theme-lable {
            font-weight: 300 !important;
        }

        input[type="checkbox"]~label::before {
            content: '';
            font-family: var(--icon-font);
            font-weight: 700;
            position: absolute;
            left: 0px;
            top: 3.5px;
            background-color: #fff;
            border: 1px solid #dee2e6 !important;
            height: 18px;
            width: 18px;
            line-height: 18px;
            text-align: center;
            font-size: 12px;
        }

        input[type="checkbox"]:checked~label::before {
            content: "\f00c";
            color: var(--white-color);
            background-color: #000000;
            border-color: var(--theme-color);
        }

        input[type="checkbox"]:checked~label::before {
            content: "\f00c";
            color: var(--white-color);
            background-color: #000000;
            border-color: var(--theme-color);
        }

        @media (max-width: 480px) {

            .page-title {
                margin-bottom: 26px !important;
            }

            .special-title {
                margin-top: 10px;
            }

            .inbound-title {
                margin-top: 32px;
                margin-block: 20px;
                margin-bottom: 16px;
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
                margin-top: 14px;
            }

            .breadcrumb-mobile::-webkit-scrollbar {
                display: none;
            }
        }

        #daysRangeSlider::-webkit-slider-thumb {
            background-color: #000000;
            /* Blue */
            border: none;
        }

        #daysRangeSlider::-moz-range-thumb {
            background-color: #000000;
            border: none;
        }

        #daysRangeSlider::-ms-thumb {
            background-color: #000000;
            border: none;
        }

        .form-check-label {
            margin-bottom: 0;
            font-size: 14px;
            color: black;
        }

        input[type="checkbox"]:checked+label {
            color: #000;
        }

        .form-check-input:checked {
            background-color: #000;
            border-color: #000;
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

        /*
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
            border-left: 4px solid #3498db;
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

    <style>
        ol,
        ul {
            padding-left: 0;
        }

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

        .support-badge {
            margin-top: 5px;
        }






        .tour-country {
            font-size: 14px;
            font-weight: 600;
            color: #3596D3;
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
            border: none;
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
            border-radius: 50px;
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

        select,
        .form-control,
        .form-select,
        textarea,
        input {

            /* border: none; */

        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;

            color: white;
            font-size: 2.5rem;
            font-weight: 700;

        }
    </style>
    <style>
        .tour-option-box {
            display: inline-block;
            border: 2px solid #000;
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 10px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s, color 0.3s;
            text-align: center;
            font-weight: 500;
        }

        .tour-option-radio {
            display: none;
        }

        .tour-option-radio:checked+.tour-option-box {
            background-color: #000;
            color: #fff;
        }

        .tour-option-wrapper {
            margin-bottom: 10px;
        }
    </style>



    <div>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </li>

                            <!-- Current Page -->
                            <li class="flex items-center">
                                <span
                                    class="current-page flex items-center space-x-1.5 text-gray-800 font-semibold px-3 py-1.5 rounded-md border border-gray-200"
                                    aria-current="page">
                                    <!-- About Icon -->

                                    <span>Inbound Tours</span>
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="sidebar-overlay"></div>



        <!-- Tour Page with Sidebar Filter Section -->
        <section class="position-relative overflow-hidden space" id="service-sec" data-bg-src="">
            <div class="container-fluid" style="margin-top: -104px;">
                <div class="row">
                    <div class="title-area text-center inbound-title" style="">
                        <h2 class="sec-title"
                            style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                            Discover the Wonders of Sri Lanka </h2>
                    </div>
                </div>


                <div class="row " style="margin-top: -20px;">


                    <!-- Filter Toggle Button for Mobile -->
                    <!-- Filter Toggle Button (Visible only on mobile) -->
                    <div class="d-md-none w-100 px-3 mb-3">
                        <button id="toggleFilterBtn" class="w-100 d-flex align-items-center gap-2  rounded-lg p-2"
                            style="border: 1px solid #ddd; justify-content: center;background: #f8f9fa;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                            </svg>
                            <span style="font-size: 14px;">Filter</span>
                        </button>
                    </div>


                    <!-- Sidebar Filter Section - 1/4 width -->
                    <div class="col-md-3 sidebar-container" id="mobileSidebar">
                        <div class="sidebar-content p-4" style=" width: 100%;">
                            <div class="filter-sidebar  p-4" style="  border-radius: 10px; border: 1px solid #dee2e6;">
                                <div class="d-flex justify-content-end align-items-center d-md-none mb-3">
                                    <button id="closeSidebarBtn" class=" btn-sm text-danger border-0 shadow-none">
                                        <i class="fas fa-times fa-lg"></i>
                                    </button>
                                </div>
                                <form id="filterForm">
                                    <!-- Tour Category Selection -->
                                    <div class="filter-section mb-4">
                                        <div class="ps-1">
                                            @php
                                                $options = [
                                                    'special' => 'Special',
                                                    'city' => 'City',
                                                    'tailor' => 'Tailor Made',
                                                    'customize' => 'Customize',
                                                ];
                                            @endphp
                                            @foreach ($options as $key => $label)
                                                <div
                                                    class="form-check mb-2 d-flex align-items-start align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input tour-option-radio" type="checkbox"
                                                            name="tour_category" id="category_{{ $key }}"
                                                            value="{{ $key }}" {{ $loop->first ? 'checked' : '' }}
                                                            data-section="{{ $key }}">
                                                        <label class="form-check-label ms-2"
                                                            for="category_{{ $key }}">
                                                            {{ $label }}
                                                        </label>
                                                    </div>

                                                    @if ($key === 'tailor')
                                                        <span class="tailor-arrow" style="font-size: 16px;">&#9656;</span>
                                                        {{-- ▶ --}}
                                                    @endif
                                                </div>

                                                @if ($key === 'tailor')
                                                    <!-- Tailor Made Sub-Filters (indented under Tailor) -->
                                                    <div id="tailor-section"
                                                        class="filter-section-content  ms-4 mt-2 border-start ps-3">
                                                        <!-- Days Filter -->
                                                        <div class="filter-section mb-3">
                                                            <h6 class="text-black"
                                                                style="font-size: 14px;font-weight: 500;">
                                                                Number of Days</h6>
                                                            <div class="d-flex justify-content-between mb-2">
                                                                <span id="durationMinLabel"
                                                                    style="font-size: 13px;">{{ $minDay }} Day</span>
                                                                <span id="durationMaxLabel"
                                                                    style="font-size: 13px;">{{ $maxDay }}
                                                                    Days</span>
                                                            </div>
                                                            <input type="range" class="form-range" id="daysRangeSlider"
                                                                name="days" min="{{ $minDay }}"
                                                                max="{{ $maxDay }}" value=""
                                                                style="border: none;" />
                                                            <div class="text-center">
                                                                <small>Selected: <span id="selectedDay">Not selected</span>
                                                                    Days</small>
                                                            </div>
                                                        </div>

                                                        <!-- Themes Filter -->
                                                        <div class="filter-section mb-2">
                                                            <h6 class="text-black"
                                                                style="font-size: 14px;font-weight: 500;">
                                                                Theme</h6>
                                                            <div class="ps-2">
                                                                @foreach ($allThemes as $theme)
                                                                    <div class="form-check mb-2 d-flex align-items-center">
                                                                        <input class="form-check-input" name="theme[]"
                                                                            value="{{ $theme }}" type="checkbox"
                                                                            id="theme_{{ $loop->index }}">
                                                                        <label class="form-check-label theme-lable ms-2"
                                                                            syle="font-size: 12px !important;font-weight: 300 !important;"
                                                                            for="theme_{{ $loop->index }}">
                                                                            {{ ucfirst($theme) }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>


                    <!-- Tour Cards Section - 3/4 width -->
                    <div class="col-md-9" id="filteredResults">
                        <div id="all-tours">
                            {{-- Show all three on page load --}}

                            <!-- Special Tours -->
                            <h1 class="page-title text-start ml-2 special-title"
                                style="font-family: monospace;font-size: 32px; font-weight: 600; color: #1a1a1a;">
                                Special Tours</h1>
                            <div class="row">
                                @forelse ($specialTours as $package)
                                    @include('frontend.components.tour-cards', ['package' => $package])
                                @empty
                                    <div class="col-12 text-center">No special tours found.</div>
                                @endforelse
                            </div>
                            <!-- City Tours -->
                            <h1 class="page-title text-start ml-2"
                                style="font-family: monospace;font-size: 32px; font-weight: 600; color: #1a1a1a;margin-top: 45px;">
                                City Tours</h1>
                            <div class="row">
                                @forelse ($cityTours as $package)
                                    @include('frontend.components.tour-cards', ['package' => $package])
                                @empty
                                    <div class="col-12 text-center">No city tours found.</div>
                                @endforelse
                            </div>

                            <!-- Tailor Made Tours -->
                            <h1 class="page-title text-start ml-2"
                                style="font-family: monospace;font-size: 32px; font-weight: 600; color: #1a1a1a;margin-top: 45px;">
                                Tailor Made Tours</h1>
                            <div class="row">
                                @forelse ($tailorTours as $package)
                                    @include('frontend.components.tour-cards', ['package' => $package])
                                @empty
                                    <div class="col-12 text-center">No tailor-made tours found.</div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Filtered Section (used when user clicks Special, City, Tailor) -->
                        <div id="single-tour-section" class="d-none">
                            <h1 class="page-title text-start ml-2" id="selectedTourTitle"
                                style="font-family: 'Poppins', sans-serif;font-size: 32px; font-weight: 600; color: #1a1a1a;">
                            </h1>
                            <div id="tourPackageList"></div>
                        </div>



                        <!-- Customize Tour Form -->
                        <div id="customize-tour-form" class="d-none">
                            <div class="card p-4 shadow">
                                <h3 class="mb-3"
                                    style="font-family: monospace;font-size: 32px; font-weight: 600; color: #1a1a1a;">
                                    Customize Your Tour</h3>
                                <form id="customizeForm" style="margin-top: 30px;">
                                    <!-- Row 1: Name + Email -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="custom_name" class="form-label">Your Name</label>
                                            <input type="text" class="form-control" id="custom_name"
                                                name="custom_name" placeholder="Ex: John" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="custom_email" class="form-label">Your Email</label>
                                            <input type="email" class="form-control" id="custom_email"
                                                name="custom_email" placeholder="Ex: john@gmail.com" required>
                                        </div>
                                    </div>

                                    <!-- Row 2: Phone + Dates -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="custom_phone" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="custom_phone"
                                                name="custom_phone" placeholder="Ex: 0xxxxxxxxx" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="custom_dates" class="form-label">Preferred Travel Dates</label>
                                            <input type="text" class="form-control" id="custom_dates"
                                                name="custom_dates" placeholder="e.g., 12th Dec to 18th Dec">
                                        </div>
                                    </div>

                                    <!-- Row 3: Travelers + empty (optional future use) -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="custom_travelers" class="form-label">Number of Travelers</label>
                                            <input type="number" class="form-control" id="custom_travelers"
                                                name="custom_travelers" min="1"
                                                placeholder="e.g., 2 Adults, 1 Child">
                                        </div>
                                        <div class="col-md-6 mb-3"></div>
                                    </div>

                                    <!-- Message (Full Row) -->
                                    <div class="mb-3">
                                        <label for="custom_message" class="form-label">Message</label>
                                        <textarea class="form-control" id="custom_message" name="custom_message" rows="4"
                                            placeholder="Describe your tour..."></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary btn-sm"
                                        style="background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);">Submit</button>
                                </form>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </section>



        <section class="bg-gradient-to-r from-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8" style="padding-bottom: 20px;">

            <!-- 🔁 How It Works -->
            <div class="text-center " style="margin-bottom: 70px;">
                <h2 class="sec-title" style="font-weight: bold;">How It Works</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto px-4">

                        <!-- Step 1 -->
                        <div class="rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                            style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                            <div class="text-black-700 font-bold text-lg mb-2">1. Submit Your Request</div>
                            <p class="text-gray-600 text-base">Use the form below to tell us your travel dates and
                                preferences.
                            </p>
                        </div>

                        <!-- Step 2 -->
                        <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                            style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                            <div class="text-black-700 font-bold text-lg mb-2">2. Get a Quote</div>
                            <p class="text-gray-600 text-base">We’ll send you a personalized package and price within 24
                                hours.
                            </p>
                        </div>

                        <!-- Step 3 -->
                        <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                            style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                            <div class="text-black-700 font-bold text-lg mb-2">3. Confirm & Travel</div>
                            <p class="text-gray-600 text-base">Once confirmed, we handle everything so you can enjoy your
                                trip
                                worry-free.</p>
                        </div>

                    </div>
            </div>

        </section>

        <section class="bg-gradient-to-r from-blue-50 to-white" style="margin-top: -80px;">

            <div class="booking-container">
                <!-- Header -->
                <div class="booking-header ">
                    <h1 >Request a Quote</h1>
                    <p >Our team of travel experts is at your service 24/7,
                        always ready to assist <br> you with reliable support whenever you need it.</p>
                </div>

                <!-- Progress -->
                <div class="progress-section">
                    <div class="step-progress">
                        <div class="step-item active" id="indicator-1">
                            <div class="step-number">1</div>
                            <div class="step-title">Contact Info</div>
                            <div class="progress-line"></div>
                        </div>
                        <div class="step-item" id="indicator-2">
                            <div class="step-number">2</div>
                            <div class="step-title">Travel Details</div>
                            <div class="progress-line"></div>
                        </div>
                        <div class="step-item" id="indicator-3">
                            <div class="step-number">3</div>
                            <div class="step-title">Preferences</div>
                            <div class="progress-line"></div>
                        </div>
                        <div class="step-item" id="indicator-4">
                            <div class="step-number">4</div>
                            <div class="step-title">Review & Book</div>
                        </div>
                    </div>
                </div>


                <div id="formMessage" class="message" style="display:none;"></div>
                <!-- Form -->
                <form id="bookingForm" method="POST" action="{{ route('package.booking.store') }}">
                    @csrf


                    <div class="form-section">
                        <!-- Step 1: Contact Details -->
                        <div class="step-content" id="step-1">
                            <h4>Contact Information</h4>

                            <div class="mb-4">
                                <label class="form-label">Choose Package *</label>
                                <select name="package" class="form-select" required>
                                    <option value="">Select a package</option>
                                    @foreach ($packages as $package)
                                        <option value="{{ $package->id }}">{{ $package->heading }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" name="full_name" class="form-control"
                                        placeholder="Enter your full name" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="your@email.com" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Phone Number *</label>

                                    <input type="tel" id="phone" name="phone" class="form-control" required
                                        style="width: 514px;">

                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label">WhatsApp (Optional)</label>
                                    <input type="tel" id="whatsapp" name="whatsapp" class="form-control"
                                        style="width: 514px;">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Country *</label>
                                <input type="text" name="country" class="form-control"
                                    placeholder="Enter your country" required>
                            </div>
                        </div>

                        <!-- Step 2: Travel Details -->
                        <div class="step-content hidden" id="step-2">
                            <h4>Travel Information</h4>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Number of Adults (13+) *</label>
                                    <input type="number" name="adults" min="1" value="2"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Number of Children (0-13)</label>
                                    <input type="number" name="children" min="0" value="0"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Check-in Date *</label>
                                    <input type="date" name="check_in" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Check-out Date *</label>
                                    <input type="date" name="check_out" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Pickup Location / Flight Information</label>
                                <input type="text" name="pickup" class="form-control"
                                    placeholder="Airport code, hotel name, or specific address">
                            </div>

                        </div>

                        <!-- Step 3: Preferences -->
                        <div class="step-content hidden" id="step-3">
                            <h4>Your Travel Preferences</h4>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Hotel Category *</label>
                                    <select name="hotel_type" class="form-select" required>
                                        <option value="">Choose your preferred hotel category</option>
                                        <option value="3-star">3 Star </option>
                                        <option value="4-star">4 Star</option>
                                        <option value="5-star">5 Star </option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Travelling From *</label>
                                    <input type="text" name="travelling_from" class="form-control"
                                        placeholder="Your departure city or country" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Occasion for Travel</label>
                                    <select name="travel_reason" class="form-select">
                                        <option value="leisure">Leisure & Vacation</option>
                                        <option value="honeymoon">Honeymoon</option>
                                        <option value="anniversary">Anniversary Celebration</option>
                                        <option value="birthday">Birthday Trip</option>
                                        <option value="annual-trip">Annual Family Trip</option>
                                        <option value="business">Business & Leisure</option>
                                        <option value="other">Other Special Occasion</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Travel Experience Theme</label>
                                    <select name="theme[]" class="form-select" id="themeSelect" multiple>
                                        <option value="wildlife">Wildlife</option>
                                        <option value="water_sports">Water Sports</option>
                                        <option value="adventure">Adventure</option>
                                        <option value="snorkeling">Snorkeling</option>
                                        <option value="culture">Culture</option>
                                        <option value="whale_watching">Whale Watching</option>
                                        <option value="history">History</option>
                                        <option value="dolphin_watching">Dolphin Watching</option>
                                        <option value="hikes">Hikes</option>
                                        <option value="diving">Diving</option>
                                        <option value="nature">Nature</option>
                                        <option value="yoga_meditation">Yoga & Meditation</option>
                                        <option value="beach">Beach</option>
                                        <option value="mountains">Mountains</option>
                                        <option value="tea_gardens">Tea Gardens</option>
                                        <option value="train_rides">Train Rides</option>
                                        <option value="boat_rides">Boat Rides</option>
                                        <option value="birds_watching">Birds Watching</option>
                                        <option value="village_walks">Village Walks</option>
                                        <option value="handcrafts">Handcrafts</option>
                                    </select>
                                </div>


                            </div>
                        </div>

                        <!-- Step 4: Review -->
                        <div class="step-content hidden" id="step-4">
                            <div class="icon">
                                <svg class="checkmark" viewBox="0 0 24 24">
                                    <polyline points="20,6 9,17 4,12"></polyline>
                                </svg>
                            </div>
                            <h4 id="reviewGreeting" class="greeting text-center" style="margin-bottom: -5px;">Hi
                                there!
                            </h4>
                            <p id="reviewSummary" class="summary text-center" class="mb-3 text-center"
                                style="margin-top: -10px;padding-bottom: 20px;"></p>
                            <div class="text-center mt-4">
                                <button type="submit" class="submit-btn">
                                    Submit Request
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Navigation -->
                    <div class="navigation-buttons">
                        <button type="button" class="btn btn-secondary hidden" id="prevBtn">
                            Previous
                        </button>
                        <div></div>
                        <button type="button" class="btn btn-primary" id="nextBtn">
                            Next
                        </button>
                    </div>
                </form>
            </div>
        </section >








        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                $('#themeSelect').select2({
                    placeholder: "Select travel themes",
                    allowClear: true,
                    width: "100%"
                });
            });
        </script>


        <script>
            // Initialize intl-tel-input for both phone and WhatsApp
            function initIntlTel(selector) {
                var input = document.querySelector(selector);
                return window.intlTelInput(input, {
                    initialCountry: "auto",
                    separateDialCode: true, // ✅ shows code in input
                    geoIpLookup: function(success) {
                        fetch("https://ipinfo.io/json?token=YOUR_TOKEN")
                            .then(resp => resp.json())
                            .then(resp => success(resp.country))
                            .catch(() => success("us"));
                    },
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
                });
            }

            var itiPhone = initIntlTel("#phone");
            var itiWhatsapp = initIntlTel("#whatsapp");

            // ✅ On form submit, set full numbers with code
            document.querySelector("form").addEventListener("submit", function() {
                document.querySelector("#phone").value = itiPhone.getNumber();
                document.querySelector("#whatsapp").value = itiWhatsapp.getNumber();
            });
        </script>
        <script>
            class PremiumBookingForm {
                constructor() {
                    this.currentStep = 1;
                    this.totalSteps = 4;
                    this.init();
                }

                init() {
                    this.bindEvents();
                    this.setMinDate();
                    document.getElementById('bookingForm').addEventListener('submit', (e) => this.handleSubmit(e));
                }

                bindEvents() {
                    document.getElementById('nextBtn').addEventListener('click', () => this.nextStep());
                    document.getElementById('prevBtn').addEventListener('click', () => this.prevStep());

                    const inputs = document.querySelectorAll('input[required], select[required]');
                    inputs.forEach(input => {
                        input.addEventListener('blur', () => this.validateField(input));
                        input.addEventListener('input', () => this.clearValidation(input));
                    });
                }

                setMinDate() {
                    const today = new Date().toISOString().split('T')[0];
                    const tomorrow = new Date();
                    tomorrow.setDate(tomorrow.getDate() + 1);
                    const tomorrowStr = tomorrow.toISOString().split('T')[0];

                    document.querySelector('input[name="check_in"]').min = today;
                    document.querySelector('input[name="check_out"]').min = tomorrowStr;

                    document.querySelector('input[name="check_in"]').addEventListener('change', (e) => {
                        const checkIn = new Date(e.target.value);
                        const checkOut = new Date(checkIn);
                        checkOut.setDate(checkOut.getDate() + 1);
                        document.querySelector('input[name="check_out"]').min = checkOut.toISOString().split('T')[
                            0];
                    });
                }

                validateField(field) {
                    if (field.hasAttribute('required') && !field.value.trim()) {
                        field.classList.add('is-invalid');
                        return false;
                    }

                    if (field.type === 'email' && field.value) {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(field.value)) {
                            field.classList.add('is-invalid');
                            return false;
                        }
                    }

                    field.classList.remove('is-invalid');
                    field.classList.add('is-valid');
                    return true;
                }

                clearValidation(field) {
                    field.classList.remove('is-invalid', 'is-valid');
                }

                validateStep(step) {
                    const stepElement = document.getElementById(`step-${step}`);
                    const requiredFields = stepElement.querySelectorAll('input[required], select[required]');
                    let isValid = true;

                    requiredFields.forEach(field => {
                        if (!this.validateField(field)) {
                            isValid = false;
                        }
                    });

                    return isValid;
                }

                showStep(step) {
                    for (let i = 1; i <= this.totalSteps; i++) {
                        document.getElementById(`step-${i}`).classList.add('hidden');
                        document.getElementById(`indicator-${i}`).classList.remove('active', 'completed');
                    }

                    document.getElementById(`step-${step}`).classList.remove('hidden');
                    document.getElementById(`indicator-${step}`).classList.add('active');

                    for (let i = 1; i < step; i++) {
                        document.getElementById(`indicator-${i}`).classList.add('completed');
                    }

                    const prevBtn = document.getElementById('prevBtn');
                    const nextBtn = document.getElementById('nextBtn');

                    prevBtn.classList.toggle('hidden', step === 1);

                    if (step === this.totalSteps) {
                        nextBtn.classList.add('hidden');
                        this.populateReview();
                    } else {
                        nextBtn.classList.remove('hidden');
                    }
                }

                nextStep() {
                    if (this.validateStep(this.currentStep)) {
                        if (this.currentStep < this.totalSteps) {
                            this.currentStep++;
                            this.showStep(this.currentStep);
                        }
                    } else {
                        const firstInvalid = document.querySelector('.is-invalid');
                        if (firstInvalid) {
                            firstInvalid.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                            firstInvalid.focus();
                        }
                    }
                }

                prevStep() {
                    if (this.currentStep > 1) {
                        this.currentStep--;
                        this.showStep(this.currentStep);
                    }
                }

                populateReview() {
                    const formData = new FormData(document.getElementById('bookingForm'));
                    const fullName = formData.get('full_name') || '';

                    // Greeting with name
                    document.getElementById('reviewGreeting').innerText = `Hi ${fullName}!`;

                    // Friendly thank you message
                    const message = `
        Thank you for your booking request. 
        Our travel specialists will review your preferences and contact you shortly to arrange the perfect trip for you. 
        We look forward to creating an unforgettable experience!
    `;
                    document.getElementById('reviewSummary').innerText = message;
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
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            },
                            body: formData,
                        });

                        // If not OK, try to extract error message
                        if (!res.ok) {
                            let errMsg = 'An unexpected error occurred.';
                            try {
                                const errData = await res.json();
                                errMsg = errData.message || JSON.stringify(errData);
                            } catch (_) {}
                            Swal.fire('Error', errMsg, 'error');
                            return;
                        }

                        // ✅ Success — safely parse JSON now
                        const data = await res.json();

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: data.message || 'Your request has been submitted successfully!',
                            confirmButtonText: 'OK',
                        }).then(() => {
                            // Replace booking container with confirmation screen
                            const container = document.querySelector('.booking-container');
                            container.innerHTML = `
                <div class="text-center p-5">
                    <h3>✅ Your application was submitted successfully!</h3>
                    <p>Our team will process it within 2–3 business days.</p>
                    <button id="newApplicationBtn" class="btn btn-primary mt-3">Submit Another Application</button>
                </div>
            `;

                            // Allow user to submit again
                            document.getElementById('newApplicationBtn').addEventListener('click', () => {
                                location.reload();
                            });
                        });

                    } catch (err) {
                        console.error('Fetch error:', err);
                        Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
                    } finally {
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Submit Application';
                    }
                }


            }

            document.addEventListener('DOMContentLoaded', () => {
                new PremiumBookingForm();
            });
        </script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '#show-more-btn', function() {
                    $('.extra-package').removeClass('d-none');
                    $(this).hide();
                    $('#hide-btn').show();
                });

                $(document).on('click', '#hide-btn', function() {
                    $('.extra-package').addClass('d-none');
                    $(this).hide();
                    $('#show-more-btn').show();
                    // Optional: Scroll back to top of the package section
                    $('html, body').animate({
                        scrollTop: $('#package-container').offset().top - 100
                    }, 400);
                });
            });
        </script>




        <script>
            let daysTouched = false;

            function updateDayLabel(value) {
                const label = document.getElementById('selectedDay');
                label.innerText = value ? value : 'Not selected';
            }

            function fetchFilteredResults() {
                const form = document.getElementById('filterForm');
                const params = new URLSearchParams();

                // Tour category
                const selectedCategory = document.querySelector('.tour-option-radio:checked');
                if (selectedCategory) {
                    params.append('category', selectedCategory.value);
                }

                // Themes
                form.querySelectorAll('input[name="theme[]"]:checked').forEach(input => {
                    params.append('theme[]', input.value);
                });

                // Days
                if (daysTouched) {
                    const daysInput = form.querySelector('input[name="days"]');
                    if (daysInput && daysInput.value) {
                        params.append('days', daysInput.value);
                    }
                }

                fetch("{{ route('filter.tours') }}?" + params.toString(), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(data => {
                        document.getElementById('tourPackageList').innerHTML = data;
                    });
            }


            // 🔁 Handle Radio Button Selection
            document.querySelectorAll('.tour-option-radio').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // ✅ Uncheck all others
                    document.querySelectorAll('.tour-option-radio').forEach(cb => {
                        if (cb !== this) cb.checked = false;
                    });

                    const checkedBox = document.querySelector('.tour-option-radio:checked');

                    // Clear all UI sections
                    document.getElementById('all-tours').classList.add('d-none');
                    document.getElementById('single-tour-section').classList.add('d-none');
                    document.getElementById('customize-tour-form').classList.add('d-none');
                    document.getElementById('tailor-section')?.classList.add('d-none');
                    document.getElementById('selectedTourTitle').innerText = '';

                    if (!checkedBox) {
                        // ✅ Nothing is selected - reset UI
                        document.getElementById('all-tours').classList.remove('d-none');
                        return;
                    }

                    const selected = checkedBox.value;

                    if (selected === 'customize') {
                        document.getElementById('customize-tour-form').classList.remove('d-none');
                    } else {
                        document.getElementById('single-tour-section').classList.remove('d-none');
                        const label = document.querySelector(`label[for="category_${selected}"]`);
                        document.getElementById('selectedTourTitle').innerText = label?.innerText ?? '';

                        if (selected === 'tailor') {
                            document.getElementById('tailor-section')?.classList.remove('d-none');
                        }

                        fetchCategoryTours(selected);
                    }
                });
            });




            function fetchCategoryTours(category) {
                fetch("{{ route('tours.by-category', ':category') }}".replace(':category', category), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        document.getElementById('tourPackageList').innerHTML = html;
                    });
            }

            // 🧹 Reset on page load
            // 🧹 Reset on page load
            window.addEventListener('DOMContentLoaded', () => {
                // Clear all checkboxes and radio buttons
                document.querySelectorAll('#filterForm input[type=checkbox]').forEach(cb => cb.checked = false);
                document.querySelectorAll('#filterForm input[type=radio]').forEach(rb => rb.checked = false);

                // ✅ Don't set range value; show "Not selected"
                const rangeSlider = document.getElementById('daysRangeSlider');
                if (rangeSlider) {
                    rangeSlider.value = ""; // <-- IMPORTANT: clear default
                    updateDayLabel(""); // <-- show "Not selected"
                    rangeSlider.addEventListener('input', (e) => {
                        daysTouched = true;
                        updateDayLabel(e.target.value);
                    });
                }

                // Show full list by default
                document.getElementById('all-tours').classList.remove('d-none');

                // Trigger fetch on form changes
                document.getElementById('filterForm').addEventListener('change', fetchFilteredResults);
            });

            document.getElementById('customizeForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const form = e.target;
                const formData = new FormData(form);

                fetch("{{ route('custom.tour.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Request Submitted!',
                                text: 'Your custom tour request has been successfully sent.',
                                confirmButtonColor: '#3085d6',
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            form.reset();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: 'Something went wrong. Try again.',
                            });
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Server Error',
                            text: 'Please try again later.',
                        });
                    });
            });
            document.addEventListener('DOMContentLoaded', function() {
                const sidebar = document.getElementById('mobileSidebar');
                const toggleBtn = document.getElementById('toggleFilterBtn');
                const closeBtn = document.getElementById('closeSidebarBtn');

                toggleBtn?.addEventListener('click', () => {
                    sidebar.classList.add('active');
                    document.body.classList.add('sidebar-open');
                });

                closeBtn?.addEventListener('click', () => {
                    sidebar.classList.remove('active');
                    document.body.classList.remove('sidebar-open');
                });
            });

            // document.getElementById('toggleFilterBtn').addEventListener('click', () => {
            //     document.querySelector('.sidebar-container').classList.add('show');
            // });
            // document.getElementById('closeSidebarBtn').addEventListener('click', () => {
            //     document.querySelector('.sidebar-container').classList.remove('show');
            // });

            const sidebar = document.querySelector('.sidebar-container');
            const overlay = document.querySelector('.sidebar-overlay');
            const toggleBtn = document.getElementById('toggleFilterBtn');
            const closeBtn = document.getElementById('closeSidebarBtn');

            toggleBtn.addEventListener('click', () => {
                sidebar.classList.add('show');
                overlay.classList.add('active');
            });

            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('show');
                overlay.classList.remove('active');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.remove('show');
                overlay.classList.remove('active');
            });
        </script>
        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @endsection
