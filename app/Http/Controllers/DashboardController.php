<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return view('auth.login');
        }
        $users = User::whereNotNull('email_verified_at')->get();
        return view('dashboard', compact('users'));
    }
}
