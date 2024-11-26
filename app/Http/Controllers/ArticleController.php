<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Menampilkan form untuk menambah artikel
    public function create()
    {
        return view('addArtikel.create');
    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'summary' => 'required|string|max:255',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->author = $request->author;
        $article->content = $request->content;
        $article->summary = $request->summary;

        // Simpan file gambar jika ada
        if ($request->hasFile('img_url')) {
            $imagePath = $request->file('img_url')->store('articles', 'public'); // Simpan di storage/public/articles
            $article->img_url = $imagePath; // Simpan path relatif ke database
        }

        $article->save();

        return redirect()->route('articles.show')->with('success', 'Artikel berhasil dibuat!');
    }



    // Menampilkan daftar artikel
    public function index()
    {
        $articles = Article::all();
        return view('artikel.index', compact('articles'));
    }

    // Menampilkan form untuk mengedit artikel
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('addArtikel.edit', compact('article'));
    }

    // Memperbarui artikel
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'summary' => 'nullable|string|max:255',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $article = Article::findOrFail($id);

        $article->title = $request->input('title');
        $article->author = $request->input('author');
        $article->content = $request->input('content');
        $article->summary = $request->input('summary');

        // Jika ada gambar baru diunggah
        if ($request->hasFile('img_url')) {
            // Hapus gambar lama jika ada
            if ($article->img_url) {
                \Illuminate\Support\Facades\Storage::delete('public/' . $article->img_url);
            }

            // Simpan gambar baru
            $imagePath = $request->file('img_url')->store('articles', 'public'); // Simpan di storage/public/articles
            $article->img_url = $imagePath; // Simpan path relatif ke database
        }

        $article->save();

        return redirect()->route('articles.show')->with('success', 'Artikel berhasil diperbarui!');
    }



    // Menghapus artikel
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.show')->with('success', 'Artikel berhasil dihapus!');
    }

    public function show()
    {
        $articles = Article::all();
        return view('addArtikel.index', compact('articles'));
    }


    public function detail($id)
    {
        $article = Article::findOrFail($id); // Cari artikel berdasarkan ID
        return view('detailArtikel.index', compact('article')); // Kirim artikel ke view
    }
}
