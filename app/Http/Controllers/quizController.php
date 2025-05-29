<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Materi;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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




   public function hasil(Request $request)
{
    $query = HasilKuis::with(['siswa', 'kuis.materi']);

    // Filter by date range (if any)
    if ($request->has('start_date') && $request->has('end_date')) {
        $query->whereBetween('waktu_dikerjakan', [
            Carbon::parse($request->start_date)->startOfDay(),
            Carbon::parse($request->end_date)->endOfDay()
        ]);
    }

    // Filter by score (if any)
    if ($request->has('min_skor')) {
        $query->where('skor', '>=', $request->min_skor);
    }

    // Search by student name or question (if any)
    if ($request->has('search') && $request->search) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->whereHas('siswa', function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%");
            })
            ->orWhereHas('kuis', function ($q) use ($search) {
                $q->where('pertanyaan', 'like', "%$search%");
            });
        });
    }

    // Paginate the results
    $hasilKuis = $query->orderBy('waktu_dikerjakan', 'desc')->paginate(20);

    return view('hasilkuis.index', compact('hasilKuis'));
}


    public function storeHasilKuis(Request $request)
{
    $request->validate([
        'siswa_id' => 'required|integer',
        'kuis_id' => 'required|integer',
        'jawaban_user' => 'required|string|in:A,B,C,D',
    ]);

    $kuis = Kuis::findOrFail($request->kuis_id);
    $benar = $kuis->jawaban_benar === $request->jawaban_user;
    $skor = $benar ? 10 : 0;

    $hasil = new HasilKuis();
    $hasil->siswa_id = $request->siswa_id;
    $hasil->kuis_id = $request->kuis_id;
    $hasil->jawaban_user = $request->jawaban_user;
    $hasil->skor = $skor;
    $hasil->waktu_dikerjakan = Carbon::now();
    $hasil->save();

    $siswa = Siswa::find($request->siswa_id);

    return response()->json([
        'status' => 'success',
        'siswa' => $siswa,
        'hasil' => $hasil
    ]);
}

public function totalSkorSiswa($siswa_id)
{
    // Ambil semua hasil kuis berdasarkan siswa_id
    $hasilKuis = HasilKuis::where('siswa_id', $siswa_id)
                          ->get();  // Ambil semua hasil kuis siswa

    // Hitung total skor
    $totalSkor = $hasilKuis->sum('skor');  // Menghitung total skor dari semua soal yang sudah dijawab

    return response()->json([
        'status' => 'success',
        'total_skor' => $totalSkor
    ]);
}
public function showLeaderboard()
{
    // Ambil leaderboard dengan nama siswa menggunakan eager loading
    $leaderboard = HasilKuis::select('siswa_id', DB::raw('SUM(skor) as total_skor'))
                           ->groupBy('siswa_id') // Group by siswa_id
                           ->orderBy('total_skor', 'desc') // Sort by total score
                           ->with('siswa') // Eager loading untuk mengambil data siswa
                           ->paginate(10); // Batasi jumlah data per halaman jika banyak

    // Kirim data leaderboard ke view
    return view('skorhasil.index', compact('leaderboard'));
}





}
