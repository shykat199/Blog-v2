<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\Concerns\Has;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back_office.dashboard');
    }

    public function profile()
    {
        $data['userInfo'] = User::find(Auth::user()->id);
        return view('back_office.profile.index', $data);
    }

    public function updateProfile(Request $request)
    {

        $findUser = User::find(Auth::user()->id);
        $fileName = null;
        $userData = [];

        if ($findUser) {

            if ($findUser->user_image) {
                if ($request->file('user_image')) {
                    $fileName = Uuid::uuid() . '.' . 'users-image' . '.' . $request->file('user_image')->getClientOriginalExtension();
                    $file = Storage::put('/public/images/user/' . $fileName, file_get_contents($request->file('user_image')));
                    $dltVideo = Storage::delete('public/images/user/' . $findUser->user_image);

                    $userData = [
                        'name' => $request->post('name'),
                        'user_image' => $fileName,
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ];
                } else {
                    $userData = [
                        'name' => $request->post('name'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ];
                }
            } else {
                if ($request->file('user_image')) {

                    $fileName = Uuid::uuid() . '.' . 'users-image' . '.' . $request->file('user_image')->getClientOriginalExtension();
                    $file = Storage::put('/public/images/user/' . $fileName, file_get_contents($request->file('user_image')));
                } else {
                    $userData = [
                        'name' => $request->post('name'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ];
                }
                $userData = [
                    'name' => $request->post('name'),
                    'user_image' => $fileName,
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ];
            }

            $updateProfilePhoto = $findUser->where('id', Auth::user()->id)->update($userData);

            if ($updateProfilePhoto) {
                toast('Profile updated successfully', 'success');
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
