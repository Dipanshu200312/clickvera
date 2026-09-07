@extends('layouts.app')
@section('minimal', true)
@section('content')
<main class="grid min-h-screen place-items-center bg-slate-950 p-6">
    <form method="post" action="{{ route('login.store') }}" class="w-full max-w-md rounded-2xl bg-white p-8 text-slate-950 shadow-2xl">
        @csrf
        <h1 class="text-3xl font-black">Admin Login</h1>
        <p class="mt-2 text-slate-600">Manage the agency website and leads.</p>
        <label class="field-label">Email</label>
        <input class="field" type="email" name="email" value="{{ old('email') }}" required>
        <label class="field-label">Password</label>
        <input class="field" type="password" name="password" required>
        @error('email')<p class="mt-3 text-sm text-red-600">{{ $message }}</p>@enderror
        <button class="btn-primary mt-6 w-full">Login</button>
        @if($canRegister)
            <p class="mt-5 text-center text-sm text-slate-600">
                Need login credentials?
                <a href="{{ route('register') }}" class="font-black text-violet-700 hover:text-violet-900">Create an account</a>
            </p>
        @endif
    </form>
</main>
@endsection
