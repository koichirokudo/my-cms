<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Yuki Tanaka',
                'email' => 'yuki.tanaka@example.com',
                'password' => Hash::make('Password!123'),
                'created_at' => Carbon::create(2023, 4, 1, 9, 0),
                'updated_at' => Carbon::create(2023, 4, 1, 9, 0),
            ],
            [
                'name' => 'Kenji Sato',
                'email' => 'kenji.sato@example.com',
                'password' => Hash::make('SecurePass!456'),
                'created_at' => Carbon::create(2022, 11, 15, 14, 30),
                'updated_at' => Carbon::create(2022, 11, 15, 14, 30),
            ],
            [
                'name' => 'Aya Suzuki',
                'email' => 'aya.suzuki@example.com',
                'password' => Hash::make('StrongPass!789'),
                'created_at' => Carbon::create(2024, 2, 6, 10, 15),
                'updated_at' => Carbon::create(2024, 2, 6, 10, 15),
            ],
        ];

        DB::table('users')->upsert(
            $users,
            ['email'],
            ['name', 'password', 'updated_at']
        );
    }
}
