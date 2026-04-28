<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddTrain extends Model
{
     use HasFactory;
    protected $fillable = [
        'train_name',
        'train_number',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
        'price',
        'classes',
    ];

    protected $casts = [
        'classes' => 'array',
    ];
}
