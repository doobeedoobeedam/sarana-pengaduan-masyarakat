@extends('templates/auth')
@section('content')

<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
    <h1 class="text-xl font-bold leading-tight tracking-tight text-dark md:text-2xl text-center">
        Sign in to your account
    </h1>
    <form action="/masuk" method="POST" class="space-y-4 md:space-y-6">
        @csrf
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-dark">Username</label>
            <input type="text" name="username" id="username" class="p-2.5 border shadow-sm border-gray placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" placeholder="name@company.com">
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-dark">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="p-2.5 border shadow-sm border-gray placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary">
        </div>
        <button type="submit" class="w-full text-white bg-danger font-medium rounded-md text-sm px-5 py-2.5 text-center">Masuk</button>
        <p class="text-sm font-light text-dark text-center">
            Belum punya akun? <a href="/daftar" class="font-medium text-danger">Daftar</a>
        </p>
    </form>
</div>

@endsection
