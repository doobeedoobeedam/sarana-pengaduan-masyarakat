@extends('templates/dashboard')
@section('content')
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden">
        <thead class="bg-danger">
            <tr class="text-white text-left">
                <th class="font-semibold text-sm uppercase px-6 py-4">#</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Pelapor</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Isi Laporan</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Status </th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"></th>
                <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray">
            @foreach ($pengaduan as $aduan)
                <tr>
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div>
                                <p> Mira Rodeo </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 truncate">
                        {{ substr($aduan->isi_laporan,0,80) . '...' }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="text-white text-sm w-1/3 pb-1 {{ $aduan->status == 'proses' ? 'bg-warning' : ''}} {{ $aduan->status == 'selesai' ? 'bg-success' : ''}} {{ $aduan->status == '0' ? 'bg-danger' : ''}} font-semibold px-2 rounded-full">{{ $aduan->status == '0' ? 'menunggu' : $aduan->status }}</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="#" class="text-warning"><i class="bx bxs-pencil"></i></a>
                        <button class="text-danger"><i class="bx bxs-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
