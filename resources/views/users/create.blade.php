@extends('templates/dashboard')
@section('content')
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <form action="/pengaduan" method="POST">
        @csrf
        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">Username</span>
            <input type="text" name="username" class="mt-1 px-3 py-2 bg-white border shadow-sm border-gray placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary " placeholder="3268901012931" />
        </label>

        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">Nama</span>
            <input type="text" name="nama" class="mt-1 px-3 py-2 bg-white border shadow-sm border-gray placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary " placeholder="3268901012931" />
        </label>

        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">Telepon</span>
            <input type="text" name="telepon" class="mt-1 px-3 py-2 bg-white border shadow-sm border-gray placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary " placeholder="3268901012931" />
        </label>

        <label class="block mb-6">
            <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark">Password</span>
            <input type="password" name="password" class="mt-1 px-3 py-2 bg-white border shadow-sm border-gray placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" placeholder="3268901012931" />
        </label>

        <div class="w-full mb-6">
            <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-dark mb-1" for="grid-state">Role</label>
            <div class="relative">
                <select class="appearance-none px-3 py-2 bg-white border shadow-sm border-gray placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" id="grid-state" name="level">
                    <option>Petugas</option>
                    <option>Admin</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class='bx bx-chevron-down text-xl'></i>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
@endsection
