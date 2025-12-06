@extends('frontend.layouts.app')

@section('title', 'VacayGuider | Transportaion')

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
                        <div class=" text-white font-bold text-2xl px-4 py-2 rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-300 relative overflow-hidden"
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
                    ? $backendBaseUrl . '/admin/storage/' . ltrim($vehicle->vehicle_image, '/')
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
                $subImageUrls = array_map(fn($img) => $backendBaseUrl . '/admin/storage/' . ltrim($img, '/'), $subImages);
            @endphp

            <!-- Main Image -->
            <div class="relative overflow-hidden mb-4 group text-center" style="margin-top: -50px;">
                <img src="{{ $finalImage }}" alt="{{ $vehicle->name }}"
                    class="mx-auto block object-contain transition-transform duration-500 group-hover:scale-105 rounded-3xl cursor-pointer"
                    style=" max-width: 100%;" data-bs-toggle="modal" data-bs-target="#imageModal"
                    data-img="{{ $finalImage }}">
            </div>

            <!-- Sub Images Grid (4 per row) -->
            @if (count($subImageUrls) > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sub-img-mob" style="margin-top: -70px">
                    @foreach ($subImageUrls as $url)
                        <img src="{{ $url }}" alt="Sub Image"
                            class="object-cover rounded-lg cursor-pointer transition-transform duration-300 hover:scale-105"
                            style=" width: 100%;" data-bs-toggle="modal" data-bs-target="#imageModal"
                            data-img="{{ $url }}">
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
                                    <svg class="w-8 h-8 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        style="color: #3596d3;">
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
                                    <svg class="w-7 h-7 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        style="color: #3596d3;">
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
                                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="currentColor" stroke-width="1" />
                                </pattern>
                            </defs>
                            <rect width="100" height="100" fill="url(#grid)" />
                        </svg>
                    </div>
                </div>

                <!-- Enhanced Action Button -->
                <div class="pt-6">
                    {{-- <button
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
                            </button> --}}

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


        {{-- <div class="">


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






        </div> --}}



    </section>


    {{-- <div class="container-fluid"> --}}
    <section>
        <div class="booking-container">
            <!-- Header -->
            <div class="booking-header text-center">
                <h1 style="font-family: monospace;">Book This Vehicle</h1>
                <p style="margin-top: 10px;">Fill in your details and submit your booking request. Our team will
                    confirm your reservation shortly.</p>
            </div>

            <!-- Progress -->
            <div class="progress-section">
                <div class="step-progress">
                    <div class="step-item active" id="v-indicator-1">
                        <div class="step-number">1</div>
                        <div class="step-title">Personal Info</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="step-item" id="v-indicator-2">
                        <div class="step-number">2</div>
                        <div class="step-title">Reservation Details</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="step-item" id="v-indicator-3">
                        <div class="step-number">3</div>
                        <div class="step-title">Additional Info</div>
                    </div>
                </div>
            </div>

            <form id="vehicleBookingForm" method="POST" action="{{ route('transport.booking.store') }}">
                @csrf
                <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

                <!-- Step 1: Personal Info -->
                <div class="step-content" id="v-step-1">
                    <h4>Personal Information</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label>Full Name *</label>
                            <input type="text" name="fullName" class="form-control" required placeholder="John Doe">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required
                                placeholder="example@mail.com">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Phone *</label>
                            <input type="tel" name="phone" class="form-control" required
                                placeholder="+1 123-456-7890">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>WhatsApp *</label>
                            <input type="text" name="whatsapp" class="form-control" required
                                placeholder="+1 123-456-7890">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Country *</label>
                            <input type="text" name="country" class="form-control" required placeholder="USA">
                        </div>
                    </div>
                </div>

                <!-- Step 2: Reservation Details -->
                <div class="step-content hidden" id="v-step-2">
                    <h4>Reservation Details</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label>Start Date *</label>
                            <input type="date" name="startDate" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Start Time *</label>
                            <input type="time" name="startTime" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>End Date *</label>
                            <input type="date" name="endDate" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>End Time *</label>
                            <input type="time" name="endTime" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Pickup Location *</label>
                            <input type="text" name="pickupLocation" class="form-control" required
                                placeholder="Enter pickup address">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Drop Location *</label>
                            <input type="text" name="dropLocation" class="form-control" required
                                placeholder="Enter drop-off address">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Service Type *</label>
                            <select name="serviceType" class="form-control" required>
                                <option value="">Select Service</option>
                                <option value="transport">Transport</option>
                                <option value="hourly">Hourly Based</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4" id="hourInputWrapper" style="display:none;">
                            <label>Hours</label>
                            <input type="number" name="hourCount" min="1" class="form-control"
                                placeholder="e.g. 3">
                        </div>
                    </div>
                </div>

                <!-- Step 3: Additional Info -->
                <div class="step-content hidden" id="v-step-3">
                    <h4>Additional Information</h4>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label>Message</label>
                            <textarea name="message" rows="4" class="form-control" placeholder="Tell us your preferences or questions..."></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="submit-btn btn btn-primary">Submit Booking</button>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="navigation-buttons mt-3">
                    <button type="button" class="btn btn-secondary hidden" id="v-prevBtn">Previous</button>
                    <button type="button" class="btn btn-primary" id="v-nextBtn">Next</button>
                </div>
            </form>
        </div>
    </section>
    {{-- </div> --}}


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
        document.addEventListener("DOMContentLoaded", function() {
            const modalImage = document.getElementById("modalImage");
            const imageTriggers = document.querySelectorAll("[data-bs-target='#imageModal']");

            imageTriggers.forEach(img => {
                img.addEventListener("click", function() {
                    modalImage.src = this.getAttribute("data-img");
                });
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Clear all fields on load
            document.getElementById('vehicleBookingForm').reset();

            const form = new VehicleBookingForm();

            // Show Hour Count field when Service Type is Hourly
            const serviceType = document.querySelector('select[name="serviceType"]');
            const hourWrapper = document.getElementById('hourInputWrapper');
            serviceType.addEventListener('change', () => {
                hourWrapper.style.display = serviceType.value === 'hourly' ? 'block' : 'none';
            });
        });

        class VehicleBookingForm {
            constructor() {
                this.currentStep = 1;
                this.totalSteps = 3;
                this.init();
            }
            init() {
                document.getElementById('v-nextBtn').addEventListener('click', () => this.nextStep());
                document.getElementById('v-prevBtn').addEventListener('click', () => this.prevStep());

                const form = document.getElementById('vehicleBookingForm');
                form.addEventListener('submit', (e) => this.handleSubmit(e))
                this.showStep(this.currentStep);
            }
            showStep(step) {
                for (let i = 1; i <= this.totalSteps; i++) {
                    document.getElementById(`v-step-${i}`).classList.add('hidden');
                    document.getElementById(`v-indicator-${i}`).classList.remove('active', 'completed');
                }
                document.getElementById(`v-step-${step}`).classList.remove('hidden');
                document.getElementById(`v-indicator-${step}`).classList.add('active');
                for (let i = 1; i < step; i++)
                    document.getElementById(`v-indicator-${i}`).classList.add('completed');

                document.getElementById('v-prevBtn').classList.toggle('hidden', step === 1);
                document.getElementById('v-nextBtn').classList.toggle('hidden', step === this.totalSteps);
            }
            nextStep() {
                const currentFields = document.querySelectorAll(
                    `#v-step-${this.currentStep} input[required], #v-step-${this.currentStep} select[required], #v-step-${this.currentStep} textarea[required]`
                );
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
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                        body: formData,
                    });

                    const data = await res.json();

                    if (res.ok) {
                        document.querySelector('.booking-container').innerHTML = `
                <div class="text-center p-5">
                    <h3>✅ ${data.message}</h3>
                    <p>Our team will contact you to confirm your reservation.</p>
                </div>`;
                    } else {
                        Swal.fire('Error', data.message || 'Please check your input fields.', 'error');
                    }
                } catch (err) {
                    Swal.fire('Error', err.message || 'Something went wrong.', 'error');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerText = 'Submit Booking';
                }
            }
        }
    </script>
@endsection
