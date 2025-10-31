@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 px-9 py-12">
        <div class="mx-auto max-w-xl">
            <div class="text-center text-white">
                <h1 class="mb-8 text-3xl font-bold">お問い合わせ</h1>
                <p class="mb-8 font-bold">お仕事やお問い合わせはこちらからお願いいたします。</p>
            </div>

            <form
                action="{{ route('contact.store') }}"
                method="POST"
                class="mx-auto max-w-xl space-y-6 rounded-lg border border-gray-700 bg-gray-900 p-6"
            >
                @csrf

                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-gray-300">
                        名前 <span class="text-red-600">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full text-black rounded-lg border border-gray-700 px-4 py-3 transition-colors focus:border-brand focus:ring-2 focus:ring-brand @error('name') border-red-500 @enderror"
                        placeholder="山田 太郎"
                    />
                    @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-300">
                        メールアドレス <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full text-black rounded-lg border border-gray-700 px-4 py-3 transition-colors focus:border-brand focus:ring-2 focus:ring-brand @error('email') border-red-500 @enderror"
                        placeholder="example@example.com"
                    />
                    @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="mb-2 block text-sm font-medium text-gray-300">
                        お問い合わせ内容（500字以内） <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        rows="6"
                        required
                        class="w-full text-black resize-none rounded-lg border border-gray-700 px-4 py-3 transition-colors focus:border-brand focus:ring-2 focus:ring-brand @error('message') border-red-500 @enderror"
                        placeholder="お問い合わせ内容をご記入ください"
                    >{{ old('message') }}</textarea>
                    @error('message')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full rounded-lg bg-brand px-5 py-2.5 font-medium text-white shadow transition hover:bg-brand-dark focus:ring-2 focus:ring-brand/50"
                    >
                        送信する
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
