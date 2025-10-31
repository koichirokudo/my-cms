@extends('layouts.app')

@section('content')
    <div class="px-6 sm:px-9 py-10">
        <div class="max-w-3xl mx-auto">
            <header class="mb-8 text-center">
                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight">{{ $blog->title }}</h1>
                <p class="text-gray-400 text-sm mt-2">{{ $blog->published_at?->format('Y/m/d') }}</p>
            </header>

            <article class="prose prose-invert max-w-none">
                {!! $body !!}
            </article>

            <div class="mt-12 flex justify-center">
                <a href="{{ route('blog.index') }}"
                   class="inline-flex items-center gap-1.5 rounded-md bg-white/5 px-4 py-2 text-brand ring-1 ring-white/10 hover:bg-white/10 hover:text-brand-light transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <path d="M15 18l-6-6 6-6" />
                    </svg>
                    ブログ一覧へ戻る
                </a>
            </div>
        </div>
    </div>
@endsection

