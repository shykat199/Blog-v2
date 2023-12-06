<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back_office.dashboard');
    }

    public function profile()
    {
        return view('back_office.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $findUser = User::find(Auth::user()->id);
        if ($findUser) {
            $updateProfile = $findUser->update([
                'name' => $request->post('name')
            ]);

            if ($updateProfile) {
                toast('User name updated successfully', 'success');
                return redirect()->back();
            } else {
                toast('Something wrong try again.', 'error');
                return redirect()->back();
            }
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }

    }


    public function updatePassword(Request $request)
    {
        $getValidUser = User::where('id', '=', Auth::user()->id)->first();

        if ($getValidUser && Hash::check($request->post('oldPassword'), $getValidUser->password)) {
            $updatePassword = $getValidUser->update([
                'password' => Hash::make($request->post('newPassword'))
            ]);
            if ($updatePassword) {
                return response([
                    'status' => true,
                    'message' => 'Password updated successfully'
                ]);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Something wrong try again.'
                ]);
            }
        } else {
            return response([
                'status' => false,
                'message' => "Password doesn't match."
            ]);
        }
    }

}
