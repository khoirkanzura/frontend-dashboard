@php
    $defaultProfile = [
        'name' => 'Charlene Reed',
        'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80'
    ];
    $profile = array_merge($defaultProfile, session('profile', []));
@endphp

<header class="bg-white border-b border-border-light sticky top-0 z-30 px-4 md:px-8 py-4 lg:py-0 lg:h-20 flex flex-col justify-center">
    <!-- Desktop Layout -->
    <div class="hidden lg:flex items-center justify-between w-full h-full">
        <!-- Title -->
        <h1 class="text-[28px] font-semibold text-dark-blue">{{ $title }}</h1>

        <!-- Right Side elements -->
        <div class="flex items-center gap-[30px]">
            <!-- Search bar -->
            <form action="{{ request()->is('loans') ? route('loans') : '#' }}" method="GET" class="relative w-[255px]">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Search for something..." 
                    class="w-full bg-[#F5F7FA] text-dark-blue text-sm pl-11 pr-4 py-3 rounded-full placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-blue/20 transition-all border border-transparent focus:border-primary-blue/30"
                >
            </form>

            <!-- Quick settings gear -->
            <a href="{{ route('settings') }}" class="w-12 h-12 rounded-full bg-[#F5F7FA] flex items-center justify-center text-gray-text hover:text-primary-blue hover:bg-indigo-50 transition-colors">
                <svg class="w-[22px] h-[22px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </a>

            <!-- Notifications -->
            <button class="w-12 h-12 rounded-full bg-[#F5F7FA] flex items-center justify-center text-gray-text hover:text-primary-blue hover:bg-indigo-50 relative transition-colors">
                <span class="absolute top-3.5 right-3.5 w-2.5 h-2.5 bg-rose-500 rounded-full ring-2 ring-white"></span>
                <svg class="w-[22px] h-[22px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </button>

            <!-- User profile avatar -->
            <a href="{{ route('settings') }}" class="block w-[60px] h-[60px] rounded-full overflow-hidden border border-slate-100 hover:ring-2 hover:ring-primary-blue/20 transition-all">
                <img src="{{ $profile['avatar'] }}" alt="{{ $profile['name'] }}" class="w-full h-full object-cover">
            </a>
        </div>
    </div>

    <!-- Mobile/Tablet Layout -->
    <div class="flex lg:hidden flex-col gap-4">
        <div class="flex items-center justify-between">
            <!-- Hamburger menu button -->
            <button id="open-sidebar-btn" class="text-dark-blue hover:text-primary-blue p-2 -ml-2 rounded-xl hover:bg-slate-50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Title -->
            <h1 class="text-xl font-bold text-dark-blue">{{ $title }}</h1>

            <!-- User profile avatar -->
            <a href="{{ route('settings') }}" class="block w-[35px] h-[35px] rounded-full overflow-hidden border border-slate-100">
                <img src="{{ $profile['avatar'] }}" alt="{{ $profile['name'] }}" class="w-full h-full object-cover">
            </a>
        </div>

        <!-- Search bar container under top bar on mobile -->
        <form action="{{ request()->is('loans') ? route('loans') : '#' }}" method="GET" class="relative w-full">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </span>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="Search for something..." 
                class="w-full bg-[#F5F7FA] text-dark-blue text-sm pl-11 pr-4 py-3 rounded-full placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-blue/20 transition-all border border-transparent"
            >
        </form>
    </div>
</header>
