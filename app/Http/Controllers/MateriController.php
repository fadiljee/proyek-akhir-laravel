<?php

namespace App\Http\Controllers;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        // Menampilkan daftar materi
        $materis = Materi::all();
        return view('materi.index', compact('materis'));
    }

    public function create()
    {
        // Menampilkan form tambah materi
        return view('materi.tambahMateri');
    }

    public function store(Request $request)
    {
        // Menyimpan materi baru
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        Materi::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
        ]);

        return redirect()->route('materi')->with('success', 'Materi berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Menampilkan form edit materi berdasarkan ID
        $materi = Materi::findOrFail($id);
        return view('materi.editMateri', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        // Mengupdate materi berdasarkan ID
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        $materi = Materi::findOrFail($id);
        $materi->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
        ]);

        return redirect()->route('materi')->with('success', 'Materi berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Menghapus materi berdasarkan ID
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('materi')->with('success', 'Materi berhasil dihapus');
    }
}
