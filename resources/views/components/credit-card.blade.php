@props([
    'balance' => '5,756',
    'cardHolder' => 'Eddy Cusuma',
    'validThru' => '12/22',
    'cardNumber' => '3778 **** **** 1234',
    'isDark' => true
])

@if($isDark)
    <div class="h-[215px] rounded-[25px] bg-gradient-to-br from-[#2D60FF] to-[#0A30C8] text-white flex flex-col justify-between shadow-[0_10px_25px_rgba(45,96,255,0.15)] relative overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
        <!-- Top section -->
        <div class="p-6 pb-0 flex justify-between items-start">
            <div>
                <span class="text-xs font-normal text-white/70 block mb-1">Balance</span>
                <span class="text-xl md:text-2xl font-semibold">${{ number_format($balance) }}</span>
            </div>
            <!-- Chip Graphic -->
            <div class="text-[#FFF2C2]">
                <svg class="w-[34px] h-[34px]" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="33" height="33" rx="4.5" fill="#FFF2C2" fill-opacity="0.1" stroke="#FFF2C2" stroke-linecap="round"/>
                    <rect x="5.5" y="5.5" width="23" height="23" rx="2.5" stroke="#FFF2C2"/>
                    <path d="M12.5 5.5v23M21.5 5.5v23M5.5 12.5h23M5.5 21.5h23" stroke="#FFF2C2"/>
                </svg>
            </div>
        </div>

        <!-- Middle section -->
        <div class="p-6 py-0 flex gap-12">
            <div>
                <span class="text-[10px] font-normal text-white/50 uppercase block mb-1 tracking-wider">Card Holder</span>
                <span class="text-[13px] md:text-[15px] font-medium block">{{ $cardHolder }}</span>
            </div>
            <div>
                <span class="text-[10px] font-normal text-white/50 uppercase block mb-1 tracking-wider">Valid Thru</span>
                <span class="text-[13px] md:text-[15px] font-medium block">{{ $validThru }}</span>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="h-[70px] bg-gradient-to-b from-white/15 to-white/0 px-6 flex items-center justify-between border-t border-white/10 glass-card">
            <span class="text-[15px] md:text-[20px] font-semibold tracking-[2px]">{{ $cardNumber }}</span>
            <div class="text-white/60">
                <svg class="w-11 h-[30px]" viewBox="0 0 44 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="15" cy="15" r="15" fill="white" fill-opacity="0.5"/>
                    <circle cx="29" cy="15" r="15" fill="white" fill-opacity="0.2"/>
                </svg>
            </div>
        </div>
    </div>
@else
    <div class="h-[215px] rounded-[25px] bg-white border border-[#DFEAF2] text-[#343C6A] flex flex-col justify-between shadow-sm relative overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
        <!-- Top section -->
        <div class="p-6 pb-0 flex justify-between items-start">
            <div>
                <span class="text-xs font-normal text-gray-text block mb-1">Balance</span>
                <span class="text-xl md:text-2xl font-semibold text-[#1A202C]">${{ number_format($balance) }}</span>
            </div>
            <!-- Chip Graphic -->
            <div class="text-gray-400">
                <svg class="w-[34px] h-[34px]" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="33" height="33" rx="4.5" fill="#1A202C" fill-opacity="0.05" stroke="#1A202C" stroke-opacity="0.2" stroke-linecap="round"/>
                    <rect x="5.5" y="5.5" width="23" height="23" rx="2.5" stroke="#1A202C" stroke-opacity="0.2"/>
                    <path d="M12.5 5.5v23M21.5 5.5v23M5.5 12.5h23M5.5 21.5h23" stroke="#1A202C" stroke-opacity="0.2"/>
                </svg>
            </div>
        </div>

        <!-- Middle section -->
        <div class="p-6 py-0 flex gap-12">
            <div>
                <span class="text-[10px] font-normal text-gray-text uppercase block mb-1 tracking-wider">Card Holder</span>
                <span class="text-[13px] md:text-[15px] font-medium block text-[#1A202C]">{{ $cardHolder }}</span>
            </div>
            <div>
                <span class="text-[10px] font-normal text-gray-text uppercase block mb-1 tracking-wider">Valid Thru</span>
                <span class="text-[13px] md:text-[15px] font-medium block text-[#1A202C]">{{ $validThru }}</span>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="h-[70px] px-6 flex items-center justify-between border-t border-[#DFEAF2]">
            <span class="text-[15px] md:text-[20px] font-semibold tracking-[2px] text-[#1A202C]">{{ $cardNumber }}</span>
            <div class="text-gray-text">
                <svg class="w-11 h-[30px]" viewBox="0 0 44 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="15" cy="15" r="15" fill="#94A3B8" fill-opacity="0.6"/>
                    <circle cx="29" cy="15" r="15" fill="#CBD5E1" fill-opacity="0.6"/>
                </svg>
            </div>
        </div>
    </div>
@endif
