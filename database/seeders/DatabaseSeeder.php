<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        $this->call(BoardSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(ChapterSeeder::class);
        $this->call(TopicSeeder::class);
    }
}
