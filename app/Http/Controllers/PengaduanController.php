<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index() {
        if(auth()->user()->level == 'masyarakat') {
            $pengaduan = Pengaduan::where('masyarakat_id', auth()->user()->id)->get();
        } elseif(auth()->user()->level == 'admin')
            $pengaduan = Pengaduan::all();
        else {
            $pengaduan = Pengaduan::where('status', '==', '0')->get();
        }

        return view('pengaduan/index', [
            'title' => 'Semua Pengaduan',
            'pengaduan' => $pengaduan
        ]);
    }

    public function belum() {
        $this->authorize('masyarakat');
        return view('pengaduan/index', [
            'title' => 'Pengaduan Belum Ditanggapi',
            'pengaduan' => Pengaduan::where('masyarakat_id', auth()->user()->id)
            ->where('status', '0')->get()
        ]);
    }

    public function proses() {
        $this->authorize('masyarakat');
        return view('pengaduan/index', [
            'title' => 'Pengaduan Diproses',
            'pengaduan' => Pengaduan::where('masyarakat_id', auth()->user()->id)
            ->where('status', 'proses')->get()
        ]);
    }

    public function selesai() {
        $this->authorize('masyarakat');
        return view('pengaduan/index', [
            'title' => 'Pengaduan Selesai',
            'pengaduan' => Pengaduan::where('masyarakat_id', auth()->user()->id)
            ->where('status', 'selesai')->get()
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
            'isi_laporan' => 'required',
            'lampiran' => 'image|file|max:1024',
        ]);

        if($request->file('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran-laporan');
        }

        $validated['masyarakat_id'] = auth()->user()->id;

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
            'isi_laporan' => 'required',
            'lampiran' => 'image|file|max:1024',
        ]);
        
        if($request->file('lampiran')) {
            if($request->oldLampiran) {
                Storage::delete($request->oldLampiran);
            }
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran-laporan');
        }

        if(Pengaduan::where('id', $pengaduan->id)->update($validated)) {
            return redirect('pengaduan')->with('berhasil', 'Berhasil mengubah aduan!');
        }else{
            return redirect('pengaduan')->with('gagal', 'Gagal mengubah aduan!');
        }
    }

    public function destroy(Pengaduan $pengaduan) {
        if($pengaduan->lampiran) {
            Storage::delete($pengaduan->lampiran);
        }
        if(Pengaduan::destroy($pengaduan->id)) {
            return redirect('pengaduan')->with('berhasil', 'Berhasil menghapus aduan!');
        }else{
            return redirect('pengaduan')->with('gagal', 'Gagal menghapus aduan!');
        }
    }

    public function response(Pengaduan $pengaduan, Request $request) {
        $validated = $request->validate([
            'status' => 'required',
            'tanggapan' => 'required'
        ]);

        if($validated['status'] !== $pengaduan->status) {
            Pengaduan::where('id', $pengaduan->id)->update(['status' => $validated['status']]);
            Tanggapan::create([
                    'pengaduan_id' => $pengaduan->id,
                    'tanggapan' => $request->tanggapan,
                    'status' => $validated['status'],
                    'petugas_id' => auth()->user()->id,
                ]);
            return redirect()->back()->with('berhasil', 'Berhasil memberi tanggapan!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal memberi tanggapan!');
        }

    }
}
