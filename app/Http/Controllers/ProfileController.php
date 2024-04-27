<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Package;
use App\Models\Router;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{


    public function index()
    {
        $packages = Package::get();
        $router = Router::where('user_id', auth()->user()->id)->first();
        $user = User::find(auth()->user()->id);
        $userPackage = null;
        if ($router && $router->package_id) {
            $userPackage = Package::find($router->package_id);
        }
        return view('profile.profile_view', compact('packages', 'userPackage', 'user'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $user = $request->user();
        $user->contact = $request->contact;
        $user->status = $request->status;
        $user->save();
        return redirect("profile")->with('success', 'profile-updated')->withInput();
    }


    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
            'current_password' => 'required',
        ]);

        $user = User::findOrFail($id);
        // \Log::debug('Entered Current Password: ' . request()->current_password);
        // \Log::debug('Entered Current Password Hash: ' . Hash::make(request()->current_password));
        // \Log::debug('User Password (Hashed): ' . $user->password);
        if (Hash::check(request()->current_password, $user->password)) {
            $user->password = Hash::make(request()->password);
            $user->save();
            return redirect("profile")->with('success', 'password-updated')->withInput();
        } else {
            return redirect("profile")->withErrors('Your current password is not valid')->withInput();
        }
    }
}
