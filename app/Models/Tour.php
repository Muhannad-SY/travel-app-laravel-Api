<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    // public $fillable = [
    //     'title',
    //     'description',
    //     'country',
    //     'city',
    //     'counrty',
    //     'book',
    //     'state',
    //     'category_id'
    // ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(TourImage::class);
    }


    public function reviwes()
    {
        return $this->hasMany(TourReviwe::class);
    }
}


