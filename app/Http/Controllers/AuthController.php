<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showSignup()
    {
        $role = Role::where('is_active', 1)->get();
        return view('auth.signup', compact('role'));
    }

    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:user,email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'password' => 'required|min:6|confirmed',
            'account_type' => 'required|exists:role,role_id',
        ]);

        $user = DB::transaction(function () use ($request) {

            $user = User::create([
                'email' => $request->email,
                'password' => \Hash::make($request->password),
                'status' => 0,
            ]);

            UserDetail::create([
                'user_id' => $user->user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
            ]);

            return $user;
        });

        UserRole::create([
            'user_id' => $user->user_id,
            'role_id' => $request->account_type,
        ]);

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

            $userId = Auth::id();

            $roles = DB::table('user_role')
                ->join('role', 'user_role.role_id', '=', 'role.role_id')
                ->where('user_role.user_id', $userId)
                ->where('user_role.is_active', 1)
                ->where('user_role.is_delete', 0)
                ->where('role.is_active', 1)
                ->where('role.is_delete', 0)
                ->pluck('role.role_name')
                ->map(fn($r) => strtolower($r))
                ->toArray();

            if (in_array('admin', $roles)) {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful');
            } elseif (in_array('client', $roles)) {
                return redirect()->route('client.dashboard')->with('success', 'Login successful');
            } elseif (in_array('employee', $roles)) {
                return redirect()->route('employee.dashboard')->with('success', 'Login successful');
            } else {
                return redirect('/')->with('success', 'Login successful');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function signout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
