<?php

use Illuminate\Database\Seeder;

class SelectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('selects')->insert(
            [
                [
                    'quiz_id' => '1',
                    'selection' => 'question1 : selection1',
                    'is_answer' => true,
                ],
                [
                    'quiz_id' => '1',
                    'selection' => 'question1 : selection2',
                    'is_answer' => false,
                ],
                [
                    'quiz_id' => '1',
                    'selection' => 'question1 : selection3',
                    'is_answer' => false,
                ],

                [
                    'quiz_id' => '2',
                    'selection' => 'question1 : selection1',
                    'is_answer' => false,
                ],
                [
                    'quiz_id' => '2',
                    'selection' => 'question1 : selection2',
                    'is_answer' => true
                ],
                [
                    'quiz_id' => '2',
                    'selection' => 'question1 : selection3',
                    'is_answer' => false,
                ],
                [
                    'quiz_id' => '2',
                    'selection' => 'question1 : selection4',
                    'is_answer' => false,
                ],

                [
                    'quiz_id' => '3',
                    'selection' => 'question3 : selection1',
                    'is_answer' => false,
                ],
                [
                    'quiz_id' => '3',
                    'selection' => 'question3 : selection2',
                    'is_answer' => true
                ],
            ]
        );
    }
}
