<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Detail Siswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Tabel Detail Siswa -->
                    <div class="overflow-x-auto mb-6">
                        <table class="w-full table-auto border-collapse">
                            <thead>
                                <tr>
                                    <th colspan="2" class="bg-gray-100 text-gray-600 text-left px-6 py-3 rounded-t-md font-semibold">
                                        Informasi Siswa
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-600">Nama :</td>
                                    <td class="px-6 py-4">{{ $siswa->nama_siswa }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-600">Kelas :</td>
                                    <td class="px-6 py-4">{{ $siswa->kelas }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-600">Foto :</td>
                                    <td class="px-6 py-4">
                                        @if($siswa->foto)
                                            <div class="flex justify-start">
                                                <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" class="w-20 h-20 object-cover rounded-lg border border-gray-300 shadow-md">
                                            </div>
                                        @else
                                            <span class="text-gray-500 italic">Tidak ada foto</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <!-- Tombol Edit -->
                        <a href="{{ route('admin.siswa.edit', $siswa) }}" 
                           class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow text-sm font-medium"
                           style="background-color: #ffc107; color: white; min-width: 100px; text-align: center;">
                            Edit
                        </a>
                    
                        <!-- Form Hapus -->
                        <form action="{{ route('admin.siswa.destroy', $siswa) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow text-sm font-medium"
                                    style="background-color: #dc3545; color: white; min-width: 100px; text-align: center;"
                                    onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                                Hapus
                            </button>
                        </form>
                    
                        <!-- Tombol Kembali -->
                        <a href="{{ route('admin.siswa.index') }}" 
                           class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow text-sm font-medium"
                           style="background-color: #607D8B; color: white; min-width: 100px; text-align: center;">
                            Kembali
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
