<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleDetail extends Model
{
    protected $table = 'vehicle_details';

    protected $fillable = [
        'make',
        'model',
        'condition',
        'seats',
        'max_seating_capacity',
        'luggage_space',
        'air_conditioned',
        'helmet',
        'first_aid_kit',
        'transmission',
        'milage',
        'price',
        'label',
        'name',
        'availability',
        'vehicle_image',
        'type',
    ];

    protected $casts = [
        'air_conditioned' => 'boolean',
        'helmet' => 'boolean',
        'first_aid_kit' => 'boolean',
        'price' => 'decimal:2',
    ];
}
