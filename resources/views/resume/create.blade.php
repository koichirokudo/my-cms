@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 px-9 py-12 text-white">
        <div class="mx-auto max-w-3xl">
            <h1 class="mb-8 text-3xl font-bold text-center">レジュメ登録</h1>

            <form action="{{ route('resume.preview') }}" method="POST" class="space-y-6 rounded-lg border border-gray-700 bg-gray-900 p-6">
                @csrf

                {{-- プロジェクト名 --}}
                <div>
                    <label for="project_name" class="block text-sm mb-2 text-gray-300">プロジェクト名 <span class="text-red-500">*</span></label>
                    <input id="project_name" name="project_name" value="{{ old('project_name', request('project_name')) }}" required class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-500">
                </div>

                {{-- 参加期間 --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm text-gray-300">期間（開始）</label>
                        <input type="date" name="period_from" value="{{ old('period_from', request('period_from')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-2 focus:border-orange-500 focus:ring-2 focus:ring-orange-500">
                    </div>
                    <div>
                        <label class="text-sm text-gray-300">期間（終了）</label>
                        <input type="date" name="period_to" value="{{ old('period_to', request('period_to')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-2 focus:border-orange-500 focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>

                {{-- 業種・雇用形態 --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm text-gray-300">業種</label>
                        <input type="text" name="industry" value="{{ old('industry', request('industry')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3">
                    </div>
                    <div>
                        <label class="text-sm text-gray-300">雇用形態</label>
                        <input type="text" name="employment" value="{{ old('employment', request('employment')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3">
                    </div>
                </div>

                {{-- チーム構成 --}}
                <div>
                    <label class="text-sm text-gray-300">チーム構成</label>
                    <input type="text" name="team" value="{{ old('team', request('team')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3">
                </div>

                {{-- 環境・ツール群 --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm text-gray-300">使用言語 / FW</label>
                        <input type="text" name="language_fw" value="{{ old('language_fw', request('language_fw')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3">
                    </div>
                    <div>
                        <label class="text-sm text-gray-300">データベース</label>
                        <input type="text" name="database" value="{{ old('database', request('database')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3">
                    </div>
                    <div>
                        <label class="text-sm text-gray-300">サーバOS</label>
                        <input type="text" name="server_os" value="{{ old('server_os', request('server_os')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3">
                    </div>
                    <div>
                        <label class="text-sm text-gray-300">クラウド環境</label>
                        <input type="text" name="cloud_env" value="{{ old('cloud_env', request('cloud_env')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3">
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-300">使用ツール</label>
                        <input type="text" name="tools" value="{{ old('tools', request('tools')) }}" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3">
                    </div>
                </div>

                {{-- 業務内容（Markdown） --}}
                <div>
                    <label class="text-sm text-gray-300">業務内容 <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="10" class="w-full rounded-lg border border-gray-700 bg-white text-black px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-500">{{ old('description', request('description')) }}</textarea>
                </div>

                {{-- 担当領域 --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">担当領域</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-sm text-gray-300">
                        @foreach (['要件定義','基本設計','詳細設計','実装','テスト','コードレビュー','保守・運用'] as $task)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="tasks[]" value="{{ $task }}" class="rounded border-gray-600 text-orange-400 focus:ring-orange-500" @if(collect(old('tasks', request('tasks', [])))->contains($task)) checked @endif>
                                {{ $task }}
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- プレビューボタン --}}
                <div>
                    <button type="submit" class="w-full rounded-lg bg-orange-400 px-5 py-2.5 font-medium text-white shadow transition hover:bg-orange-300">
                        プレビュー
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
