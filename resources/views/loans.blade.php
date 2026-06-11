<x-layouts-app>
    <x-slot:title>Loans</x-slot:title>

    <!-- Loans Header Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-[30px] mb-6 md:mb-[30px]">
        @foreach($stats as $stat)
            <x-card class="flex items-center gap-[25px] p-5 !rounded-[25px]">
                <!-- Icon container -->
                <div class="w-[60px] h-[60px] rounded-full {{ $stat['bg_class'] }} {{ $stat['text_class'] }} flex items-center justify-center shrink-0">
                    {!! $stat['icon'] !!}
                </div>
                <!-- Numbers -->
                <div>
                    <span class="text-xs md:text-sm font-normal text-gray-text block mb-1.5">{{ $stat['title'] }}</span>
                    <span class="text-lg md:text-xl font-bold text-dark-blue">${{ number_format($stat['amount']) }}</span>
                </div>
            </x-card>
        @endforeach
    </div>

    <!-- Active Loans Table Section -->
    <div class="flex flex-col">
        <h3 class="text-[17px] md:text-[20px] font-semibold text-dark-blue mb-4 md:mb-5">Active Loans Overview</h3>
        
        <x-card class="p-0 overflow-hidden !rounded-[25px]">
            <!-- Table Wrapper (Horizontal scrolling on mobile) -->
            <div class="w-full overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse min-w-[800px]">
                    <thead>
                        <tr class="border-b border-border-light">
                            <th class="py-4 md:py-5 px-6 text-xs md:text-sm font-semibold text-gray-text tracking-wider">SL No</th>
                            <th class="py-4 md:py-5 px-6 text-xs md:text-sm font-semibold text-gray-text tracking-wider">Loan Money</th>
                            <th class="py-4 md:py-5 px-6 text-xs md:text-sm font-semibold text-gray-text tracking-wider">Left to Repay</th>
                            <th class="py-4 md:py-5 px-6 text-xs md:text-sm font-semibold text-gray-text tracking-wider">Duration</th>
                            <th class="py-4 md:py-5 px-6 text-xs md:text-sm font-semibold text-gray-text tracking-wider">Interest Rate</th>
                            <th class="py-4 md:py-5 px-6 text-xs md:text-sm font-semibold text-gray-text tracking-wider">Installment</th>
                            <th class="py-4 md:py-5 px-6 text-xs md:text-sm font-semibold text-gray-text tracking-wider text-right">Repay</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#F3F4F6]">
                        @forelse($loans as $loan)
                            <tr class="hover:bg-[#F9FAFB] transition-colors group">
                                <td class="py-4 px-6 text-sm md:text-[15px] font-medium text-dark-blue">{{ $loan['sl'] }}.</td>
                                <td class="py-4 px-6 text-sm md:text-[15px] font-medium text-dark-blue">${{ number_format($loan['loan_money']) }}</td>
                                <td class="py-4 px-6 text-sm md:text-[15px] font-medium text-dark-blue">${{ number_format($loan['left_to_repay']) }}</td>
                                <td class="py-4 px-6 text-sm md:text-[15px] font-normal text-gray-text">{{ $loan['duration'] }}</td>
                                <td class="py-4 px-6 text-sm md:text-[15px] font-normal text-gray-text">{{ $loan['interest_rate'] }}</td>
                                <td class="py-4 px-6 text-sm md:text-[15px] font-medium text-dark-blue">${{ number_format($loan['installment']) }} / month</td>
                                <td class="py-4 px-6 text-right">
                                    <button 
                                        onclick="alert('Processing mock repayment of ${{ number_format($loan['installment']) }} for SL {{ $loan['sl'] }}')" 
                                        class="px-5 py-1.5 border border-[#1814F3] text-[#1814F3] hover:bg-[#1814F3] hover:text-white rounded-full text-xs md:text-sm font-medium transition-all inline-block hover:shadow-sm"
                                    >
                                        Repay
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-12 text-center text-sm text-gray-text">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span>No loan records match your search filter.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        
                        <!-- Totals Row (Only if there are matching loans) -->
                        @if(count($loans) > 0)
                            <tr class="bg-red-50/20 font-bold text-[#E53E3E]">
                                <td class="py-4 md:py-5 px-6 text-sm md:text-[15px]">Total</td>
                                <td class="py-4 md:py-5 px-6 text-sm md:text-[15px]">${{ number_format($total_loan_money) }}</td>
                                <td class="py-4 md:py-5 px-6 text-sm md:text-[15px]">${{ number_format($total_left_to_repay) }}</td>
                                <td colspan="4" class="py-4 md:py-5 px-6 text-right text-xs md:text-sm font-medium text-[#718096]">
                                    Showing {{ count($loans) }} active accounts
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </x-card>
    </div>
</x-layouts-app>
