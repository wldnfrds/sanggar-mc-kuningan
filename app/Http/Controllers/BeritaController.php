<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        return view('addBerita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addBerita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
        ]);
        $imagePath = $request->file('image')->store('news_images', 'public');

        Berita::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);



        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
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
        $berita = Berita::FindOrFail($id);
        return view('addBerita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp', // Gambar opsional
        ]);

        $berita = Berita::findOrFail($id);

        // Perbarui informasi teks (title, content)
        $berita->title = $request->title;
        $berita->content = $request->content;

        // Cek apakah ada file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($berita->image) {
                Storage::delete('public/' . $berita->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('news', 'public');
            $berita->image = $imagePath; // Simpan path relatif ke database
        }

        // Simpan perubahan
        $berita->save();

        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beritas = Berita::findOrFail($id);
        $beritas->delete();

        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }

    public function berita()
    {
        $beritas = Berita::all();
        return view('berita.index', compact('beritas'));
    }

    public function detail($id)
    {
        $berita = Berita::findOrFail($id);
        return view('detailBerita.index', compact('berita'));
    }
}
