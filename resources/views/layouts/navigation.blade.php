<nav x-data="{ open: false }" class="sticky top-0 z-40 bg-gray-900/70 backdrop-blur border-b border-gray-800 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2">
                        <x-application-logo class="block h-8 w-auto fill-current text-brand" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap text-brand-light">Koichiro Kudo</span>
                    </a>
                </div>
            </div>

            <!-- Right side links -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6 md:space-x-8">
                @guest
                    <a href="{{ route('blog.index') }}" class="px-2 py-1 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('blog.*') ? 'text-brand' : 'text-gray-300' }} hover:text-brand-light focus:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-0">ブログ</a>
                    <a href="{{ route('resume.index') }}" class="px-2 py-1 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('resume.*') ? 'text-brand' : 'text-gray-300' }} hover:text-brand-light focus:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-0">レジュメ</a>
                    <a href="{{ route('contact.form') }}" class="px-2 py-1 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('contact.*') ? 'text-brand' : 'text-gray-300' }} hover:text-brand-light focus:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-0">お問い合わせ</a>
                @endguest

                @auth
                    <a href="{{ route('blog.index') }}" class="px-2 py-1 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('blog.index') ? 'text-brand' : 'text-gray-300' }} hover:text-brand-light">ブログ投稿済み一覧</a>
                    <a href="{{ route('blog.create') }}" class="px-2 py-1 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('blog.create') ? 'text-brand' : 'text-gray-300' }} hover:text-brand-light">ブログ投稿</a>
                    <a href="{{ route('resume.index') }}" class="px-2 py-1 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('resume.create') ? 'text-brand' : 'text-gray-300' }} hover:text-brand-light">レジュメ投稿済み一覧</a>
                    <a href="{{ route('resume.create') }}" class="px-2 py-1 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('resume.create') ? 'text-brand' : 'text-gray-300' }} hover:text-brand-light">レジュメ投稿</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-2 py-1 rounded-md text-sm font-medium text-gray-300 hover:text-brand-light transition-colors">ログアウト</button>
                    </form>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-300 hover:text-white hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden border-t border-gray-800 bg-gray-900/80 backdrop-blur">
        <div class="pt-2 pb-3 space-y-1">
            @guest
                <a href="{{ route('blog.index') }}" class="block px-4 py-2 text-gray-300 hover:bg-white/5 hover:text-brand-light">ブログ</a>
                <a href="{{ route('resume.index') }}" class="block px-4 py-2 text-gray-300 hover:bg-white/5 hover:text-brand-light">レジュメ</a>
                <a href="{{ route('contact.form') }}" class="block px-4 py-2 text-gray-300 hover:bg-white/5 hover:text-brand-light">お問い合わせ</a>
            @endguest

            @auth
                <a href="{{ route('blog.index') }}" class="block px-4 py-2 text-gray-300 hover:bg-white/5 hover:text-brand-light">ブログ投稿済み一覧</a>
                <a href="{{ route('blog.create') }}" class="block px-4 py-2 text-gray-300 hover:bg-white/5 hover:text-brand-light">ブログ投稿</a>
                <a href="{{ route('resume.index') }}" class="block px-4 py-2 text-gray-300 hover:bg-white/5 hover:text-brand-light">レジュメ投稿済み一覧</a>
                <a href="{{ route('resume.create') }}" class="block px-4 py-2 text-gray-300 hover:bg-white/5 hover:text-brand-light">レジュメ投稿</a>
                <form method="POST" action="{{ route('logout') }}" class="px-4 py-2">
                    @csrf
                    <button type="submit" class="w-full text-left text-gray-300 hover:text-brand-light">ログアウト</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
