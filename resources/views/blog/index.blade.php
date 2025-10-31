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
                        <div class="flex items-center py-5 px-4 sm:px-6 gap-4">
                            <a href="{{ route('blog.show', $post->id) }}" class="flex items-start gap-4 flex-1 min-w-0">
                                {{-- アイコン --}}
                                <span class="relative inline-flex items-center justify-center w-10 h-10 rounded-lg bg-brand/15 text-brand ring-1 ring-inset ring-brand/20 shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
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
                                <div class="flex flex-col gap-1 min-w-0">
                                    <span class="text-xs text-gray-400">{{ $post->published_at->format('Y/m/d') }}</span>
                                    <span class="text-base sm:text-lg font-semibold text-white group-hover:text-brand-light transition-colors truncate">{{ $post->title }}</span>
                                    <span class="text-gray-400 text-sm truncate">{{ $post->excerpt }}</span>
                                </div>
                            </a>

                            @auth
                            {{-- 操作ボタン --}}
                            <div class="flex items-center gap-2 ml-2">
                                {{-- 編集 --}}
                                <a href="{{ route('blog.edit', $post->id) }}" class="p-2 rounded hover:bg-white/10 text-gray-300 hover:text-white" title="編集">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <path d="M12 20h9" />
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z" />
                                    </svg>
                                </a>
                                {{-- 削除 --}}
                                <form action="{{ route('blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('この投稿を削除しますか？');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded hover:bg-white/10 text-red-300 hover:text-red-400" title="削除">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                            <path d="M10 11v6" />
                                            <path d="M14 11v6" />
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endauth
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

