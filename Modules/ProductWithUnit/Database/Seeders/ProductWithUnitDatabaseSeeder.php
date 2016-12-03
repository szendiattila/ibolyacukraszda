<?php

namespace Modules\ProductWithUnit\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductWithUnitDatabaseSeeder extends Seeder
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

        $this->call(UnitTableSeeder::class);
        $this->call(RegularProductTableSeeder::class);
    }
}
