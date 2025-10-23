@props(['username' => 'Guest'])

<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <i class="fas fa-wallet text-blue-600 text-2xl"></i>
            <div>
                <h1 class="text-xl font-bold text-gray-800">KeuanganKu</h1>
                <p class="text-xs text-gray-500">Kelola Keuangan Anda</p>
            </div>
        </div>

        <button
            class="md:hidden text-gray-700 text-2xl focus:outline-none"
            onclick="document.getElementById('mobileMenu').classList.toggle('hidden')"
        >
            <i class="fas fa-bars"></i>
        </button>

        <div class="hidden md:flex items-center space-x-6">
            <a href="{{ route('dashboard', ['username' => $username]) }}"
                class="text-gray-700 hover:text-blue-600 transition {{ Request::routeIs('dashboard') ? 'text-blue-600 font-semibold' : '' }}">
                <i class="fas fa-home mr-2"></i>Dashboard
            </a>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}"
                class="text-gray-700 hover:text-blue-600 transition {{ Request::routeIs('pengelolaan') ? 'text-blue-600 font-semibold' : '' }}">
                <i class="fas fa-list mr-2"></i>Pengelolaan
            </a>
            <a href="{{ route('profile', ['username' => $username]) }}"
                class="text-gray-700 hover:text-blue-600 transition {{ Request::routeIs('profile') ? 'text-blue-600 font-semibold' : '' }}">
                <i class="fas fa-user mr-2"></i>Profile
            </a>
        </div>

        <div class="hidden md:flex items-center space-x-4">
            <button type="button"
                onclick="document.getElementById('logoutModal').classList.remove('hidden')"
                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                <i class="fas fa-sign-out-alt mr-2"></i>Logout
            </button>
        </div>
    </div>

    <div id="mobileMenu" class="hidden md:hidden bg-white shadow-md border-t">
        <div class="flex flex-col space-y-2 py-3 px-6">
            <a href="{{ route('dashboard', ['username' => $username]) }}"
                class="block text-gray-700 hover:text-blue-600 transition {{ Request::routeIs('dashboard') ? 'text-blue-600 font-semibold' : '' }}">
                <i class="fas fa-home mr-2"></i>Dashboard
            </a>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}"
                class="block text-gray-700 hover:text-blue-600 transition {{ Request::routeIs('pengelolaan') ? 'text-blue-600 font-semibold' : '' }}">
                <i class="fas fa-list mr-2"></i>Pengelolaan
            </a>
            <a href="{{ route('profile', ['username' => $username]) }}"
                class="block text-gray-700 hover:text-blue-600 transition {{ Request::routeIs('profile') ? 'text-blue-600 font-semibold' : '' }}">
                <i class="fas fa-user mr-2"></i>Profile
            </a>
            <button
                type="button"
                onclick="document.getElementById('logoutModal').classList.remove('hidden'); document.getElementById('mobileMenu').classList.add('hidden');"
                class="w-full bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition mt-2">
                <i class="fas fa-sign-out-alt mr-2"></i>Logout
            </button>
        </div>
    </div>
</nav>

<x-modal id="logoutModal" />
