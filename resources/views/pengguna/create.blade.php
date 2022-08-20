@extends('templates/dashboard')
@section('content')
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <form action="/petugas" method="POST">
        @csrf
        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">Username</span>
            <input type="text" name="username" class="mt-1 px-3 py-2 bg-white border shadow-sm @error('username') border-danger @else border-gray @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary " placeholder="user.name" value="{{ old('username') }}"/>
            @error('username')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </label>

        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">Nama</span>
            <input type="text" name="nama" class="mt-1 px-3 py-2 bg-white border shadow-sm @error('nama') border-danger @else border-gray @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary " placeholder="John Doe" value="{{ old('nama') }}"/>
            @error('nama')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </label>

        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">Telepon</span>
            <input type="text" name="telepon" class="mt-1 px-3 py-2 bg-white border shadow-sm @error('telepon') border-danger @else border-gray @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary " placeholder="089907319323" value="{{ old('telepon') }}"/>
            @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </label>

        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">Password</span>
            <input type="password" name="password" class="mt-1 px-3 py-2 bg-white border shadow-sm @error('password') border-danger @else border-gray @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" placeholder="••••••" />
            @error('password')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </label>

        <div class="w-full mb-6">
            <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark mb-1" for="grid-state">Role</label>
            <div class="relative">
                <select class="appearance-none px-3 py-2 bg-white border shadow-sm @error('level') border-danger @else border-gray @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" id="grid-state" name="level">
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class='bx bx-chevron-down text-xl'></i>
                </div>
            </div>
            @error('level')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
@endsection
