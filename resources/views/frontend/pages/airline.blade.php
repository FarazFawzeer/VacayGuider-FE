@extends('frontend.layouts.app')

@section('title', 'VacayGuider | Air Ticketing')

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

        /* @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-20px);
                }
            } */

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
                .title-area {
                    margin-top: 0 !important;
                    padding: 0 10px !important;
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

        .h3,
        h3 {
            font-size: 24px;
            line-height: 1.278;
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
            background: #0d4e6b;
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

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .airline-logos {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            justify-content: center;
        }

        .airline-logo-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .airline-logo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            width: 140px;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .airline-logo {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .airline-name {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
            font-size: 16px;
        }

        @media (max-width: 992px) {
            .airline-logos {
                grid-template-columns: repeat(3, 1fr);
            }

            .logo-container {
                width: 120px;
                height: 120px;
            }
        }

        @media (max-width: 768px) {
            .airline-logos {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .logo-container {
                width: 100px;
                height: 100px;
            }
        }

        @media (max-width: 480px) {
            .airline-logos {
                grid-template-columns: repeat(1, 1fr);
                gap: 10px;
            }

            .logo-container {
                width: 80px;
                height: 80px;
            }

            .airline-logo-item {
                padding: 10px;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }






        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
        }

        .logo-icon {
            margin-right: 10px;
            font-size: 2rem;
        }

        /* nav ul {
                display: flex;
                list-style: none;
            } */

        /* nav ul li {
                                                    margin-left: 1.5rem;
                                                } */
        /*
            nav ul li a {
                color: white;
                text-decoration: none;
                font-weight: 500;
                transition: color 0.3s;
            } */

        nav ul li a:hover {
            color: #ffd700;
        }

        /* Hero Section */
        .hero {
            background-image: url('/api/placeholder/1200/400');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            color: white;
            max-width: 600px;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        /* Search Section */
        .search-section {
            background-color: white;
            padding: 2rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            margin-top: -50px;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .search-container {
            width: 90%;
            max-width: 1100px;
            margin: 0 auto;
        }

        .search-tabs {
            display: flex;
            margin-bottom: 1.5rem;
        }

        .tab {
            padding: 1rem 1.5rem;
            background-color: #e9ecef;
            cursor: pointer;
            border-radius: 5px 5px 0 0;
            font-weight: 500;
            margin-right: 5px;
        }

        .tab.active {
            background-color: #0062cc;
            color: white;
        }

        .search-box {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0 5px 5px 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .search-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 1rem;
        }

        .search-group {
            flex: 1;
            min-width: 200px;
        }

        .search-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }

        .search-group input,
        .search-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .search-btn {
            background-color: #ff6b00;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }

        .search-btn:hover {
            background-color: #e05f00;
        }

        /* Features Section */
        .features {
            padding: 3rem 0;
            background-color: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2.5rem;
            color: #0033a0;
        }

        .features-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .feature-card {
            flex-basis: calc(33.333% - 20px);
            background: rgba(52, 152, 219, 0.1);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);

            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #0062cc;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            margin-bottom: 0.8rem;
            color: #333;
        }






        /* Responsive Design */
        @media (max-width: 992px) {
            .feature-card {
                flex-basis: calc(50% - 15px);
            }


        }

        @media (max-width: 768px) {





            .search-row {
                flex-direction: column;
                gap: 10px;
            }

            .feature-card {
                flex-basis: 100%;
            }


        }
    </style>
    </style>
    {{-- 
    <div class="container-fluid about-hero text-white position-relative"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/img/avenue-815297_1920.jpg') center center / cover no-repeat; 
     display: flex;
     align-items: center;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-style7">
                        <span class="sub-title style1 text-white d-block mb-2">Air Line</span>
                        <h1 class="hero-title text-white display-4 mb-0" style="font-weight: 700;">Choose Your Airline</h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="w-full " style="background: rgb(245, 245, 245);">
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

                                <span>Airline</span>
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="partner-airlines" style="background: rgb(245, 245, 245);padding-bottom: 80px;">
        <div class="container">

            <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top: 48px;">

                <div class="title-area text-center " style="">
                    <h2 class="sec-title"
                        style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Choose Your Airline</h2>
                </div>
            </div>
            <div class="airline-logos">
                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Air Asia.png" alt="Air Asia" class="airline-logo">
                    </div>
                    <p class="airline-name">Air Asia</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/air india.png" alt="Air India" class="airline-logo">
                    </div>
                    <p class="airline-name">Air India</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Airarabia.png" alt="Air Arabia" class="airline-logo">
                    </div>
                    <p class="airline-name">Air Arabia</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/azur air.png" alt="Azur Air" class="airline-logo">
                    </div>
                    <p class="airline-name">Azur Air</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/china.png" alt="China Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">China Airlines</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Emirates.png" alt="Emirates" class="airline-logo">
                    </div>
                    <p class="airline-name">Emirates</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Etihad.png" alt="Etihad" class="airline-logo">
                    </div>
                    <p class="airline-name">Etihad</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/FitsAir.png" alt="FitsAir" class="airline-logo">
                    </div>
                    <p class="airline-name">FitsAir</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/flydubai.png" alt="Flydubai" class="airline-logo">
                    </div>
                    <p class="airline-name">Flydubai</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/indigo.png" alt="IndiGo" class="airline-logo">
                    </div>
                    <p class="airline-name">IndiGo</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/jazeera.png" alt="Jazeera Airways" class="airline-logo">
                    </div>
                    <p class="airline-name">Jazeera Airways</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/malaysia.png" alt="Malaysia Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">Malaysia Airlines</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/Qatar Airways.jpeg" alt="Qatar Airways" class="airline-logo">
                    </div>
                    <p class="airline-name">Qatar Airways</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/salam air.png" alt="Salam Air" class="airline-logo">
                    </div>
                    <p class="airline-name">Salam Air</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/seychelle.png" alt="Air Seychelles" class="airline-logo">
                    </div>
                    <p class="airline-name">Air Seychelles</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/singapore.png" alt="Singapore Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">Singapore Airlines</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/SriLankan.png" alt="SriLankan Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">SriLankan Airlines</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/thai.png" alt="Thai Airways" class="airline-logo">
                    </div>
                    <p class="airline-name">Thai Airways</p>
                </div>

                <div class="airline-logo-item">
                    <div class="logo-container">
                        <img src="assets/img/brand/turkish.png" alt="Turkish Airlines" class="airline-logo">
                    </div>
                    <p class="airline-name">Turkish Airlines</p>
                </div>
            </div>

        </div>
    </section>



    <!-- Features Section -->
    <section class="features">
        <div class="container">

            <div class="title-area text-center mb-5" style="margin-top: -60px; padding-top:48px;">

                <div class="title-area text-center " style="">
                    <h2 class="sec-title"
                        style="font-family: monospace;font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; color: #1a1a1a;">
                        Why Choose Us</h2>
                </div>
            </div>
            <div class="features-container">
                <div class="feature-card">
                    <div class="feature-icon">🔄</div>
                    <h3>Free Date Change</h3>
                    <p>Enjoy flexibility with our free date change policy on select flights. Plans change, and we
                        understand.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Best Price </h3>
                    <p>Find a lower price elsewhere? We'll match it and give you extra discount.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎁</div>
                    <h3>Loyalty Rewards</h3>
                    <p>Earn points with every flight and redeem them for free flights, upgrades, and more.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <h3>Secure Payment</h3>
                    <p>Book with confidence using our secure payment system with multiple payment options.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌎</div>
                    <h3>Global Coverage</h3>
                    <p>Flying to over 150 destinations worldwide with convenient connections.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎫</div>
                    <h3>Instant E-Tickets</h3>
                    <p>Receive your electronic tickets instantly upon confirmation of your booking.</p>
                </div>
            </div>
        </div>
    </section>




    <section class="bg-gradient-to-r from-blue-50 to-white py-12 px-4 sm:px-6 lg:px-8">

        <!-- 🔁 How It Works -->
        <div class="text-center " style="margin-bottom: 70px;">
            <h2 class="sec-title" style="font-weight: bold;font-size: 36px;">How It Works</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto px-4">

                    <!-- Step 1 -->
                    <div class="rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black-700 font-bold text-lg mb-2">1. Submit Your Request</div>
                        <p class="text-gray-600 text-base">Use the form below to tell us your travel dates and preferences.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black-700 font-bold text-lg mb-2">2. Get a Quote</div>
                        <p class="text-gray-600 text-base">We’ll send you a personalized package and price within 24 hours.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class=" rounded-2xl shadow-md p-6 transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #e6f7e9 0%, #c8e6d2 100%);">
                        <div class="text-black-700 font-bold text-lg mb-2">3. Confirm & Travel</div>
                        <p class="text-gray-600 text-base">Once confirmed, we handle everything so you can enjoy your trip
                            worry-free.</p>
                    </div>

                </div>
        </div>



    </section>


   <section class="bg-gradient-to-r from-blue-50 to-white " style="margin-top: -80px;">
        <div class="booking-container">

            <!-- Header -->
            <div class="booking-header text-center">
                <h1 style="font-family: monospace;">Book Your Flight</h1>
                <p style="margin-top: 20px;">Fill in your details and submit your booking request. Our team will contact you shortly.</p>
            </div>

            <!-- Progress -->
            <div class="progress-section">
                <div class="step-progress">
                    <div class="step-item active" id="a-indicator-1">
                        <div class="step-number">1</div>
                        <div class="step-title">Personal Info</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="step-item" id="a-indicator-2">
                        <div class="step-number">2</div>
                        <div class="step-title">Flight Details</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="step-item" id="a-indicator-3">
                        <div class="step-number">3</div>
                        <div class="step-title">Additional Info</div>
                    </div>
                </div>
            </div>

            <!-- FORM -->
            <form id="airlineBookingForm" method="POST" action="{{ route('airline.booking.store') }}">
                @csrf

                <!-- Step 1 -->
                <div class="step-content" id="a-step-1">
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

                <!-- Step 2 -->
                <div class="step-content hidden" id="a-step-2">
                    <h4>Flight Details</h4>

                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <label>Trip Type *</label>
                            <select name="tripType" id="tripType" class="form-control" required>
                                <option value="">Select Trip Type</option>
                                <option value="oneway">One Way</option>
                                <option value="roundtrip">Round Trip</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label>Preferred Airline</label>
                            <select name="airline" class="form-control">
                                <option value="">Select an Airline</option>
                                <option value="SriLankan Airlines">SriLankan Airlines</option>
                                <option value="Emirates">Emirates</option>
                                <option value="Qatar Airways">Qatar Airways</option>
                                <option value="Singapore Airlines">Singapore Airlines</option>
                                <option value="Turkish Airlines">Turkish Airlines</option>
                                <option value="Air India">Air India</option>
                                <option value="Etihad Airways">Etihad Airways</option>
                                <option value="Thai Airways">Thai Airways</option>
                                <option value="Cathay Pacific">Cathay Pacific</option>
                                <option value="Malaysia Airlines">Malaysia Airlines</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label>From *</label>
                            <input type="text" name="from" class="form-control" required
                                placeholder="Colombo (CMB)">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label>To *</label>
                            <input type="text" name="to" class="form-control" required
                                placeholder="Dubai (DXB)">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label>Departure Date *</label>
                            <input type="date" name="departureDate" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-4" id="returnDateWrapper" style="display:none;">
                            <label>Return Date</label>
                            <input type="date" name="returnDate" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step-content hidden" id="a-step-3">
                    <h4>Additional Information</h4>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label>Passengers *</label>
                            <input type="number" name="passengers" min="1" value="1" class="form-control"
                                required>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label>Message</label>
                            <textarea name="message" rows="4" class="form-control" placeholder="Any special requests or details..."></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="submit-btn btn btn-primary">Submit Request</button>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="navigation-buttons mt-3">
                    <button type="button" class="btn btn-secondary hidden" id="a-prevBtn">Previous</button>
                    <button type="button" class="btn btn-primary" id="a-nextBtn">Next</button>
                </div>
            </form>
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


    <script>
        document.addEventListener("DOMContentLoaded", () => {

            // Trip Type Logic
            const tripType = document.getElementById("tripType");
            const returnWrapper = document.getElementById("returnDateWrapper");

            if (tripType) {
                tripType.addEventListener("change", () => {
                    returnWrapper.style.display = tripType.value === "roundtrip" ? "block" : "none";
                });
            }

            const form = new AirlineBookingForm();
        });

        class AirlineBookingForm {
            constructor() {
                this.currentStep = 1;
                this.totalSteps = 3;

                this.init();
            }

            init() {
                document.getElementById('a-nextBtn').addEventListener('click', () => this.nextStep());
                document.getElementById('a-prevBtn').addEventListener('click', () => this.prevStep());

                const form = document.getElementById('airlineBookingForm');
                form.addEventListener('submit', (e) => this.handleSubmit(e));

                this.showStep(this.currentStep);
            }

            showStep(step) {
                for (let i = 1; i <= this.totalSteps; i++) {
                    document.getElementById(`a-step-${i}`).classList.add('hidden');
                    document.getElementById(`a-indicator-${i}`).classList.remove('active', 'completed');
                }

                document.getElementById(`a-step-${step}`).classList.remove('hidden');
                document.getElementById(`a-indicator-${step}`).classList.add('active');

                for (let i = 1; i < step; i++)
                    document.getElementById(`a-indicator-${i}`).classList.add('completed');

                document.getElementById('a-prevBtn').classList.toggle('hidden', step === 1);
                document.getElementById('a-nextBtn').classList.toggle('hidden', step === this.totalSteps);
            }

            nextStep() {
                const fields = document.querySelectorAll(
                    `#a-step-${this.currentStep} input[required], #a-step-${this.currentStep} select[required]`
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

                const form = e.target;
                const formData = new FormData(form);
                const submitBtn = form.querySelector(".submit-btn");

                submitBtn.disabled = true;
                submitBtn.innerText = "Submitting...";

                try {
                    const res = await fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": form.querySelector('input[name="_token"]').value,
                            "X-Requested-With": "XMLHttpRequest",
                            "Accept": "application/json"
                        },
                        body: formData
                    });

                    const data = await res.json();

                    if (res.ok) {
                        document.querySelector(".booking-container").innerHTML = `
                    <div class="text-center p-5">
                        <h3>✅ ${data.message}</h3>
                        <p>We will contact you with flight options soon!</p>
                    </div>`;
                    } else {
                        Swal.fire("Error", data.message || "Invalid input.", "error");
                    }
                } catch (err) {
                    Swal.fire("Error", "Something went wrong.", "error");
                }

                submitBtn.disabled = false;
                submitBtn.innerText = "Submit Request";
            }
        }
    </script>
@endsection
