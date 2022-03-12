<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// agregamos
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// Spatie
// use Spatie\Permission\PermissionRegistrar;
// use Spatie\Permission\Models\model_has_roles;
// use Spatie\Permission\Models\model_has_permissions;

class UserSeeder extends Seeder
{
    public function __construct()
    {
        // $name='Super Admin';
        // User::create([
        //     'name' => $name,
        //     'email' => 'admin@email.com',
        //     // 'avatar'=>$this->faker->image('public/storage/images/avatars', $width = 640, $height = 480, null, false),
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('0Admin'), //bcrypt('0Admin')
        //     'remember_token' => Str::random(10)

        // ])
        // //->assignRole('super-admin')
        // ;
        // All current roles will be removed from the user and replaced by the array given
        // $user->syncRoles(['super-admin']);
        // dd('creando super admin');

        // $user->assignRole('super-admin');
        // $user->givePermissionTo(Permission::all());
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(49)->create();
    }
}
