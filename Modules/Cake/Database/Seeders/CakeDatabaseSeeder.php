<?php

namespace Modules\Cake\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Cake\Entities\Cake;

class CakeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        /*
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Cake::create([
                'name' => $faker->name,
                'image' => $faker->image(),
                'description' => $faker->text,
                'category_id' => $faker->numberBetween(1, 10),
            ]);
        }

        */

    }
}
