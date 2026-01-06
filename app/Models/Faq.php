<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'category',
        'is_active',
    ];

    public const CATEGORIES = [
        'layanan' => 'Layanan & Pemeriksaan Mata',
        'pembiayaan' => 'Pembiayaan & Asuransi',
        'tindakan' => 'Tindakan Medis & Operasi',
        'reservasi' => 'Reservasi & Jadwal',
    ];
}
