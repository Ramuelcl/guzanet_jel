<?php

namespace Database\Factories\cursos;

use App\Models\cursos\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cursos\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence(),
            'description'=>$this->faker->paragraph(),
            'category'=>$this->faker->randomElement(['uno','dos','tres','cuatro','cinco'])
        ];
    }
}
