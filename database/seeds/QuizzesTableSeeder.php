<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class QuizzesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
      DB::table('quizzes')->insert(
        [
          [
              'main_image' => 'question1-image',
              'question' => 'question1 : *********',
              'answer' => 'question1 : answer',
              'explain' => 'question1 : explain',
          ],
          [
            'main_image' => 'question2-image',
            'question' => 'question2 : *********',
            'answer' => 'question2 : answer',
            'explain' => 'question2 : explain',
          ],
          [
            'main_image' => 'question3-image',
            'question' => 'question3 : *********',
            'answer' => 'question3 : answer',
            'explain' => 'question3 : explain',
          ]
        ]
      );
    }
}