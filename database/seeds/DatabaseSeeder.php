<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(UserTableSeeder::class);


        User::create([
            'name' => 'admin',
            'email' => 'admin@lan.email',
            'password' => bcrypt('ibolya1'),
        ]);
    }
}
