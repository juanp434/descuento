<?php

use Illuminate\Database\Seeder;

class VoucherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\voucher::class)->create([
                'user_id' => '2',
                'promotion_id'=>'1',
                'denunciado'=>'0',
                'descargo'=>'',
                
            ]);

         factory(App\Models\voucher::class)->create([
                'user_id' => '2',
                'promotion_id'=>'3',
                'denunciado'=>'0',
                'descargo'=>'',
                
            ]);
         factory(App\Models\voucher::class)->create([
                'user_id' => '3',
                'promotion_id'=>'2',
                'denunciado'=>'0',
                'descargo'=>'',
                
            ]);
    }
}
