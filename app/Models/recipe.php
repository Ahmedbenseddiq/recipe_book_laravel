<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    use HasFactory;
    protected $table = 'recipe';
    protected $fillable = [
        'recipe_name',
        'description',
        'ingredients',
        'image'
    ];
}
