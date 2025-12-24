<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class ScheduleFactory extends Factory
{
    public function definition(){ $days = ['Monday','Tuesday','Wednesday','Thursday','Friday']; return ['day'=>$this->faker->randomElement($days),'start_time'=>'09:00:00','end_time'=>'12:00:00']; }
}
