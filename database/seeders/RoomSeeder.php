<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rooms =[
            [
                'name' => 'Phòng 1',
            ],
            [
                'name' => 'Phòng 2',
            ],
            [
                'name' => 'Phòng 3',
            ],
            [
                'name' => 'Phòng 4',
            ],
            [
                'name' => 'Phòng 5',
            ],
        ];
        DB::table('rooms')->insert($rooms);
    }
}
