<?php

namespace Modules\ProductWithUnit\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ProductWithUnit\Entities\Unit;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Unit::truncate();

        Unit::create([
            'id' => 1,
            'unit' => 'Kg',
            'order_unit' => 'dkg',
            'change_number' => 10
        ]);


        Unit::create([
            'id' => 2,
            'unit' => 'db',
            'order_unit' => 'db',
            'change_number' => 1
        ]);


    }
}
