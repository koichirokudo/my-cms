@extends('layouts.app')

@section('content')
    <div class="px-6 sm:px-9 py-20">
        <div class="max-w-xl mx-auto text-center">
            <div class="rounded-2xl bg-white/5 ring-1 ring-white/10 p-10">
                <h1 class="text-3xl font-bold mb-3 tracking-tight">送信完了</h1>
                <p class="mb-8 text-gray-300">{{ session('status') ?? 'お問い合わせありがとうございました。' }}</p>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 rounded-md bg-brand px-5 py-2.5 font-medium text-white shadow transition hover:bg-brand-dark">
                    トップページへ戻る
                </a>
            </div>
        </div>
    </div>
@endsection
