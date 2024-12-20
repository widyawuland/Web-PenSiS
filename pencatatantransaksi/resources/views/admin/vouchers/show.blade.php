<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Voucher Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                <div class="mb-4 text-lg font-semibold text-gray-700">
                    Detail Voucher {{ $voucher->siswa->nama_siswa }}
                </div>
                    <div class="mb-4">
                        <p><strong class="font-medium text-gray-700">Saldo:</strong> {{ number_format($voucher->saldo, 2) }}</p>
                        <p><strong class="font-medium text-gray-700">Sisa Saldo:</strong> {{ number_format($voucher->sisa_saldo, 2) }}</p>
                        <p><strong class="font-medium text-gray-700">Tanggal Berlaku:</strong> {{ \Carbon\Carbon::parse($voucher->tanggal_berlaku)->format('d-m-Y') }}</p>
                    </div>

                    <!-- Tombol Back -->
                    <a href="{{ route('admin.vouchers.index') }}" 
                       class="inline-flex items-center px-4 py-2" 
                       style="background-color: #007bff; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">
                        Kembali
                    </a>
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
