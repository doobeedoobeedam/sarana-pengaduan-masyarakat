@extends('templates/dashboard')
@section('content')
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <div class="flex flex-wrap">
        <div class="mb-8 mr-16">
            <p class="font-semibold text-sm uppercase text-danger mb-2">Pelapor</p>
            <p class="text-dark">{{ $pengaduan->masyarakat->nama }}</p>
        </div>
        <div class="mb-8 mr-16">
            <p class="font-semibold text-sm uppercase text-danger mb-2">Telepon</p>
            <p class="text-dark">{{ $pengaduan->masyarakat->telepon }}</p>
        </div>
        <div class="mb-8 mr-16">
            <p class="font-semibold text-sm uppercase text-danger mb-2">Tanggal</p>
            <p class="text-dark">{{ date('d F Y H:i', strtotime($pengaduan->created_at)) }}</p>
        </div>
        <div class="mb-8">
            <p class="font-semibold text-sm uppercase text-danger mb-2">Status</p>
            <span class="text-white text-sm w-1/3 pb-1 {{ $pengaduan->status == 'proses' ? 'bg-primary' : ''}} {{ $pengaduan->status == 'selesai' ? 'bg-success' : ''}} {{ $pengaduan->status == '0' ? 'bg-warning' : ''}} font-semibold px-2 rounded-full">{{ $pengaduan->status == '0' ? 'menunggu' : $pengaduan->status }}</span>
        </div>
    </div>
    <div class="mb-6">
        <p class="font-semibold text-sm uppercase text-danger mb-2">Isi Laporan</p>
        <p class="text-dark">{{ $pengaduan->isi_laporan }}</p>
    </div>
    @if ($pengaduan->lampiran)
    <img src="{{ asset('storage/' . $pengaduan->lampiran) }}" alt="{{ $pengaduan->masyarakat->nama }}" class="w-[600px]">
    @else
    <img src="{{ asset('storage/lampiran-laporan\2B8jvu7i5KA3mr1DnDxvoHIi5nh2qs5BN4LCpHRl.png') }}" alt="{{ $pengaduan->masyarakat->nama }}" class="w-[600px]">
    @endif
</div>

@if(!$pengaduan->status == 0)
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
        <thead class="bg-danger">
            <tr class="text-white text-left">
                <th class="font-semibold text-sm uppercase px-4 py-4">#</th>
                <th class="font-semibold text-sm uppercase px-4 py-4">Tanggal</th>
                <th class="font-semibold text-sm uppercase px-4 py-4">Ditanggapi Oleh</th>
                <th class="font-semibold text-sm uppercase px-4 py-4 text-center">Status</th>
                <th class="font-semibold text-sm uppercase px-4 py-4">Isi Tanggapan</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray">
            @foreach ($pengaduan->tanggapan as $tanggapan)
            <tr>
                <td class="px-4 py-4 text-secondary">{{ $loop->iteration }}</td>
                <td class="px-4 py-4 text-secondary">{{ date('d F Y', strtotime($tanggapan->created_at)) }}</td>
                <td class="px-4 py-4 text-secondary">{{ $tanggapan->petugas->nama }}</td>
                <td class="px-4 py-4 text-center">
                    <span class="text-white text-sm w-1/3 pb-1 {{ $tanggapan->status == 'proses' ? 'bg-primary' : ''}} {{ $tanggapan->status == 'selesai' ? 'bg-success' : ''}} {{ $tanggapan->status == '0' ? 'bg-warning' : ''}} font-semibold px-2 rounded-full">{{ $tanggapan->status == '0' ? 'menunggu' : $tanggapan->status }}</span>
                </td>
                <td class="px-4 py-4 text-secondary">{{ substr($tanggapan->tanggapan,0,70) . '...' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($pengaduan->status == 'proses' OR $pengaduan->status == 0)
    @canany(['petugas', 'admin'])
    <div class="bg-white py-6 px-9 mb-5 rounded-lg">
        <h1 class="text-lg lg:text-2xl text-danger font-semibold mb-6">Tanggapan</h1>
        <form action="/pengaduan/respon" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="pengaduanID" value="{{ $pengaduan->id }}">
            <div class="w-full mb-6">
                <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark mb-1" for="grid-state">Status</label>
                <div class="relative">
                    <select class="appearance-none px-3 py-2 bg-white border shadow-sm @error('status') border-danger @else border-gray @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" id="grid-state" name="status">
                        @if ($pengaduan->status == 'proses')
                            <option value="proses" selected>Proses</option>
                            <option value="selesai">Selesai</option>
                        @elseif($pengaduan->status == 'selesai')
                            <option value="selesai" selected>Selesai</option>
                        @elseif($pengaduan->status == 0)
                            <option value="0" selected>Belum ditanggapi</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                        @endif
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class='bx bx-chevron-down text-xl'></i>
                    </div>
                </div>
                @error('status')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-dark">Isi Tanggapan</label>
                <textarea id="tanggapan" name="tanggapan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-sm text-secondary bg-white rounded-lg border @error('tanggapan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" placeholder="Ketik laporan...">{{ old('tanggapan') }}</textarea>
                @error('tanggapan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
    @endcanany
@endif
@endsection
