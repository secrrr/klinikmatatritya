<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hero::create([
            'title' => "Lihat Dunia dengan\nLebih Jelas",
            'description' => 'Kami percaya setiap orang berhak melihat dunia dengan pandangan yang jernih.',
            'button_text' => 'Selengkapnya',
            'button_link' => 'https://google.com',
            'is_active' => true
        ]);
    }
}
