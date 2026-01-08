<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'title',
        'description',
        'background',
        'button_text',
        'button_link',
        'is_active'
    ];
}
