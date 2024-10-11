<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    public function run()
    {
        // Example data to insert
        $days = [
            ['name' => 'Monday'],
            ['name' => 'Tuesday'],
            ['name' => 'Wednesday'],
            ['name' => 'Thursday'],
            ['name' => 'Friday'],
            ['name' => 'Saturday'],
            ['name' => 'Sunday'],
        ];

        DB::table('days')->insert($days);
    }
}
