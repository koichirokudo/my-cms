<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->pluck('id', 'email');

        $resumes = [
            [
                'user_email' => 'yuki.tanaka@example.com',
                'project_name' => '大規模ECサイトリニューアル',
                'period_from' => '2022-04-01',
                'period_to' => '2023-03-31',
                'description' => '既存ECサイトの刷新において、バックエンド全体の設計と実装を担当。決済・在庫・検索機能の改善を推進しました。',
                'team' => 'PM1名, エンジニア4名, デザイナー2名',
                'industry' => 'EC',
                'employment' => '正社員',
                'language_fw' => 'PHP, Laravel, Vue.js',
                'database' => 'MySQL',
                'server_os' => 'Linux',
                'cloud_env' => 'AWS',
                'tools' => 'GitHub, Docker, Slack',
                'tasks_json' => ['要件定義', 'API設計', 'コードレビュー'],
                'created_at' => Carbon::create(2023, 4, 5, 9, 30),
                'updated_at' => Carbon::create(2023, 4, 5, 9, 30),
            ],
            [
                'user_email' => 'kenji.sato@example.com',
                'project_name' => '業務支援SaaSの新機能開発',
                'period_from' => '2021-01-01',
                'period_to' => null,
                'description' => '業務効率化SaaSにおける新機能の企画から実装までを担当。CI/CD整備と品質向上を推進しました。',
                'team' => 'PM1名, エンジニア3名, QA1名',
                'industry' => 'SaaS',
                'employment' => '業務委託',
                'language_fw' => 'Python, FastAPI, React',
                'database' => 'PostgreSQL',
                'server_os' => 'Linux',
                'cloud_env' => 'GCP',
                'tools' => 'GitLab, Docker, Jira',
                'tasks_json' => ['機能設計', 'バックエンド開発', '自動テスト整備'],
                'created_at' => Carbon::create(2022, 2, 14, 16, 0),
                'updated_at' => Carbon::create(2024, 1, 20, 10, 45),
            ],
            [
                'user_email' => 'aya.suzuki@example.com',
                'project_name' => 'スマートフォンアプリのサーバーサイド開発',
                'period_from' => '2020-07-01',
                'period_to' => '2021-06-30',
                'description' => 'O2OアプリのサーバーAPI開発を担当し、キャンペーン管理やPush通知機能を実装しました。',
                'team' => 'PM1名, エンジニア5名, デザイナー1名',
                'industry' => 'モバイルアプリ',
                'employment' => '派遣',
                'language_fw' => 'Node.js, Express, TypeScript',
                'database' => 'MongoDB',
                'server_os' => 'Linux',
                'cloud_env' => 'Azure',
                'tools' => 'Bitbucket, Docker, Confluence',
                'tasks_json' => ['API開発', 'パフォーマンス改善', '監視設計'],
                'created_at' => Carbon::create(2021, 7, 5, 11, 20),
                'updated_at' => Carbon::create(2021, 7, 5, 11, 20),
            ],
        ];

        $payload = [];

        foreach ($resumes as $resume) {
            $userId = $users[$resume['user_email']] ?? null;

            if (! $userId) {
                continue;
            }

            $payload[] = [
                'user_id' => $userId,
                'project_name' => $resume['project_name'],
                'period_from' => $resume['period_from'],
                'period_to' => $resume['period_to'],
                'description' => $resume['description'],
                'team' => $resume['team'],
                'industry' => $resume['industry'],
                'employment' => $resume['employment'],
                'language_fw' => $resume['language_fw'],
                'database' => $resume['database'],
                'server_os' => $resume['server_os'],
                'cloud_env' => $resume['cloud_env'],
                'tools' => $resume['tools'],
                'tasks_json' => json_encode($resume['tasks_json']),
                'created_at' => $resume['created_at'],
                'updated_at' => $resume['updated_at'],
            ];
        }

        if ($payload !== []) {
            DB::table('resumes')->upsert(
                $payload,
                ['user_id', 'project_name'],
                [
                    'period_from',
                    'period_to',
                    'description',
                    'team',
                    'industry',
                    'employment',
                    'language_fw',
                    'database',
                    'server_os',
                    'cloud_env',
                    'tools',
                    'tasks_json',
                    'updated_at',
                ]
            );
        }
    }
}
