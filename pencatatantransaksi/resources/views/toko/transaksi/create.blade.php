<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Transaksi Baru') }}
        </h2>
    </x-slot>

    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            font-size: 1rem;
            box-sizing: border-box;
            background-color: #f9fafb;
        }

        .form-control:focus {
            border-color: #3b82f6;
            outline: none;
            background-color: #fff;
        }

        .btn-primary {
            padding: 12px 20px;
            background-color: #3b82f6; 
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-secondary {
            padding: 12px 20px;
            background-color: #f3f4f6;
            color: #374151;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            margin-left: 10px;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #e5e7eb;
        }
    </style>

    <!-- Form -->
    <div class="form-container">
        <form action="{{ route('toko.transaksi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">

            <div class="mb-3">
                <label for="namaSiswa" class="form-label">Nama Siswa</label>
                <input type="text" id="namaSiswa" class="form-control" value="{{ $siswa->nama_siswa }}" readonly>
            </div>

            <div class="mb-3">
                <label for="jumlahPengurangan" class="form-label">Jumlah Pengurangan</label>
                <input type="number" name="jumlah_pengurangan" id="jumlahPengurangan" class="form-control" min="0.01" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Proses Transaksi</button>
            <a href="{{ route('toko.transaksi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <div class="container mx-auto">
            <p class="text-sm">© 2024 Kelompok 7. All Rights Reserved.</p>
            <p class="text-sm">Alamat: Jl. Serayu, Kota Madiun, Jawa Timur</p>
            <p class="text-sm">Telepon: (021) 123-4567 | Email: pensis@kelompok7.com</p>
        </div>
    </footer>
</x-app-layout>
