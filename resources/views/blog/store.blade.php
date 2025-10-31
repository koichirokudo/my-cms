<?php
{{-- resources/views/blog/store.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 px-9 py-12">
        <div class="mx-auto max-w-2xl">
            <div class="text-center text-white">
                <h1 class="mb-8 text-3xl font-bold">ブログ投稿</h1>
            </div>

            <form action="{{ route('blog.preview') }}" method="POST"
                  class="space-y-6 rounded-lg border border-gray-700 bg-gray-900 p-6 text-white">
                @csrf

                {{-- タイトル --}}
                <div>
                    <label for="title" class="mb-2 block text-sm font-medium text-gray-300">
                        タイトル <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="title" name="title"
                           value="{{ old('title') }}"
                           required
                           class="w-full rounded-lg border border-gray-700 px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-500 @error('title') border-red-500 @enderror"
                           placeholder="ブログタイトル" />
                    @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 本文 --}}
                <div>
                    <label for="body" class="mb-2 block text-sm font-medium text-gray-300">
                        ブログ内容 <span class="text-red-500">*</span>
                    </label>
                    <textarea id="body" name="body" rows="10" required
                              class="w-full resize-none rounded-lg border border-gray-700 px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-500 @error('body') border-red-500 @enderror"
                              placeholder="Markdown形式でブログ本文を入力">{{ old('body') }}</textarea>
                    @error('body')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- プレビューボタン --}}
                <div>
                    <button type="submit"
                            class="w-full rounded-lg bg-orange-400 px-5 py-2.5 font-medium text-white shadow transition hover:bg-orange-300 focus:ring-2 focus:ring-gray-100">
                        プレビュー
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
