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
                'password' => bcrypt('admin'),
                'status' => '1',
                'image' => 'images/shops/1.gif'
                
            ]);
        factory(App\Models\shop::class)->create([
                'name' => 'Pepe',
                'email' => 'comercio2@admin.com',
                'password' => bcrypt('admin'),
                'status' => '1',
                'image' => 'images/shops/2.gif'
                
            ]);
    }
}
