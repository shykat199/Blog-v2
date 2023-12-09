<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware(['checkRole:admin,sub_admin']);
//    }

    public function index()
    {
        $userData = User::where('role','=','3')->get();
        return view('back_office.users.index', compact('userData'));
    }

    public function createUser()
    {
        return view('back_office.users.create');
    }

    public function editUser($id)
    {

        $getAllUser = User::find($id);

        return view('back_office.users.edit', compact('getAllUser'));
    }

    public function storeUser(Request $request)
    {
        $createUser = User::create([
            'name' => $request->post('title'),
            'email' => $request->post('email'),
            'role' => $request->post('role'),
            'password' => Hash::make('password'),
            'status' => $request->post('status')
        ]);

        if ($createUser) {
            toast('User created successfully', 'success');
            return redirect()->route('user-list');
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }
    }

}
