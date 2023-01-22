<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        DB::table('subjects')->insert([
            'standard' => 9,
            'board_id' => 1,
            'name' => 'Mathematics'
        ]);
        DB::table('subjects')->insert([
            'standard' => 9,
            'board_id' => 1,
            'name' => 'Biology'
        ]);
        DB::table('subjects')->insert([
            'standard' => 5,
            'board_id' => 2,
            'name' => 'Chemistry'
        ]);
        DB::table('subjects')->insert([
            'standard' => 5,
            'board_id' => 2,
            'name' => 'Geography'
        ]);
        DB::table('subjects')->insert([
            'standard' => 12,
            'board_id' => 4,
            'name' => 'Physics'
        ]);
    }
}
