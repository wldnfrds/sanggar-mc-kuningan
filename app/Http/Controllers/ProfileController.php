<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // Validasi data yang dimasukkan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(), // Validasi email dengan pengecualian jika itu tetap sama
            'password' => 'nullable|min:5|confirmed', // Validasi password, hanya jika diubah
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Pastikan $user adalah instance User
        if (!$user instanceof User) {
            return redirect()->route('login')->with('error', 'User Tidak Di Temukan.');
        }

        // Update nama dan email
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Jika ada password yang diubah, hash password dan simpan
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Simpan perubahan
        $user->save(); // Pastikan ini dipanggil pada objek yang valid

        // Redirect kembali dengan pesan sukses
        return redirect()->route('profile.settings')->with('success', 'Profil berhasil diperbarui!');
    }
}
