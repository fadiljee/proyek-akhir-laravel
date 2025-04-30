<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\QuizModel;
use App\Models\UserModel1;
use Illuminate\Support\Facades\Hash;
use App\Rules\LoginCheck;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    function login()
    {
        return view('admin.login');
    }

    function dasboard()
    {
        $jumlahQuiz = QuizModel::count();
        $jumlahSiswa = UserModel1::count();
        return view('admin.dashboard', compact('jumlahSiswa', 'jumlahQuiz'));
    }

    function tampilData()
    {
        // return view('User.dataUser');
        $users = UserModel1::all();
        return view('User.dataUser', compact('users'));
    }
    function tambahData()
    {
        return view('User.tambahUser');
    }

    function editData()
    {
        return view('User.editUser');
    }

    function daftar(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5|string|max:255',
            'nisn' => 'required|digits:10',
            
        ]);

        $dataInsert = [
            'nama' => $request->nama,
            'nisn' => $request->nisn,
        ];

        UserModel1::insert($dataInsert);

        return redirect()->route('dataSiswa')->with('success', 'Pendaftaran Berhasil');
    }

    function editUser($id)
    {
        $users = UserModel1::where('id', $id)->first();
        $data = [
            'user' => $users
        ];
        return view('User.edituser', $data);
    }

    function updateUser(Request $request, $id)
    {
        $nama = $request->input('nama');
        $nisn = $request->input('nisn');

        $dataUpdate = [
            'nama' => $nama,
            'nisn' => $nisn,
        ];

        UserModel1::where('id', $id)->update($dataUpdate);
        return redirect()->route('dataSiswa')->with('success', 'Data Berhasil Diubah');
    }

    function deleteUser($id)
    {
        $user = UserModel1::findOrFail($id);
        $user->delete();

        return redirect()->route('dataSiswa')->with('success', 'Data Berhasil Dihapus');
    }


    function proseslogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required', new LoginCheck($request)]
        ]);
        return redirect()->route('dashboardadmin');
    }

    function logout()
    {
        session::flush();
        return redirect()->route('loginadmin');
    }

}
