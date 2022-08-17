<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

class MasyarakatController extends Controller
{
    public function index() {
        return view('masyarakat/index', [
            'masyarakat' => Masyarakat::all()
        ]);
    }

    public function destroy(Masyarakat $masyarakat) {
        if(Masyarakat::destroy($masyarakat->id)) {
            return redirect('masyarakat')->with('berhasil', 'Berhasil menghapus aduan!');
        }else{
            return redirect('masyarakat')->with('gagal', 'Gagal menghapus aduan!');
        }
    }
}
