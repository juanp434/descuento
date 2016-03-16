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
                'role'=>'admin',
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
                'role' => 'user',
                'status' => '1'
            ]);

         factory(App\Models\User::class)->create([
                'name' => 'luis',
                'last'=>'Lopez',
                'dni'=>'45666888',
                'adress'=>'alem 88',
                'cp'=>'7600',
                'email' => 'luis@admin.com',
                'password' => bcrypt('admin'),
                'role' => 'user',
                'status' => '1'
            ]);
         factory(App\Models\User::class)->create([
                'name' => 'lea',
                'last'=>'Lopez',
                'dni'=>'588992',
                'adress'=>'alem 889',
                'cp'=>'7600',
                'email' => 'lea@admin.com',
                'password' => bcrypt('admin'),
                'role' => 'shop',
                'status' => '1'
            ]);
         factory(App\Models\User::class)->create([
                'name' => 'nico',
                'last'=>'Lopez',
                'dni'=>'4892244',
                'adress'=>'alem 888',
                'cp'=>'7600',
                'email' => 'nico@admin.com',
                'password' => bcrypt('admin'),
                'role' => 'shop',
                'status' => '1'
            ]);
    }
}
