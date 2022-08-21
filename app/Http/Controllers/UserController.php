<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('pengguna/index', [
            'title' => 'Data Pengguna',
            'users' => User::all()
        ]);
    }

    public function masyarakat() {
        return view('pengguna/index', [
            'title' => 'Data Masyarakat',
            'users' => User::where('level', 'masyarakat')->get()
        ]);
    }

    public function petugas() {
        return view('pengguna/index', [
            'title' => 'Data Petugas',
            'users' => User::where('level', '!=', 'masyarakat')->get()
        ]);
    }

    public function create() {
        return view('pengguna/create', [
            'title' => 'Tambah Petugas',
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:6|unique:users',
            'nama' => 'required',
            'telepon' => 'required|min:11',
            'password' => 'required|min:6',
            'level' => 'required',
        ]);

        if (!$validated) {
            return redirect()->back()->with('gagal', 'Gagal menambahkan petugas!');
        }

        $validated['password'] = bcrypt($validated['password']);
        $berhasil = User::create($validated);
        if ($berhasil) {
            return redirect()->back()->with('berhasil', 'Berhasil menambahkan petugas!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menambahkan petugas!');
        }
    }

    public function destroy(User $user, $id) {
        if (User::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
