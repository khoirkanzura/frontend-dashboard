<x-layouts-app>
    <x-slot:title>Overview</x-slot:title>

    <!-- Row 1: My Cards & Recent Transactions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-[30px] mb-6 md:mb-[30px]">
        <!-- My Cards (2/3 width on desktop) -->
        <div class="lg:col-span-2 flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4 md:mb-5">
                <h3 class="text-[17px] md:text-[20px] font-semibold text-dark-blue">My Cards</h3>
                <a href="#" class="text-sm md:text-base font-semibold text-[#396AFF] hover:text-primary-blue transition-colors">See All</a>
            </div>
            
            <!-- Horizontal scrolling grid on mobile/tablet -->
            <div class="flex lg:grid lg:grid-cols-2 gap-5 overflow-x-auto pb-3 lg:pb-0 custom-scrollbar snap-x snap-mandatory">
                @foreach($cards as $card)
                    <div class="min-w-[280px] sm:min-w-[320px] lg:min-w-0 snap-center snap-always flex-1">
                        <x-credit-card 
                            balance="{{ $card['balance'] }}"
                            cardHolder="{{ $card['card_holder'] }}"
                            validThru="{{ $card['valid_thru'] }}"
                            cardNumber="{{ $card['card_number'] }}"
                            isDark="{{ $card['is_dark'] }}"
                        />
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Transactions (1/3 width on desktop) -->
        <div class="lg:col-span-1 flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4 md:mb-5">
                <h3 class="text-[17px] md:text-[20px] font-semibold text-dark-blue">Recent Transactions</h3>
            </div>
            
            <x-card class="flex-1 flex flex-col justify-center">
                <div class="space-y-5">
                    @foreach($transactions as $tx)
                        <div class="flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-4">
                                <!-- Icon container -->
                                <div class="w-12 h-12 rounded-full {{ $tx['bg_class'] }} {{ $tx['text_class'] }} flex items-center justify-center shrink-0">
                                    {!! $tx['icon'] !!}
                                </div>
                                <!-- Tx Details -->
                                <div>
                                    <h4 class="text-sm md:text-[15px] font-medium text-[#232323] group-hover:text-primary-blue transition-colors">{{ $tx['title'] }}</h4>
                                    <span class="text-xs text-gray-text mt-0.5 block">{{ $tx['date'] }}</span>
                                </div>
                            </div>
                            <!-- Amount -->
                            <span class="text-sm md:text-base font-semibold {{ $tx['amount'] < 0 ? 'text-[#FF4B4A]' : 'text-[#41D430]' }}">
                                {{ $tx['amount'] < 0 ? '-' : '+' }}${{ number_format(abs($tx['amount'])) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>

    <!-- Row 2: Weekly Activity & Expense Statistics -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-[30px] mb-6 md:mb-[30px]">
        <!-- Weekly Activity (2/3 width on desktop) -->
        <div class="lg:col-span-2">
            <h3 class="text-[17px] md:text-[20px] font-semibold text-dark-blue mb-4 md:mb-5">Weekly Activity</h3>
            <x-card class="h-[322px] flex flex-col justify-between">
                <!-- Chart Header Legend -->
                <div class="flex items-center justify-end gap-6 mb-2">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-[#16C098]"></span>
                        <span class="text-xs md:text-sm text-gray-text font-medium">Diposit</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-[#FF5B9B]"></span>
                        <span class="text-xs md:text-sm text-gray-text font-medium">Withdraw</span>
                    </div>
                </div>

                <!-- SVG Bar Chart -->
                <div class="relative w-full h-[220px]">
                    <svg class="w-full h-full" viewBox="0 0 700 220" preserveAspectRatio="none">
                        <!-- Grid Lines -->
                        <line x1="40" y1="20" x2="680" y2="20" stroke="#F3F4F6" stroke-width="1" />
                        <line x1="40" y1="70" x2="680" y2="70" stroke="#F3F4F6" stroke-width="1" />
                        <line x1="40" y1="120" x2="680" y2="120" stroke="#F3F4F6" stroke-width="1" />
                        <line x1="40" y1="170" x2="680" y2="170" stroke="#F3F4F6" stroke-width="1" />
                        <line x1="40" y1="200" x2="680" y2="200" stroke="#E5E7EB" stroke-width="1.5" />

                        <!-- Sat (Withdraw: 480, Deposit: 240) -->
                        <g class="group cursor-pointer">
                            <rect x="80" y="27" width="10" height="173" rx="3" fill="#1814F3" class="hover:fill-blue-800 transition-colors" />
                            <rect x="94" y="114" width="10" height="86" rx="3" fill="#16C098" class="hover:fill-emerald-600 transition-colors" />
                            <title>Sat: Withdraw $480, Deposit $240</title>
                        </g>

                        <!-- Sun (Withdraw: 350, Deposit: 130) -->
                        <g class="group cursor-pointer">
                            <rect x="170" y="74" width="10" height="126" rx="3" fill="#1814F3" class="hover:fill-blue-800 transition-colors" />
                            <rect x="184" y="153" width="10" height="47" rx="3" fill="#16C098" class="hover:fill-emerald-600 transition-colors" />
                            <title>Sun: Withdraw $350, Deposit $130</title>
                        </g>

                        <!-- Mon (Withdraw: 320, Deposit: 250) -->
                        <g class="group cursor-pointer">
                            <rect x="260" y="85" width="10" height="115" rx="3" fill="#1814F3" class="hover:fill-blue-800 transition-colors" />
                            <rect x="274" y="110" width="10" height="90" rx="3" fill="#16C098" class="hover:fill-emerald-600 transition-colors" />
                            <title>Mon: Withdraw $320, Deposit $250</title>
                        </g>

                        <!-- Tue (Withdraw: 480, Deposit: 380) -->
                        <g class="group cursor-pointer">
                            <rect x="350" y="27" width="10" height="173" rx="3" fill="#1814F3" class="hover:fill-blue-800 transition-colors" />
                            <rect x="364" y="63" width="10" height="137" rx="3" fill="#16C098" class="hover:fill-emerald-600 transition-colors" />
                            <title>Tue: Withdraw $480, Deposit $380</title>
                        </g>

                        <!-- Wed (Withdraw: 150, Deposit: 230) -->
                        <g class="group cursor-pointer">
                            <rect x="440" y="146" width="10" height="54" rx="3" fill="#1814F3" class="hover:fill-blue-800 transition-colors" />
                            <rect x="454" y="117" width="10" height="83" rx="3" fill="#16C098" class="hover:fill-emerald-600 transition-colors" />
                            <title>Wed: Withdraw $150, Deposit $230</title>
                        </g>

                        <!-- Thu (Withdraw: 420, Deposit: 240) -->
                        <g class="group cursor-pointer">
                            <rect x="530" y="49" width="10" height="151" rx="3" fill="#1814F3" class="hover:fill-blue-800 transition-colors" />
                            <rect x="544" y="114" width="10" height="86" rx="3" fill="#16C098" class="hover:fill-emerald-600 transition-colors" />
                            <title>Thu: Withdraw $420, Deposit $240</title>
                        </g>

                        <!-- Fri (Withdraw: 400, Deposit: 330) -->
                        <g class="group cursor-pointer">
                            <rect x="620" y="56" width="10" height="144" rx="3" fill="#1814F3" class="hover:fill-blue-800 transition-colors" />
                            <rect x="634" y="81" width="10" height="119" rx="3" fill="#16C098" class="hover:fill-emerald-600 transition-colors" />
                            <title>Fri: Withdraw $400, Deposit $330</title>
                        </g>
                    </svg>

                    <!-- X-Axis Labels (Aligned below graph absolute overlay) -->
                    <div class="absolute bottom-0 left-0 right-0 flex justify-between px-1 text-xs text-gray-text font-normal">
                        <span class="w-[80px] text-center ml-[28px]">Sat</span>
                        <span class="w-[80px] text-center">Sun</span>
                        <span class="w-[80px] text-center">Mon</span>
                        <span class="w-[80px] text-center">Tue</span>
                        <span class="w-[80px] text-center">Wed</span>
                        <span class="w-[80px] text-center">Thu</span>
                        <span class="w-[80px] text-center mr-[8px]">Fri</span>
                    </div>

                    <!-- Y-Axis Labels -->
                    <div class="absolute left-0 top-0 bottom-6 flex flex-col justify-between text-xs text-gray-text text-right w-8">
                        <span>500</span>
                        <span>400</span>
                        <span>300</span>
                        <span>200</span>
                        <span>100</span>
                        <span>0</span>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Expense Statistics (1/3 width on desktop) -->
        <div class="lg:col-span-1">
            <h3 class="text-[17px] md:text-[20px] font-semibold text-dark-blue mb-4 md:mb-5">Expense Statistics</h3>
            <x-card class="h-[322px] flex flex-col items-center justify-center">
                <!-- SVG Exploded Pie Chart -->
                <div class="relative w-[220px] h-[220px]">
                    <svg class="w-full h-full" viewBox="0 0 100 100">
                        <!-- Exploded segments via SVG arcs and group translates:
                            30% Entertainment (Dark Navy): angle -108 to -54
                            15% Bill Expense (Orange): angle -54 to 0
                            35% Others (Blue): angle 0 to 126
                            20% Investment (Pink): angle 126 to 198 (-162)
                        -->
                        <!-- Entertainment (30%) -->
                        <g transform="translate(-2, -3)" class="cursor-pointer group">
                            <path d="M 50 50 L 7.2 36.1 A 45 45 0 0 1 76.5 13.6 Z" fill="#343C6A" class="hover:fill-opacity-95" />
                            <text x="39" y="25.5" fill="white" font-size="6.5" font-weight="bold" text-anchor="middle">30%</text>
                            <text x="39" y="30.2" fill="white" font-size="3.8" font-weight="bold" text-anchor="middle">Entertainment</text>
                        </g>

                        <!-- Bill Expense (15%) -->
                        <g transform="translate(3, -2)" class="cursor-pointer group">
                            <path d="M 50 50 L 76.5 13.6 A 45 45 0 0 1 95 50 Z" fill="#FF823C" class="hover:fill-opacity-95" />
                            <text x="74" y="34.5" fill="white" font-size="6.5" font-weight="bold" text-anchor="middle">15%</text>
                            <text x="74" y="39.2" fill="white" font-size="3.8" font-weight="bold" text-anchor="middle">Bill Expense</text>
                        </g>

                        <!-- Others (35%) -->
                        <g transform="translate(2, 3)" class="cursor-pointer group">
                            <path d="M 50 50 L 95 50 A 45 45 0 0 1 23.5 86.4 Z" fill="#1814F3" class="hover:fill-opacity-95" />
                            <text x="64" y="64" fill="white" font-size="6.5" font-weight="bold" text-anchor="middle">35%</text>
                            <text x="64" y="68.7" fill="white" font-size="3.8" font-weight="bold" text-anchor="middle">Others</text>
                        </g>

                        <!-- Investment (20%) -->
                        <g transform="translate(-3, 2)" class="cursor-pointer group">
                            <path d="M 50 50 L 23.5 86.4 A 45 45 0 0 1 7.2 36.1 Z" fill="#E735B8" class="hover:fill-opacity-95" />
                            <text x="27" y="56" fill="white" font-size="6.5" font-weight="bold" text-anchor="middle">20%</text>
                            <text x="27" y="60.7" fill="white" font-size="3.8" font-weight="bold" text-anchor="middle">Investment</text>
                        </g>
                    </svg>
                </div>
            </x-card>
        </div>
    </div>

    <!-- Row 3: Quick Transfer & Balance History -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 md:gap-[30px]">
        <!-- Quick Transfer (2/5 width on desktop) -->
        <div class="lg:col-span-2">
            <h3 class="text-[17px] md:text-[20px] font-semibold text-dark-blue mb-4 md:mb-5">Quick Transfer</h3>
            <x-card class="h-[276px] flex flex-col justify-between py-6">
                <!-- Contact slider list -->
                <div class="flex items-center justify-between gap-4 mt-2">
                    <div class="flex-1 flex justify-around items-center overflow-x-auto gap-4 py-2 custom-scrollbar">
                        @foreach($quick_transfers as $contact)
                            <div class="flex flex-col items-center text-center cursor-pointer group shrink-0">
                                <div class="w-[60px] h-[60px] rounded-full overflow-hidden mb-3 ring-0 group-hover:ring-2 group-hover:ring-primary-blue/30 transition-all border border-slate-100">
                                    <img src="{{ $contact['avatar'] }}" alt="{{ $contact['name'] }}" class="w-full h-full object-cover">
                                </div>
                                <span class="text-xs md:text-sm font-semibold text-[#232323] group-hover:text-primary-blue transition-colors">{{ $contact['name'] }}</span>
                                <span class="text-[11px] text-gray-text mt-0.5">{{ $contact['role'] }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Slide button -->
                    <button class="w-[50px] h-[50px] rounded-full bg-white shadow-[0_4px_12px_rgba(0,0,0,0.06)] flex items-center justify-center text-gray-text hover:text-primary-blue hover:bg-indigo-50 border border-[#EDF2F7] transition-all transform hover:scale-105 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <!-- Input transfer row -->
                <div class="flex items-center gap-4 mt-4">
                    <span class="text-xs md:text-sm font-normal text-gray-text shrink-0">Write Amount</span>
                    <div class="flex-1 relative flex items-center">
                        <input 
                            type="number" 
                            step="0.01"
                            value="525.50"
                            placeholder="0.00"
                            class="w-full bg-[#F5F7FA] text-dark-blue font-semibold text-sm rounded-full pl-6 pr-[110px] py-3.5 focus:outline-none border border-transparent focus:border-primary-blue/30"
                        >
                        <button onclick="alert('Mock Transfer: Success!')" class="absolute right-0 top-0 bottom-0 bg-[#1814F3] hover:bg-blue-800 text-white rounded-full px-6 flex items-center gap-2 text-sm font-medium transition-all hover:shadow-md active:scale-95">
                            <span>Send</span>
                            <svg class="w-4 h-4 transform rotate-45" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </button>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Balance History (3/5 width on desktop) -->
        <div class="lg:col-span-3">
            <h3 class="text-[17px] md:text-[20px] font-semibold text-dark-blue mb-4 md:mb-5">Balance History</h3>
            <x-card class="h-[276px] flex flex-col justify-between">
                <!-- SVG Area Line Chart -->
                <div class="relative w-full h-[200px] mt-2">
                    <svg class="w-full h-full" viewBox="0 0 700 200" preserveAspectRatio="none">
                        <!-- Chart definitions for gradient -->
                        <defs>
                            <linearGradient id="balance-gradient" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#1814F3" stop-opacity="0.25" />
                                <stop offset="100%" stop-color="#1814F3" stop-opacity="0.0" />
                            </linearGradient>
                        </defs>

                        <!-- Dashed Grid Box Lines (Horizontal) -->
                        <line x1="50" y1="20" x2="680" y2="20" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="50" y1="57.5" x2="680" y2="57.5" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="50" y1="95" x2="680" y2="95" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="50" y1="132.5" x2="680" y2="132.5" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="50" y1="170" x2="680" y2="170" stroke="#DFEAF2" stroke-dasharray="3 3" />

                        <!-- Dashed Grid Box Lines (Vertical) -->
                        <line x1="50" y1="20" x2="50" y2="170" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="140" y1="20" x2="140" y2="170" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="230" y1="20" x2="230" y2="170" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="320" y1="20" x2="320" y2="170" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="410" y1="20" x2="410" y2="170" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="500" y1="20" x2="500" y2="170" stroke="#DFEAF2" stroke-dasharray="3 3" />
                        <line x1="590" y1="20" x2="590" y2="170" stroke="#DFEAF2" stroke-dasharray="3 3" />

                        <!-- Area fill path (exploring correct wave shape) -->
                        <path d="M 50 151 C 70 120, 80 114, 95 114 C 110 114, 120 129, 140 129 C 160 129, 170 86, 185 86 C 200 86, 215 95, 230 95 C 260 95, 290 33, 320 33 C 350 33, 380 132.5, 410 132.5 C 440 132.5, 470 71, 500 71 C 530 71, 560 129, 590 129 C 620 129, 630 57.5, 650 57.5 C 665 57.5, 670 65, 680 65 L 680 170 L 50 170 Z" fill="url(#balance-gradient)" />

                        <!-- Stroke Line path -->
                        <path d="M 50 151 C 70 120, 80 114, 95 114 C 110 114, 120 129, 140 129 C 160 129, 170 86, 185 86 C 200 86, 215 95, 230 95 C 260 95, 290 33, 320 33 C 350 33, 380 132.5, 410 132.5 C 440 132.5, 470 71, 500 71 C 530 71, 560 129, 590 129 C 620 129, 630 57.5, 650 57.5 C 665 57.5, 670 65, 680 65" fill="none" stroke="#1814F3" stroke-width="3" stroke-linecap="round" />
                    </svg>

                    <!-- X-Axis Month labels (Centered under vertical lines) -->
                    <div class="absolute bottom-0 left-0 right-0 h-4 text-[11px] text-gray-text font-normal">
                        <span style="position: absolute; left: 50px; transform: translateX(-50%);">Jul</span>
                        <span style="position: absolute; left: 140px; transform: translateX(-50%);">Aug</span>
                        <span style="position: absolute; left: 230px; transform: translateX(-50%);">Sep</span>
                        <span style="position: absolute; left: 320px; transform: translateX(-50%);">Oct</span>
                        <span style="position: absolute; left: 410px; transform: translateX(-50%);">Nov</span>
                        <span style="position: absolute; left: 500px; transform: translateX(-50%);">Dec</span>
                        <span style="position: absolute; left: 590px; transform: translateX(-50%);">Jan</span>
                    </div>

                    <!-- Y-Axis labels -->
                    <div class="absolute left-0 top-0 bottom-6 flex flex-col justify-between text-[11px] text-gray-text text-right w-8">
                        <span>800</span>
                        <span>600</span>
                        <span>400</span>
                        <span>200</span>
                        <span>0</span>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-layouts-app>
