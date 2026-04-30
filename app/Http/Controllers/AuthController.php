<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // ─────────────────────────────────────────────────────────────
    // SHOW LOGIN FORM
    // ─────────────────────────────────────────────────────────────
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user()->role);
        }
        return view('auth.login');
    }

    // ─────────────────────────────────────────────────────────────
    // PROCESS LOGIN
    // ─────────────────────────────────────────────────────────────
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        if (! Auth::attempt($credentials, $remember)) {
            return back()
                ->withErrors(['email' => 'Email atau password salah.'])
                ->withInput($request->only('email'));
        }

        $user = Auth::user();

        // Pastikan role hanya IT atau SDM
        if (! in_array($user->role, ['IT', 'SDM'])) {
            Auth::logout();
            return back()->withErrors(['email' => 'Akun tidak memiliki akses.']);
        }

        $request->session()->regenerate();

        return $this->redirectByRole($user->role)
            ->with('success', "Selamat datang, {$user->name}!");
    }

    // ─────────────────────────────────────────────────────────────
    // SHOW REGISTER FORM  (hanya super-admin / IT yang bisa akses)
    // ─────────────────────────────────────────────────────────────
    public function showRegister()
    {
        return view('auth.register');
    }

    // ─────────────────────────────────────────────────────────────
    // PROCESS REGISTER
    // ─────────────────────────────────────────────────────────────
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'max:150', 'unique:users,email'],
            'role'     => ['required', 'in:IT,SDM'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers(),
            ],
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah terdaftar.',
            'role.required'      => 'Role wajib dipilih.',
            'role.in'            => 'Role tidak valid.',
            'password.required'  => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'role'     => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('auth.login')
            ->with('success', "Akun {$user->name} berhasil dibuat. Silakan login.");
    }

    // ─────────────────────────────────────────────────────────────
    // LOGOUT
    // ─────────────────────────────────────────────────────────────
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')
            ->with('success', 'Anda telah berhasil keluar.');
    }

    // ─────────────────────────────────────────────────────────────
    // HELPER — Redirect berdasarkan role
    // ─────────────────────────────────────────────────────────────
    private function redirectByRole(string $role)
    {
        return match ($role) {
            'IT'  => redirect()->route('it.dashboard'),
            'SDM' => redirect()->route('sdm.dashboard'),
            default => redirect()->route('auth.login'),
        };
    }
}
