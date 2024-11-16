<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class RestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rests')->insert([
            'attendance_id' => 1,
            'start' => Carbon::createFromTime(12, 0, 0), // 休憩開始時間 12:00
            'end' => Carbon::createFromTime(12, 30, 0), // 休憩終了時間 12:30
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 2,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(12, 30, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 3,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(12, 30, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 4,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(12, 40, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 5,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(13, 00, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 6,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(12, 30, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 7,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(12, 30, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 8,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(12, 30, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 9,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(12, 30, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 10,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(12, 30, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rests')->insert([
            'attendance_id' => 11,
            'start' => Carbon::createFromTime(12, 0, 0),
            'end' => Carbon::createFromTime(12, 30, 0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
