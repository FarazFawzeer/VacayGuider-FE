<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    protected $fillable = [
        'itinerary_id', 'highlight_places', 'images', 'description'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function itinerary()
    {
        return $this->belongsTo(DetailItinerary::class, 'itinerary_id');
    }
}
