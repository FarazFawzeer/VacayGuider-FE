<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourPackageController;
use App\Http\Controllers\PackageBookingController;
use App\Http\Controllers\RentVehicleController;
use App\Http\Controllers\TransportaionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

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

Route::post('/package-booking', [PackageBookingController::class, 'store'])->name('package.booking.store');




Route::get('/rent', [RentVehicleController::class, 'index'])->name('rent.vehicles');
Route::get('/rent-detail/{id}', [RentVehicleController::class, 'showDetails'])->name('rent.details');
Route::get('/filter-vehicles', [RentVehicleController::class, 'filterVehicles'])->name('filter.vehicles');
Route::post('/vehicle-booking', [RentVehicleController::class, 'store'])->name('vehicle.booking.store');


Route::get('/transportation', [TransportaionController::class, 'index'])->name('transportation.vehicles');
Route::get('/transportation-detail/{id}', [TransportaionController::class, 'showDetails'])->name('transportation.details');
Route::post('/transportation-booking', [TransportaionController::class, 'store'])->name('transport.booking.store');
Route::get('/filter-transportation', [TransportaionController::class, 'filterVehicles'])->name('filter.transportation');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

