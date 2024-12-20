<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Voucher List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between mb-4">
                    <!-- Tombol Add Voucher -->
                    <a href="{{ route('admin.vouchers.create') }}" 
                    class="inline-flex items-center px-4 py-2" 
                    style="background-color: #28a745; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">
                        Create
                    </a>

                    <div class="flex justify-end gap-4 mt-4">
                        <!-- Tombol Reset All -->
                        <form action="{{ route('admin.vouchers.reset.all') }}" method="POST" onsubmit="return confirm('Reset semua voucher ke saldo awal?');">
                            @csrf
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2" 
                                    style="background-color: #17a2b8; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">
                                Reset All
                            </button>
                        </form>
                    
                        <!-- Tombol Back -->
                        <a href="{{ route('admin.dashboard') }}" 
                           class="inline-flex items-center px-4 py-2" 
                           style="background-color: #6c757d; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">
                            Kembali
                        </a>
                    </div>
                </div>

                <!-- Tabel Data -->
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                <th class="px-6 py-3 text-left">Siswa</th>
                                <th class="px-6 py-3 text-left">Saldo</th>
                                <th class="px-6 py-3 text-left">Sisa Saldo</th>
                                <th class="px-6 py-3 text-left">Tanggal Berlaku</th>
                                <th class="px-6 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                            @foreach ($vouchers as $voucher)
                                <tr>
                                    <td class="px-6 py-4">{{ $voucher->siswa->nama_siswa }}</td>
                                    <td class="px-6 py-4">{{ number_format($voucher->saldo, 2) }}</td>
                                    <td class="px-6 py-4">{{ number_format($voucher->sisa_saldo, 2) }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($voucher->tanggal_berlaku)->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4 text-center space-y-1">
                                        <a href="{{ route('admin.vouchers.show', $voucher) }}" 
                                           class="inline-flex items-center px-3 py-1" 
                                           style="background-color: #007bff; color: white; border-radius: 0.375rem;">
                                            Lihat
                                        </a>
                                        <a href="{{ route('admin.vouchers.edit', $voucher) }}" 
                                           class="inline-flex items-center px-3 py-1" 
                                           style="background-color: #ffc107; color: white; border-radius: 0.375rem;">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.vouchers.destroy', $voucher) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-1" 
                                                    style="background-color: #dc3545; color: white; border-radius: 0.375rem;" 
                                                    onclick="return confirm('Yakin ingin menghapus Voucher ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                        <!-- Tombol Reset -->
                                        <form action="{{ route('admin.vouchers.reset', $voucher) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-1" 
                                                    style="background-color: #17a2b8; color: white; border-radius: 0.375rem;" 
                                                    onclick="return confirm('Reset saldo voucher ini ke saldo awal?')">
                                                Reset
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
