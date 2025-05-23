<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory; 

    protected $fillable = [
        'model',
        'year',
        'mileage',
        'availability_calendar',
        'pick_up_location',
        'rental_pricing',
        'image',
    ];

    protected $dates = ['deleted_at']; // Enables Soft Deletes
}
