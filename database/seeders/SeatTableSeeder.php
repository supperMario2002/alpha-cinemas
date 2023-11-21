<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 121; $i++) {
            if ($i < 62) {
                $name = 'a' . $i;
                DB::table('seats')->insert([
                    "name" => $name,
                    "type_seat" => 1,
                ]);
            } else {
                $name = 'a' . $i;
                DB::table('seats')->insert([
                    "name" => $name,
                    "type_seat" => 2,
                ]);
            }

        }
    }
}
