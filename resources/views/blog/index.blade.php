@extends('layouts.app')

@section('content')
    <div class="px-6 sm:px-9 py-10">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-semibold tracking-tight mb-8 text-center">ブログ一覧</h2>

            @if($posts->isEmpty())
                <p class="text-gray-400 text-center">投稿が見つかりません。</p>
            @endif

            <ul class="divide-y divide-gray-800/70 rounded-xl bg-white/5 ring-1 ring-white/5 overflow-hidden">
                @foreach ($posts as $post)
                    <li class="group">
                        <a href="{{ route('blog.show', $post->id) }}"
                           class="flex items-start gap-4 py-5 px-4 sm:px-6 transition-all duration-200">
                            {{-- アイコン --}}
                            <span class="relative inline-flex items-center justify-center w-10 h-10 rounded-lg bg-brand/15 text-brand ring-1 ring-inset ring-brand/20 shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <path d="M8 2v4" />
                                    <path d="M12 2v4" />
                                    <path d="M16 2v4" />
                                    <rect width="16" height="18" x="4" y="4" rx="2" />
                                    <path d="M8 10h6" />
                                    <path d="M8 14h8" />
                                    <path d="M8 18h5" />
                                </svg>
                            </span>

                            {{-- テキスト部分 --}}
                            <div class="flex flex-col gap-1">
                                <span class="text-xs text-gray-400">{{ $post->published_at->format('Y/m/d') }}</span>
                                <span class="text-base sm:text-lg font-semibold text-white group-hover:text-brand-light transition-colors">{{ $post->title }}</span>
                                <span class="text-gray-400 text-sm truncate max-w-prose">{{ $post->excerpt }}</span>
                            </div>

                            <div class="ml-auto self-center text-brand opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <path d="M9 18l6-6-6-6" />
                                </svg>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

