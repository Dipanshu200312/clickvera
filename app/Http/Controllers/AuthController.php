<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    private const MAX_REGISTRATION_USERS = 5;

    public function showLogin(): View
    {
        return view('auth.login', [
            'canRegister' => User::count() < self::MAX_REGISTRATION_USERS,
        ]);
    }

    public function showRegister(): View|RedirectResponse
    {
        if (User::count() >= self::MAX_REGISTRATION_USERS) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Registration limit is complete. Please login with your credentials.']);
        }

        return view('auth.register', [
            'remainingUsers' => self::MAX_REGISTRATION_USERS - User::count(),
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        if (User::count() >= self::MAX_REGISTRATION_USERS) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Registration limit is complete. Please login with your credentials.']);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
