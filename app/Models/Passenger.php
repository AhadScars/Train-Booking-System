<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'mobile',
        'train_id',
        'class',
        'price',
        'user_id',
    ];

    public function train()
    {
        return $this->belongsTo(AddTrain::class, 'train_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}