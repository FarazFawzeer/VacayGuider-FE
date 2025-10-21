<div class="row" id="package-container">
    @forelse($packages as $index => $package)
        <div class="col-md-3 mb-4 package-card {{ $index >= 8 ? 'd-none extra-package' : '' }}">
            <a href="{{ route('tour.details', $package->id) }}" class="tour-box-link"
                style="text-decoration: none; color: inherit;">
                <div class="tour-box shadow style2 th-ani"
                    style="cursor: pointer; transition: transform 0.3s ease; border-radius: 10px; overflow: hidden; min-height: 320px; position: relative;">

                    @php
                        $backendBaseUrl = config('app.backend_url');
                        $imageUrl = $package->picture
                            ? $backendBaseUrl . '/storage/' . ltrim($package->picture, '/')
                            : asset('images/no-image.jpg');
                    @endphp

                    <div class="tour-box_img global-img" style="position: relative;">
                        <img src="{{ $imageUrl }}" alt="{{ $package->place ?? 'Tour Image' }}"
                            style="width: 100%; height: 200px; object-fit: cover;">
                    </div>

                    <div class="tour-content" style="padding: 15px;">
                        <div class="tour-header d-flex align-items-center justify-content-between"
                            style="margin-top: -12px; margin-bottom: -8px;">
                            <p class="tour-country m-0 d-flex align-items-center" style="color: #3596d3;">Sri Lanka</p>
                            <div class="tour-rating d-flex align-items-center px-2 rounded"
                                style="margin-top: 13px; background: linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);">
                                <i class="fas fa-star text-white fa-sm" style="font-size: 10px;"></i>
                                <span class="" style="font-weight: 700; font-size: 12px; color: #fff;">
                                    {{ round($package->ratings) }}
                                </span>
                            </div>
                        </div>

                        <h3 class="box-title mt-2" style="font-size: 16px; font-weight: bold; margin-bottom: 12px;">
                            {{ $package->heading }}
                        </h3>

                                       <p class="text-muted small mt-1 mb-1"
                style="line-height: 1.4; max-height: 40px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                {{ Str::limit($package->description, 90) }}
                </p>

                <a href="{{ route('tour.details', $package->id) }}" class="small"
                   style="font-weight: 500; color:#3596d3; font-size: 12px; text-decoration: none;">View More</a>
                   
                        <div class="d-flex align-items-center mt-3" style="color: black;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="black" width="18" height="18"
                                class="me-2" viewBox="0 0 24 24">
                                <path
                                    d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3a.75.75 0 0 1 1.5 0v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z">
                                </path>
                            </svg>

                            <p class="text-sm m-0 text-dark" style="font-size: 14px; font-weight: 500;">
                                {{ $package->days }} Days
                                @if ($package->nights > 0)
                                    {{ $package->nights }} Nights
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="text-end px-3 pb-3">
                        <p class="text-lg m-0 text-dark" style="font-size: 24px; font-weight: 600;">
                            USD ${{ number_format($package->price, 0) }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-12 text-center">No matching tours found.</div>
    @endforelse
</div>

@if ($packages->count() > 8)
    <div class="text-center mt-3">
        <button id="show-more-btn" class="btn btn-primary px-4 py-2" style="background-color: #0d4e6b; border: none;">
            Show More
        </button>
        <button id="hide-btn" class="btn btn-secondary px-4 py-2"
            style="background-color: #6c757d; border: none; display: none;">
            Hide
        </button>
    </div>
@endif


<script>
    $(document).ready(function() {
        $(document).on('click', '#show-more-btn', function() {
            $('.extra-package').removeClass('d-none');
            $(this).hide();
        });
    });
</script>
