<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index() {
        return view('pengaduan/index', [
            'pengaduan' => Pengaduan::all()
        ]);
    }

    public function create() {
        return view('pengaduan/create', [
            'title' => 'Create'
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'masyarakat_id' => 'required',
            'isi_laporan' => 'required',
            // 'lampiran' => 'image|file|max:1024',
        ]);

        // $validated['masyarakat_id'] = auth()->user()->id;

        if(Pengaduan::create($validated)) {
            return redirect('pengaduan')->with('berhasil', 'Berhasil mengirim aduan!');
        }else{
            return redirect('pengaduan')->with('gagal', 'Gagal mengirim aduan!');
        }
    }
}
