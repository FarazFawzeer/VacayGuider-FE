<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'heading', 'options', 'tour_ref_no', 'description', 'location', 'picture','country_name'
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function tourSummaries()
    {
        return $this->hasMany(TourSummary::class);
    }

    public function detailItineraries()
    {
        return $this->hasMany(DetailItinerary::class);
    }
}
