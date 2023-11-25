<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data['allRoles'] = Role::with('permissions')->get();
        return view('back_office.acl.role.index', $data);
    }

    public function store(Request $request)
    {
        $storeRole = Role::create([
            'name' => $request->post('name')
        ]);

        if ($storeRole) {
            toast('New role has added successfully.', 'success');
            return redirect()->back();
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }
    }


    public function update(Request $request)
    {

        if (empty($request->get('permissions'))){
            toast('At least one permission is required.', 'error');
            return redirect()->back();
        }

        $roleData = Role::findOrFail($request->post('roleId'));
        $updateRole = $roleData->update([
            'name' => $request->post('name') !== null ? $request->post('name') : $request->post('roleName')
        ]);

        if (!empty($request->get('permissions'))) {
            $permissionData = Permission::whereIn('id', $request->post('permissions'))->get();
            $getResult = $roleData->syncPermissions($permissionData);
        }


        if ($updateRole || $getResult) {
            toast('New role has added updated successfully.', 'success');
            return redirect()->back();
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $deleteRole = Role::find($id)->delete();

        if ($deleteRole) {
            toast('New role has added deleted successfully.', 'success');
            return redirect()->back();
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }

    }

    public function getPermission(Request $request)
    {
        $permissionHtml = '';
        $reoleId = $request->get('roleId');
        $allPermissions = Permission::all();
        $roleDetails = Role::find($reoleId);
        $userPermissionDetails = DB::table('permissions')
            ->selectRaw('permission_id')
            ->leftJoin('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', '=', $reoleId)
            ->get()->toArray();

        $permissionHtml .= '
                                   <div class="new d-flex allPermissionList">
                                   <label for="exampleInputEmail1" class="form-label">Assign permission</label>
                                   <form method="post" action="' . route('update-role') . '">
                                   ' . csrf_field() . '
                                   <input type="hidden" name="roleId" value="' . $reoleId . '">
                                   <input type="hidden" name="roleName" value="' . $roleDetails->name . '">
                                        <div class="new d-flex">
                                            <div class="form-group">
                                                <input type="checkbox" id="selectAll" ' . (count($allPermissions) === count($roleDetails->permissions) ? 'checked' : '') . '>
                                                <label  for="selectAll">Select All</label>
                                            </div>

                                        </div>';

        foreach ($allPermissions as $key => $allPermission) {

            $permissionHtml .= '<div class="form-group">
                                            <input class="permissions" ' . (in_array($allPermission->id, array_column($userPermissionDetails, 'permission_id'), true) ? 'checked' : '') . '
                                            type="checkbox" id="html-' . $allPermission->id . '" name="permissions[]" value="' . $allPermission->id . '">
                                            <label for="html-' . $allPermission->id . '">' . $allPermission->name . '</label>
                                 </div>';

        }

        $permissionHtml .= '
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>';


        return response()->json([
            'permissionHtml' => $permissionHtml
        ]);


    }

}
