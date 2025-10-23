@extends('layouts.app')

@section('title', 'Login - KeuanganKu')

@section('content-without-layout')
<div class="min-h-screen bg-blue-600 flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-100 rounded-full mb-4">
                    <i class="fas fa-wallet text-blue-600 text-4xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">KeuanganKu</h1>
                <p class="text-gray-600">Masuk ke akun Anda</p>
            </div>
            <form action="{{ route('verifikasi') }}" method="GET">
                <div class="mb-6">
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-blue-600"></i>Username
                    </label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="Masukkan username"
                        required
                    >
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-blue-600"></i>Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="Masukkan password"
                        required
                    >
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-medium shadow-lg hover:shadow-xl"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
