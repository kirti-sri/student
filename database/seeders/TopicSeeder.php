<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class topicseeder extends Seeder
{
    public function run()
    {
        DB::table('topics')->insert([
            'chap_id'=>1,
            'topic_id'=>1,
            'topic_name'=>'Introduction to Trigonometry'
        ]);
        DB::table('topics')->insert([
            'chap_id'=>1,
            'topic_id'=>2,
            'topic_name'=>'Formulas of Trigonometry and functions'
        ]);
        DB::table('topics')->insert([
            'chap_id'=>1,
            'topic_id'=>3,
            'topic_name'=>'Sample problem of Trigonometry and functions'
        ]);
        DB::table('topics')->insert([
            'chap_id'=>1,
            'topic_id'=>4,
            'topic_name'=>'Introduction to functions'
        ]);
        DB::table('topics')->insert([
            'chap_id'=>1,
            'topic_id'=>5,
            'topic_name'=>'Sample problem of Trigonometry and functions'
        ]);
        
    }
}
