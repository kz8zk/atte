<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->insert([
            'user_id' => 1,
            'start' => Carbon::createFromTime(9, 0, 0), // 出勤時間 09:00
            'end' => Carbon::createFromTime(17, 0, 0), // 退勤時間 17:00
            'date' => Carbon::today(), // 当日の日付
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 2,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 3,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 4,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 5,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 6,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 7,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 8,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 9,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 10,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('attendances')->insert([
            'user_id' => 11,
            'start' => Carbon::createFromTime(9, 0, 0),
            'end' => Carbon::createFromTime(17, 0, 0),
            'date' => Carbon::today(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
