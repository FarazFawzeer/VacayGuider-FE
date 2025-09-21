<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageBookingController;

Route::post('/payable-notify', [PackageBookingController::class, 'handlePayableWebhook']);
