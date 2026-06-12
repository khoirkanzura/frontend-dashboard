<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BankKu - Dashboard' }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Vite Assets (WAJIB) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-bg-main text-dark-blue antialiased min-h-screen">

    <!-- Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main -->
        <div class="flex-1 flex flex-col lg:pl-64">

            <!-- Navbar -->
            <x-navbar :title="$title ?? 'Overview'" />

            <!-- Content -->
            <main class="flex-1 p-6">

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{ $slot }}

            </main>
        </div>
    </div>

    <!-- Sidebar Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

            document.getElementById('open-sidebar-btn')?.addEventListener('click', toggleSidebar);
            document.getElementById('open-sidebar-btn-mobile')?.addEventListener('click', toggleSidebar);
            document.getElementById('close-sidebar-btn')?.addEventListener('click', toggleSidebar);
            overlay?.addEventListener('click', toggleSidebar);
        });
    </script>

</body>
</html>