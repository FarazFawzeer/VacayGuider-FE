<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('package_bookings', function (Blueprint $table) {
            $table->string('pickup')->nullable()->after('end_date');
            $table->string('hotel_type')->nullable()->after('pickup');
            $table->string('travelling_from')->nullable()->after('hotel_type');
            $table->string('travel_reason')->nullable()->after('travelling_from');
            $table->string('theme')->nullable()->after('travel_reason');
        });
    }

    public function down(): void
    {
        Schema::table('package_bookings', function (Blueprint $table) {
            $table->dropColumn(['pickup', 'hotel_type', 'travelling_from', 'travel_reason', 'theme']);
        });
    }
};
