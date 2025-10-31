<?php
@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 px-6 py-12 text-white">
        <div class="mx-auto max-w-5xl">
            <h1 class="text-3xl font-bold mb-10 text-center">職務経歴（レジュメ）</h1>

            @if ($resumes->isEmpty())
                <p class="text-gray-400 text-center">登録された職務経歴はまだありません。</p>
            @else
                <div class="overflow-x-auto rounded-lg border border-gray-700">
                    <table class="min-w-full divide-y divide-gray-800">
                        <thead class="bg-gray-800/50">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 w-2/12">期間</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 w-4/12">プロジェクト名</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 w-3/12">業種</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 w-3/12">雇用形態</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                        @foreach ($resumes as $resume)
                            <tr x-data="{ open: false }" class="cursor-pointer hover:bg-gray-800/40">
                                {{-- テーブル行 --}}
                                <td class="px-4 py-3" @click="open = !open">
                                    {{ optional($resume->period_from)->format('Y/m') }} 〜 {{ optional($resume->period_to)->format('Y/m') }}
                                </td>
                                <td class="px-4 py-3 font-semibold" @click="open = !open">
                                    {{ $resume->project_name }}
                                </td>
                                <td class="px-4 py-3" @click="open = !open">{{ $resume->industry ?? '—' }}</td>
                                <td class="px-4 py-3" @click="open = !open">{{ $resume->employment ?? '—' }}</td>
                            </tr>

                            {{-- アコーディオン詳細 --}}
                            <tr x-show="open" x-collapse class="bg-gray-800/60">
                                <td colspan="4" class="px-6 py-5 text-sm leading-relaxed text-gray-300">
                                    <div class="space-y-2">
                                        <p><span class="text-gray-400">チーム構成：</span>{{ $resume->team ?? '—' }}</p>
                                        <p><span class="text-gray-400">担当領域：</span>{{ implode('・', $resume->tasks_json ?? []) }}</p>
                                        <p><span class="text-gray-400">環境：</span>
                                            {{ $resume->language_fw ?? '' }} /
                                            {{ $resume->database ?? '' }} /
                                            {{ $resume->server_os ?? '' }} /
                                            {{ $resume->cloud_env ?? '' }}
                                        </p>
                                        <p><span class="text-gray-400">使用ツール：</span>{{ $resume->tools ?? '—' }}</p>
                                    </div>

                                    {{-- Markdown整形済み本文 --}}
                                    <div class="prose prose-invert prose-sky mt-4 max-w-none">
                                        {!! $resume->description_html !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

