<!-- resources/views/components/logout-modal.blade.php -->
@props(['id' => 'logoutModal'])

<div id="{{ $id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-lg p-6 w-80 text-center">
        <i class="fas fa-sign-out-alt text-red-500 text-4xl mb-3"></i>
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Konfirmasi Logout</h2>
        <p class="text-gray-600 mb-5">Apakah Anda yakin ingin keluar?</p>

        <div class="flex justify-center space-x-4">
            <button
                type="button"
                onclick="document.getElementById('{{ $id }}').classList.add('hidden')"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition"
            >
                Batal
            </button>

            <form action="{{ route('logout') }}" method="GET">
                <button
                    type="submit"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition"
                >
                    Ya, Keluar
                </button>
            </form>
        </div>
    </div>
</div>
