@extends('frontend.layouts.app')

@section('title', 'VacayGuider | Contact Us')

@section('content')
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        @media (max-width: 576px) {

            .breadcrumb-mobile {
                overflow-x: auto;
                scrollbar-width: none;
                -ms-overflow-style: none;
                margin-top: 80px !important;
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
            .booking-container {
                padding: 15px;
                
            }

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



        .btn-primary {
            background: #0d4e6b;
            color: white;
            border: 1px solid #0d4e6b;
            position: relative;
            overflow: hidden;
            border-radius: 50px;
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
            color: #000000 !important;
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
        /* Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@700&display=swap');

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

            .sec-title {

                margin-bottom: 22px !important;

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
                            style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                            Sart Your Conversation </h2>
                    </div>



                    <p class="mb-4 text-center" style="color: #000000">We’d love to hear from you. Whether you have
                        questions regarding our
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
                                            style=" background: rgba(52, 152, 219, 0.1);
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
                                            style="  background: rgba(52, 152, 219, 0.1);
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
                                            style="  background: rgba(52, 152, 219, 0.1);
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


                </div>




            </div>
        </div>
    </div>

    <section style="margin-top: -100px;"  >
        <div class="booking-container" style="background: rgb(245 245 245);padding: 12px;">
            <!-- Header -->
            <div class="booking-header text-center">
                <h1 style="font-family: monospace;">Check Your Reservation</h1>
                <p style="margin-top: 10px;">Fill in your details and submit your request. Our team will contact you
                    shortly.</p>
            </div>

            <!-- Progress -->
            <div class="progress-section">
                <div class="step-progress">
                    <div class="step-item active" id="step-indicator-1">
                        <div class="step-number">1</div>
                        <div class="step-title">Personal Info</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="step-item" id="step-indicator-2">
                        <div class="step-number">2</div>
                        <div class="step-title">Service Details</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="step-item" id="step-indicator-3">
                        <div class="step-number">3</div>
                        <div class="step-title">Message</div>
                    </div>
                </div>
            </div>

            <form id="reservationForm" method="POST" action="{{ route('contact.submit') }}">
                @csrf

                <!-- Step 1: Personal Info -->
                <div class="step-content" id="step-1">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="name">Your Name *</label>
                            <input type="text" id="name" name="name" required placeholder="Your Name"
                                class="form-control">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="email">Your Email *</label>
                            <input type="email" id="email" name="email" required placeholder="Your Email"
                                class="form-control">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="phone">Your Phone</label>
                            <input type="tel" id="phone" name="phone" placeholder="Phone"
                                class="form-control">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" placeholder="Country"
                                class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Step 2: Service Details -->
                <div class="step-content hidden" id="step-2">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="service">Select a Service *</label>
                            <select id="service" name="service" required class="form-control">
                                <option value="" disabled selected>Select a service</option>
                                <option value="Inbound tours">Inbound tours</option>
                                <option value="Rent Vehicles">Vehicle Rental</option>
                                <option value="Transportations">Transportations</option>
                                <option value="Air tickets">Air Ticketing</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Message -->
                <div class="step-content hidden" id="step-3">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" placeholder="Leave a message here" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="submit-btn btn btn-primary">Send Message</button>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="navigation-buttons mt-3">
                    <button type="button" class="btn btn-secondary hidden" id="prevBtn">Previous</button>
                    <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                </div>
            </form>
        </div>
    </section>



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

   <script>
document.addEventListener('DOMContentLoaded', () => {

    class MultiStepForm {
        constructor() {
            this.currentStep = 1;
            this.totalSteps = 3;
            this.init();
        }

        init() {
            document.getElementById('nextBtn').addEventListener('click', () => this.nextStep());
            document.getElementById('prevBtn').addEventListener('click', () => this.prevStep());

            const formEl = document.getElementById('reservationForm');
            formEl.addEventListener('submit', (e) => this.handleSubmit(e));

            this.showStep(this.currentStep);
        }

        showStep(step) {
            for (let i = 1; i <= this.totalSteps; i++) {
                document.getElementById(`step-${i}`).classList.add('hidden');
                document.getElementById(`step-indicator-${i}`).classList.remove('active', 'completed');
            }
            document.getElementById(`step-${step}`).classList.remove('hidden');
            document.getElementById(`step-indicator-${step}`).classList.add('active');

            for (let i = 1; i < step; i++) {
                document.getElementById(`step-indicator-${i}`).classList.add('completed');
            }

            document.getElementById('prevBtn').classList.toggle('hidden', step === 1);
            document.getElementById('nextBtn').classList.toggle('hidden', step === this.totalSteps);
        }

        nextStep() {
            const fields = document.querySelectorAll(
                `#step-${this.currentStep} input[required], #step-${this.currentStep} select[required], #step-${this.currentStep} textarea[required]`
            );
            let valid = true;
            fields.forEach(f => {
                if (!f.value.trim()) {
                    f.classList.add('is-invalid');
                    valid = false;
                } else {
                    f.classList.remove('is-invalid');
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
            const formEl = e.target;
            const formData = new FormData(formEl);
            const btn = formEl.querySelector('.submit-btn');
            btn.disabled = true;
            btn.innerText = 'Submitting...';

            try {
                const res = await fetch(formEl.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': formEl.querySelector('input[name="_token"]').value,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData,
                });

                const data = await res.json();

                if (res.ok) {
                    document.querySelector('#reservationForm').innerHTML = `
                        <div class="text-center p-5">
                            <h3>✅ ${data.message}</h3>
                            <p>Our team will contact you shortly.</p>
                        </div>
                    `;
                } else {
                    Swal.fire('Error', data.message || 'Please check your input fields.', 'error');
                }
            } catch (err) {
                Swal.fire('Error', err.message || 'Something went wrong.', 'error');
            } finally {
                btn.disabled = false;
                btn.innerText = 'Send Message';
            }
        }
    }

    // Initialize after the class is defined
    const form = new MultiStepForm();
});
</script>

@endsection
