        <div class="row">
            @foreach ($vehicles as $vehicle)
                @php
                    $backendBaseUrl = config('app.backend_url');
                    $vehicleImageUrl = $vehicle->vehicle_image
                        ? $backendBaseUrl . '/storage/' . ltrim($vehicle->vehicle_image, '/')
                        : asset('assets/img/bike3.png');
                @endphp

                <div class="col-12 col-sm-6 col-md-4 mb-4 vehicle-card" data-type="{{ $vehicle->type }}">
                    <div class="tour-box style2 th-ani"
                        style=" border-radius: 16px; overflow: hidden; min-height: 320px; position: relative; background: #ffffff; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid rgba(0, 0, 0, 0.06); "
                        >

                        <!-- Vehicle Image -->
                        <div class="tour-box_img " style="position: relative; overflow: hidden;">
                            <img src="{{ $vehicleImageUrl }}" alt="{{ $vehicle->name }}"
                                style="width: 100%; height: 300px; object-fit: cover;"
                               
                               >
                            <div
                                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.1) 100%);">
                            </div>

                            <!-- Price Label -->
                            <div
                                style="position: absolute; top: 12px; right: 12px; background: #96c93e; color: white; padding: 8px 12px; border-radius: 10px; font-size: 14px; font-weight: 700; backdrop-filter: blur(10px); box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                                <span style="font-size: 16px;"> USD ${{ number_format($vehicle->price, 0) }}</span>
                                <span style="font-size: 12px; opacity: 0.9;">/ day</span>
                            </div>
                        </div>

                        <!-- Vehicle Content -->
                        <div class="tour-content" style="padding: 20px 18px; text-align: center;">
                            <h3 class="box-title"
                                style="font-size: 20px; font-weight: 700; margin-bottom: 5px; color: #1a1a1a; letter-spacing: -0.02em; line-height: 1.3;">
                                {{ $vehicle->name }}
                            </h3>

                            <a href="{{ route('rent.details', $vehicle->id) }}" class="btn btn-primary btn-sm"
                                style="display: inline-block; padding: 12px 24px; font-size: 14px; font-weight: 600; border-radius: 8px; background:linear-gradient(135deg, #0d4e6b 0%, #0a3d52 100%);
 color: white; text-decoration: none; border: none; transition: all 0.2s ease; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3); letter-spacing: 0.02em;"
                       >
                                Continue Booking
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="row justify-content-center mt-4">
                <div class="col-auto">
                    {{ $vehicles->links() }}
                </div>
            </div>
        </div>
