<?php

namespace App\Http\Controllers;

use App\Models\sideCategory;
use Illuminate\Support\Facades\Crypt;
use App\Models\Roles;
use App\Models\country;
use App\Models\permission;
use App\Models\usersModel;
use Illuminate\Http\Request;
use App\Models\assignPermission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission: User-view',only:['user_list']),
            new Middleware('permission: User-create',only:['create_users']),
            new Middleware('permission: User-edit',only:['edit_users']),
            // new Middleware('permission: User-delete',only:['delete']),
        ];
    }
    public function user_list()
    {
        $users = usersModel::get();
        $roles = Roles::where('status', '!=', 9)->get();
        // $_new_id = ($q_id + 1000) * 200; 
        // $enc_id = base64_encode($_new_id);
        
        
        return view('users/list', compact('users', 'roles'));
    }

    public function create_users()
    {
        $countries = country::all();

        return view('users/create', compact('countries'));
    }
    public function store_users(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'country' => 'required',
            'phone' => 'required',
        ]);
        $users = new usersModel();
        $users->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/users/', $filename);
            $users->image = $filename;
        }
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->country_id = $request->country;
        $users->dob = $request->dob;
        $users->phone = $request->phone;
        $users->status = $request->status;

        // dd($users);
        $users->save();
        return redirect()->route('users.list')->with('success', 'User created successfully');
    }

    public function edit_users($id)
    {
        try {
          $getEncId = base64_decode($id);
          $id = ($getEncId-50002);
            $users = usersModel::find($id);
            $permissions = permission::where('status', '!=', 9)->select('name', 'id')->get();
            $countries = country::all();
            $sidecategory = sideCategory::where('status', '!=', 9)->get();
            // dd($sidecategory);
            $roles = Roles::where('status', '!=', 9)->select('name', 'id')->get();
            return view('users/edit', compact('users', 'permissions', 'roles', 'countries', 'sidecategory'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update_users(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'permission_id_fk'  => 'required',
            // 'role_id_fk'        => 'required',
            'phone' => 'required',
        ]);
        $users = usersModel::find($request->id);
        $users->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/users/', $filename);
            $users->image = $filename;
        }
        $users->permission_id_fk = $request->permission_id_fk;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->country_id = $request->country_id;
        $users->dob = $request->dob;
        $users->status = $request->status;
        // dd($users);
        $users->update();
        return redirect()->route('users.list')->with('success', 'User updated successfully');
    }

    public function permission_users($id)
    {
        try {
          $getEncId = base64_decode($id);
          $id = ($getEncId-50002);
          // dd($id);
            // $ids = crypt::decryptString($id);
            $sidecategory = sideCategory::where('status', '!=', 9)->get();
            $role = usersModel::find($id);
            $permissions = permission::where('status', '!=', 9)->select('name', 'id as per_id')->get();
            $get_role_id_by_userid = usersModel::where('id', $id)->first('role_id_fk');
            $get_per = usersModel::where('id', $id)
                ->where('role_id_fk', $get_role_id_by_userid->role_id_fk)
                ->select('permission_id_fk', 'id')
                ->first();

            // dd($get_per->toArray());
            return view('users/userPerm', compact('role', 'permissions', 'id', 'get_per', 'sidecategory'));
        } catch (\Exception $e) {
            return redirect()->route('users.list')->with('error', 'Something went wrong');
        }
    }

    public function store_user_per(Request $request, $id)
    {
        $get_role_id_by_userid = usersModel::where('id', $id)->first('role_id_fk');
        $var_per = usersModel::where('role_id_fk', $get_role_id_by_userid->role_id_fk)->first();
        if ($var_per) {
            $per_update = usersModel::find($id);
            $per_update->permission_id_fk = implode(',', $request->permission);
            $per_update->save();
            return redirect()->back()->with('success', 'Permission updated successfully');
        } else {
            $assign_data = new usersModel();
            $assign_data->role_id_fk = $get_role_id_by_userid->role_id_fk;
            $assign_data->permission_id_fk = implode(',', $request->permission);
            $assign_data->status = 1;
            $assign_data->save();

            return redirect()->back()->with('success', 'Permission Added successfully');
        }
    }
    public function roles(Request $request, $id)
    {
        // dd($request->toArray());
        $role = usersModel::find($id);
        $role->role_id_fk = $request->role_id_fk;
        $role->update();
        return redirect()->back()->with('success', 'Role updated successfully');
    }
}
