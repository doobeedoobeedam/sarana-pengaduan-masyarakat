@extends('templates/auth')
@section('content')

<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
    <h1 class="text-xl font-bold leading-tight tracking-tight text-dark md:text-2xl text-center">
        Sign up your account
    </h1>
    <form action="/daftar" method="POST" class="space-y-4 md:space-y-6 [&>div>input]:border-gray">
        @csrf
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-dark">Username</label>
            <input type="text" name="username" id="username" class="p-2.5 border shadow-sm @error('username') border-danger @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" placeholder="user.name" value="{{ old('username') }}">
            @error('username')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-dark">Nama</label>
            <input type="text" name="nama" id="nama" class="p-2.5 border shadow-sm @error('nama') border-danger @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" placeholder="John Doe" value="{{ old('nama') }}">
            @error('nama')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="telepon" class="block mb-2 text-sm font-medium text-dark">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="p-2.5 border shadow-sm @error('telepon') border-danger @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" placeholder="089907319323" value="{{ old('telepon') }}">
            @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-dark">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••" class="p-2.5 border shadow-sm @error('password') border-danger @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary">
            @error('password')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full text-white bg-danger font-medium rounded-md text-sm px-5 py-2.5 text-center">Daftar</button>
        <p class="text-sm font-light text-dark text-center">
            Sudah punya akun? <a href="/masuk" class="font-medium text-danger">Masuk</a>
        </p>
    </form>
</div>

@endsection
