<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class ProductDatabaseSeeder extends Seeder
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

        Product::truncate();

        $faker = \Faker\Factory::create();


        $cakes = [
            ['name' => 'Citrom', 'category_id' => 1, '_10pcs_price' => 2300, '_20pcs_price' => 4500],
            ['name' => 'Dió', 'category_id' => 1, '_10pcs_price' => 2300, '_20pcs_price' => 4500],
            ['name' => 'Lúdláb', 'category_id' => 1, '_10pcs_price' => 2300, '_20pcs_price' => 4500],
            ['name' => 'Csokoládé', 'category_id' => 1, '_10pcs_price' => 2300, '_20pcs_price' => 4500],
            ['name' => 'Mogyoró', 'category_id' => 1, '_10pcs_price' => 2300, '_20pcs_price' => 4500],
            ['name' => 'Puncs', 'category_id' => 1, '_10pcs_price' => 2300, '_20pcs_price' => 4500],
            ['name' => 'karamell', 'category_id' => 1, '_10pcs_price' => 2300, '_20pcs_price' => 4500],
            ['name' => 'Vanília', 'category_id' => 1, '_10pcs_price' => 2300, '_20pcs_price' => 4500],


            ['name' => 'Dán túrótorta', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Csoki-Duett', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Tiramisu', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Oreo', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Joggi', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Charlottak', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Epres-mascarpone', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Banán csemege', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Mozart', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Choccissimo', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Cookies', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Barackos-Túró', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'BaraEpresckos-Túró', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Barackos', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Marilyn', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Áfonyás sajttorta', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Somlói', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Gesztenyés kísértés', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Horty', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Narancsos étcsoki', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Pisztáciás Gianduia', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Velencei álom', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Kastély', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Caramellino', 'category_id' => 2, '_10pcs_price' => 3000, '_20pcs_price' => 5800],


            ['name' => 'Dobos', 'category_id' => 3, '_10pcs_price' => 2800, '_20pcs_price' => 5500],
            ['name' => 'Sacher', 'category_id' => 3, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Eszterházy', 'category_id' => 3, '_10pcs_price' => 2500, '_20pcs_price' => 5000],

            ['name' => 'Oroszkrém', 'category_id' => 4, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Sacher', 'category_id' => 4, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Joghurtos', 'category_id' => 4, '_10pcs_price' => 3000, '_20pcs_price' => 5800],


            ['name' => 'Tejszínes csoki', 'category_id' => 5, '_10pcs_price' => 3000, '_20pcs_price' => 5800],
            ['name' => 'Tejszínes Erdei', 'category_id' => 5, '_10pcs_price' => 3000, '_20pcs_price' => 5800],


            ['name' => '2011: Kecskeméti barackos kölestorta', 'category_id' => 6, '_10pcs_price' => 3900, '_20pcs_price' => 7400],
            ['name' => '2012: Szabolcsi almás máktorta', 'category_id' => 6, '_10pcs_price' => 3900, '_20pcs_price' => 7400],
            ['name' => '2014: Somlói revolúció', 'category_id' => 6, '_10pcs_price' => 3900, '_20pcs_price' => 7400],
            ['name' => '2015: Milotai mázes grillázstorta', 'category_id' => 6, '_10pcs_price' => 3900, '_20pcs_price' => 7400],
            ['name' => '2015: Pálinkás karamell', 'category_id' => 6, '_10pcs_price' => 3900, '_20pcs_price' => 7400],
            ['name' => '2016: Őrség zöld aranya', 'category_id' => 6, '_10pcs_price' => 3900, '_20pcs_price' => 7400],


            ['name' => 'Dió', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Bounty', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Parad-Ice', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Oroszkrém', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Bailey\'s', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Túró Rudi', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Eper', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Dolce Latte', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Fanta', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Fehércsoki', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Feketeerdő', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Gesztenye', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Havanna', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Csoki', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Joghurtos Cherry', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Joghurtos Eper', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Joghurtos Szeder', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Joghurtos Málna', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Joghurtos Erdei', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Madártej', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Nosztalgia krémes', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Rigó Julcsi', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Rigó Jancsi', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Málna', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Szeder', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Erdei gyümölcs', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],
            ['name' => 'Cherry Mánia', 'category_id' => 7, '_10pcs_price' => 2500, '_20pcs_price' => 5000],


            ['name' => '1-es íz', 'category_id' => 8, '_10pcs_price' => 2500, '_20pcs_price' => 5000, 'type' => 1],
            ['name' => '2-es íz', 'category_id' => 8, '_10pcs_price' => 2500, '_20pcs_price' => 5000, 'type' => 1],
            ['name' => '3-as íz', 'category_id' => 8, '_10pcs_price' => 2500, '_20pcs_price' => 5000, 'type' => 1],


            ['name' => 'Lampone torta', 'category_id' => 9, '_10pcs_price' => 3600, '_20pcs_price' => 4200],


        ];

        for ($i = 0; $i < count($cakes); $i++) {

           // dd($cakes[$i]['_20pcs_price']);

            if (isset($cakes[$i]['type'])) {
                $product = Product::create([
                    'name' => $cakes[$i]['name'],
                    'image' => $faker->imageUrl(200, 200, 'food', true),
                    'description' => $faker->text(),
                    '_10pcs_price' => $cakes[$i]['_10pcs_price'],
                    '_20pcs_price' => $cakes[$i]['_20pcs_price'],
                    'type' => $cakes[$i]['type']
                ]);
            } else {
                $product = Product::create([
                    'name' => $cakes[$i]['name'],
                    'image' => $faker->imageUrl(640, 640, 'food', true),
                    'description' => $faker->text(),
                    '_10pcs_price' => $cakes[$i]['_10pcs_price'],
                    '_20pcs_price' => $cakes[$i]['_20pcs_price'],
                ]);
            }

            $product->categories()->sync([$cakes[$i]['category_id']]);


        }

    }
}
