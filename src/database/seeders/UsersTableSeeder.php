<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'テスト太郎',
            'email' => 'User1@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト次郎',
            'email' => 'User2@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト三郎',
            'email' => 'User3@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト四郎',
            'email' => 'User4@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト五郎',
            'email' => 'User5@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト六郎',
            'email' => 'User6@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト七郎',
            'email' => 'User7@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト八郎',
            'email' => 'User8@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト九郎',
            'email' => 'User9@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト十郎',
            'email' => 'User10@mailaddress.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'テスト十一郎',
            'email' => 'User11@mailaddress.com',
            'password' => bcrypt('password'),
        ]);
    }
}
