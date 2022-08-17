@extends('templates/dashboard')
@section('content')
    <div class="bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl text-danger font-semibold mb-2">Data Pengaduan</h1>
            <p class="text-base font-normal text-secondary">Ayo sampaikan laporan Anda di sini</p>
        </div>
        <a href="/pengaduan/create" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Buat Pengaduan</a>
    </div>
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden">
        <thead class="bg-danger">
            <tr class="text-white text-left">
                <th class="font-semibold text-sm uppercase px-6 py-4">#</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Pelapor</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Isi Laporan</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Status </th>
                <th class="font-semibold text-sm uppercase px-6 py-4"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray">
            @foreach ($pengaduan as $aduan)
                <tr>
                    <td class="px-6 py-4 text-secondary">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        @if ($aduan->masyarakat)
                            <a class="openDetail text-danger cursor-pointer" data-nama="{{ $aduan->masyarakat->nama }}" data-username="{{ $aduan->masyarakat->username }}" data-telepon="{{ $aduan->masyarakat->telepon }}">
                                {{ $aduan->masyarakat->nama }}
                            </a>
                        @else
                            <p>-</p>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-secondary">{{ substr($aduan->isi_laporan,0,95) . '...' }}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="text-white text-sm w-1/3 pb-1 {{ $aduan->status == 'proses' ? 'bg-primary' : ''}} {{ $aduan->status == 'selesai' ? 'bg-success' : ''}} {{ $aduan->status == '0' ? 'bg-warning' : ''}} font-semibold px-2 rounded-full">{{ $aduan->status == '0' ? 'menunggu' : $aduan->status }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/pengaduan/1/edit" class="text-warning"><i class="bx bxs-pencil"></i></a>
                        <form action="/pengaduan/14" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-danger"><i class="bx bxs-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
