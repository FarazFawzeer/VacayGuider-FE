        <div class="row">
            @foreach ($vehicles as $vehicle)
                @php
                    $vehicleType = strtolower($vehicle->type); // e.g., car, bike, etc.
                    $imagePath = $vehicle->image ? 'storage/' . $vehicle->image : null;
                    $fallbackImage = 'assets/img/dummy/' . ($vehicleType ?: 'default') . '.jpg';
                @endphp
                <div class="col-12 col-sm-6 col-md-4 mb-4 vehicle-card" data-type="{{ $vehicle->type }}">
                    <div class="tour-box style2 th-ani"
                        style="cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border-radius: 16px; overflow: hidden; min-height: 320px; position: relative; background: #ffffff; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid rgba(0, 0, 0, 0.06); transform: translateY(0px);"
                        onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 40px rgba(0, 0, 0, 0.15)'"
                        onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.08)'">

                        <!-- Vehicle Image -->
                        <div class="tour-box_img global-img" style="position: relative; overflow: hidden;">
                            <img src="{{ $vehicle->image && file_exists(public_path($imagePath)) ? asset($imagePath) : asset($fallbackImage) }}"
                                alt="{{ $vehicle->name }}"
                                style="width: 100%; height: 220px; object-fit: cover; transition: transform 0.3s ease;"
                                onmouseover="this.style.transform='scale(1.05)'"
                                onmouseout="this.style.transform='scale(1)'">
                            <div
                                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.1) 100%);">
                            </div>

                            <!-- Price Label -->
                            <div
                                style="position: absolute; top: 12px; right: 12px; background: rgba(5, 150, 105, 0.95); color: white; padding: 8px 12px; border-radius: 20px; font-size: 14px; font-weight: 700; backdrop-filter: blur(10px); box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                                <span style="font-size: 16px;">$ {{ $vehicle->price }}</span>
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
                                style="display: inline-block; padding: 12px 24px; font-size: 14px; font-weight: 600; border-radius: 8px; background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white; text-decoration: none; border: none; transition: all 0.2s ease; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3); letter-spacing: 0.02em;"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59, 130, 246, 0.4)'"
                                onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 2px 8px rgba(59, 130, 246, 0.3)'">
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
