<div class="col-md-3 mb-4">

    <a href="{{ route('tour.details', $package->id) }}" class="tour-box-link"
        style="text-decoration: none; color: inherit;">
        <div class="tour-box shadow style2 th-ani"
            style="cursor: pointer; transition: transform 0.3s ease; border-radius: 10px; overflow: hidden; min-height: 320px; position: relative;">

            @php
                $imagePath = $package->picture ? 'storage/' . $package->picture : null;
                $fallbackImage = asset('assets/img/tour/yala.jpg');
                $imageUrl = $imagePath && file_exists(public_path($imagePath)) ? asset($imagePath) : $fallbackImage;
            @endphp

            <div class="tour-box_img global-img" style="position: relative;">
                <img src="{{ $imageUrl }}" alt="{{ $package->place ?? 'Tour Image' }}"
                    style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
            </div>

            <div class="tour-content" style="padding: 15px;">
                <div class="tour-header d-flex align-items-center justify-content-between"
                    style="margin-top: -12px; margin-bottom: -8px;">
                    <p class="tour-country m-0 d-flex align-items-center">Sri Lanka</p>
                    <div class="tour-rating d-flex align-items-center" style="margin-top: 13px;">
                        <i class="fas fa-star text-warning"></i>
                        <span class="ms-1"
                            style="font-weight: 600; font-size: 14px; color: #333;">{{ $package->ratings }}</span>
                    </div>
                </div>

                <h3 class="box-title mt-2" style="font-size: 16px; font-weight: bold; margin-bottom: 12px;">
                    {{ $package->heading }}
                </h3>

                <p class="text-muted small mt-1 mb-1"
                    style="line-height: 1.4; max-height: 40px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                    {{ Str::limit($package->description, 90) }}
                </p>

                <a href="{{ route('tour.details', $package->id) }}" class="text-primary small"
                    style="font-weight: 500;">View More</a>
            </div>

            <div class="d-flex align-items-right"
                style="justify-content: right; margin-bottom: 5px; padding-right: 15px; padding-bottom: 15px;">

                <span class="text-dark " style="font-weight: bold;">
                    {{ $package->days }} Days,
                    {{ $package->nights }} Nights
                </span>
            </div>
        </div>
    </a>

    
</div>
