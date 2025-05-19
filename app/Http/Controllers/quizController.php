<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Materi;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\HasilKuis;

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
        'jawaban_a' => 'required|string|max:255',
        'jawaban_b' => 'required|string|max:255',
        'jawaban_c' => 'required|string|max:255',
        'jawaban_d' => 'required|string|max:255',
        'jawaban_benar' => 'required|in:A,B,C,D', // Validasi jawaban benar
        'materi_id' => 'required|exists:materis,id', // Validasi materi_id
    ]);

    Kuis::create([
        'pertanyaan' => $request->pertanyaan,
        'jawaban_a' => $request->jawaban_a,
        'jawaban_b' => $request->jawaban_b,
        'jawaban_c' => $request->jawaban_c,
        'jawaban_d' => $request->jawaban_d,
        'jawaban_benar' => $request->jawaban_benar,
        'materi_id' => $request->materi_id,
    ]);

    return redirect()->route('kuis')->with('success', 'Kuis berhasil ditambahkan');
}


    // Menampilkan form edit kuis
    public function edit($id)
    {
        $kuis = Kuis::findOrFail($id); // Ambil kuis berdasarkan ID
        $materis = Materi::all(); // Ambil semua materi untuk pilihan
        return view('quiz.edit', compact('kuis', 'materis'));
    }
    
    // Mengupdate kuis
    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban_a' => 'required|string|max:255',
            'jawaban_b' => 'required|string|max:255',
            'jawaban_c' => 'required|string|max:255',
            'jawaban_d' => 'required|string|max:255',
            'jawaban_benar' => 'required|in:A,B,C,D',
            'materi_id' => 'required|exists:materis,id', // Validasi materi_id
        ]);
    
        $kuis = Kuis::findOrFail($id); // Ambil kuis berdasarkan ID
        $kuis->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban_a' => $request->jawaban_a,
            'jawaban_b' => $request->jawaban_b,
            'jawaban_c' => $request->jawaban_c,
            'jawaban_d' => $request->jawaban_d,
            'jawaban_benar' => $request->jawaban_benar,
            'materi_id' => $request->materi_id,
        ]);
    
        return redirect()->route('kuis')->with('success', 'Kuis berhasil diperbarui');
    }
    
    

    // Menghapus kuis
    public function destroy($materi_id)
    {
        $kuis = Kuis::findOrFail($materi_id);
        $kuis->delete();

        return redirect()->route('kuis')->with('success', 'Kuis berhasil dihapus');
    }

    public function storeHasilKuis(Request $request)
{
    $request->validate([
        'siswa_id' => 'required|integer',
        'kuis_id' => 'required|integer',
        'jawaban_user' => 'required|string|in:A,B,C,D',
    ]);

    $kuis = Kuis::find($request->kuis_id);
    $benar = $kuis->jawaban_benar === $request->jawaban_user;

    $hasil = new HasilKuis();
    $hasil->siswa_id = $request->siswa_id;
    $hasil->kuis_id = $request->kuis_id;
    $hasil->jawaban_user = $request->jawaban_user;
    $hasil->benar = $benar;
    $hasil->save();

    // Ambil data siswa berdasarkan siswa_id
    $siswa = Siswa::find($request->siswa_id);

    return response()->json([
        'status' => 'success',
        'siswa' => $siswa,
        'hasil' => $hasil
    ]);
}

}
