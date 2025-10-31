<?php
@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen flex-col bg-gray-900 p-9 text-white">
        <h2 class="text-2xl font-semibold mb-6">ブログ一覧</h2>

        <ul class="divide-y divide-gray-800">
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('blog.show', $post->slug) }}"
                       class="flex items-start gap-3 py-4 px-2 hover:bg-gray-900/60 transition-colors rounded-lg">
                        {{-- アイコン --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             class="w-6 h-6 text-sky-400 shrink-0">
                            <path d="M8 2v4" />
                            <path d="M12 2v4" />
                            <path d="M16 2v4" />
                            <rect width="16" height="18" x="4" y="4" rx="2" />
                            <path d="M8 10h6" />
                            <path d="M8 14h8" />
                            <path d="M8 18h5" />
                        </svg>

                        {{-- テキスト部分 --}}
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-400">{{ $post->published_at->format('Y/m/d') }}</span>
                            <span class="text-lg font-semibold text-white group-hover:text-sky-300">{{ $post->title }}</span>
                            <span class="text-gray-400 text-sm">{{ $post->excerpt }}</span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

