<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Materi;
use Illuminate\Http\Request;

class quizController extends Controller
{
    // Menampilkan daftar kuis
    public function index()
    {
        $kuis = Kuis::with('materi')->get(); // Menampilkan kuis beserta materi terkait
        return view('quiz.index', compact('kuis'));
    }

    // Menampilkan form tambah kuis
    public function create()
    {
        $materis = Materi::all(); // Menampilkan daftar materi untuk pilihan
        return view('quiz.create', compact('materis'));
    }

    // Menyimpan kuis baru
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'materi_id' => 'required|exists:materis,id', // Validasi materi_id
        ]);

        Kuis::create([
            'pertanyaan' => $request->pertanyaan,
            'materi_id' => $request->materi_id,
        ]);

        return redirect()->route('kuis')->with('success', 'Kuis berhasil ditambahkan');
    }

    // Menampilkan form edit kuis
    public function edit($id)
    {
        $kuis = Kuis::findOrFail($id);
        $materis = Materi::all(); // Menampilkan daftar materi untuk pilihan
        return view('quiz.edit', compact('kuis', 'materis'));
    }

    // Mengupdate kuis
    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'materi_id' => 'required|exists:materis,id',
        ]);

        $kuis = Kuis::findOrFail($id);
        $kuis->update([
            'pertanyaan' => $request->pertanyaan,
            'materi_id' => $request->materi_id,
        ]);

        return redirect()->route('kuis')->with('success', 'Kuis berhasil diperbarui');
    }

    // Menghapus kuis
    public function destroy($id)
    {
        $kuis = Kuis::findOrFail($id);
        $kuis->delete();

        return redirect()->route('kuis')->with('success', 'Kuis berhasil dihapus');
    }
}
