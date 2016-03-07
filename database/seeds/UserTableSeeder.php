<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Models\User::class)->create([
                'name' => 'Juan',
                'last'=>'Lopez',
                'dni'=>'45666888',
                'adress'=>'alem 778',
                'cp'=>'7600',
                'email' => 'Juan@admin.com',
                'password' => bcrypt('admin'),
                'admin'=>'1',
                'status'=>'1'
            ]);

         factory(App\Models\User::class)->create([
                'name' => 'pepe',
                'last'=>'Lopez',
                'dni'=>'45666888',
                'adress'=>'alem 88',
                'cp'=>'7600',
                'email' => 'pepe@admin.com',
                'password' => bcrypt('admin'),
                'admin' => '0',
                'status' => '1'
            ]);
    }
}
