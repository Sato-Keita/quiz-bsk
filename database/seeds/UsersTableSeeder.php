<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
      DB::table('users')->insert(
        [
            [
                'name' => 'admin',
                'email' => 'keita.akanuma0716@gmail.com',
                //'loginid' => 'maple_nobu',
                'password' => Hash::make('admin'),
                'page_show' => true,
            ]
        ]);

      factory(App\User::class, 100)->create();
    }
}