<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BankKu - Responsive Financial Dashboard' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Vite Assets (WAJIB) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-bg-main text-dark-blue font-sans antialiased min-h-screen">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main -->
        <div class="flex-1 flex flex-col min-w-0 lg:pl-64">

            <!-- Navbar -->
            <x-navbar :title="$title ?? 'Overview'" />

            <!-- Content -->
            <main class="flex-1 p-4 md:p-6 lg:p-8 max-w-[1600px] w-full mx-auto">

                <!-- Success Alert -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-emerald-600"></i>
                            <span class="text-sm font-medium">{{ session('success') }}</span>
                        </div>

                        <button onclick="this.parentElement.remove()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                @endif

                {{ $slot }}

            </main>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
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

            openBtn?.addEventListener('click', toggleSidebar);
            openBtnMobile?.addEventListener('click', toggleSidebar);
            closeBtn?.addEventListener('click', toggleSidebar);
            overlay?.addEventListener('click', toggleSidebar);
        });
    </script>

</body>
</html>