<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageBooking extends Model
{
    use HasFactory;

    protected $table = 'package_bookings';

    protected $fillable = [
        'full_name',
        'country',
        'email',
        'phone',
        'whatsapp',
        'adults',
        'children',
        'infants',
        'package_id',
        'start_date',
        'end_date',
        'message',
    ];

    /**
     * Get the package associated with this booking.
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
