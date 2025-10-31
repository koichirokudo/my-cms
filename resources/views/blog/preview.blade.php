@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 px-9 py-12 text-white">
        <div class="mx-auto max-w-3xl">
            <h1 class="mb-8 text-3xl font-bold text-center">プレビュー確認</h1>

            {{-- タイトル --}}
            <div class="mb-4">
                <p class="text-gray-400 text-sm mb-1">タイトル</p>
                <p class="text-xl font-semibold">{{ $title }}</p>
            </div>

            {{-- 概要（excerpt） --}}
            <div class="mb-6">
                <p class="text-gray-400 text-sm mb-1">概要</p>
                <p class="text-base">{{ $excerpt }}</p>
            </div>

            {{-- 本文プレビュー --}}
            <div class="prose prose-invert prose-sky max-w-none border border-gray-700 rounded-lg p-6 bg-gray-800">
                {!! $body_html !!}
            </div>

            {{-- ボタンエリア --}}
            <div class="mt-10 flex justify-between">
                {{-- 戻る --}}
                <form action="{{ route('blog.create') }}" method="GET">
                    <input type="hidden" name="title" value="{{ $title }}">
                    <input type="hidden" name="excerpt" value="{{ $excerpt }}">
                    <input type="hidden" name="body" value="{{ $body }}">
                    <button type="submit"
                            class="rounded-lg border border-gray-500 px-5 py-2.5 text-gray-300 hover:bg-gray-700">
                        戻る
                    </button>
                </form>

                {{-- 投稿確定 --}}
                <form action="{{ route('blog.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="title" value="{{ $title }}">
                    <input type="hidden" name="excerpt" value="{{ $excerpt }}">
                    <input type="hidden" name="body" value="{{ $body }}">
                    <button type="submit"
                            class="rounded-lg bg-orange-400 px-5 py-2.5 font-medium text-white shadow transition hover:bg-orange-300">
                        投稿する
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
