<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cards = [
            [
                'balance' => 5756,
                'card_holder' => 'Eddy Cusuma',
                'valid_thru' => '12/22',
                'card_number' => '3778 **** **** 1234',
                'is_dark' => true
            ],
            [
                'balance' => 5756,
                'card_holder' => 'Eddy Cusuma',
                'valid_thru' => '12/22',
                'card_number' => '3778 **** **** 1234',
                'is_dark' => false
            ]
        ];

        $transactions = [
            [
                'title' => 'Deposit from my Card',
                'date' => '28 January 2021',
                'amount' => -850,
                'type' => 'card',
                'bg_class' => 'bg-[#FFF7E5]',
                'text_class' => 'text-[#FFBB38]',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>'
            ],
            [
                'title' => 'Deposit Paypal',
                'date' => '25 January 2021',
                'amount' => 2500,
                'type' => 'paypal',
                'bg_class' => 'bg-[#E7F3FF]',
                'text_class' => 'text-[#396AFF]',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>'
            ],
            [
                'title' => 'Jemi Wilson',
                'date' => '21 January 2021',
                'amount' => 5400,
                'type' => 'user',
                'bg_class' => 'bg-[#DCFCE7]',
                'text_class' => 'text-[#16A34A]',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'
            ]
        ];

        $quick_transfers = [
            [
                'name' => 'Livia Bator',
                'role' => 'CEO',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80'
            ],
            [
                'name' => 'Randy Press',
                'role' => 'Director',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80'
            ],
            [
                'name' => 'Workman',
                'role' => 'Designer',
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80'
            ]
        ];

        return view('dashboard', compact('cards', 'transactions', 'quick_transfers'));
    }
}
