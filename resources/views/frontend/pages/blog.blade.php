@extends('frontend.layouts.app')

@section('title', 'VacayGuider | Feed')

@section('content')
    @php
        // Define the base URL for your backend storage
        $backendBaseUrl = 'https://your-backend-domain.com'; // Change this to your actual backend URL
        $defaultImage = asset('frontend/images/default-placeholder.jpg');
    @endphp

    <div class="feed-container py-4">
        <div class="container">
            <div class="row justify-content-center">
  @php
                        $backendBaseUrl = config('app.backend_url');
                        $defaultImage = asset('/images/no-image.jpg');
                    @endphp

                <div class="col-lg-7 col-md-10">
                    @forelse($blogs as $blog)
                        @php
                            // IMAGE LOGIC FROM YOUR SNIPPET
                            $imgArray = is_array($blog->image_post) ? $blog->image_post : [];
                            $imgCount = count($imgArray);

                            // Build full backend URLs for all images
                            $imageUrls = array_map(function ($img) use ($backendBaseUrl) {
                                return $backendBaseUrl . '/admin/storage/' . ltrim($img, '/');
                            }, $imgArray);
                        @endphp

                        <div class="insta-post-card mb-4">
                            <div class="post-header d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-ring d-flex align-items-center justify-content-center bg-white">
                                        @php
                                            $type = strtolower($blog->type);
                                            $icon = 'bi-pin-map-fill';
                                            if (str_contains($type, 'beach')) {
                                                $icon = 'bi-sun-fill';
                                            } elseif (str_contains($type, 'food') || str_contains($type, 'rest')) {
                                                $icon = 'bi-egg-fried';
                                            } elseif (str_contains($type, 'hike') || str_contains($type, 'mountain')) {
                                                $icon = 'bi-terrain';
                                            } elseif (str_contains($type, 'city') || str_contains($type, 'hotel')) {
                                                $icon = 'bi-building-fill';
                                            } elseif (str_contains($type, 'wild')) {
                                                $icon = 'bi-tree-fill';
                                            }
                                        @endphp
                                        <div class="category-icon-circle shadow-sm">
                                            <i class="bi {{ $icon }} text-white"></i>
                                        </div>
                                    </div>

                                    <div class="ms-3">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">
                                                {{ $blog->type }}</h6>
                                            <span class="mx-1 text-muted">•</span>
                                            <small class="text-muted" style="font-size: 0.75rem;">
                                                {{ $blog->posted_time ? $blog->posted_time->diffForHumans() : $blog->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                        <p class="mb-0 text-primary fw-semibold"
                                            style="font-size: 0.7rem; letter-spacing: 0.5px;">VACAYGUIDER EXPLORE</p>
                                    </div>
                                </div>
                                <i class="bi bi-three-dots text-muted"></i>
                            </div>

                            @if ($imgCount > 0)
                                <div id="carousel-{{ $blog->id }}" class="carousel slide" data-bs-interval="false">
                                    <div class="carousel-inner bg-light">
                                        @foreach ($imageUrls as $index => $url)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <div class="post-image-container">
                                                    <img src="{{ $url }}" class="d-block w-100" alt="Post Image">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if ($imgCount > 1)
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carousel-{{ $blog->id }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon rounded-circle shadow-sm"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carousel-{{ $blog->id }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon rounded-circle shadow-sm"></span>
                                        </button>
                                    @endif
                                </div>
                            @else
                                <div class="post-image-container">
                                    <img src="{{ $defaultImage }}" class="d-block w-100" alt="Placeholder">
                                </div>
                            @endif

                            <div class="post-body p-3">
                                <h5 class="fw-bold mb-2 text-dark" style="font-size: 1.1rem;">{{ $blog->title }}</h5>
                                <div class="description-content">
                                    <p class="description-text mb-2">
                                      
                                        @php
                                            $plainDescription = strip_tags($blog->description);
                                            $limit = 120;
                                            $isLong = strlen($plainDescription) > $limit;
                                        @endphp

                                        @if ($isLong)
                                            <span class="desc-short">
                                                {{ Str::limit($plainDescription, $limit, '...') }}
                                                <a href="javascript:void(0);"
                                                    class="show-more-link text-muted ms-1">more</a>
                                            </span>
                                            <span class="desc-full d-none">
                                                {!! nl2br(e($blog->description)) !!}
                                            </span>
                                        @else
                                            {!! nl2br(e($blog->description)) !!}
                                        @endif
                                    </p>
                                </div>

                                @if ($blog->hashtags)
                                    <div class="hashtags mt-2">
                                        @foreach ($blog->hashtags as $tag)
                                            <a href="#" class="me-2">#{{ ltrim($tag, '#') }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5 bg-white rounded border">
                            <i class="bi bi-camera text-muted" style="font-size: 3rem;"></i>
                            <p class="mt-3 text-muted">No posts found in this category.</p>
                        </div>
                    @endforelse
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <div class="sidebar-sticky ps-lg-4">
                        <div class="brand-identity-box mb-5 px-2">
                            <h6>VacayGuider <span class="text-primary">Sri Lanka</span></h6>
                            <div class="ps-3 border-start border-2 border-primary">
                                <p>Your local lens on paradise. Discover curated travel stories, hidden gems, and local
                                    secrets from across the island.</p>
                            </div>
                        </div>

                        <div class="suggestion-box">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6>EXPLORE TOPICS</h6>
                                @if (request('type'))
                                    <a href="{{ route('blogs.index') }}"
                                        class="text-decoration-none extra-small-bold text-danger hover-underline">RESET</a>
                                @endif
                            </div>
                            <ul class="list-unstyled mb-0">
                                @php $allTypes = \App\Models\BlogPost::distinct()->pluck('type'); @endphp
                                @foreach ($allTypes as $type)
                                    <li>
                                        <a href="{{ route('blogs.index', ['type' => $type]) }}"
                                            class="category-link-modern {{ request('type') == $type ? 'active' : '' }}">
                                            <div class="d-flex align-items-center">
                                                <div class="category-dot"></div>
                                                <span>{{ $type }}</span>
                                            </div>
                                            @if (request('type') == $type)
                                                <i class="bi bi-arrow-right-short"></i>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-5 px-2">
                            <p class="text-muted text-uppercase fw-bold m-0"
                                style="font-size: 0.65rem; letter-spacing: 1.2px;">
                                © {{ date('Y') }} VACAYGUIDER • TRAVEL DISCOVERY
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        /* Paste your simplified CSS here */
        body {
            background-color: #ffffff;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        .brand-identity-box {
            border-left: 2px solid #0d4e6b;
            padding-left: 16px;
            margin-bottom: 48px;
        }

        .brand-identity-box h6 {
            font-size: 1rem;
            font-weight: 600;
            color: #262626;
            margin-bottom: 8px;
        }

        .brand-identity-box p {
            font-size: 0.875rem;
            line-height: 1.6;
            color: #737373;
            margin: 0;
        }

        .category-icon-circle {
            width: 32px;
            height: 32px;
            background: #262626;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
        }

        .avatar-ring {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            padding: 2px;
            background: #262626;
        }

        .insta-post-card {
            background: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 0;
        }

        .post-header {
            padding: 16px;
            border-bottom: 1px solid #f5f5f5;
        }

        .post-image-container {
            position: relative;
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
            background-color: #fafafa;
        }

        .post-image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 28px;
            height: 28px;
            background-color: rgba(255, 255, 255, 0.95);
            border: 1px solid #e5e5e5;
            background-image: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-control-prev-icon::after {
            content: '❮';
            color: #262626;
            font-size: 11px;
        }

        .carousel-control-next-icon::after {
            content: '❯';
            color: #262626;
            font-size: 11px;
        }

        .post-body {
            padding: 16px;
        }

        .description-text {
            font-size: 0.9375rem;
            line-height: 1.5;
            color: #262626 !important;
        }

        .show-more-link {
            color: #737373;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .hashtags a {
            color: #262626;
            font-size: 0.875rem;
            text-decoration: none;
            font-weight: 500;
        }

        .suggestion-box {
            background: #ffffff;
            border: 1px solid #e5e5e5;
            padding: 24px;
        }

        .category-link-modern {
            padding: 12px 0;
            text-decoration: none;
            color: #262626;
            font-size: 0.9375rem;
            border-bottom: 1px solid #f5f5f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.2s;
        }

        .category-link-modern:hover {
            padding-left: 8px;
            color: #000;
        }

        .category-link-modern.active {
            font-weight: 600;
            padding-left: 8px;
        }

        .category-dot {
            width: 4px;
            height: 4px;
            background: #d4d4d4;
            border-radius: 50%;
            margin-right: 12px;
        }

        .active .category-dot {
            background: #262626;
        }

        .sidebar-sticky {
            position: sticky;
            top: 90px;
        }

        .border-primary {
            border-color: #0d4e6b !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const moreLinks = document.querySelectorAll('.show-more-link');
            moreLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const parent = this.closest('.description-text');
                    parent.querySelector('.desc-short').classList.add('d-none');
                    parent.querySelector('.desc-full').classList.remove('d-none');
                });
            });
        });
    </script>
@endsection
