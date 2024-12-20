<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-900 leading-tight text-center mb-8">
            {{ __('') }}
        </h2>
    </x-slot>

    <style>
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            color: white;
            text-align: center;
        }

        .alert-warning {
            background-color: #facc15;
            color: black;
        }

        .alert-danger {
            background-color: #ef4444;
        }

        .alert-success {
            background-color: #22c55e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        table thead {
            background-color: #f3f4f6;
        }

        table thead th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
            border-bottom: 2px solid #e5e7eb;
            color: #4B5563;
        }

        table tbody tr {
            border-bottom: 1px solid #e5e7eb;
        }

        table tbody tr:hover {
            background-color: #f9fafb;
        }

        table tbody td {
            padding: 10px;
        }

        .btn-primary {
            padding: 10px 20px;
            background-color: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #2563eb;
            transform: scale(1.05);
        }

        .btn-secondary {
            padding: 12px 20px;
            background-color: #bec1c6;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
            border: 2px solid #bbc3cf;
        }

        .btn-secondary:hover {
            background-color: #9ca3af;
            transform: scale(1.05);
        }

        .btn-secondary:focus {
            outline: none;
            box-shadow: 0 0 5px 2px rgba(156, 163, 175, 0.5);
        }

        .search-box {
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-box input {
            padding: 15px 20px;
            width: 100%;
            max-width: 1200px;
            height: 50px;
            border: 1px solid #e5e7eb;
            border-radius: 30px;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            padding-left: 60px;
        }

        .search-box input:focus {
            outline: none;
            box-shadow: 0 0 8px 3px rgba(59, 130, 246, 0.5);
        }

        .search-box .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #9ca3af;
        }

        .search-box form {
            width: 100%;
            padding-left: 40px;
        }
    </style>

    <!-- Notifikasi Alert -->
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <!-- Input Pencarian -->
        <div class="search-box">
            <form method="GET" action="{{ route('toko.transaksi.index') }}" style="width: 100%;">
                <div style="position: relative; width: 100%;">
                    <i class="search-icon fas fa-search"></i> <!-- Add a search icon here -->
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari Nama Siswa..." 
                        value="{{ request('search') }}" 
                    />
                </div>
            </form>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tombol Kembali -->
            <div class="flex justify-end mt-6">
                <a href="{{ route('toko.dashboard') }}" 
                   class="inline-flex items-center px-4 py-2" 
                   style="background-color: #6c757d; color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); transition: background-color 0.3s; margin-top: 1rem; margin-right: 1rem;">
                    Kembali
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">Foto</th>
                                {{-- <th class="text-center">Saldo Awal</th> --}}
                                <th class="text-center">Sisa Saldo</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                                <tr>
                                    <td>{{ $voucher->siswa->nama_siswa }}</td>
                                    <td class="text-center">
                                        <img 
                                            src="{{ $voucher->siswa->foto ? asset('storage/' . $voucher->siswa->foto) : asset('images/default-avatar.png') }}" 
                                            alt="Foto {{ $voucher->siswa->nama_siswa }}" 
                                            style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;"
                                        />
                                    </td>
                                    {{-- <td class="text-center">{{ number_format($voucher->saldo, 2) }}</td> --}}
                                    <td class="text-center">{{ number_format($voucher->sisa_saldo, 2) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('toko.transaksi.create', $voucher->siswa->id) }}" class="btn btn-primary"style="background-color: #22c55e">Buat Transaksi</a>
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
