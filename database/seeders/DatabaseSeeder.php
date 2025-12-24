<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Service; use App\Models\Article; use App\Models\Doctor; use App\Models\Schedule;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Service::factory()->count(6)->create();
        \App\Models\Article::factory()->count(6)->create();
        \App\Models\Doctor::factory()->count(4)->create()->each(function($doc){
            \App\Models\Schedule::factory()->count(3)->create(['doctor_id'=>$doc->id]);
        });
    }
}
