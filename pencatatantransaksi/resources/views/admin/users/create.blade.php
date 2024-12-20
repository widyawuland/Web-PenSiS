<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Buat User Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        <!-- Tabel -->
                        <table class="form-table mx-auto mb-6" style="width: 80%; border-collapse: collapse;">
                            <tbody>
                                <!-- Name -->
                                <tr>
                                    <td class="label">Name</td>
                                    <td>
                                        <input type="text" name="name" id="name" class="input-field" required>
                                    </td>
                                </tr>

                                <!-- Email -->
                                <tr>
                                    <td class="label">Email</td>
                                    <td>
                                        <input type="email" name="email" id="email" class="input-field" required>
                                    </td>
                                </tr>

                                <!-- Password -->
                                <tr>
                                    <td class="label">Password</td>
                                    <td>
                                        <input type="password" name="password" id="password" class="input-field" required>
                                    </td>
                                </tr>

                                <!-- Role -->
                                <tr>
                                    <td class="label">Role</td>
                                    <td>
                                        <select name="role" id="role" class="input-field" required>
                                            <option value="admin">Admin</option>
                                            <option value="toko">Toko</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="button-container flex justify-start gap-4">
                            <!-- Tombol Submit -->
                            <button type="submit" class="inline-flex items-center px-4 py-2" style="background-color: #28a745; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">
                                Create User
                            </button>

                            <!-- Tombol Back -->
                            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 w-auto justify-center rounded-md shadow focus:outline-none focus:ring-2 focus:ring-opacity-50" 
                            style="background-color: #607D8B; color: white; text-align: center;">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px;
            margin-bottom: 30px;
        }

        .form-table td {
            padding: 10px;
            vertical-align: top;
        }

        .label {
            text-align: right;
            font-size: 1rem;
            font-weight: 500;
            color: #4A5568;
            padding-right: 20px;
            width: 150px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            border: 1px solid #CBD5E0;
            border-radius: 8px;
            font-size: 1rem;
            color: #4A5568;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-field:focus {
            border-color: #3182CE;
        }

        .button-container {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .submit-btn {
            padding: 12px 20px;
            background-color: #3182CE;
            color: white;
            font-size: 1.125rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #2B6CB0;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #E2E8F0;
            color: #2D3748;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .back-btn:hover {
            background-color: #CBD5E0;
            color: #2B6CB0;
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
