<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public $fillable = [
        'phone_number',
        'image',
        'birth_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
