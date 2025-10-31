{{-- resources/views/contact/thanks.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-900 text-white">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-6">送信完了</h1>
            <p class="mb-6">{{ session('status') ?? 'お問い合わせありがとうございました。' }}</p>
            <a href="{{ url('/') }}" class="text-orange-400 hover:text-orange-300 transition">トップページへ戻る</a>
        </div>
    </div>
@endsection
