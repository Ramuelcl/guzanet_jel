<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\cursos\Curso;

class CursoSeeder extends Seeder
{
    public function __construct()
    {
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::factory(50)->create();
    }
}
