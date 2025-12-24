<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class DoctorFactory extends Factory
{
    public function definition(){ return ['name'=>$this->faker->name(),'specialty'=>'Spesialis Mata','photo'=>null,'phone'=>$this->faker->phoneNumber(),'bio'=>$this->faker->paragraph()]; }
}
