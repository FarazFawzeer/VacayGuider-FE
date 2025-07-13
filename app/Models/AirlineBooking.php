<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirlineBooking extends Model
{
    //

    protected $fillable = [
    'full_name',
    'email',
    'phone',
    'whatsapp',
    'country',
    'trip_type',
    'airline',
    'from',
    'to',
    'departure_date',
    'return_date',
    'passengers',
    'message',
];
}
