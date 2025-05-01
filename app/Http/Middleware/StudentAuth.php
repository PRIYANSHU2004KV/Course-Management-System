<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('student_id')) {
            return redirect()->route('student.login')->with('error', 'Please login to access this page');
        }
        return $next($request);
    }
}