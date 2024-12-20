<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Create New Voucher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6">
                <form action="{{ route('admin.vouchers.store') }}" method="POST">
                    @csrf

                    <!-- Siswa Selection -->
                    <div class="mb-4">
                        <label for="siswa_id" class="block text-gray-700 font-medium mb-2">Select Siswa</label>
                        <select name="siswa_id" id="siswa_id" class="form-control w-full p-2 border rounded" required>
                            <option value="" disabled selected>Select a student</option>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}" {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
                                    {{ $siswa->nama_siswa }}
                                </option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                            <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Saldo Input -->
                    <div class="mb-4">
                        <label for="saldo" class="block text-gray-700 font-medium mb-2">Voucher Saldo</label>
                        <input type="number" name="saldo" id="saldo" class="form-control w-full p-2 border rounded" value="{{ old('saldo', 15000) }}" required>
                        @error('saldo')
                            <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Berlaku Input -->
                    <div class="mb-4">
                        <label for="tanggal_berlaku" class="block text-gray-700 font-medium mb-2">Voucher Expiry Date</label>
                        <input type="date" name="tanggal_berlaku" id="tanggal_berlaku" class="form-control w-full p-2 border rounded" value="{{ old('tanggal_berlaku', \Carbon\Carbon::today()->toDateString()) }}" required>
                        @error('tanggal_berlaku')
                            <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <!-- Tombol Create -->
                        <button type="submit" class="btn-create-voucher px-6 py-2 flex items-center gap-2">
                            <span>Create</span>
                        </button>
                    
                        <!-- Tombol Back -->
                        <a href="{{ route('admin.vouchers.index') }}" class="inline-flex items-center px-4 py-2 ml-auto" 
                        style="background-color: #6c757d; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">
                            <span>Kembali</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .btn-create-voucher {
            background-color: #4CAF50;
            color: white;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-create-voucher:hover {
            background-color: #45a049;
        }

        .btn-back-to-list {
            background-color: #f44336;
            color: white;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-back-to-list:hover {
            background-color: #e53935;
        }
    </style>
    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <div class="container mx-auto">
            <p class="text-sm">© 2024 Kelompok 7. All Rights Reserved.</p>
            <p class="text-sm">Alamat: Jl. Serayu, Kota Madiun, Jawa Timur</p>
            <p class="text-sm">Telepon: (021) 123-4567 | Email: pensis@kelompok7.com</p>
        </div>
    </footer>
</x-app-layout>
