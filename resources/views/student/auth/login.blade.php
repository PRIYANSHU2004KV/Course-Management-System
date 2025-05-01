@extends('layouts.app')

@section('title', 'Student Login')

@section('content')
    <div class="card">
        <h1 style="margin-bottom: 20px;">Student Login</h1>
        
        <form method="POST" action="{{ route('student.login.post') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span style="color: red; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span style="color: red; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
        
        <p style="margin-top: 20px;">
            Don't have an account? <a href="{{ route('student.register') }}">Register here</a>
        </p>
    </div>
@endsection