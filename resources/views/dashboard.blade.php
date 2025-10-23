@extends('layouts.app')

@section('title', 'Dashboard - KeuanganKu')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="bg-blue-600 rounded-2xl shadow-lg p-8 mb-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">
                        <i class="fas fa-hand-wave mr-2"></i>Selamat datang, {{ $username }}!
                    </h1>
                    <p class="text-blue-100">Kelola keuangan Anda dengan mudah dan efisien</p>
                </div>
                <div class="hidden md:block">
                    <i class="fas fa-chart-line text-8xl opacity-20"></i>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-wallet text-blue-600 text-xl"></i>
                    </div>
                    <span class="text-sm text-gray-500">Total Saldo</span>
                </div>
                <h3 class="text-2xl font-bold text-blue-600">Rp {{ number_format($balance, 0, ',', '.') }}</h3>
                <p class="text-sm text-green-600 mt-2">
                    <i class="fas fa-arrow-up mr-1"></i>+12.5% dari bulan lalu
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-arrow-up text-green-600 text-xl"></i>
                    </div>
                    <span class="text-sm text-gray-500">Pemasukan</span>
                </div>
                <h3 class="text-2xl font-bold text-green-600">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h3>
                <p class="text-sm text-gray-600 mt-2">Bulan Oktober 2025</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-arrow-down text-red-600 text-xl"></i>
                    </div>
                    <span class="text-sm text-gray-500">Pengeluaran</span>
                </div>
                <h3 class="text-2xl font-bold text-red-600">Rp {{ number_format($totalExpense, 0, ',', '.') }}</h3>
                <p class="text-sm text-gray-600 mt-2">Bulan Oktober 2025</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 h-fit">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-bolt text-yellow-500 mr-2"></i>Aksi Cepat
                </h3>
                <div class="space-y-3">
                    <a href="{{ route('pengelolaan', ['username' => $username]) }}"
                        class="flex items-center justify-between p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                        <div class="flex items-center">
                            <i class="fas fa-list text-green-600 text-xl mr-3"></i>
                            <span class="font-medium text-gray-800">Lihat Semua Transaksi</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </a>
                    <a href="{{ route('profile', ['username' => $username]) }}"
                        class="flex items-center justify-between p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                        <div class="flex items-center">
                            <i class="fas fa-user-cog text-purple-600 text-xl mr-3"></i>
                            <span class="font-medium text-gray-800">Kelola Profile</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-clock text-blue-500 mr-2"></i>Aktivitas Terbaru
                </h3>
                <div class="space-y-3">
                    @foreach ($transactions as $index => $transaction)
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                @if ($transaction['type'] == 'income')
                                    <i class="fas fa-arrow-up text-green-600"></i>
                                @else
                                    <i class="fas fa-arrow-down text-red-600"></i>
                                @endif
                            </div>
                            <div class="flex-1">
                                <p
                                    class="font-medium {{ $transaction['type'] == 'income' ? 'text-green-700' : 'text-red-700' }}">
                                    {{ $transaction['category'] }}</p>
                                <p class="text-sm text-gray-500">{{ $transaction['date'] }}</p>
                            </div>
                            <span
                                class="text-sm font-bold {{ $transaction['type'] == 'income' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $transaction['type'] == 'income' ? '+' : '-' }} Rp
                                {{ number_format($transaction['amount'], 0, ',', '.') }}
                            </span>
                        </div>
                        @if ($index == 3)
                            @break
                        @endif
                    @endforeach
                    {{-- <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-arrow-up text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800">Pemasukan Gaji</p>
                        <p class="text-sm text-gray-500">1 Oktober 2025</p>
                    </div>
                    <span class="font-bold text-green-600">+Rp 5.000.000</span>
                </div>
                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-arrow-down text-red-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800">Belanja Makanan</p>
                        <p class="text-sm text-gray-500">15 Oktober 2025</p>
                    </div>
                    <span class="font-bold text-red-600">-Rp 150.000</span>
                </div>
                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-arrow-up text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800">Freelance Project</p>
                        <p class="text-sm text-gray-500">10 Oktober 2025</p>
                    </div>
                    <span class="font-bold text-green-600">+Rp 1.500.000</span>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
