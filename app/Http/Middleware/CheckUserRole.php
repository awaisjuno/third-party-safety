<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        $userId = Auth::id();

        if (!$userId) {
            return redirect('/signin')->with('error', 'Unauthorized access.');
        }

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

        $allowedRoles = array_map('strtolower', $allowedRoles);

        $hasRole = count(array_intersect($roles, $allowedRoles)) > 0;

        if (!$hasRole) {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
