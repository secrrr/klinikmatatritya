<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewSetting extends Model
{
    protected $fillable = ['sort_order', 'limit', 'min_rating'];
}
