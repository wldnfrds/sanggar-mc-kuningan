<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{


    public function index()
    {
        $kontak = Kontak::first();
        return view('addKontak.index', compact('kontak'));
    }

    public function kon()
    {
        $kontak = Kontak::first(); // Kirim data kontak ke view kontak.index
        return view('kontak.index', compact('kontak'));
    }

    public function liat()
    {
        $kontaks = Kontak::all();
        return view('addKontak.kontak', compact('kontaks'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|max:255',
        ]);

        $kontak = Kontak::first();
        if (!$kontak) {
            $kontak = new Kontak();
        }

        // Mengupdate atau membuat data baru
        $kontak->updateOrCreate(['id' => $kontak->id ?? null], $request->only(['address', 'phone', 'email']));

        return redirect()->route('addKontak.kontak')->with('success', 'Data Berhasil Di Tambahkan!');
    }


    public function destroy($id)
    {
        $kontak = Kontak::find($id); // Cari kontak berdasarkan ID

        if ($kontak) {
            $kontak->delete(); // Hapus kontak
            return redirect()->route('addKontak.kontak')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('addKontak.kontak')->with('error', 'Kontak tidak ditemukan.');
        }
    }
}
