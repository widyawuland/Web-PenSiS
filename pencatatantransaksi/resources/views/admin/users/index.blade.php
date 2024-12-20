<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4">
                    <!-- Button -->
                    <div class="flex justify-start gap-4 mb-6">
                        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2" style="background-color: #28a745; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">
                            Create
                        </a>
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 ml-auto" style="background-color: #6c757d; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">
                            Kembali
                        </a>
                    </div>

                    <!-- Table User -->
                    <table class="table mt-3 w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left bg-gray-200 text-center">Name</th>
                                <th class="px-6 py-3 text-left bg-gray-200 text-center">Email</th>
                                <th class="px-6 py-3 text-left bg-gray-200 text-center">Password</th>
                                <th class="px-6 py-3 text-left bg-gray-200 text-center">Role</th>
                                <th class="px-6 py-3 text-left bg-gray-200 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="px-6 py-3">{{ $user->name }}</td>
                                    <td class="px-6 py-3">{{ $user->email }}</td>
                                    <td class="px-6 py-3">{{ $user->password }}</td>
                                    <td class="px-6 py-3">{{ $user->role }}</td>
                                    <td class="px-6 py-3 text-center">
                                        <div class="flex justify-center gap-4">
                                            <!-- Tombol Lihat -->
                                            <a href="{{ route('admin.users.show', $user) }}" 
                                               class="inline-flex items-center px-3 py-1 text-center" 
                                               style="background-color: #007bff; color: white; border-radius: 0.375rem;">
                                                Lihat
                                            </a>
                                    
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('admin.users.edit', $user) }}" 
                                               class="inline-flex items-center px-3 py-1 text-center" 
                                               style="background-color: #ffc107; color: white; border-radius: 0.375rem;">
                                                Edit
                                            </a>
                                    
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-1 text-center" 
                                                        style="background-color: #dc3545; color: white; border-radius: 0.375rem;"
                                                        onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                    Hapus
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

<style>
    .btn {
        padding: 8px 16px;
        font-size: 1rem;
        font-weight: 500;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-primary {
        background-color: #3182CE;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2B6CB0;
    }

    .btn-secondary {
        background-color: #E2E8F0;
        color: #2D3748;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #CBD5E0;
    }

    .btn-info {
        background-color: #4C51BF;
        color: white;
        border: none;
    }

    .btn-info:hover {
        background-color: #434190;
    }

    .btn-warning {
        background-color: #ED8936;
        color: white;
        border: none;
    }

    .btn-warning:hover {
        background-color: #DD6B20;
    }

    .btn-danger {
        background-color: #E53E3E;
        color: white;
        border: none;
    }

    .btn-danger:hover {
        background-color: #C53030;
    }

    table {
        width: 100%;
        border-spacing: 0;
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #F7FAFC;
        color: #2D3748;
    }

    tr:hover {
        background-color: #F9FAFB;
    }

    tr:hover {
        background-color: #F3F4F6;
    }
</style>
