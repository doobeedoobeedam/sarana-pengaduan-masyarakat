@extends('templates/dashboard')
@section('content')
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <form action="/pengaduan" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">ID</span>
            <input type="text" name="masyarakat_id" class="mt-1 px-3 py-2 bg-white border shadow-sm @error('masyarakat_id') border-danger @else border-gray @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" placeholder="you@example.com" value="{{ old('masyarakat_id') }}" />
            @error('masyarakat_id')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </label>
        
        <div class="mb-6">
            <label for="" class="after:content-['*'] after:ml-0.5 after:text-danger block mb-2 text-sm font-medium text-dark">Isi Laporan</label>
            <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-sm text-secondary bg-white rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" placeholder="Ketik laporan...">{{ old('isi_laporan') }}</textarea>
            @error('isi_laporan')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-dark" for="lampiran">Upload Lampiran</label>
            <input class="file:mr-5 file:py-2 file:px-6 file:border-0 file:text-sm file:font-medium file:bg-dark file:text-white block w-full text-sm text-secondary bg-white rounded-lg border @error('lampiran') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray cursor-pointer focus:outline-none" aria-describedby="lampiran_help" id="lampiran" type="file" name="lampiran">
            @error('lampiran')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
@endsection
