<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouruseranimals extends Model
{
    use HasFactory;

    protected $fillable = [
        'image' ,
        'color' ,
        'breed' ,
        'location',
        'user_id' ,
        'animal_id' ,
        'AnimalType' 
    ];
}
