<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-900 leading-tight text-center mb-6">
            {{ __('Menu Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full max-w-screen-lg p-10 min-h-screen">
                    <div class="flex flex-col space-y-6">
                        <!-- Tombol Data Siswa -->
                        <a href="{{ route('admin.siswa.index') }}" 
                        class="flex items-center justify-center px-10 py-6 text-white font-bold text-2xl rounded-lg shadow-md transition-all w-full sm:w-auto"
                        style="background-color: #3878a2; hover: background-color: #2980b9;">
                            Data Siswa
                        </a>

                        <!-- Tombol Users -->
                        <a href="{{ route('admin.users.index') }}" 
                        class="flex items-center justify-center px-10 py-6 text-white font-bold text-2xl rounded-lg shadow-md transition-all w-full sm:w-auto"
                        style="background-color: #42ab6e; hover: background-color: #27ae60;">
                            Users
                        </a>

                        <!-- Tombol Voucher -->
                        <a href="{{ route('admin.vouchers.index') }}" 
                        class="flex items-center justify-center px-10 py-6 text-white font-bold text-2xl rounded-lg shadow-md transition-all w-full sm:w-auto"
                        style="background-color: #f55a49c0; hover: background-color: #c0392b;">
                            Voucher
                        </a>

                        <!-- Tombol Transaksi -->
                        <a href="{{ route('admin.transaksi.index') }}" 
                        class="flex items-center justify-center px-10 py-6 text-white font-bold text-2xl rounded-lg shadow-md transition-all w-full sm:w-auto"
                        style="background-color: #4a9e97c0; hover: background-color: #c0392b;">
                            Transaksi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <div class="container mx-auto">
            <p class="text-sm">© 2024 Kelompok 7. All Rights Reserved.</p>
            <p class="text-sm">Alamat: Jl. Serayu, Kota Madiun, Jawa Timur</p>
            <p class="text-sm">Telepon: (021) 123-4567 | Email: pensis@kelompok7.com</p>
        </div>
    </footer>
</x-app-layout>
