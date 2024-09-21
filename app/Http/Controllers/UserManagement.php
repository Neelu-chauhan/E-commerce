<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\permission;
use App\Models\sideCategory;
use Illuminate\Http\Request;
use App\Models\assignPermission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserManagement extends Controller //implements HasMiddleware
{
    // public static function middleware():array
    // {
    //     return [
    //         new Middleware('permission: Role view ',only:['role_list']),
    //         new Middleware('permission: role-create',only:['create_roles']),
    //         new Middleware('permission: Role edit',only:['edit_roles']),
    //         new Middleware('permission: Role delete',only:['delete_roles']),
    //     ];
    // }
    public function role_list()
    {
        $roles = Roles::where('status', '!=', 9)->get();
        // $roles = assignPermission::leftJoin('roles','roles.id','assign_permissions.role_id_fk')->where('roles.status','!=',9)->get();
        // dd($roles->toArray());
        return view('Roles/list', compact('roles'));
    }
    public function create_roles(Request $request)
    {
        return view('Roles/create');
    }
    public function store_roles(Request $request)
    {
        //   dd($request->toArray());
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $roles = new Roles();
            $roles->name = $request->name;
            $roles->description = $request->description;
            $roles->status = $request->status;
            $roles->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('role.list')->with('success', 'Roles Added successfully');
    }
    public function edit_roles($id)
    {
        $roles = Roles::find($id);
        return view('Roles/edit', compact('roles'));
    }
    public function update_roles(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $roles = Roles::find($id);
            $roles->name = $request->name;
            $roles->description = $request->description;
            $roles->status = $request->status;
            $roles->update();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('role.list')->with('success', 'Roles Updated successfully');
    }
    public function delete_roles($id)
    {
        $delete_role = Roles::find($id);
        $delete_role->status = 9;
        $delete_role->update();
        return redirect()->back();
    }

    public function status_change($id)
    {
        $status = Roles::find($id);
        $temp_status = 1;
        if ($status->status == 1) {
            $temp_status = 0;
        } else {
            $temp_status = 1;
        }
        $status->status = $temp_status;
        $status->update();
        return redirect()->back()->with('success', 'Status changed successfully');
    }

    public function assign_perm($id)
    {
        $DecodId =base64_decode($id);
        $id = ($DecodId-50002);
        $role = Roles::find($id);
        $sidecategory = sideCategory::where('status','!=',9)->where('status','!=',0)->get();
        $get_per = assignPermission::where('role_id_fk',$id)->where('status','!=',9)->select('permission_id_fk','id')->first();

        return view('Roles/assignper', compact('role', 'id', 'get_per','sidecategory'));
    }

    public function store_assign_perm(Request $request, $id)
    {
        // dd($request->toArray());
        $var_per = assignPermission::where('role_id_fk', $id)->first();
        if ($var_per) {
            // dd($request->permission);
            $per_update = assignPermission::find($var_per->id);
            $per_update->permission_id_fk = implode(',', $request->permission);
           
            $per_update->save();
            return redirect()->back()->with('success', 'Permission updated successfully');

        } else {
            $assign_data = new assignPermission();
            $assign_data->role_id_fk = $id;
            $assign_data->permission_id_fk = implode(',', $request->permission);
            $assign_data->status = 1;
            // dd($assign_data);
            $assign_data->save();

            return redirect()->back()->with('success', 'Permission Added successfully');
        }

    }

}
