<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $users = [
            [
                'name' => 'Yuki Tanaka',
                'email' => 'yuki.tanaka@example.com',
                'password' => Hash::make('Password!123'),
            ],
            [
                'name' => 'Kenji Sato',
                'email' => 'kenji.sato@example.com',
                'password' => Hash::make('SecurePass!456'),
            ],
            [
                'name' => 'Aya Suzuki',
                'email' => 'aya.suzuki@example.com',
                'password' => Hash::make('StrongPass!789'),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
