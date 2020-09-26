<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SNSTableSeeder::class);
        $this->call(SelectsTableSeeder::class);
        $this->call(QuizzesTableSeeder::class);
    }
}
