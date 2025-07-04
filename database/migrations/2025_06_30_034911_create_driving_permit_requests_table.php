<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('driving_permit_requests', function (Blueprint $table) {
        $table->id();
        $table->string('guest_name');
        $table->string('email');
        $table->string('license_no');
        $table->string('whatsapp');
        $table->string('license_front');
        $table->string('license_back');
        $table->string('selfie');
        $table->string('collection_method');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_permit_requests');
    }
};
