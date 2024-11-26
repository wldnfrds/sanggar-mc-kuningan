<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeris = Galeri::all();
        return view('addGaleri.index', compact('galeris'));
    }




    public function gal()
    {
        $galeris = Galeri::all();
        return view('galeri.index', compact('galeris'));
    }


    // public function dash()
    // {
    //     return view('addGaleri.index');
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addGaleri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            'description' => 'nullable|string',
            'status' => 'in:active,inactive',
        ]);
        $imagePath = $request->file('image')->store('galeri_images', 'public');

        Galeri::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'description' => $request->description,
            'status' => $request->status,
        ]);



        return redirect()->route('galeri.index')->with('success', 'Data Galeri berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function view($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('addGaleri.view', compact('galeri'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('addGaleri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->update($request->all());

        return redirect()->route('galeri.index')->with('success', 'Data Galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        // Hapus gambar dari storage
        if (file_exists(storage_path('app/public/' . $galeri->image_path))) {
            unlink(storage_path('app/public/' . $galeri->image_path));
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Data Galeri berhasil dihapus!');
    }
}
