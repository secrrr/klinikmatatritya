<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ArticleFactory extends Factory
{
    public function definition(){ $title = $this->faker->sentence(6); return ['title'=>$title,'slug'=>Str::slug($title),'excerpt'=>$this->faker->paragraph(),'content'=>$this->faker->paragraphs(4,true),'published_at'=>$this->faker->dateTimeThisYear()]; }
}
