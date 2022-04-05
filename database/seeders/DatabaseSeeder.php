<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CursoSeeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('images.avatars');
        Storage::makeDirectory('images.avatars');

        $this->call([
            RoleSeeder::class,
            CursoSeeder::class,
            UserSeeder::class,
            ]);
        // \App\Models\User::factory()->create();
    }
}
