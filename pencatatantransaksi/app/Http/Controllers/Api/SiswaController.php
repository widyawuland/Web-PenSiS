<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiswaResource;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$this->authorize("Membuat Siswa");
        $data = Siswa::latest()->paginate(5);
        return new SiswaResource(true, "Data siswa berhasil diambil", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$this->authorize("Menghapus Siswa");

        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required|string|max:255',
            'foto' => 'nullable|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(["success" => false, "message" => "Validasi gagal", "errors" => $validator->errors()], 422);
        }

        $siswa = Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'foto' => $request->foto,
            'kelas' => $request->kelas,
        ]);

        return new SiswaResource(true, "Data siswa berhasil ditambahkan", $siswa);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$this->authorize("Melihat Siswa");

        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(["success" => false, "message" => "Data siswa tidak ditemukan"], 404);
        }

        return new SiswaResource(true, "Data siswa berhasil dilihat", $siswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //$this->authorize("Mengubah Siswa");

        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(["success" => false, "message" => "Data siswa tidak ditemukan"], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required|string|max:255',
            'foto' => 'nullable|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(["success" => false, "message" => "Validasi gagal", "errors" => $validator->errors()], 422);
        }

        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'foto' => $request->foto,
            'kelas' => $request->kelas,
        ]);

        return new SiswaResource(true, "Data siswa berhasil diperbarui", $siswa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //$this->authorize("Menghapus Siswa");

        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(["success" => false, "message" => "Data siswa tidak ditemukan"], 404);
        }

        $siswa->delete();

        return new SiswaResource(true, "Data siswa berhasil dihapus", $siswa);
    }
}
