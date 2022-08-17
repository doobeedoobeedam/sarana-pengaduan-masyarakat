@extends('templates/dashboard')
@section('content')
<div class="bg-white py-6 px-9 mb-5">
    <form action="/pengaduan" method="POST">
        @csrf
        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">ID</span>
            <input type="text" name="masyarakat_id" class="mt-1 px-3 py-2 bg-white border shadow-sm border-gray placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary " placeholder="you@example.com" />
        </label>
        
        <label for="" class="after:content-['*'] after:ml-0.5 after:text-danger block mb-2 text-sm font-medium text-dark">Isi Laporan</label>
        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="mb-6 block px-3 py-2 w-full focus:outline-none text-sm text-secondary bg-white rounded-lg border border-gray shadow-sm focus:border-gray focus:ring-gray" placeholder="Ketik laporan..."></textarea>
        
        <label class="block mb-2 text-sm font-medium text-dark" for="lampiran">Upload Lampiran</label>
        <input class="file:mr-5 file:py-2 file:px-6 file:border-0 file:text-sm file:font-medium file:bg-dark file:text-white block w-full text-sm text-secondary bg-white rounded-lg border border-gray shadow-sm focus:border-gray focus:ring-gray cursor-pointer focus:outline-none" aria-describedby="lampiran_help" id="lampiran" type="file" name="lampiran">
        <p class="mb-6 mt-1 text-xs text-secondary" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

        <div class="flex justify-end">
            <button type="submit" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
@endsection
