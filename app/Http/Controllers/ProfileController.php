<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function editProfile(User $user)
    {
        return view('profile_edit', compact('user'));
    }

    public function updateProfile(Request $req, User $user)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->update([
            'name' => $req->name,
            'email' => $req->email,
        ]);

        return Redirect::route('profile');
    }
}
