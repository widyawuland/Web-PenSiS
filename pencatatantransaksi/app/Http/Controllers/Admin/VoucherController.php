<?php

namespace App\Http\Controllers\Admin;

use App\Models\Voucher;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function index()
    {
        // Mengambil semua data voucher
        $vouchers = Voucher::with('siswa')->get();
        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah voucher
        $siswas = Siswa::all(); // Ambil semua data siswa
        return view('admin.vouchers.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'saldo' => 'required|numeric|min:0',
            'tanggal_berlaku' => 'required|date',
        ]);

        try {
            // Menyimpan data voucher baru
            Voucher::create($validatedData);
            return redirect()->route('admin.vouchers.index')->with('success', 'Voucher created successfully.');
        } catch (\Exception $e) {
            // Tangani jika ada error
            return back()->with('error', 'Failed to create voucher. Please try again.');
        }
    }

    public function show(Voucher $voucher)
    {
        // Menampilkan detail voucher
        return view('admin.vouchers.show', compact('voucher'));
    }

    public function edit(Voucher $voucher)
    {
        // Menampilkan form untuk edit voucher
        $siswas = Siswa::all();
        return view('admin.vouchers.edit', compact('voucher', 'siswas'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        // Validasi input
        $validatedData = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'saldo' => 'required|numeric|min:0',
            'tanggal_berlaku' => 'required|date',
        ]);

        try {
            // Mengupdate data voucher
            $voucher->update($validatedData);
            return redirect()->route('admin.vouchers.index')->with('success', 'Voucher updated successfully.');
        } catch (\Exception $e) {
            // Tangani jika ada error
            return back()->with('error', 'Failed to update voucher. Please try again.');
        }
    }

    public function destroy(Voucher $voucher)
    {
        try {
            // Menghapus voucher
            $voucher->delete();
            return redirect()->route('admin.vouchers.index')->with('success', 'Voucher deleted successfully.');
        } catch (\Exception $e) {
            // Tangani jika ada error
            return back()->with('error', 'Failed to delete voucher. Please try again.');
        }
    }

    public function reset(Voucher $voucher)
    {
        $voucher->update(['sisa_saldo' => $voucher->saldo, 'tanggal_berlaku' => now(),]);
        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil direset ke saldo awal.');
    }
    public function resetAll()
    {
        // Reset semua voucher ke saldo awal
        Voucher::query()->update(['sisa_saldo' => DB::raw('saldo'), 'tanggal_berlaku' => now(),]);

        return redirect()->route('admin.vouchers.index')->with('success', 'Semua voucher berhasil direset ke saldo awal.');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
