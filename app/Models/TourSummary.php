<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourSummary extends Model
{
    protected $fillable = [
        'package_id', 'day', 'city', 'theme', 'key_attributes', 'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
