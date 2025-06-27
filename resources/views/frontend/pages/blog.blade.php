@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')


    <style>
        .page-title {
            text-align: center;
            margin-bottom: 40px;
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            letter-spacing: -1px;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            padding: 20px 0;
        }

        .post-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .post-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        .post-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .post-card:hover .post-image {
            transform: scale(1.05);
        }

        .post-content {
            padding: 25px;
        }

        .post-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .post-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.85rem;
            color: #7f8c8d;
        }

        .post-date {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .post-date::before {
            content: "📅";
            font-size: 1rem;
        }

        .post-likes {
            display: flex;
            align-items: center;
            gap: 6px;
            color: rgb(0, 0, 0);
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        .post-likes::before {
            content: "❤️";
        }

        .post-description {
            color: #555;
            line-height: 1.6;
            font-size: 0.95rem;
            margin-bottom: 20px;
        }

        .post-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .tag {

            color: rgb(0, 0, 0);
            padding: 6px 6x;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .post-actions {
            display: flex;
            gap: 12px;
            padding-top: 15px;
            border-top: 1px solid #ecf0f1;
        }

        .action-btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        /* .share-btn {
                background: linear-gradient(45deg, #3498db, #028ccc);
                color: white;
            }

            .share-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(52, 152, 219, 0.4);
            }

            .view-btn {
                background: linear-gradient(45deg, #2ecc71, #94d106; );
                background-color: #94d106;
                color: white;
            }

            .view-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(46, 204, 113, 0.4);
            } */

        .share-btn {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
            border: 1px solid rgba(52, 152, 219, 0.2);
        }

        .share-btn:hover {
            background: rgba(52, 152, 219, 0.15);
            transform: translateY(-1px);
        }

        .view-btn {
            background: rgba(46, 204, 113, 0.1);
            color: #27ae60;
            border: 1px solid rgba(46, 204, 113, 0.2);
        }

        .view-btn:hover {
            background: rgba(46, 204, 113, 0.15);
            transform: translateY(-1px);
        }


        .floating-add {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(238, 90, 36, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .floating-add:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 12px 35px rgba(238, 90, 36, 0.6);
        }

        .load-more {
            text-align: center;
            margin-top: 40px;
        }

        .load-more-btn {
            background: rgba(0, 0, 0, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            background: black;

        }

        .load-more-btn:hover {
            background: rgba(0, 0, 0, 0.3);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .page-title {
                font-size: 2rem;
            }

            .post-actions {
                flex-direction: column;
            }

            body {
                padding: 10px;
            }
        }

        /* Animation for new posts */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .post-card {
            animation: slideInUp 0.6s ease-out;
        }

        .post-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .post-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .post-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .post-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .post-card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .post-card:nth-child(6) {
            animation-delay: 0.6s;
        }

        /* Premium Variables */
        :root {
            --primary-gradient: linear-gradient(135deg, #eabc66 0%, #fbbf24 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --card-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            --card-shadow-hover: 0 20px 60px rgba(0, 0, 0, 0.15);
            --border-radius: 20px;
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        /* Container Styling */
        .testimonials-container {
            padding: 20px 0;
            position: relative;
        }

        .testimonials-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 100%;
            background: radial-gradient(ellipse at center, rgba(102, 126, 234, 0.03) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Grid Layout */
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(420px, 1fr));
            gap: 32px;
            position: relative;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .testimonials-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }

        /* Premium Card Design */
        .testimonial-wrapper {
            position: relative;
            animation: fadeInScale 0.8s ease-out;
        }

        .testimonial-card {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border-radius: var(--border-radius);
            padding: 32px;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.8);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            min-height: 320px;
            display: flex;
            flex-direction: column;
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--primary-gradient);
            opacity: 0;
            transition: var(--transition);
            z-index: -1;
        }

        .testimonial-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(102, 126, 234, 0.2);
        }

        .testimonial-card:hover::before {
            opacity: 0.02;
        }

        /* Decorative Elements */
        .card-decoration {
            position: absolute;
            top: 24px;
            right: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .decoration-dot {
            width: 8px;
            height: 8px;
            background: var(--primary-gradient);
            border-radius: 50%;
            opacity: 0.6;
        }

        .decoration-line {
            width: 32px;
            height: 2px;
            background: var(--primary-gradient);
            border-radius: 1px;
            opacity: 0.3;
        }

        /* Quote Background */
        .quote-background {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 40px;
            height: 40px;
            color: rgba(102, 126, 234, 0.08);
            z-index: 0;
        }

        .quote-background svg {
            width: 100%;
            height: 100%;
        }

        /* Premium Header */
        .testimonial-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
            position: relative;
            z-index: 2;
        }

        .user-section {
            display: flex;
            align-items: center;
            flex: 1;
        }

        /* Avatar Container */
        .avatar-container {
            position: relative;
            margin-right: 20px;
        }

        .avatar-ring {
            position: absolute;
            top: -6px;
            left: -6px;
            right: -6px;
            bottom: -6px;
            border-radius: 50%;
            background: var(--primary-gradient);
            opacity: 0.2;
            animation: pulse 2s infinite;
        }

        .user-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ffffff;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            position: relative;
            z-index: 1;
            transition: var(--transition);
            background-color: #028ccc;
        }

        .avatar-status {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 18px;
            height: 18px;
            background: var(--success-gradient);
            border: 3px solid #ffffff;
            border-radius: 50%;
            z-index: 2;
        }

        /* User Info */
        .user-info {
            flex: 1;
        }

        .user-name {
            font-size: 18px;
            font-weight: 700;
            color: #1a202c;
            margin: 0 0 8px 0;
            letter-spacing: -0.025em;
            line-height: 1.2;
        }

        .source-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            padding: 6px 16px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            font-size: 13px;
            font-weight: 600;
            color: #4a5568;
            position: relative;
        }

        .source-badge i {
            font-size: 14px;
            color: #667eea;
        }

        .verified-badge {
            color: #38a169;
            font-size: 12px;
            margin-left: 4px;
        }

        /* Premium Rating System */
        .rating-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .rating-stars {
            display: flex;
            gap: 4px;
        }

        .star-wrapper {
            position: relative;
            width: 20px;
            height: 20px;
        }

        .star-background {
            position: absolute;
            top: 0;
            left: 0;
            color: #e2e8f0;
            font-size: 20px;
        }

        .star-fill {
            position: absolute;
            top: 0;
            left: 0;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 20px;
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s ease;
        }

        .star-fill.active {
            opacity: 1;
            transform: scale(1);
        }

        .rating-score {
            display: flex;
            align-items: baseline;
            gap: 2px;
            font-weight: 700;
            color: #4a5568;
        }

        .score-number {
            font-size: 16px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .score-divider {
            font-size: 12px;
            color: #a0aec0;
        }

        .score-total {
            font-size: 14px;
            color: #718096;
        }

        /* Premium Content */
        .testimonial-content {
            flex: 1;
            margin-bottom: 24px;
            position: relative;
            z-index: 2;
        }

        .content-wrapper {
            position: relative;
        }

        .testimonial-text {
            font-size: 16px;
            line-height: 1.7;
            color: #2d3748;
            margin: 0;
            font-weight: 400;
            letter-spacing: 0.01em;
            position: relative;
            z-index: 1;
        }

        .content-fade {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20px;
            background: linear-gradient(transparent, rgba(255, 255, 255, 0.9));
            pointer-events: none;
        }

        /* Elegant Footer */
        .testimonial-footer {
            border-top: 1px solid rgba(226, 232, 240, 0.6);
            padding-top: 20px;
            position: relative;
            z-index: 2;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .date-section {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .date-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            font-size: 14px;
        }

        .date-text {
            font-size: 14px;
            color: #718096;
            font-weight: 500;
        }

        .engagement-indicators {
            display: flex;
            gap: 12px;
        }

        .indicator {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 16px;
            font-size: 12px;
            color: #667eea;
            font-weight: 600;
            transition: var(--transition);
        }

        .indicator:hover {
            background: rgba(102, 126, 234, 0.15);
            transform: translateY(-1px);
        }

        /* Premium Empty State */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 80px 40px;
            background: linear-gradient(145deg, #f8fafc, #ffffff);
            border-radius: var(--border-radius);
            border: 2px dashed #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .empty-illustration {
            position: relative;
            margin-bottom: 32px;
        }

        .empty-circles {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 3s ease-in-out infinite;
        }

        .circle-1 {
            width: 80px;
            height: 80px;
            background: var(--primary-gradient);
            top: -40px;
            left: -40px;
            animation-delay: 0s;
        }

        .circle-2 {
            width: 60px;
            height: 60px;
            background: var(--secondary-gradient);
            top: -30px;
            left: -30px;
            animation-delay: 1s;
        }

        .circle-3 {
            width: 40px;
            height: 40px;
            background: var(--accent-gradient);
            top: -20px;
            left: -20px;
            animation-delay: 2s;
        }

        .empty-icon {
            font-size: 64px;
            color: #cbd5e0;
            position: relative;
            z-index: 1;
        }

        .empty-title {
            font-size: 24px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .empty-subtitle {
            font-size: 16px;
            color: #718096;
            margin-bottom: 24px;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        /* Premium Pagination */
        .pagination-section {
            margin-top: 48px;
            padding-top: 32px;
            border-top: 1px solid rgba(226, 232, 240, 0.6);
        }

        .pagination-wrapper {
            display: flex;
            justify-content: center;
            position: relative;
        }

        .pagination-wrapper::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 200px;
            height: 60px;
            background: radial-gradient(ellipse, rgba(102, 126, 234, 0.05) 0%, transparent 70%);
            border-radius: 30px;
            z-index: -1;
        }

        /* Animations */
        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.9);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 0.2;
                transform: scale(1);
            }

            50% {
                opacity: 0.4;
                transform: scale(1.05);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Stagger animations */
        .testimonial-wrapper:nth-child(1) {
            animation-delay: 0.1s;
        }

        .testimonial-wrapper:nth-child(2) {
            animation-delay: 0.2s;
        }

        .testimonial-wrapper:nth-child(3) {
            animation-delay: 0.3s;
        }

        .testimonial-wrapper:nth-child(4) {
            animation-delay: 0.4s;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .testimonials-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .testimonial-card {
                padding: 24px;
                min-height: auto;
            }

            .testimonial-header {
                flex-direction: column;
                gap: 16px;
            }

            .rating-container {
                align-items: flex-start;
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
            }

            .user-name {
                font-size: 16px;
            }

            .testimonial-text {
                font-size: 15px;
                line-height: 1.6;
            }

            .footer-content {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .empty-state {
                padding: 60px 20px;
            }

            .empty-title {
                font-size: 20px;
            }
        }

        /* High-end hover effects */
        .testimonial-card:hover .user-avatar {
            transform: scale(1.1);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
        }

        .testimonial-card:hover .star-fill.active {
            transform: scale(1.2);
        }

        .testimonial-card:hover .avatar-ring {
            opacity: 0.4;
            transform: scale(1.1);
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Print styles */
        @media print {
            .testimonial-card {
                break-inside: avoid;
                box-shadow: none;
                border: 1px solid #ddd;
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        .clamp-2-lines {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Limit to 2 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.4em;
            max-height: 2.8em;
            /* 2 lines * line-height */
        }

        .indicator.helpful:hover {
            color: #0d6efd;
            transition: color 0.2s ease;
        }

        .indicator.helpful.clicked {
            font-weight: bold;
        }
    </style>

    <section class="overflow-hidden space bg-smoke"
        style="padding-top: 40px;padding-bottom: 40px; background-color: #F5F5F5 !important;">
        <div class="container ">
            <h1 class="page-title" style="color: #113d48;">✨ Social Feed</h1>

            <div class="posts-grid" id="postsGrid">
                <!-- Sample posts - replace with your actual content -->
                @foreach ($blogPosts as $index => $post)
                    <article class="post-card {{ $index >= 6 ? 'd-none extra-post' : '' }}">
                        {{-- Same post content as before --}}
                        <img src="{{ $post->image_post ? asset('storage/' . $post->image_post) : 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=400&h=280&fit=crop' }}"
                            alt="Post Image" class="post-image">

                        <div class="post-content">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <div class="post-meta">

                                <span class="">{{ $post->posted_time->diffForHumans() }}</span>
                                <span class="post-likes">{{ $post->likes_count }}</span>
                            </div>
                            <p class="post-description clamp-2-lines">{{ $post->description }}</p>
                            <div class="post-tags">
                                @foreach ($post->hashtags as $tag)
                                    <span class="tag">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <div class="post-actions">
                                <button class="action-btn share-btn">Share</button>
                                <button class="action-btn view-btn">View Full</button>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>

            <div class="load-more">
                <button id="togglePostsBtn" class="load-more-btn" onclick="togglePosts()">Load More Posts</button>
            </div>
        </div>
    </section>

    <section class="overflow-hidden space" style="padding-top: 40px;padding-bottom: 40px;">

        <div class="container py-4">
            <h1 class="page-title" style="color: #113d48;"> What our client Says</h1>
            <div class="row">

                <!-- Sidebar filter -->
                <div class="col-md-3">
                    <div class="filter-sidebar p-4 shadow" style="background-color: #f8f9fa; border-radius: 15px;">
                        <form method="GET" action="{{ route('blog') }}" id="filterForm">

                            <div class="filter-section mb-4">
                                <h5 class="filter-heading">
                                    <i class="fas fa-filter me-2"></i>Source
                                </h5>
                                <div class="ps-2" style="border-bottom: 2px solid #e1dede; padding-bottom: 10px;">
                                    {{-- "All Sources" option --}}
                                    <div class="form-check mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="source" value=""
                                            id="source_all" {{ !$sourceFilter ? 'checked' : '' }}>
                                        <label class="form-check-label ms-2" for="source_all">All Sources</label>
                                    </div>

                                    @foreach ($sources as $source)
                                        <div class="form-check mb-2 d-flex align-items-center">
                                            <input class="form-check-input" name="source" value="{{ $source }}"
                                                type="radio" id="source_{{ $loop->index }}"
                                                {{ $sourceFilter === $source ? 'checked' : '' }}>
                                            <label class="form-check-label ms-2" for="source_{{ $loop->index }}">
                                                {{ ucfirst($source) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </form>
                    </div>
                </div>



                <div class="col-md-9" id="filteredResults">
                    <div class="testimonials-container">
                        <div class="testimonials-grid">
                            @forelse ($testimonials as $testimonial)
                                <div class="testimonial-wrapper">
                                    <div class="testimonial-card">
                                        <!-- Decorative elements -->
                                        <div class="card-decoration">
                                            <div class="decoration-dot"></div>
                                            <div class="decoration-line"></div>
                                        </div>

                                        <!-- Quote background -->
                                        <div class="quote-background">
                                            <svg viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z" />
                                            </svg>
                                        </div>

                                        <!-- Header with premium styling -->
                                        <div class="testimonial-header">
                                            <div class="user-section">
                                                <div class="avatar-container">
                                                    <div class="avatar-ring"></div>
                                                    <img src="{{ $testimonial->image ? 'https://test.admin/' . $testimonial->image : 'https://ui-avatars.com/api/?name=' . urlencode($testimonial->name) . '&background=028ccc&color=fff&size=80' }}"
                                                        class="user-avatar" alt="{{ $testimonial->name }}">
                                                    <div class="avatar-status"></div>
                                                </div>
                                                <div class="user-info">
                                                    <h3 class="user-name">{{ $testimonial->name }}</h3>
                                                    <div class="source-badge">
                                                        <i class="bi bi-{{ strtolower($testimonial->source) }}"></i>
                                                        <span>{{ $testimonial->source }}</span>
                                                        <div class="verified-badge">
                                                            <i class="bi bi-patch-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Enhanced rating display -->
                                            <div class="rating-container">
                                                <div class="rating-stars">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="star-wrapper">
                                                            <i class="bi bi-star-fill star-background"></i>
                                                            <i
                                                                class="bi bi-star-fill star-fill {{ $i <= $testimonial->rating ? 'active' : '' }}"></i>
                                                        </div>
                                                    @endfor
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Premium content section -->
                                        <div class="testimonial-content">
                                            <div class="content-wrapper">
                                                <p class="testimonial-text">{{ $testimonial->message }}</p>
                                                <div class="content-fade"></div>
                                            </div>
                                        </div>

                                        <!-- Elegant footer -->
                                        <div class="testimonial-footer">
                                            <div class="footer-content">
                                                <div class="date-section">
                                                    <div class="date-icon">
                                                        <i class="bi bi-calendar-event"></i>
                                                    </div>
                                                    <span
                                                        class="date-text">{{ \Carbon\Carbon::parse($testimonial->postedate)->format('M j, Y') }}</span>
                                                </div>
                                                <div class="engagement-indicators">
                                                    <div class="indicator helpful" style="cursor: pointer;"
                                                        onclick="markHelpful({{ $testimonial->id }}, this)">
                                                        <i class="bi bi-hand-thumbs-up"></i>
                                                        <span>Helpful</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state">
                                    <div class="empty-illustration">
                                        <div class="empty-circles">
                                            <div class="circle circle-1"></div>
                                            <div class="circle circle-2"></div>
                                            <div class="circle circle-3"></div>
                                        </div>
                                        <div class="empty-icon">
                                            <i class="bi bi-chat-square-quote"></i>
                                        </div>
                                    </div>
                                    <div class="empty-content">
                                        <h3 class="empty-title">No Testimonials Yet</h3>
                                        <p class="empty-subtitle">Be the first to share your experience</p>
                                        <div class="empty-cta">
                                            <button class="cta-button">
                                                <i class="bi bi-plus-circle"></i>
                                                <span>Add Testimonial</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Premium pagination -->
                        @if ($testimonials->hasPages())
                            <div class="pagination-section">
                                <div class="pagination-wrapper">
                                    {{ $testimonials->withQueryString()->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- Auto-submit JS --}}
    <script>
        // Auto-submit when radio changes
        document.querySelectorAll('#filterForm input[name="source"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
    </script>



    <script>
        function togglePosts() {
            const hiddenPosts = document.querySelectorAll('.extra-post');
            const toggleBtn = document.getElementById('togglePostsBtn');
            const isHidden = hiddenPosts[0].classList.contains('d-none');

            if (isHidden) {
                // Show all extra posts
                hiddenPosts.forEach(post => post.classList.remove('d-none'));
                toggleBtn.textContent = 'Hide Posts';
            } else {
                // Hide all extra posts
                hiddenPosts.forEach(post => post.classList.add('d-none'));
                toggleBtn.textContent = 'Load More Posts';
                window.scrollTo({
                    top: document.getElementById('postsGrid').offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        }

        function addNewPost() {
            alert('Add new post functionality! (Connect to your upload system)');
        }

        // Add click handlers for share and view buttons
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('share-btn')) {
                const postTitle = e.target.closest('.post-card').querySelector('.post-title').textContent;
                if (navigator.share) {
                    navigator.share({
                        title: postTitle,
                        text: 'Check out this amazing post!',
                        url: window.location.href
                    });
                } else {
                    // Fallback for browsers that don't support Web Share API
                    const url = window.location.href;
                    navigator.clipboard.writeText(url).then(() => {
                        alert('Link copied to clipboard!');
                    });
                }
            }

            if (e.target.classList.contains('view-btn')) {
                const postImage = e.target.closest('.post-card').querySelector('.post-image').src;
                // Open image in new tab or modal
                window.open(postImage, '_blank');
            }
        });

        // Add some scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all post cards for scroll animations
        document.querySelectorAll('.post-card').forEach(card => {
            observer.observe(card);
        });


        function markHelpful(id, element) {
            // Optional: prevent multiple clicks
            if (element.classList.contains('clicked')) return;

            // UI feedback
            element.classList.add('clicked');
            element.style.color = '#0d6efd'; // Bootstrap primary

            // Optional: show a toast or feedback
            // alert('Marked testimonial ID ' + id + ' as helpful');

            // TODO: Send AJAX request to backend
            // fetch('/mark-helpful/' + id, { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } })

            // Optional: update a counter or icon state
            element.querySelector('i').classList.replace('bi-hand-thumbs-up', 'bi-hand-thumbs-up-fill');
        }
    </script>
@endsection
