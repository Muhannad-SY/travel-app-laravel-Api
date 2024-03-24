<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourReviwe extends Model
{
    use HasFactory;

    public $fillable = [
        'evaluation',
        'rating',
        'tour_id'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
