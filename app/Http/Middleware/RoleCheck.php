<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        foreach ($roles as $role) {
            try {
                $role = Role::whereName($role)->firstOrFail();

                if (Auth::user()->hasRole($role)) {
                    return $next($request);
                }

            } catch (ModelNotFoundException) {
                dd('Could not find role ' . $role);
            }
        }
        toast('Access Denied, You are not authorized to view that content', 'warning');

        return redirect()->back();
    }
}
