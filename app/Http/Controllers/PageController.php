<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $transactions = [
        [
            'id' => 1,
            'type' => 'income',
            'category' => 'Gaji',
            'amount' => 5000000,
            'date' => '2025-10-01',
            'description' => 'Gaji Bulanan Oktober'
        ],
        [
            'id' => 2,
            'type' => 'expense',
            'category' => 'Makanan',
            'amount' => 150000,
            'date' => '2025-10-15',
            'description' => 'Makan siang dan belanja groceries'
        ],
        [
            'id' => 3,
            'type' => 'expense',
            'category' => 'Transport',
            'amount' => 50000,
            'date' => '2025-10-16',
            'description' => 'Ongkos bensin motor'
        ],
        [
            'id' => 4,
            'type' => 'income',
            'category' => 'Freelance',
            'amount' => 1500000,
            'date' => '2025-10-10',
            'description' => 'Project website client'
        ],
        [
            'id' => 5,
            'type' => 'expense',
            'category' => 'Tagihan',
            'amount' => 300000,
            'date' => '2025-10-05',
            'description' => 'Listrik dan air'
        ],
        [
            'id' => 6,
            'type' => 'expense',
            'category' => 'Hiburan',
            'amount' => 200000,
            'date' => '2025-10-18',
            'description' => 'Nonton bioskop dan makan'
        ],
    ];

    public function login()
    {
        return view('login');
    }

    public function verifikasi(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');

        return redirect()->route('dashboard', ['username' => $username]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username');
        $transactions = $this->transactions;
        $totalIncome = collect($transactions)->where('type', 'income')->sum('amount');
        $totalExpense = collect($transactions)->where('type', 'expense')->sum('amount');
        $balance = $totalIncome - $totalExpense;
        return view('dashboard', compact('username','transactions', 'totalIncome', 'totalExpense', 'balance'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');
        $transactions = $this->transactions;

        return view('pengelolaan', compact('username', 'transactions'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Guest');

        $profile = [
            'name' => $username,
            'email' => strtolower($username) . '@email.com',
            'phone' => '08123456789',
            'address' => 'Gresik, Jawa Timur',
            'joined_date' => '2024-01-15'
        ];

        return view('profile', compact('username', 'profile'));
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
