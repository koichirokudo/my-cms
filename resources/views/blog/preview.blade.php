@extends('layouts.app')

@section('content')
    <div class="px-6 sm:px-9 py-10">
        <div class="mx-auto max-w-3xl">
            <h1 class="mb-8 text-3xl font-bold text-center tracking-tight">プレビュー確認</h1>

            {{-- タイトル --}}
            <div class="mb-4">
                <p class="text-gray-400 text-sm mb-1">タイトル</p>
                <p class="text-xl font-semibold text-white">{{ $title }}</p>
            </div>

            {{-- 概要（excerpt） --}}
            <div class="mb-6">
                <p class="text-gray-400 text-sm mb-1">概要</p>
                <p class="text-base text-gray-300">{{ $excerpt }}</p>
            </div>

            {{-- 本文プレビュー --}}
            <div class="prose prose-invert max-w-none border border-white/10 rounded-lg p-6 bg-white/5">
                {!! $body_html !!}
            </div>

            {{-- ボタンエリア --}}
            <div class="pt-10 flex justify-between">
                {{-- 戻る --}}
                @if(!empty($editing) && $editing)
                    <form action="{{ route('blog.edit', $blog_id) }}" method="GET">
                        <input type="hidden" name="title" value="{{ $title }}">
                        <input type="hidden" name="excerpt" value="{{ $excerpt }}">
                        <input type="hidden" name="body" value="{{ $body }}">
                        <button type="submit"
                                class="inline-flex items-center gap-1.5 rounded-md bg-white/5 px-5 py-2.5 text-gray-200 ring-1 ring-white/10 hover:bg-white/10 hover:text-white transition">
                            戻る
                        </button>
                    </form>
                @else
                    <form action="{{ route('blog.create') }}" method="GET">
                        <input type="hidden" name="title" value="{{ $title }}">
                        <input type="hidden" name="excerpt" value="{{ $excerpt }}">
                        <input type="hidden" name="body" value="{{ $body }}">
                        <button type="submit"
                                class="inline-flex items-center gap-1.5 rounded-md bg-white/5 px-5 py-2.5 text-gray-200 ring-1 ring-white/10 hover:bg-white/10 hover:text-white transition">
                            戻る
                        </button>
                    </form>
                @endif

                {{-- 投稿/更新 確定 --}}
                @if(!empty($editing) && $editing)
                    <form action="{{ route('blog.update', $blog_id) }}" method="POST" class="flex items-center gap-4">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="title" value="{{ $title }}">
                        <input type="hidden" name="excerpt" value="{{ $excerpt }}">
                        <input type="hidden" name="body" value="{{ $body }}">

                        {{-- 公開フラグ --}}
                        <label class="flex items-center gap-2 text-gray-200">
                            <input type="checkbox" name="is_published" value="1" class="h-4 w-4 rounded border-white/20 bg-transparent text-brand focus:ring-brand/50" {{ !empty($is_published) && $is_published ? 'checked' : '' }}>
                            <span>公開する</span>
                        </label>

                        <button type="submit"
                                class="inline-flex items-center gap-1.5 rounded-md bg-brand px-5 py-2.5 font-medium text-white shadow transition hover:bg-brand-dark">
                            更新する
                        </button>
                    </form>
                @else
                    <form action="{{ route('blog.store') }}" method="POST" class="flex items-center gap-4">
                        @csrf
                        <input type="hidden" name="title" value="{{ $title }}">
                        <input type="hidden" name="excerpt" value="{{ $excerpt }}">
                        <input type="hidden" name="body" value="{{ $body }}">

                        {{-- 公開フラグ（チェックで公開する） --}}
                        <label class="flex items-center gap-2 text-gray-200">
                            <input type="checkbox" name="is_published" value="1" class="h-4 w-4 rounded border-white/20 bg-transparent text-brand focus:ring-brand/50">
                            <span>公開する</span>
                        </label>

                        <button type="submit"
                                class="inline-flex items-center gap-1.5 rounded-md bg-brand px-5 py-2.5 font-medium text-white shadow transition hover:bg-brand-dark">
                            投稿する
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
