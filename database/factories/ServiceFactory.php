<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ServiceFactory extends Factory
{
    public function definition(){
        $title = $this->faker->sentence(3);
        return [ 'title'=>$title, 'slug'=>Str::slug($title), 'excerpt'=>$this->faker->paragraph(), 'content'=>$this->faker->paragraphs(3,true) ];
    }
}
