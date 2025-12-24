<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'location',
        'description',
        'short_description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
