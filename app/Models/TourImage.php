<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
    use HasFactory;

    // public $fillable = [
    //     'image',
    //     'tour_id'
    // ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    
}
