<?php

namespace Modules\ProductWithUnit\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ProductWithUnit\Entities\RegularProduct;

class RegularProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        RegularProduct::truncate();

        RegularProduct::create([
            'id' => 1,
            'name' => 'Tea sütemények',
            'description' => null,
            'price' => 2800,
            'unit_id' => 1
        ]);


        RegularProduct::create([
            'id' => 2,
            'name' => 'Vaníliás kifli',
            'description' => null,
            'price' => 2700,
            'unit_id' => 1
        ]);


        RegularProduct::create([
            'id' => 3,
            'name' => 'Mini Isler',
            'description' => null,
            'price' => 2800,
            'unit_id' => 1
        ]);

        RegularProduct::create([
            'id' => 4,
            'name' => 'Mini Linzer',
            'description' => null,
            'price' => 2500,
            'unit_id' => 1
        ]);

        RegularProduct::create([
            'id' => 5,
            'name' => 'Banán csemege 2-3-ba vágva',
            'description' => null,
            'price' => 320,
            'unit_id' => 2
        ]);

        RegularProduct::create([
            'id' => 6,
            'name' => 'Túrós pogácsa',
            'description' => null,
            'price' => 2800,
            'unit_id' => 1
        ]);

        RegularProduct::create([
            'id' => 7,
            'name' => 'Mini túrós pogácsa',
            'description' => null,
            'price' => 3300,
            'unit_id' => 1
        ]);

        RegularProduct::create([
            'id' => 8,
            'name' => 'Sajtos masni',
            'description' => null,
            'price' => 2100,
            'unit_id' => 1
        ]);

        RegularProduct::create([
            'id' => 9,
            'name' => 'Sajtos pogácsa',
            'description' => null,
            'price' => 2100,
            'unit_id' => 1
        ]);

        RegularProduct::create([
            'id' => 10,
            'name' => 'Mini sajtos pogi',
            'description' => null,
            'price' => 2300,
            'unit_id' => 1
        ]);


        RegularProduct::create([
            'id' => 11,
            'name' => 'Tepertős pogácsa',
            'description' => null,
            'price' => 2600,
            'unit_id' => 1
        ]);


        RegularProduct::create([
            'id' => 12,
            'name' => 'Hasék',
            'description' => 'hagymás, sonkás, gombás',
            'price' => 2600,
            'unit_id' => 1
        ]);


        RegularProduct::create([
            'id' => 13,
            'name' => 'Vegys vágott',
            'description' => 'zöldfűszeres, köményes, szezámmagos, sajtos',
            'price' => 2100,
            'unit_id' => 1
        ]);


    }
}
