<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class CategoryDatabaseSeeder extends Seeder
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

        Category::truncate();

        Category::create([
            'id' => 1,
            'name' => 'Standard főzött krémes torták',
            'description_above' => null,
            'description_below' => null,
        ]);


        Category::create([
            'id' => 2,
            'name' => 'Torta specialitásaink',
            'description_above' => null,
            'description_below' => null,
        ]);


        Category::create([
            'id' => 3,
            'name' => 'Tradícionális torták',
            'description_above' => null,
            'description_below' => 'Forma torták bővebb választéka az albumban megtekinthető',
        ]);


        Category::create([
            'id' => 4,
            'name' => 'Gluténmentes torták',
            'description_above' => 'Kukoricalisztből készülnek',
            'description_below' => null,
        ]);


        Category::create([
            'id' => 5,
            'name' => 'Csökkentett cukortartalom',
            'description_above' => 'Glukonon-nal édesített',
            'description_below' => 'Laktózmentes tortát egyáltalán nem készítünk!',
        ]);


        Category::create([
            'id' => 6,
            'name' => 'Ország torták',
            'description_above' => null,
            'description_below' => null,
        ]);


        Category::create([
            'id' => 7,
            'name' => 'Különleges tejszínes torták',
            'description_above' => null,
            'description_below' => null,
        ]);


        Category::create([
            'id' => 8,
            'name' => 'Fagylalt torta',
            'description_above' => 'Pultból választható x ízből',
            'description_below' => null,
            'type' => 1
        ]);

        Category::create([
            'id' => 9,
            'name' => 'Lampone torta',
            'description_above' => null,
            'description_below' => null
        ]);



    }
}
