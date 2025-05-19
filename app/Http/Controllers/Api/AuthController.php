<?php
namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use App\Models\UserModel1;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel1;
use Illuminate\Http\Request;
use App\Models\Materi;
use Illuminate\Support\Facades\Validator;
use App\Models\Kuis;

class AuthController extends Controller
{
    // Login menggunakan NISN tanpa password
    public function login(Request $request)
    {
        // Validasi data NISN
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|digits:10', // NISN wajib dan harus 10 digit
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Mencari data siswa berdasarkan NISN di tabel data_siswa
        $siswa = UserModel1::where('nisn', $request->nisn)->first();

        if (!$siswa) {
            return response()->json(['message' => 'NISN tidak ditemukan'], 404);
        }

        // Jika NISN ditemukan, kirimkan response sukses
        return response()->json([
            'message' => 'Login berhasil',
            'data_siswa' => $siswa,
        ]);
    }
      public function index()
    {
        // Mengambil semua materi
        $materis = Materi::all();
        return response()->json($materis);
    }

    public function show($id)
    {
        // Mengambil materi berdasarkan ID
        $materi = Materi::find($id);
        
        if (!$materi) {
            return response()->json(['message' => 'Materi tidak ditemukan'], 404);
        }

        return response()->json($materi);
    }
    
    public function searchByTitle(Request $request)
{
    // Validasi input
    $request->validate([
        'judul' => 'required|string|min:3', // Pastikan ada judul yang dicari
    ]);

    // Ambil materi berdasarkan judul yang dicari
    $materis = Materi::where('judul', 'like', '%' . $request->judul . '%')->get();

    if ($materis->isEmpty()) {
        return response()->json(['message' => 'Materi tidak ditemukan'], 404);
    }

    return response()->json($materis);
}


    //kuis
    public function kuis()
    {
        // Mengambil semua kuis dan relasi dengan materi
        $kuis = Kuis::with('materi')->get();
        
        return response()->json(['kuis' => $kuis]);
    }

    // Menampilkan kuis berdasarkan ID
    public function kuisShow($id)
    {
        // Mengambil kuis berdasarkan ID dan relasi dengan materi
        $kuis = Kuis::with('materi')->where('materi_id', $id)->get();
    
        if ($kuis->isEmpty()) {
            return response()->json(['message' => 'Kuis tidak ditemukan'], 404);
        }
    
        return response()->json([
            'kuis' => $kuis
        ]);
    }

}
