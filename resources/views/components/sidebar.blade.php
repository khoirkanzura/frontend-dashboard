<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-border-light flex flex-col z-50 transition-transform duration-300 transform -translate-x-full lg:translate-x-0">
    <!-- Sidebar Header (Logo) -->
    <div class="h-20 flex items-center px-8 border-b border-border-light justify-between">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <!-- Bank logo icon -->
            <div class="w-8 h-8 rounded-lg bg-primary-blue flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21V10m0 11a4.5 4.5 0 100-9M12 11V3m0 8a4.5 4.5 0 110-9"/>
                </svg>
            </div>
            <span class="text-xl font-extrabold text-dark-blue tracking-tight">BankKu.</span>
        </a>
        
        <!-- Mobile close sidebar button -->
        <button id="close-sidebar-btn" class="lg:hidden text-gray-text hover:text-dark-blue p-1 rounded-lg hover:bg-slate-100 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigation Menu Items -->
    <nav class="flex-1 py-6 space-y-1 overflow-y-auto custom-scrollbar">
        <!-- Dashboard -->
        @php $isDashboard = request()->routeIs('dashboard'); @endphp
        <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-8 py-3.5 text-[15px] font-medium transition-all group relative {{ $isDashboard ? 'text-primary-blue font-semibold bg-indigo-50/20' : 'text-gray-text hover:text-primary-blue hover:bg-slate-50' }}">
            @if($isDashboard)
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-primary-blue rounded-r-lg"></div>
            @endif
            <i class="fa-solid fa-house w-6 h-6 flex items-center justify-center text-[20px] md:text-[22px] {{ $isDashboard ? 'text-primary-blue' : 'text-[#B1B1B1] group-hover:text-primary-blue transition-colors' }}"></i>
            <span>Dashboard</span>
        </a>

        <!-- Inactive mock links (Transactions, Accounts, Investments, Credit Cards) -->
        <a href="#" class="flex items-center gap-4 px-8 py-3.5 text-[15px] font-medium text-[#B1B1B1] hover:text-primary-blue hover:bg-slate-50 transition-all group relative">
            <i class="fa-solid fa-money-bill-transfer w-6 h-6 flex items-center justify-center text-[20px] md:text-[22px] text-[#B1B1B1] group-hover:text-primary-blue transition-colors"></i>
            <span>Transactions</span>
        </a>

        <a href="#" class="flex items-center gap-4 px-8 py-3.5 text-[15px] font-medium text-[#B1B1B1] hover:text-primary-blue hover:bg-slate-50 transition-all group relative">
            <i class="fa-solid fa-user w-6 h-6 flex items-center justify-center text-[20px] md:text-[22px] text-[#B1B1B1] group-hover:text-primary-blue transition-colors"></i>
            <span>Accounts</span>
        </a>

        <a href="#" class="flex items-center gap-4 px-8 py-3.5 text-[15px] font-medium text-[#B1B1B1] hover:text-primary-blue hover:bg-slate-50 transition-all group relative">
            <i class="fa-solid fa-chart-simple w-6 h-6 flex items-center justify-center text-[20px] md:text-[22px] text-[#B1B1B1] group-hover:text-primary-blue transition-colors"></i>
            <span>Investments</span>
        </a>

        <a href="#" class="flex items-center gap-4 px-8 py-3.5 text-[15px] font-medium text-[#B1B1B1] hover:text-primary-blue hover:bg-slate-50 transition-all group relative">
            <i class="fa-solid fa-credit-card w-6 h-6 flex items-center justify-center text-[20px] md:text-[22px] text-[#B1B1B1] group-hover:text-primary-blue transition-colors"></i>
            <span>Credit Cards</span>
        </a>

        <!-- Loans -->
        @php $isLoans = request()->routeIs('loans'); @endphp
        <a href="{{ route('loans') }}" class="flex items-center gap-4 px-8 py-3.5 text-[15px] font-medium transition-all group relative {{ $isLoans ? 'text-primary-blue font-semibold bg-indigo-50/20' : 'text-gray-text hover:text-primary-blue hover:bg-slate-50' }}">
            @if($isLoans)
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-primary-blue rounded-r-lg"></div>
            @endif
            <i class="fa-solid fa-hand-holding-dollar w-6 h-6 flex items-center justify-center text-[20px] md:text-[22px] {{ $isLoans ? 'text-primary-blue' : 'text-[#B1B1B1] group-hover:text-primary-blue transition-colors' }}"></i>
            <span>Loans</span>
        </a>

        <!-- Inactive mock links (Services, My Privileges) -->
        <a href="#" class="flex items-center gap-4 px-8 py-3.5 text-[15px] font-medium text-[#B1B1B1] hover:text-primary-blue hover:bg-slate-50 transition-all group relative">
            <i class="fa-solid fa-screwdriver-wrench w-6 h-6 flex items-center justify-center text-[20px] md:text-[22px] text-[#B1B1B1] group-hover:text-primary-blue transition-colors"></i>
            <span>Services</span>
        </a>

        <a href="#" class="flex items-center gap-4 px-8 py-3.5 text-[15px] font-medium text-[#B1B1B1] hover:text-primary-blue hover:bg-slate-50 transition-all group relative">
            <i class="fa-solid fa-lightbulb w-6 h-6 flex items-center justify-center text-[20px] md:text-[22px] text-[#B1B1B1] group-hover:text-primary-blue transition-colors"></i>
            <span>My Privileges</span>
        </a>

        <!-- Setting -->
        @php $isSettings = request()->routeIs('settings'); @endphp
        <a href="{{ route('settings') }}" class="flex items-center gap-4 px-8 py-3.5 text-[15px] font-medium transition-all group relative {{ $isSettings ? 'text-primary-blue font-semibold bg-indigo-50/20' : 'text-gray-text hover:text-primary-blue hover:bg-slate-50' }}">
            @if($isSettings)
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-primary-blue rounded-r-lg"></div>
            @endif
            <i class="fa-solid fa-gear w-6 h-6 flex items-center justify-center text-[20px] md:text-[22px] {{ $isSettings ? 'text-primary-blue' : 'text-[#B1B1B1] group-hover:text-primary-blue transition-colors' }}"></i>
            <span>Setting</span>
        </a>
    </nav>
</aside>
