@extends('layouts.app')

@section('title', 'Profile - KeuanganKu')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            <i class="fas fa-user-circle text-blue-600 mr-2"></i>Profile Pengguna
        </h1>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-blue-600 h-32"></div>
                <div class="px-6 pb-6">
                    <div class="flex flex-col items-center -mt-16">
                        <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center text-6xl border-4 border-white shadow-lg">
                            <i class="fas fa-user"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mt-4">{{ $profile['name'] }}</h2>
                        <p class="text-gray-500 text-sm">{{ $profile['email'] }}</p>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="flex items-center gap-10">
                            <span class="text-gray-600 text-sm">
                                <i class="fas fa-chart-line text-green-500 mr-2"></i>Total Transaksi
                            </span>
                            <span class="text-gray-800 font-semibold text-sm">24 Transaksi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-8 mb-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">
                        <i class="fas fa-user-edit text-blue-600 mr-2"></i>Informasi Personal
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border-l-4 border-blue-500 pl-4">
                        <label class="text-sm text-gray-500 font-medium">Nama Lengkap</label>
                        <p class="text-lg font-semibold text-gray-800 mt-1">{{ $profile['name'] }}</p>
                    </div>

                    <div class="border-l-4 border-green-500 pl-4">
                        <label class="text-sm text-gray-500 font-medium">Email</label>
                        <p class="text-lg font-semibold text-gray-800 mt-1">{{ $profile['email'] }}</p>
                    </div>

                    <div class="border-l-4 border-purple-500 pl-4">
                        <label class="text-sm text-gray-500 font-medium">Nomor Telepon</label>
                        <p class="text-lg font-semibold text-gray-800 mt-1">{{ $profile['phone'] }}</p>
                    </div>

                    <div class="border-l-4 border-yellow-500 pl-4">
                        <label class="text-sm text-gray-500 font-medium">Alamat</label>
                        <p class="text-lg font-semibold text-gray-800 mt-1">{{ $profile['address'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
