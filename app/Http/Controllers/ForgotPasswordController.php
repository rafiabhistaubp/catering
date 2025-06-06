<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('auth.forgot');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'new_password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('username', $request->username)->first();
        $user->password = $request->new_password;
        $user->save();

        return redirect()->route('login')->with('status', 'Password berhasil direset.');
    }
}

