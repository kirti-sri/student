<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class chapterseeder extends Seeder
{
    public function run()
    {
        DB::table('chapters')->insert([
            'subject_id'=>1,
            'name'=>'Trigonometry and functions'
        ]);
        DB::table('chapters')->insert([
            'subject_id'=>1,
            'name'=>'Limits and Derivatives'
        ]);
        DB::table('chapters')->insert([
            'subject_id'=>1,
            'name'=>'Statistics Probability'
        ]);
        DB::table('chapters')->insert([
            'subject_id'=>1,
            'name'=>'Mathematical Reasoning'
        ]);
        DB::table('chapters')->insert([
            'subject_id'=>1,
            'name'=>'Matrix'
        ]);
        
    }
}