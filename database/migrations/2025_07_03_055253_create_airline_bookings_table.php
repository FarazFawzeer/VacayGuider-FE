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
    Schema::create('airline_bookings', function (Blueprint $table) {
        $table->id();
        $table->string('full_name');
        $table->string('email');
        $table->string('phone');
        $table->string('whatsapp');
        $table->string('country');
        $table->string('trip_type');
        $table->string('airline')->nullable();
        $table->string('from');
        $table->string('to');
        $table->date('departure_date');
        $table->date('return_date')->nullable();
        $table->integer('passengers')->default(1);
        $table->text('message')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airline_bookings');
    }
};
