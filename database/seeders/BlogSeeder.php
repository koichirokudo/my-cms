<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Laravelで始めるモダンWeb開発',
                'body' => 'Laravelの基本から始めて、サービス構築までの流れを紹介します。',
                'is_published' => true,
                'published_at' => Carbon::create(2024, 3, 15, 9, 0),
                'created_at' => Carbon::create(2024, 3, 10, 8, 30),
                'updated_at' => Carbon::create(2024, 3, 15, 9, 0),
            ],
            [
                'title' => 'Dockerを活用した開発環境の構築',
                'body' => 'チーム開発で役立つDocker Composeの構成例とベストプラクティスをまとめました。',
                'is_published' => true,
                'published_at' => Carbon::create(2024, 4, 2, 13, 0),
                'created_at' => Carbon::create(2024, 3, 28, 11, 15),
                'updated_at' => Carbon::create(2024, 4, 2, 13, 0),
            ],
            [
                'title' => '次回リリースに向けた機能開発メモ',
                'body' => '現在開発中の機能一覧と注意点をチームで共有するためのメモです。',
                'is_published' => false,
                'published_at' => null,
                'created_at' => Carbon::create(2024, 4, 20, 19, 45),
                'updated_at' => Carbon::create(2024, 4, 20, 19, 45),
            ],
        ];

        DB::table('blogs')->upsert(
            $blogs,
            ['title'],
            ['body', 'is_published', 'published_at', 'updated_at']
        );
    }
}
