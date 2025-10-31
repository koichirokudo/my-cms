@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 text-white px-9 py-12">
        <div class="max-w-3xl mx-auto prose prose-invert prose-sky">
            <h1 class="text-3xl font-bold mb-2">{{ $blog->title }}</h1>
            <p class="text-gray-400 text-sm mb-6">{{ $blog->published_at?->format('Y/m/d') }}</p>

            {!! $body !!}

            <div class="mt-12">
                <a href="{{ route('blog.index') }}"
                   class="inline-flex items-center text-sky-400 hover:text-sky-300 transition">
                    ← ブログ一覧へ戻る
                </a>
            </div>
        </div>
    </div>
@endsection

