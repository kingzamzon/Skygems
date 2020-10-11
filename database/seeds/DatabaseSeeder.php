<?php

use App\User;
use App\School;
use App\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        School::truncate();
        Subject::truncate();

        User::flushEventListeners();
        School::flushEventListeners();
        Subject::flushEventListeners();

        factory(User::class, 3)->create();
        factory(School::class, 2)->create();
        factory(Subject::class, 3)->create();
    }
}
