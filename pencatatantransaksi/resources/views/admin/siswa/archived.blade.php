<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            {{ __('Data Siswa Terhapus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Notifikasi sukses -->
                    @if(session('success'))
                        <div class="mb-6 p-4 rounded-lg text-white bg-green-500 shadow-lg flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Tabel Data Siswa Terhapus -->
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse border border-gray-300 rounded-lg shadow-md">
                            <thead class="bg-gray-100 border-b border-gray-300">
                                <tr>
                                    <th class="text-center py-3 px-4 text-sm font-medium text-gray-700">Nama Siswa</th>
                                    <th class="text-center py-3 px-4 text-sm font-medium text-gray-700">Kelas</th>
                                    <th class="text-center py-3 px-4 text-sm font-medium text-gray-700">Foto</th>
                                    <th class="text-center py-3 px-4 text-sm font-medium text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($siswas as $siswa)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200 ease-in-out border-b border-gray-200">
                                        <td class="px-4 py-3 text-sm text-gray-800 text-center">{{ $siswa->nama_siswa }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-800 text-center">{{ $siswa->kelas }}</td>
                                        <td class="px-4 py-2 text-center">
                                            @if($siswa->foto)
                                                <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" class="img-small">
                                            @else
                                                <span>No Foto</span>
                                            @endif
                                        </td> 
                                        <td class="text-center py-3">
                                            <!-- Tombol Restore -->
                                            <form action="{{ route('admin.siswa.restore', $siswa->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                <button type="submit" class="inline-flex items-center px-3 py-1" 
                                           style="background-color: #ffc107; color: white; border-radius: 0.375rem" onclick="return confirm('Yakin ingin mengembalikan data ini?')">
                                                    <i class="fas fa-undo-alt mr-2"></i> Pulihkan
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-6 text-center text-gray-500 text-sm">
                                            Tidak ada data siswa terhapus.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('admin.siswa.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                            Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <style>
        .img-small {
            width: 80px; 
            height: 80px; 
            object-fit: cover; 
            border-radius: 50%; 
            display: block; 
            margin: 0 auto; 
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
