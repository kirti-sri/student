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
            'standard'=>9,
            'subject_id'=>1,
            'subject_name'=>'Mathematics'
        ]);
        DB::table('subjects')->insert([
            'standard'=>9,
            'subject_id'=>2,
            'subject_name'=>'Biology'
        ]);
        DB::table('subjects')->insert([
            'standard'=>9,
            'subject_id'=>3,
            'subject_name'=>'Chemistry'
        ]);
        DB::table('subjects')->insert([
            'standard'=>9,
            'subject_id'=>4,
            'subject_name'=>'Geography'
        ]);
        DB::table('subjects')->insert([
            'standard'=>9,
            'subject_id'=>5,
            'subject_name'=>'Physics'
        ]);
        
    }
}
