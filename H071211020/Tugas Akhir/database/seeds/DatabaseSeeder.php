<?php

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
        // $this->call(UserSeeder::class);
        \App\User::create([
            'nama' => 'admin',
            'username' => 'admin123',
            'nrp' => 'admin123',
            'password' => bcrypt('admin123'),
            'role' => 2,
            'foto' => 'default.jpg',
        ]);

    }
}
