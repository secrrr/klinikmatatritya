<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Analytics;

class AnalyticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
{
    $pages = ['Home', 'Services', 'Articles', 'Doctors'];
    foreach ($pages as $page) {
        for ($i = 0; $i < 7; $i++) {
            Analytics::create([
                'page' => $page,
                'visitors' => rand(100, 700),
                'page_views' => rand(200, 900),
                'date' => now()->subDays(6 - $i),
            ]);
        }
    }
}
}
