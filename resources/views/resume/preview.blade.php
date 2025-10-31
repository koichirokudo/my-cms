<?php
@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 px-9 py-12 text-white">
        <div class="mx-auto max-w-4xl">
            <h1 class="text-3xl font-bold mb-6 text-center">プレビュー確認</h1>

            {{-- 基本情報 --}}
            <div class="mb-8 space-y-3">
                <p><span class="text-gray-400">プロジェクト名：</span> {{ $resume['project_name'] }}</p>
                <p><span class="text-gray-400">期間：</span> {{ $resume['period_from'] ?? '—' }} ～ {{ $resume['period_to'] ?? '—' }}</p>
                <p><span class="text-gray-400">チーム構成：</span> {{ $resume['team'] ?? '—' }}</p>
                <p><span class="text-gray-400">業種：</span> {{ $resume['industry'] ?? '—' }}</p>
                <p><span class="text-gray-400">雇用形態：</span> {{ $resume['employment'] ?? '—' }}</p>
                <p><span class="text-gray-400">環境：</span> {{ $resume['language_fw'] ?? '' }} / {{ $resume['database'] ?? '' }} / {{ $resume['server_os'] ?? '' }} / {{ $resume['cloud_env'] ?? '' }}</p>
                <p><span class="text-gray-400">使用ツール：</span> {{ $resume['tools'] ?? '—' }}</p>
                <p><span class="text-gray-400">担当領域：</span> {{ implode('・', $resume['tasks'] ?? []) }}</p>
            </div>

            {{-- 業務内容 --}}
            <div class="prose prose-invert prose-sky max-w-none border border-gray-700 rounded-lg bg-gray-800 p-6 mb-8">
                {!! $body_html !!}
            </div>

            {{-- ボタン --}}
            <div class="flex justify-between">
                <form action="{{ route('resume.create') }}" method="GET">
                    @foreach ($resume as $key => $value)
                        @if(!is_array($value))
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <button type="submit" class="rounded-lg border border-gray-500 px-5 py-2.5 text-gray-300 hover:bg-gray-700">
                        戻る
                    </button>
                </form>

                <form action="{{ route('resume.store') }}" method="POST">
                    @csrf
                    @foreach ($resume as $key => $value)
                        @if(is_array($value))
                            @foreach ($value as $v)
                                <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                            @endforeach
                        @else
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <button type="submit" class="rounded-lg bg-orange-400 px-5 py-2.5 font-medium text-white shadow hover:bg-orange-300">
                        投稿する
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

