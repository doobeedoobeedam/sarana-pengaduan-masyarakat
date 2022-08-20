<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index() {
        if(auth()->user()->level == 'masyarakat') {
            $pengaduan = Pengaduan::where('masyarakat_id', auth()->user()->id)->get();
        } else {
            $pengaduan = Pengaduan::where('status', '!=', 'selesai')->get();
        }

        return view('pengaduan/index', [
            'title' => 'Semua Pengaduan',
            'pengaduan' => $pengaduan
        ]);
    }

    public function show(Pengaduan $pengaduan) {
        return view('pengaduan/detail', [
            'title' => 'Detil Pengaduan',
            'pengaduan' => $pengaduan
        ]);
    }

    public function create() {
        $this->authorize('masyarakat');
        return view('pengaduan/create', [
            'title' => 'Buat Pengaduan',
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'masyarakat_id' => 'required',
            'isi_laporan' => 'required',
            'lampiran' => 'image|file|max:1024',
        ]);

        if($request->file('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran-laporan');
        }

        // $validated['masyarakat_id'] = auth()->user()->id;

        if(Pengaduan::create($validated)) {
            return redirect('pengaduan')->with('berhasil', 'Berhasil mengirim aduan!');
        }else{
            return redirect('pengaduan')->with('gagal', 'Gagal mengirim aduan!');
        }
    }

    public function edit($id) {
        $this->authorize('masyarakat');
        return view('pengaduan/edit', [
            'title' => 'Ubah Pengaduan',
            'pengaduan' => Pengaduan::findOrFail($id)
        ]);
    }

    public function update(Request $request, Pengaduan $pengaduan) {
        $validated = $request->validate([
            'masyarakat_id' => 'required',
            'isi_laporan' => 'required',
            'lampiran' => 'image|file|max:1024',
        ]);

        if($request->file('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran-laporan');
        }

        if(Pengaduan::where('id', $pengaduan->id)->update($validated)) {
            return redirect('pengaduan')->with('berhasil', 'Berhasil mengubah aduan!');
        }else{
            return redirect('pengaduan')->with('gagal', 'Gagal mengubah aduan!');
        }
    }

    public function destroy(Pengaduan $pengaduan) {
        // if($post->image) {
        //     Storage::delete($post->image);
        // }
        if(Pengaduan::destroy($pengaduan->id)) {
            return redirect('pengaduan')->with('berhasil', 'Berhasil menghapus aduan!');
        }else{
            return redirect('pengaduan')->with('gagal', 'Gagal menghapus aduan!');
        }
    }

    public function response(Request $request) {
        $validated = $request->validate([
            'status' => 'required'
        ]);

        $berhasil = Pengaduan::where('id', $request->pengaduanID)->update(['status' => $validated['status']]);

        if($request->tanggapan) {
            $berhasil = Tanggapan::create([
                'pengaduan_id' => $request->pengaduanID,
                'tanggapan' => $request->tanggapan,
                'status' => $validated['status'],
                'petugas_id' => 1,
            ]);
        }

        if($berhasil) {
            return redirect()->back()->with('berhasil', 'Berhasil mengubah aduan!');
        }else{
            return redirect()->back()->with('gagal', 'Gagal mengubah aduan!');
        }
    }
}
