<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('teacher.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $teacher = Teacher::where('email', $request->email)->first();

        if (!$teacher || !Hash::check($request->password, $teacher->password)) {
            return back()->with('error', 'Invalid credentials');
        }

        session(['teacher_id' => $teacher->id]);
        return redirect()->route('teacher.dashboard');
    }

    public function showRegisterForm()
    {
        return view('teacher.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session(['teacher_id' => $teacher->id]);
        return redirect()->route('teacher.dashboard');
    }

    public function logout()
    {
        session()->forget('teacher_id');
        return redirect()->route('teacher.login');
    }
}