<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index() {
        $this->authorize('petugas');
        if(auth()->user()->level == 'petugas') {
            $tanggapan = Tanggapan::where('petugas_id', auth()->user()->id)->get();
        } else {
            $tanggapan = Tanggapan::all();
        }
        return view('tanggapan/index', [
            'title' => 'Semua Tanggapan',
            'tanggapan' => $tanggapan
        ]);
    }

    public function destroy(Tanggapan $tanggapan) {
        if(Tanggapan::destroy($tanggapan->id)) {
            return redirect('tanggapan')->with('berhasil', 'Berhasil menghapus tanggapan!');
        }else{
            return redirect('tanggapan')->with('gagal', 'Gagal menghapus tanggapan!');
        }
    }
}
