@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 px-6 py-12 text-white">
        <div class="mx-auto max-w-screen-2xl">
            <h1 class="text-3xl font-bold mb-10 text-center">職務経歴（レジュメ）</h1>

            @if ($resumes->isEmpty())
                <p class="text-gray-400 text-center">登録された職務経歴はまだありません。</p>
            @else
                <div class="overflow-x-auto rounded-lg border border-gray-700">
                    <table class="min-w-[1600px] divide-y divide-gray-800">
                        <thead class="bg-gray-800/50">
                        <tr>
                            <th class="w-11 px-2 py-3 text-left text-sm font-semibold text-gray-300"></th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 whitespace-nowrap">期間</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 whitespace-nowrap">プロジェクト名</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">業種</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">雇用形態</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">チーム構成</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">担当領域</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">環境</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">使用ツール</th>
                        </tr>
                        </thead>
                        @foreach ($resumes as $resume)
                        <tbody x-data="{ open: false }" class="divide-y divide-gray-800">
                            <tr class="hover:bg-gray-800/40">
                                {{-- トグルアイコン列 --}}
                                <td class="px-2 py-3 align-top">
                                    <button type="button"
                                            class="inline-flex h-7 w-7 items-center justify-center rounded-md bg-white/5 ring-1 ring-white/10 text-gray-300 hover:text-white hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand transition"
                                            :aria-expanded="open.toString()"
                                            :aria-controls="'resume-panel-' + {{$loop->index}}"
                                            @click="open = !open">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 transition-transform duration-200" :class="{ 'rotate-180': open }">
                                            <path d="M6 9l6 6 6-6" />
                                        </svg>
                                    </button>
                                </td>
                                {{-- テーブル行 --}}
                                <td class="px-4 py-3 cursor-pointer whitespace-nowrap" @click="open = !open">
                                    {{ optional($resume->period_from)->format('Y/m') }} 〜 {{ optional($resume->period_to)->format('Y/m') }}
                                </td>
                                <td class="px-4 py-3 font-semibold cursor-pointer whitespace-nowrap" @click="open = !open">
                                    {{ $resume->project_name }}
                                </td>
                                <td class="px-4 py-3 cursor-pointer" @click="open = !open">{{ $resume->industry ?? '—' }}</td>
                                <td class="px-4 py-3 cursor-pointer" @click="open = !open">{{ $resume->employment ?? '—' }}</td>
                                <td class="px-4 py-3 cursor-pointer" @click="open = !open">{{ $resume->team ?? '—' }}</td>
                                <td class="px-4 py-3 cursor-pointer" @click="open = !open">{{ implode('・', $resume->tasks_json ?? []) }}</td>
                                <td class="px-4 py-3 cursor-pointer" @click="open = !open">
                                    {{ $resume->language_fw ?? '' }} / {{ $resume->database ?? '' }} / {{ $resume->server_os ?? '' }} / {{ $resume->cloud_env ?? '' }}
                                </td>
                                <td class="px-4 py-3 cursor-pointer" @click="open = !open">{{ $resume->tools ?? '—' }}</td>
                            </tr>

                            {{-- アコーディオン詳細 --}}
                            <tr x-show="open" x-transition class="bg-gray-800/60">
                                <td colspan="9" class="px-9 py-5 text-sm leading-relaxed text-gray-300">
                                    {{-- 本文（プレーンテキスト表示） --}}
                                    <div class="text-gray-200" :id="'resume-panel-' + {{$loop->index}}">
                                        {{ $resume->description }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

