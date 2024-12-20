<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ isset($siswa) ? route('admin.siswa.update', $siswa) : route('admin.siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($siswa)
                            @method('PUT')
                        @endisset

                        <!-- Nama Siswa -->
                        <div class="mb-4">
                            <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}" required>
                        </div>

                        <!-- Kelas -->
                        <div class="mb-4">
                            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <input type="text" name="kelas" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('kelas', $siswa->kelas ?? '') }}" required>
                        </div>

                        <!-- Foto -->
                        <div class="mb-4">
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                            <input type="file" name="foto" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @isset($siswa)
                                @if($siswa->foto)
                                    <div class="mt-2">
                                        <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" class="rounded-lg img-preview">
                                    </div>
                                @endif
                            @endisset
                        </div>

                        <!-- Tombol Kembali dan Submit -->
                        <div class="flex items-center gap-6"> 
                            <a href="{{ route('admin.siswa.index') }}" class="btn-secondary mb-3">Kembali</a>
                            <button type="submit" class="btn-primary mb-3">{{ isset($siswa) ? 'Update' : 'Tambah' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Styling untuk tombol -->
    <style>
        .btn-secondary {
            background-color: #6b7280;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #3b82f6;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn-primary:hover, .btn-secondary:hover {
            opacity: 0.8;
        }

        .alert {
            background-color: #22c55e;
            color: white;
            font-size: 1rem;
            padding: 12px 24px;
            border-radius: 8px;
            text-align: center;
        }

        input[type="text"], input[type="file"] {
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            width: 100%;
        }

        label {
            font-weight: 500;
            color: #4b5563;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        .img-preview {
            width: 40px; /* Lebar gambar */
            height: 40px; /* Tinggi gambar */
            object-fit: cover; /* gambar tetap proporsional */
            border-radius: 8px; /* sudut cekung */
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
