<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SNSTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
      DB::table('sns')->insert(
        [
            [
              'sns_name' => 'twitter',
              'sns_image' => 'twitter_image'
            ],
            [
              'sns_name' => 'facebook',
              'sns_image' => 'facebook_image'
            ],
            [
              'sns_name' => 'youtube',
              'sns_image' => 'youtube_image'
            ],
            [
              'sns_name' => 'instagram',
              'sns_image' => 'instagram_image'
            ]
        ]);

      //factory(App\User::class, 100)->create();
    }
}