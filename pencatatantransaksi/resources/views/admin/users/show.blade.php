<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('User Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <strong class="text-lg text-gray-700">Name:</strong> <span class="text-gray-600">{{ $user->name }}</span>
                    </div>
                    <div class="mb-4">
                        <strong class="text-lg text-gray-700">Email:</strong> <span class="text-gray-600">{{ $user->email }}</span>
                    </div>
                    <div class="mb-4">
                        <strong class="text-lg text-gray-700">Password:</strong> <span class="text-gray-600">{{ $user->password }}</span>
                    </div>
                    <div class="mb-4">
                        <strong class="text-lg text-gray-700">Role:</strong> <span class="text-gray-600">{{ $user->role }}</span>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <!-- Tombol Edit -->
                        <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex items-center px-3 py-1 text-center" 
                        style="background-color: #ffc107; color: white; border-radius: 0.375rem;">
                            Edit
                        </a>
                    
                        <!-- Tombol Back -->
                        <a href="{{ route('admin.users.index', $user) }}" class="inline-flex items-center px-4 py-2 w-auto justify-center rounded-md shadow focus:outline-none focus:ring-2 focus:ring-opacity-50"
                        style="background-color: #607D8B; color: white; text-align: center; hover: background-color: #455A64; focus:ring-color: #CFD8DC;">
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

<style>
    .btn {
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: 500;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
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

    .btn-info {
        background-color: #3182CE;
        color: white;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: 500;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .btn-info:hover {
        background-color: #2B6CB0;
    }

    .text-lg {
        font-size: 1.125rem;
        font-weight: 600;
    }

    .text-gray-600 {
        color: #4A5568;
    }

    .text-gray-700 {
        color: #2D3748;
    }
</style>
