<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BankKu - Responsive Financial Dashboard' }}</title>
    
    <!-- Google Fonts: Instrument Sans (Standard in Laravel 12 default) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bg-main text-dark-blue font-sans antialiased min-h-screen">
    <!-- Mobile/Tablet Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 hidden transition-opacity lg:hidden"></div>

    <div class="flex min-h-screen">
        <!-- Sidebar Component -->
        <x-sidebar />

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 lg:pl-64">
            <!-- Navbar Component -->
            <x-navbar title="{{ $title ?? 'Overview' }}" />

            <!-- Page Content -->
            <main class="flex-1 p-4 md:p-6 lg:p-8 max-w-[1600px] w-full mx-auto">
                <!-- Alert Success Banner -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center justify-between shadow-sm transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="font-medium text-sm">{{ session('success') }}</span>
                        </div>
                        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Toggle Sidebar Mobile & Tablet Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const openBtn = document.getElementById('open-sidebar-btn');
            const openBtnMobile = document.getElementById('open-sidebar-btn-mobile');
            const closeBtn = document.getElementById('close-sidebar-btn');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

            if (openBtn) openBtn.addEventListener('click', toggleSidebar);
            if (openBtnMobile) openBtnMobile.addEventListener('click', toggleSidebar);
            if (closeBtn) closeBtn.addEventListener('click', toggleSidebar);
            if (overlay) overlay.addEventListener('click', toggleSidebar);
        });
    </script>
</body>
</html>
