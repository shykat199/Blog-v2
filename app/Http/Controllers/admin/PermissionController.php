<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $data['permissions'] = Permission::paginate(10);
        return view('back_office.acl.permission.index', $data);
    }

    public function store(Request $request)
    {
        $storePermissions = Permission::create([
            'name' => $request->post('permissionName')
        ]);

        if ($storePermissions) {
            toast('New permission has added successfully.', 'success');
            return redirect()->back();
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data['editPermission'] = Permission::find($id);
        $data['permissions'] = Permission::paginate(10);

        if (!empty($data['editPermission'])) {
            return view('back_office.acl.permission.index', $data);
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $updatePermission = Permission::find($id)->update([
            'name' => $request->post('permissionName')
        ]);

        if ($updatePermission) {
            toast('Permission updated successfully.', 'success');
            return redirect()->route('show-permission');
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $deletePermission = Permission::find($id);

        if (!empty($deletePermission)) {
            $deleteDataFromRoleHasPermission = DB::table('role_has_permissions')
                ->selectRaw('*')
                ->where('permission_id', '=', $deletePermission->id)->delete();

            $deletePermissionData = $deletePermission->delete();

            if ($deleteDataFromRoleHasPermission || $deletePermissionData) {
                toast('Permission updated successfully.', 'success');
                return redirect()->route('show-permission');
            } else {
                toast('Something wrong try again.', 'error');
                return redirect()->back();
            }
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }

    }

}
