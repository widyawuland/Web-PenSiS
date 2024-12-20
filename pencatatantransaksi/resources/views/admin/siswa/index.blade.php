<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Daftar Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Tombol Kembali dan Tambah Siswa -->
                    <div class="mb-6">
                        <a href="{{ route('admin.siswa.create') }}" class="inline-flex items-center px-4 py-2" 
                        style="background-color: #28a745; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">Create</a>
                        <a href="{{ route('admin.siswa.archived') }}" class="inline-flex items-center px-4 py-2 ml-4" 
                        style="background-color: #17a2b8; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">Archiving</a>
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 ml-auto" 
                        style="background-color: #6c757d; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">Kembali</a>
                    </div>
                    

                    <!-- Notifikasi sukses -->
                    @if(session('success'))
                        <div class="alert alert-success mb-4 p-4 rounded-lg text-white bg-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabel Daftar Siswa -->
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswas as $siswa)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $siswa->nama_siswa }}</td>
                                    <td class="px-4 py-2">{{ $siswa->kelas }}</td>
                                    <td class="px-4 py-2 text-center">
                                        @if($siswa->foto)
                                            <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" class="img-small">
                                        @else
                                            <span>No Foto</span>
                                        @endif
                                    </td>                                    
                                    <td class="text-center">
                                        <!-- Tombol Lihat -->
                                        <a href="{{ route('admin.siswa.show', $siswa) }}" class="inline-flex items-center px-3 py-1" 
                                        style="background-color: #007bff; color: white; border-radius: 0.375rem;">Lihat</a>
                                        
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('admin.siswa.edit', $siswa) }}" class="inline-flex items-center px-3 py-1" 
                                        style="background-color: #ffc107; color: white; border-radius: 0.375rem;">Edit</a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('admin.siswa.destroy', $siswa) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1" 
                                                    style="background-color: #dc3545; color: white; border-radius: 0.375rem"
                                                    onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                                                Hapus
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

        .btn-action {
            display: inline-block;
            padding: 6px 12px;
            color: white;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            margin-right: 8px;
            transition: transform 0.2s, opacity 0.3s;
        }

        .btn-action:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        .alert {
            background-color: #22c55e;
            color: white;
            font-size: 1rem;
            padding: 12px 24px;
            border-radius: 8px;
            text-align: center;
        }

        table {
            width: 100%;
            border-spacing: 0;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background-color: #f3f4f6;
        }

        tr:hover {
            background-color: #f9fafb;
        }

        .img-small {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
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
