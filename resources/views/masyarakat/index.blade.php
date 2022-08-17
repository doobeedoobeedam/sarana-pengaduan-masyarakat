@extends('templates/dashboard')
@section('content')
    <div class="bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl text-danger font-semibold mb-2">Data Masyarakat</h1>
            <p class="text-base font-normal text-secondary">Ayo sampaikan laporan Anda di sini</p>
        </div>
    </div>
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden">
        <thead class="bg-danger">
            <tr class="text-white text-left">
                <th class="font-semibold text-sm uppercase px-6 py-4">#</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Nama</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Username</th>
                <th class="font-semibold text-sm uppercase px-6 py-4">Telepon </th>
                <th class="font-semibold text-sm uppercase px-6 py-4"></th>
                <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray text-secondary">
            @foreach ($masyarakat as $m)
                <tr>
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $m->nama }}</td>
                    <td class="px-6 py-4">{{ $m->username }}</td>
                    <td class="px-6 py-4">{{ $m->telepon }}</td>
                    <td class="px-6 py-4">
                        <button class="text-danger deleteBtn" data-id="{{ $m->id }}"><i class="bx bxs-trash"></i>delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
