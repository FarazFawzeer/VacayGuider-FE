<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourPackageController;
use App\Http\Controllers\PackageBookingController;
use App\Http\Controllers\RentVehicleController;
use App\Http\Controllers\TransportaionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AirlineBookingController;

Route::get('/', function () {
    return view('frontend.pages.home');
});

Route::get('/about', function () {
    return view('frontend.pages.about');
});


Route::get('/tour-detail', function () {
    return view('frontend.pages.tour-detail');
});


Route::get('/rent', function () {
    return view('frontend.pages.rent');
});


Route::get('/transportation', function () {
    return view('frontend.pages.transportation');
});


Route::get('/airline', function () {
    return view('frontend.pages.airline');
});


Route::get('/contact', function () {
    return view('frontend.pages.contact');
});


Route::get('/rent-detail', function () {
    return view('frontend.pages.rent-detail');
});


Route::get('/inbound-tours', [TourPackageController::class, 'index'])->name('inbound.tours');
Route::get('/tour-detail/{id}', [TourPackageController::class, 'show'])->name('tour.details');
Route::get('/tours/filter', [TourPackageController::class, 'filter'])->name('filter.tours');
Route::get('/tours/by-category/{category}', [TourPackageController::class, 'getToursByCategory'])->name('tours.by-category');
Route::post('/custom-tour-request', [TourPackageController::class, 'storeCustomTourRequest'])->name('custom.tour.store');


Route::post('/package-booking', [PackageBookingController::class, 'store'])->name('package.booking.store');
Route::get('/payable-return', [PackageBookingController::class, 'paymentReturn']);

Route::get('/booking/payment-redirect', [PackageBookingController::class, 'redirectToPayment'])->name('booking.redirect');


Route::get('/storage/{path}', function ($path) {
    return redirect("/course/storage/app/public/{$path}");
})->where('path', '.*');




Route::get('/thank-you', function () {
    return view('frontend.pages.thank-you');
})->name('thankyou.page');


Route::get('/rent', [RentVehicleController::class, 'index'])->name('rent.vehicles');
Route::get('/rent-detail/{id}', [RentVehicleController::class, 'showDetails'])->name('rent.details');
Route::get('/filter-vehicles', [RentVehicleController::class, 'filterVehicles'])->name('filter.vehicles');
Route::post('/vehicle-booking', [RentVehicleController::class, 'store'])->name('vehicle.booking.store');
Route::post('/driving-permit-request', [RentVehicleController::class, 'rentStore'])->name('driving-permit.store');


Route::get('/transportation', [TransportaionController::class, 'index'])->name('transportation.vehicles');
Route::get('/transportation-detail/{id}', [TransportaionController::class, 'showDetails'])->name('transportation.details');
Route::post('/transportation-booking', [TransportaionController::class, 'store'])->name('transport.booking.store');
Route::get('/filter-transportation', [TransportaionController::class, 'filterVehicles'])->name('filter.transportation');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'aboutus'])->name('aboutus');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');


Route::post('/chatbot', [ChatBotController::class, 'handle'])->name('chatbot');
Route::post('/chatbot/save', [ChatbotController::class, 'store'])->name('chatbot.save');

Route::get('/blog', [TestimonialController::class, 'index'])->name('blog');

Route::get('/tours/load-more/{category}', [TourPackageController::class, 'loadMore'])->name('tour.load_more');




Route::post('/airline-booking', [AirlineBookingController::class, 'store'])->name('airline.booking.store');


use App\Models\PackageBooking;

Route::get('/payment-launch', function () {
    $booking = PackageBooking::findOrFail(session('booking_id'));

    return view('frontend.pages.payable-checkout', [
        'booking' => $booking,
        'merchantKey' => session('merchant_key'),
        'checkValue' => session('check_value'),
        'amount' => session('amount'),
        'invoiceId' => session('invoice_id'),
        'orderDescription' => session('order_description'),
        'returnUrl' => session('return_url'),
        'notifyUrl' => session('notify_url'),
        'logoUrl' => session('logo_url'),
        'currencyCode' => session('currency'),
    ]);
})->name('payment.launch');


// Route::post('/payable-notify', [PackageBookingController::class, 'handlePayableWebhook'])->name('checkout.webhook');
