<?php

use Illuminate\Database\Seeder;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\shop::class)->create([
                'name' => 'Juan',
                'email' => 'comercio1@admin.com',
                'status' => '1',
                'user_id' => '4',
                'image' => 'images/shops/1.gif'
                
            ]);
        factory(App\Models\shop::class)->create([
                'name' => 'Pepe',
                'email' => 'comercio2@admin.com',
                'status' => '1',
                'user_id' => '5',
                'image' => 'images/shops/2.gif'
                
            ]);
    }
}
