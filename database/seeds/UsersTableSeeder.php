<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
            [
                'name' => 'Thiều Thanh Huyền',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'is_admin' => 1,
                'logo_number' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Thiều Thanh Huyền',
                'email' => 'member@example.com',
                'password' => Hash::make('12345678'),
                'is_admin' => 0,
                'logo_number' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
