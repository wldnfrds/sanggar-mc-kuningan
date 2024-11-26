<?php

namespace App\Http\Controllers;

use App\Models\Mc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class McController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mc = Mc::all();
        return view('editMc.index', compact('mc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('editMc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:2048',
            'kategori' => 'required|string',
            'kota' => 'nullable|string|max:255',
            'pengalaman' => 'nullable|string|max:255',
            'media_sosial' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $mc = new Mc();
        $mc->nama = $request->nama;
        $mc->deskripsi = $request->deskripsi;
        $mc->kategori = $request->kategori;
        $mc->kota = $request->kota;
        $mc->pengalaman = $request->pengalaman;
        $mc->media_sosial = $request->media_sosial;

        // Simpan file gambar jika ada
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('mc', 'public'); // Simpan di storage/public/mc
            $mc->foto = $imagePath; // Simpan path relatif ke database
        }

        $mc->save();

        return redirect()->route('mc.index')->with('success', 'Profile berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mc = Mc::FindOrFail($id);
        return view('editMc.edit', compact('mc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:2048',
            'kategori' => 'required|string',
            'kota' => 'nullable|string|max:255',
            'pengalaman' => 'nullable|string|max:255',
            'media_sosial' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $mc = Mc::findOrFail($id);

        $mc->nama = $request->input('nama');
        $mc->deskripsi = $request->input('deskripsi');
        $mc->kategori = $request->input('kategori');
        $mc->kota = $request->input('kota');
        $mc->pengalaman = $request->input('pengalaman');
        $mc->media_sosial = $request->input('media_sosial');

        // Jika ada gambar baru diunggah
        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if ($mc->foto) {
                Storage::delete('public/' . $mc->foto);
            }

            // Simpan gambar baru
            $imagePath = $request->file('foto')->store('mc', 'public'); // Simpan di storage/public/mc
            $mc->foto = $imagePath; // Simpan path relatif ke database
        }

        $mc->save();

        return redirect()->route('mc.index')->with('success', 'Profile berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mc = Mc::findOrFail($id);
        $mc->delete();

        return redirect()->route('mc.index')->with('success', 'Profile berhasil dihapus!');
    }

    public function profile()
    {
        $mc = Mc::all();
        return view('profil.index', compact('mc'));
    }
}
