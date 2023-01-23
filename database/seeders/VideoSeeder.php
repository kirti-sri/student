<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class videoseeder extends Seeder
{
    public function run()
    {
        DB::table('videos')->insert([
            'topic_id'=>1,
            'video_id'=>1,
            'video'=>'https://www.youtube.com/watch?v=T9lt6MZKLck'
        ]);
        
    }
}
