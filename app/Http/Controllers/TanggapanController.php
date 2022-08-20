<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller {
    public function index() {
        // $this->authorize('petugas');
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

    public function proses() {
        $this->authorize('petugas');
        return view('tanggapan/index', [
            'title' => 'Tanggapan Diproses',
            'tanggapan' => Tanggapan::where('petugas_id', auth()->user()->id)
            ->where('status', 'proses')->get()
        ]);
    }

    public function selesai() {
        $this->authorize('petugas');
        return view('tanggapan/index', [
            'title' => 'Tanggapan Selesai',
            'tanggapan' => Tanggapan::where('petugas_id', auth()->user()->id)
            ->where('status', 'selesai')->get()
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
