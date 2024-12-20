<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\Voucher;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Toko Dashboard
    public function index(Request $request)
    {
        // parameter pencarian
        $search = $request->input('search');
        
        // filter pencarian
        $vouchers = Voucher::with('siswa')
        ->whereHas('siswa', function ($query) use ($search) {
            $query->whereNull('deleted_at'); 
            if ($search) {
                $query->where('nama_siswa', 'like', '%' . $search . '%');
            }
        })
        ->get();
        
        return view('toko.transaksi.index', compact('vouchers'));
    }

    public function create(Siswa $siswa)
    {
        return view('toko.transaksi.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jumlah_pengurangan' => 'required|numeric|min:1',
        ]);

        $voucher = Voucher::where('siswa_id', $request->siswa_id)->firstOrFail();

        if ($voucher->sisa_saldo <= 0) {
            return redirect()->route('toko.transaksi.index')->with('error', 'Saldo habis. Tidak dapat melakukan transaksi.');
        }

        if ($voucher->sisa_saldo < $request->jumlah_pengurangan) {
            return redirect()->route('toko.transaksi.index')->with('error', 'Saldo tidak mencukupi untuk transaksi.');
        }

        // pengurangan saldo
        $voucher->sisa_saldo -= $request->jumlah_pengurangan;
        $voucher->save();

        // Jika saldo tersisa <= 5000 tetapi masih cukup untuk transaksi
        if ($voucher->sisa_saldo <= 5000 && $voucher->sisa_saldo > 0) {
            Transaksi::create([
                'voucher_id' => $voucher->id,
                'jumlah_pengurangan' => $request->jumlah_pengurangan,
                'sisa_saldo' => $voucher->sisa_saldo,
                'tanggal_transaksi' => now('Asia/Jakarta'),
            ]);

            return redirect()->route('toko.transaksi.index')->with('warning', 'Saldo hampir habis!');
        }

        // Jika saldo mencukupi, lanjutkan transaksi
        Transaksi::create([
            'voucher_id' => $voucher->id,
            'jumlah_pengurangan' => $request->jumlah_pengurangan,
            'sisa_saldo' => $voucher->sisa_saldo,
            'tanggal_transaksi' => now('Asia/Jakarta'),
        ]);

        return redirect()->route('toko.transaksi.index')->with('success', 'Transaksi berhasil.');
    }

    // Admin Dashboard
    public function indexAdmin()
    {
        $transaksis = Transaksi::with('voucher.siswa')->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function destroy(Transaksi $transaksi)
    {
        $voucher = $transaksi->voucher;

        // Kembalikan saldo
        $voucher->sisa_saldo += $transaksi->jumlah_pengurangan;
        $voucher->save();

        $transaksi->delete();
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil di-cancel dan saldo dikembalikan.');
    }

    public function reset()
    {
        // Reset or delete semua transaksi
        Transaksi::query()->delete();

        // pesan
        return redirect()->route('admin.transaksi.index')
                         ->with('success', 'Semua transkasi telah di reset.');
    }
}