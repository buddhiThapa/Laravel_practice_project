<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $role = Role::create(['name' => 'Admin']);
        // $role->syncPermissions(1);

        User::create([
            'email'=>'pro_admin@gmail.com',
            'name'=>"Buddhi Thapa",
            'password'=>Hash::make('123456'),
            // 'role'=>1
        ]);

        User::factory()->count(50)->create();

        // Role::create(['name'=>'Admin']);
        // Role::create(['name'=>'User']);
    }
}
