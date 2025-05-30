<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showSignup()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:user,email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::transaction(function () use ($request) {

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => 0,
            ]);

            UserDetail::create([
                'user_id' => $user->user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile
            ]);
        });

        return redirect()->route('signin.form')->with('success', 'Account created! Please login.');
    }

    public function showSignin()
    {
        return view('auth.signin');
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }

        if ($user->status == 0) {
            return back()->withErrors(['email' => 'Account Blocked or Pending Approval.']);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/dashboard')->with('success', 'Login successful');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function signout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();
        $request->session()->regenerateToken();

        return redirect()->route('signin.form')->with('success', 'Logged out successfully');
    }
}
