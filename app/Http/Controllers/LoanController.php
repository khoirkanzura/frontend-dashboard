<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $stats = [
            [
                'title' => 'Personal Loans',
                'amount' => 50000,
                'bg_class' => 'bg-[#E7F3FF]',
                'text_class' => 'text-[#396AFF]',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'
            ],
            [
                'title' => 'Corporate Loans',
                'amount' => 100000,
                'bg_class' => 'bg-[#FFF7E5]',
                'text_class' => 'text-[#FFBB38]',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
            ],
            [
                'title' => 'Business Loans',
                'amount' => 500000,
                'bg_class' => 'bg-[#FFEAF2]',
                'text_class' => 'text-[#FF5B9B]',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"/></svg>'
            ],
            [
                'title' => 'Custom Loans',
                'amount' => 10000,
                'bg_class' => 'bg-[#E8F8F5]',
                'text_class' => 'text-[#16A34A]',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>'
            ]
        ];

        $loans = [
            [
                'sl' => '01',
                'loan_money' => 100000,
                'left_to_repay' => 40500,
                'duration' => '8 Months',
                'interest_rate' => '12%',
                'installment' => 2000,
                'status' => 'repay'
            ],
            [
                'sl' => '02',
                'loan_money' => 50000,
                'left_to_repay' => 40500,
                'duration' => '36 Months',
                'interest_rate' => '10%',
                'installment' => 1500,
                'status' => 'repay'
            ],
            [
                'sl' => '03',
                'loan_money' => 300000,
                'left_to_repay' => 250000,
                'duration' => '12 Months',
                'interest_rate' => '8%',
                'installment' => 5000,
                'status' => 'repay'
            ],
            [
                'sl' => '04',
                'loan_money' => 30000,
                'left_to_repay' => 40500,
                'duration' => '12 Months',
                'interest_rate' => '12%',
                'installment' => 2000,
                'status' => 'repay'
            ],
            [
                'sl' => '05',
                'loan_money' => 50000,
                'left_to_repay' => 40500,
                'duration' => '12 Months',
                'interest_rate' => '10%',
                'installment' => 1500,
                'status' => 'repay'
            ],
            [
                'sl' => '06',
                'loan_money' => 80000,
                'left_to_repay' => 20000,
                'duration' => '12 Months',
                'interest_rate' => '10%',
                'installment' => 2000,
                'status' => 'repay'
            ],
            [
                'sl' => '07',
                'loan_money' => 12000,
                'left_to_repay' => 5500,
                'duration' => '3 Months',
                'interest_rate' => '12%',
                'installment' => 2000,
                'status' => 'repay'
            ],
            [
                'sl' => '08',
                'loan_money' => 160000,
                'left_to_repay' => 100000,
                'duration' => '36 Months',
                'interest_rate' => '12%',
                'installment' => 2000,
                'status' => 'repay'
            ]
        ];

        // Search filtering logic (data dummy)
        $search = $request->input('search');
        if (!empty($search)) {
            $loans = array_filter($loans, function ($loan) use ($search) {
                return stripos((string)$loan['loan_money'], $search) !== false ||
                       stripos((string)$loan['left_to_repay'], $search) !== false ||
                       stripos($loan['duration'], $search) !== false;
            });
        }

        // Totals
        $total_loan_money = array_sum(array_column($loans, 'loan_money'));
        $total_left_to_repay = array_sum(array_column($loans, 'left_to_repay'));

        return view('loans', compact('stats', 'loans', 'total_loan_money', 'total_left_to_repay', 'search'));
    }
}
