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
            'name'=>'Introduction to Trigonometry'
        ]);
        DB::table('topics')->insert([
            'chap_id'=>1,
        
            'name'=>'Formulas of Trigonometry and functions'
        ]);
        DB::table('topics')->insert([
            'chap_id'=>1,
       
            'name'=>'Sample problem of Trigonometry and functions'
        ]);
        DB::table('topics')->insert([
            'chap_id'=>1,
          
            'name'=>'Introduction to functions'
        ]);
        DB::table('topics')->insert([
            'chap_id'=>1,
            
            'name'=>'Sample problem of Trigonometry and functions'
        ]);
        
    }
}
