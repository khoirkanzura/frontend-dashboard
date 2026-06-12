<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BankKu Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-white min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-6 py-16">
        <div class="max-w-5xl w-full grid lg:grid-cols-2 gap-10 items-center">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-cyan-400 mb-4">Modern Finance App</p>
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                    Kelola keuangan Anda dengan dashboard yang elegan dan intuitif.
                </h1>
                <p class="text-lg text-slate-300 mb-8">
                    Pantau saldo, transaksi, dan aktivitas finansial Anda dari satu tempat yang cepat, aman, dan mudah dipahami.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="/dashboard" class="px-6 py-3 rounded-full bg-cyan-500 hover:bg-cyan-400 font-semibold text-slate-950 transition">
                        Lihat Dashboard
                    </a>
                    <a href="/loans" class="px-6 py-3 rounded-full border border-slate-700 hover:border-cyan-400 hover:text-cyan-400 font-semibold transition">
                        Jelajahi Pinjaman
                    </a>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-6 shadow-2xl border border-white/10">
                <div class="bg-gradient-to-br from-cyan-500 to-blue-700 rounded-2xl p-6 mb-6">
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <p class="text-sm text-cyan-100">Saldo Utama</p>
                            <h2 class="text-3xl font-bold">$24,500</h2>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-white/20"></div>
                    </div>
                    <div class="text-sm text-cyan-100">
                        <p>**** 4589</p>
                        <div class="flex justify-between mt-4">
                            <span>12/28</span>
                            <span>BankKu</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="bg-slate-900/60 rounded-2xl p-4">
                        <p class="text-slate-400">Income</p>
                        <p class="text-xl font-semibold mt-1">+$8.2K</p>
                    </div>
                    <div class="bg-slate-900/60 rounded-2xl p-4">
                        <p class="text-slate-400">Expense</p>
                        <p class="text-xl font-semibold mt-1">-$3.1K</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
