<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Daftar Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="flex justify-end mb-4 gap-4">
            <!-- Tombol Reset All -->
            <form action="{{ route('admin.transaksi.reset') }}" method="POST" style="display: inline-block;">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 ml-4" 
                style="background-color: #17a2b8; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;"
                        onclick="return confirm('Yakin ingin menghapus semua daftar transaksi ini?')">
                    Reset all
                </button>
            </form>
        
            <!-- Tombol Kembali -->
            <a href="{{ route('admin.dashboard') }}" 
            class="inline-flex items-center px-4 py-2 ml-auto" 
            style="background-color: #6c757d; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">
                Kembali
            </a>
        </div>
    
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
            <!-- Table Header and Data -->
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700">Nama Siswa</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700">Jumlah Pengurangan</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700">Sisa Saldo</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700">Tanggal Transaksi</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                    <tr class="border-b">
                        <td class="px-6 py-4 text-gray-700">{{ $transaksi->voucher->siswa->nama_siswa }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ number_format($transaksi->jumlah_pengurangan, 2) }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ number_format($transaksi->sisa_saldo, 2) }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $transaksi->tanggal_transaksi->format('d-m-Y H:i') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center mt-4">
                            <form action="{{ route('admin.transaksi.destroy', $transaksi->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1 text-center" 
                                style="background-color: #cd3a3a; color: white; border-radius: 0.375rem;">
                                    Cancel Transaksi
                                </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* Table Styling */
        .table-auto th, .table-auto td {
            border: 1px solid #E5E7EB;
        }

        .table-auto tbody tr:nth-child(even) {
            background-color: #F9FAFB;
        }

        .table-auto th {
            background-color: #F3F4F6;
            color: #4B5563;
        }

        .btn-cancel-transaksi {
            display: inline-flex;
            align-items: center;
            font-size: 14px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            background-color: #F56565;
            border: none;
        }

        .btn-cancel-transaksi:hover {
            background-color: #E53E3E;
        }

        .btn-cancel-transaksi i {
            margin-right: 8px;
        }
    </style>
</x-app-layout>
    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <div class="container mx-auto">
            <p class="text-sm">© 2024 Kelompok 7. All Rights Reserved.</p>
            <p class="text-sm">Alamat: Jl. Serayu, Kota Madiun, Jawa Timur</p>
            <p class="text-sm">Telepon: (021) 123-4567 | Email: pensis@kelompok7.com</p>
        </div>
    </footer>
