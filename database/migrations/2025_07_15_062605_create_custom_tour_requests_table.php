<?php

// database/migrations/xxxx_xx_xx_create_custom_tour_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('custom_tour_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('message')->nullable();
            $table->string('preferred_dates')->nullable();
            $table->string('travelers')->nullable(); // storing as string to allow "2 Adults, 1 Child"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_tour_requests');
    }
};
