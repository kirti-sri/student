<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class noteseeder extends Seeder
{
    public function run()
    {
        DB::table('notes')->insert([
            'topic_id' => 1,
            'notes' => 'Trigonometry, the branch of mathematics concerned with specific functions of angles 
            and their application to calculations. There are six functions of an angle commonly used in 
            trigonometry.'
        ]);
    }
}
