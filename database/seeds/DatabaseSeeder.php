<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(PromotionTableSeeder::class);
        $this->call(VoucherTableSeeder::class);
        
    }
}
