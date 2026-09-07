@extends('layouts.app')
@section('minimal', true)
@section('content')
<main class="grid min-h-screen place-items-center bg-slate-950 p-6">
    <form method="post" action="{{ route('register.store') }}" class="w-full max-w-md rounded-2xl bg-white p-8 text-slate-950 shadow-2xl">
        @csrf
        <h1 class="text-3xl font-black">Create Login Credentials</h1>
        <p class="mt-2 text-slate-600">Create an admin account to manage the website.</p>
        <p class="mt-3 rounded-xl bg-cyan-50 px-4 py-3 text-sm font-bold text-cyan-800">
            {{ $remainingUsers }} registration {{ $remainingUsers === 1 ? 'slot' : 'slots' }} remaining.
        </p>

        <label class="field-label">Name</label>
        <input class="field" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror

        <label class="field-label">Email</label>
        <input class="field" type="email" name="email" value="{{ old('email') }}" required>
        @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror

        <label class="field-label">Password</label>
        <input class="field" type="password" name="password" required>
        @error('password')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror

        <label class="field-label">Confirm Password</label>
        <input class="field" type="password" name="password_confirmation" required>

        <button class="btn-primary mt-6 w-full">Create Account</button>
        <p class="mt-5 text-center text-sm text-slate-600">
            Already have credentials?
            <a href="{{ route('login') }}" class="font-black text-violet-700 hover:text-violet-900">Login</a>
        </p>
    </form>
</main>
@endsection
