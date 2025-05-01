@extends('layouts.app')

@section('title', 'Teacher Registration')

@section('content')
    <div class="registration-card">
        <h1>Teacher Registration</h1>
        
        <form method="POST" action="{{ route('teacher.register.post') }}">
            @csrf
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="submit-btn">Register</button>
            </div>
        </form>
        
        <p class="login-link">
            Already have an account? <a href="{{ route('teacher.login') }}">Login here</a>
        </p>
    </div>

    <style>
        .registration-card {
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .registration-card h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #4a90e2;
            outline: none;
            box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .submit-btn {
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #3a7bcc;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #666;
        }

        .login-link a {
            color: #4a90e2;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: #3a7bcc;
            text-decoration: underline;
        }
    </style>
@endsection