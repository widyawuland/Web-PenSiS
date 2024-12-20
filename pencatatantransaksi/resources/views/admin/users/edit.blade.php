<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block">Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block">Email:</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block">Password:</label>
                            <div class="relative flex items-center">
                                <input type="password" name="password" id="password" value="{{ old('password', $user->password) }}" class="form-input w-full pr-12">
                                <button type="button" id="togglePassword" class="text-gray-500 focus:outline-none ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 3a7 7 0 016.92 6.1 1 1 0 11-1.98.2A5 5 0 1010 15a1 1 0 110 2 7 7 0 116.92-8.9A9.004 9.004 0 0010 1a1 1 0 110-2z" />
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM10 8a1 1 0 00-1 1v2a1 1 0 002 0V9a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>                        

                        <div class="mb-4">
                            <label for="role" class="block">Role:</label>
                            <select name="role" id="role" class="form-select w-full" required>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="toko" {{ $user->role == 'toko' ? 'selected' : '' }}>Toko</option>
                            </select>
                        </div>

                        <div class="mt-4 flex gap-4">
                            <!-- Tombol Edit -->
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 w-auto justify-center" 
                                    style="background-color: #ffc107; color: white; border-radius: 0.375rem;">
                                Edit
                            </button>
                        
                            <!-- Tombol Kembali -->
                            <a href="{{ route('admin.users.index', $user) }}" 
                               class="inline-flex items-center px-4 py-2 w-auto justify-center rounded-md shadow focus:outline-none focus:ring-2 focus:ring-opacity-50" 
                               style="background-color: #607D8B; color: white; text-align: center;">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icon or button text (optional)
            this.classList.toggle('text-gray-500');
            this.classList.toggle('text-gray-900');
        });
    </script>
    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <div class="container mx-auto">
            <p class="text-sm">© 2024 Kelompok 7. All Rights Reserved.</p>
            <p class="text-sm">Alamat: Jl. Serayu, Kota Madiun, Jawa Timur</p>
            <p class="text-sm">Telepon: (021) 123-4567 | Email: pensis@kelompok7.com</p>
        </div>
    </footer>
</x-app-layout>
