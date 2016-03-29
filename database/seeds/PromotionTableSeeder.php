<?php

use Illuminate\Database\Seeder;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Models\promotion::class)->create([
                'name' => 'Adidas',
                'description' => 'Descuento Adidas',
                'price' => '100',
                'final' => '80',
                'image' => '/images/adidas.jpg',
                'expDate' => '2016-04-15',
                'shop_id' => '1',
                'status' => '1'
            ]);
       factory(App\Models\promotion::class)->create([
                'name' => 'Nike',
                'description' => 'Descuento Nike',
                'price' => '100',
                'final' => '77',
                'image' => '/images/nike.jpg',
                'expDate' => '2016-08-15',
                'shop_id' => '1',
                'status' => '1'
            ]);
       factory(App\Models\promotion::class)->create([
                'name' => 'Puma',
                'description' => 'Descuento Puma',
                'price' => '140',
                'final' => '70',
                'image' => '/images/puma.gif',
                'expDate' => '2016-10-15',
                'shop_id' => '1',
                'status' => '1'
            ]);
       factory(App\Models\promotion::class)->create([
                'name' => 'Babolat',
                'description' => 'Descuento Babolat',
                'price' => '200',
                'final' => '120',
                'image' => '/images/Babolat.jpg',
                'expDate' => '2016-07-15',
                'shop_id' => '2',
                'status' => '1'
            ]);
       factory(App\Models\promotion::class)->create([
                'name' => 'McDonalds',
                'description' => 'Descuento McDonalds',
                'price' => '100',
                'final' => '60',
                'image' => '/images/mcdonalds.jpg',
                'expDate' => '2016-06-15',
                'shop_id' => '2',
                'status' => '1'
            ]);
       factory(App\Models\promotion::class)->create([
                'name' => 'Reebok',
                'description' => 'Descuento Reebok',
                'price' => '250',
                'final' => '130',
                'image' => '/images/reebok.jpg',
                'expDate' => '2016-05-15',
                'shop_id' => '2',
                'status' => '1'
            ]);
       
    }
}
