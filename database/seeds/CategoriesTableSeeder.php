<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CategoriesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
      DB::table('categories')->insert(
        [
            [
              'category_name' => 'SF',
            ],
            [
              'category_name' => 'サスペンス',
            ],
            [
              'category_name' => 'アクション',
            ],
            [
              'category_name' => 'ファンタジー',
            ],
            [
              'category_name' => 'ホラー',
            ],
            [
              'category_name' => '恋愛',
            ]
        ]);

      //factory(App\User::class, 100)->create();
    }
}