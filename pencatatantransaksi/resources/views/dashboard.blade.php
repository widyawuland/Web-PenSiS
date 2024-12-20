<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Selamat Datang di Website Pemantauan Jajan Siswa di SMK Jawa Tengah!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Statistik atau Info Ringkas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Card Saldo Voucher -->
                        <div class="bg-yellow-100 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-credit-card text-4xl text-yellow-600 mr-4"></i>
                                <h3 class="text-xl font-semibold text-gray-700">Saldo Voucher</h3>
                            </div>
                            <p class="text-2xl font-bold text-yellow-700">Rp 15,000</p>
                        </div>
                    </div>

                    <!-- Nominal Voucher per Siswa -->
                    <div class="mt-6">
                        <h3 class="text-2xl font-semibold text-gray-700">Nominal Voucher untuk 1 Siswa</h3>
                        <div class="bg-gray-100 p-6 rounded-lg shadow-lg mt-4">
                            <p class="text-lg text-gray-700">Setiap siswa mendapatkan voucher sebesar <strong>Rp 15,000</strong> yang dapat digunakan untuk melakukan transaksi di kantin sekolah.</p>
                        </div>
                    </div>

                    <!-- Prosedur Penggunaan Web -->
                    <div class="mt-6">
                        <h3 class="text-2xl font-semibold text-gray-700">Prosedur Penggunaan Web</h3>
                        <div class="bg-gray-100 p-6 rounded-lg shadow-lg mt-4">
                            <ul class="list-disc pl-6">
                                <li>Lakukan transaksi di kantin dengan menunjukkan identitas siswa.</li>
                                <li>Gunakan voucher untuk membeli makanan atau minuman di kantin.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Gambar Sekolah -->
                    <div class="mb-6 mt-6">
                        <img src="https://cabdindikwil1.com/wp-content/uploads/2022/01/SMKN-Jawa-Tengah.jpg" alt="SMK Jawa Tengah" class="w-full rounded-lg shadow-xl transform hover:scale-105 transition-all duration-300 ease-in-out">
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