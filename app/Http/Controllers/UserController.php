<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::get();
        return view('users.blade.php', compact('users'));
    }


    public function create()
    {
        return view('user_manage.create_user');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed'],
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'status' => $request->status,
            ]);
            $role = Role::where(['name' => 'user'])->first();
            $res = $user->assignRole($role);
            if ($res) {
                return response()->json(['response' => 'error', 'message' => "User Added successfully"]);
            } else {
                return response()->json(['response' => 'error', 'message' => "User Added failed"]);
            }
        } catch (\Exception $e) {
            return response()->json(['response' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function show(string $id)
    {
        $leaves = Leave::with('user')->where('user_id', $id)->get();
        return view('profile.show', compact('leaves'));
    }


    public function edit(string $id)
    {
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['confirmed'],
        ]);

        if (!$user) {
            return redirect('user/manage')->withErrors('error', "No user");
        }
        $user = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $user->password,
            'contact' => $request->userContact,
            'role' => $request->role,
            'status' => $request->status,
        ]);
        return redirect('user/manage')->with('success', "user addedd successfully");
    }


    public function destroy(User $user)
    {
        if (!$user) {
            return redirect('user/manage')->withErrors('error', "No user");
        }
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function userManage()
    {
        $users = User::whereNot('id', auth()->user()->id)->get();
        return view('user_manage.users', compact('users'));
    }

    public function updateStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return redirect('user/manage')->with('success', "User status updated successfully");
    }
}
