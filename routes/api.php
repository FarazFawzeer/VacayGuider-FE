<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayableController;

Route::post('/payable-notify', [PayableController::class, 'handlePayableWebhook']);
