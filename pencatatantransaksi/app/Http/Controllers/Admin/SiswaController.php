<?php

namespace App\Http\Controllers\Admin;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kelas' => 'required|string|max:10',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_siswa', 'public');
        }

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'foto' => $fotoPath,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        return view('admin.siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kelas' => 'required|string|max:10',
        ]);

        $fotoPath = $siswa->foto;
        if ($request->hasFile('foto')) {
            if ($fotoPath) {
                Storage::delete('public/' . $fotoPath);
            }
            $fotoPath = $request->file('foto')->store('foto_siswa', 'public');
        }

        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'foto' => $fotoPath,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diarsipkan.');
    }

    public function restore($id)
    {
        $siswa = Siswa::onlyTrashed()->findOrFail($id);

        $siswa->restore();

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dikembalikan.');
    }

    public function archived()
    {
        $siswas = Siswa::onlyTrashed()->get();

        return view('admin.siswa.archived', compact('siswas'));
    }
}