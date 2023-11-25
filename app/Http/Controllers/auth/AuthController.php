<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function loginPage()
    {
        if (Auth::check() && Auth::user()) {
            return view('back_office.dashboard');
        } else {
            return view('back_office.auth.login');
        }
//        return view('back_office.auth.login');
    }

    public function login(Request $request)
    {
        $auth = $request->all();
        if (Auth::attempt([
            'email' => $auth['email'],
            'password' => $auth['password']
        ])) {
            toast('Successfully login.','success');
            return redirect()->route('dashboard');
        } else {
            toast('Wrong credential! Try again.','error');
            return redirect()->back()->with('error')->with('error', 'Something Wrong try again.');
        }
    }


    public function registerPage()
    {
        if (Auth::check() && Auth::user()) {
            return view('back_office.dashboard');
        } else {
            return view('back_office.auth.register');
        }


    }

    public function register(RegisterRequest $request)
    {
        $newUser=User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'role'=>3,
            'password'=>Hash::make($request->get('password'))
        ]);

        $getRole = Role::where('name','=','user')->first();
        $getPermission = Permission::all();

        $newUser->assignRole($getRole);
        $getRole->syncPermissions($getPermission);

        if ($newUser){
            toast('New user created successfully.','success');
            return redirect()->route('login-page');
        }else{
            toast('Something wrong! Try again..','error');
            return redirect()->back();
        }

    }

    public function logOut()
    {
        Auth::logout();
        toast('Successfully Logout','success');
        return redirect()->route('login-page');
    }


}
