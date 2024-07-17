<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user()->role;
        if ($user == 'admin') {
            return redirect()->route('admin.dashboard');
        } else if ($user == 'teacher') {
            return redirect()->route('teacher.dashboard');
        } else if ($user == 'student') {
            return redirect()->route('student.dashboard');
        } else {
            return redirect()->route('login');
        }
    }
}
