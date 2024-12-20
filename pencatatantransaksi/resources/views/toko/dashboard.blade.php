<x-app-layout>
    <x-slot name="header">

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full max-w-screen-lg p-10 min-h-screen flex items-center justify-center pt-10">
        <!-- Layout Flex untuk Box Transaksi dan Scan QR -->
        <div class="flex justify-center space-x-8">
            <!-- Box Transaksi -->
            <div class="flex flex-col items-center bg-gray-100 shadow-lg rounded-lg p-6 w-80">
                <h3 class="font-semibold text-2xl text-center text-gray-900 mb-4">Lakukan Transaksi Secara Manual</h3>
                <a href="{{ route('toko.transaksi.index') }}"
                   class="text-white font-semibold py-4 px-14 shadow-xl transform transition duration-300 ease-in-out max-w-md w-auto"
                   style="background-color: #22c55e; transition: background-color 0.3s ease; font-size: 1.25rem; text-align: center; border-radius: 0.375rem; border: 2px solid #16a34a; min-width: 200px;"
                   onmouseover="this.style.backgroundColor='#16a34a'; this.style.borderColor='#15803d';"
                   onmouseout="this.style.backgroundColor='#22c55e'; this.style.borderColor='#16a34a';">
                    Transaksi
                </a>
            </div>

            <!-- Box QR Code Scanner -->
            <div class="flex flex-col items-center bg-gray-100 shadow-lg rounded-lg p-6 w-80">
                <h3 class="font-semibold text-2xl text-center text-gray-900 mb-4">Scan QR Code</h3>
                <!-- Video untuk scanner QR code -->
                <video id="preview" class="border rounded w-40 h-40 mb-4"></video>
                <div id="qr-result" class="text-sm text-gray-700">
                    QR Code Result: <span id="qr-data">None</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Instascan -->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
      // Inisialisasi scanner
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
  
      // Listener ketika QR Code berhasil dipindai
      scanner.addListener('scan', function (content) {
          // Redirect ke halaman transaksi berdasarkan pola "/transaksi/{siswa_id}/create"
          window.location.href = `/toko/transaksi/${content}/create`;
      });
  
      // Mendeteksi kamera
      Instascan.Camera.getCameras().then(function (cameras) {
          if (cameras.length > 0) {
              scanner.start(cameras[0]);
          } else {
              alert('Kamera tidak ditemukan!');
          }
      }).catch(function (e) {
          console.error(e);
          alert('Gagal mengakses kamera: ' + e.message);
      });
    </script>
    </x-slot>
    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <div class="container mx-auto">
            <p class="text-sm">© 2024 Kelompok 7. All Rights Reserved.</p>
            <p class="text-sm">Alamat: Jl. Serayu, Kota Madiun, Jawa Timur</p>
            <p class="text-sm">Telepon: (021) 123-4567 | Email: pensis@kelompok7.com</p>
        </div>
    </footer>
</x-app-layout>
