<?php

namespace App\Http\Controllers;

use App\Models\Leave;
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
        $leaves = null;
        $approvedLeaves = 0;
        $pendingLeaves = 0;
        $rejectedLeaves = 0;
        $totalLeaves = 0;
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $approvedLeaves = Leave::where('status', 'approved')->count();
            $pendingLeaves = Leave::where('status', 'pending')->count();
            $rejectedLeaves = Leave::where('status', 'rejected')->count();
            $totalLeaves = Leave::count();
        } else {
            $leaves = Leave::where('user_id', auth()->user()->id)->get();
        }


        return view('dashboard', compact('leaves', 'approvedLeaves', 'pendingLeaves', 'rejectedLeaves', 'totalLeaves'));
    }
}
