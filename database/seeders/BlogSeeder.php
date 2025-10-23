<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $blogs = [
            [
                'title' => 'Laravelで始めるモダンWeb開発',
                'body' => 'Laravelの基本から始めて、サービス構築までの流れを紹介します。',
                'is_published' => true,
                'published_at' => $now->copy()->subDays(10),
                'created_at' => $now->copy()->subDays(12),
                'updated_at' => $now->copy()->subDays(10),
            ],
            [
                'title' => 'Dockerを活用した開発環境の構築',
                'body' => 'チーム開発で役立つDocker Composeの構成例とベストプラクティスをまとめました。',
                'is_published' => true,
                'published_at' => $now->copy()->subDays(3),
                'created_at' => $now->copy()->subDays(5),
                'updated_at' => $now->copy()->subDays(3),
            ],
            [
                'title' => '次回リリースに向けた機能開発メモ',
                'body' => '現在開発中の機能一覧と注意点をチームで共有するためのメモです。',
                'is_published' => false,
                'published_at' => null,
                'created_at' => $now->copy()->subDay(),
                'updated_at' => $now->copy()->subDay(),
            ],
        ];

        foreach ($blogs as $blog) {
            DB::table('blogs')->updateOrInsert(
                ['title' => $blog['title']],
                $blog
            );
        }
    }
}
