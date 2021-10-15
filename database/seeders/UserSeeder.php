<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name' => 'Kevin Tanuwijaya',
            'email' => 'kevin@binus.ac.id',
            'password' => bcrypt('asdasdasd'),
            'profile_picture' => 'pp.jpg'
        ]);

        User::create([
            'name' => 'Michael Himawang',
            'email' => 'michael@binus.ac.id',
            'password' => bcrypt('asdasdasd'),
            'profile_picture' => 'main.png'
        ]);

        User::create([
            'name' => 'Marcellino',
            'email' => 'marcell@binus.ac.id',
            'password' => bcrypt('asdasdasd'),
            'profile_picture' => 'xiao.png'
        ]);

        User::create([
            'name' => 'Albert Huang',
            'email' => 'albert@binus.ac.id',
            'password' => bcrypt('asdasdasd'),
            'profile_picture' => 'chubby.jpg'
        ]);

        User::create([
            'name' => 'Glenn Jordan',
            'email' => 'glenn@binus.ac.id',
            'password' => bcrypt('asdasdasd'),
            'profile_picture' => 'dumpling.jpg'
        ]);

        

    }
}
