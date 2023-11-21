<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class SeatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $seatType = [
            [
                'price' => 45000,
                'name' =>  'regular'
            ],
            [
                'price' => 60000,
                'name' => 'vip'
            ]
        ];

        DB::table('seat_type')->insert($seatType);
    }
}
