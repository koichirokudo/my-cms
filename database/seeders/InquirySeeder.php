<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inquiries = [
            [
                'name' => 'Yuki Tanaka',
                'email' => 'yuki.tanaka@example.com',
                'message' => 'Hello, I have a question about your services.',
                'created_at' => Carbon::create(2023, 4, 1, 9, 0),
                'updated_at' => Carbon::create(2023, 4, 1, 9, 0),
            ],
            [
                'name' => 'Kenji Sato',
                'email' => 'kenji.sato@example.com',
                'message' => 'I would like to know more about your pricing.',
                'created_at' => Carbon::create(2022, 11, 15, 14, 30),
                'updated_at' => Carbon::create(2022, 11, 15, 14, 30),
            ],
            [
                'name' => 'Aya Suzuki',
                'email' => 'aya.suzuki@example.com',
                'message' => 'Can you provide more details about your products?',
                'created_at' => Carbon::create(2024, 2, 6, 10, 15),
                'updated_at' => Carbon::create(2024, 2, 6, 10, 15),
            ],
        ];

        DB::table('inquiries')->upsert(
            $inquiries,
            ['email'],
            ['name', 'message', 'updated_at']
        );
    }
}
