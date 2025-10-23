@extends('layouts.app')

@section('title', 'Pengelolaan Transaksi - KeuanganKu')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            <i class="fas fa-list-alt text-blue-600 mr-2"></i>Pengelolaan Transaksi
        </h1>
        <p class="text-gray-600">Halo, <span class="font-semibold text-blue-600">{{ $username }}</span>! Kelola semua transaksi keuangan Anda di sini</p>
    </div>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hidden lg:block">
        <div class="bg-blue-600 p-6">
            <h2 class="text-2xl font-bold text-white">
                <i class="fas fa-receipt mr-2"></i>Daftar Transaksi
            </h2>
            <p class="text-blue-100 text-sm mt-1">Total {{ count($transactions) }} transaksi</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tipe</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($transactions as $index => $transaction)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                            {{ date('d/m/Y', strtotime($transaction['date'])) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $transaction['type'] == 'income' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $transaction['category'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $transaction['description'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($transaction['type'] == 'income')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    <i class="fas fa-arrow-up mr-1"></i>Pemasukan
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                    <i class="fas fa-arrow-down mr-1"></i>Pengeluaran
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <span class="text-sm font-bold {{ $transaction['type'] == 'income' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $transaction['type'] == 'income' ? '+' : '-' }} Rp {{ number_format($transaction['amount'], 0, ',', '.') }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-8 lg:hidden space-y-4">
        @foreach($transactions as $transaction)
        <div class="bg-white rounded-xl shadow-md p-5 border-l-4 {{ $transaction['type'] == 'income' ? 'border-green-500' : 'border-red-500' }}">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-bold text-gray-800">{{ $transaction['category'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $transaction['description'] }}</p>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $transaction['type'] == 'income' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    <i class="fas fa-arrow-{{ $transaction['type'] == 'income' ? 'up' : 'down' }} mr-1"></i>
                    {{ $transaction['type'] == 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                </span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-xs text-gray-500">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    {{ date('d/m/Y', strtotime($transaction['date'])) }}
                </span>
                <span class="text-lg font-bold {{ $transaction['type'] == 'income' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $transaction['type'] == 'income' ? '+' : '-' }} Rp {{ number_format($transaction['amount'], 0, ',', '.') }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
