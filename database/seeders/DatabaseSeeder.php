<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(50)->create();
        User::create([
            'email'=>'pro_admin@gmail.com',
            'name'=>"Buddhi Thapa",
            'password'=>bcrypt('123456')
        ]);
    }
}
