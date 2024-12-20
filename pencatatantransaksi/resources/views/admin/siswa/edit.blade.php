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
                            <input type="text" name="nama_siswa" id="nama_siswa" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}" required>
                        </div>

                        <!-- Kelas -->
                        <div class="mb-4">
                            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('kelas', $siswa->kelas ?? '') }}" required>
                        </div>

                        <!-- Foto -->
                        <div class="mb-4">
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                            <input type="file" name="foto" id="foto" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @isset($siswa)
                                @if($siswa->foto)
                                    <div class="mt-2">
                                        <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" class="w-20 h-20 object-cover rounded-lg shadow-md">
                                    </div>
                                @endif
                            @endisset
                        </div>

                        <div class="flex gap-4">
                            <!-- Tombol Kembali -->
                            <a href="{{ route('admin.siswa.index') }}" 
                               class="bg-gray-500 text-white py-2 px-6 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                Kembali
                            </a>
                        
                            <!-- Tombol Submit -->
                            <button type="submit" 
                                    class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
                                    style="background-color: #42ab6e;">
                                {{ isset($siswa) ? 'Update' : 'Tambah' }}
                            </button>
                        </div>
                    </form>
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
