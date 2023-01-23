<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->delete();

        DB::table('boards')->insert(array(
            0 => [
                'name' => 'CBSE'
            ],
            1 => [
                'name' => 'ICSE'
            ],
            2 => [
                'name' => 'STATE BOARD HSC'
            ],
            3 => [
                'name' => 'STATE BOARD SSC'
            ],
        ));
    }
}