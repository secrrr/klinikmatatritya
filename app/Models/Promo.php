<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'price',
        'start_date',
        'end_date',
    ];
}
