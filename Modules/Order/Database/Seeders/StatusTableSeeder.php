<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Status;

class StatusTableSeederTableSeeder extends Seeder
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

        Status::create([
            'name' => 'Fogadott'
        ]);

        Status::create([
            'name' => 'Feldolgozás alatt'
        ]);

        Status::create([
            'name' => 'Feldolgozva'
        ]);

        Status::create([
            'name' => 'Teljesítve'
        ]);


        Status::create([
            'name' => 'Lemondva'
        ]);


    }
}
