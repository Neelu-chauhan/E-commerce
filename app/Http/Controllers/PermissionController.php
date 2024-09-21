<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\permission;
use App\Models\sideCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller  implements HasMiddleware
{

    public static function middleware():array
    {
        return [
            new Middleware('permission: View Permission',only:['permission_list']),
            new Middleware('permission: Create Permission',only:['create_permission']),
            new Middleware('permission: Edit Permission',only:['edit_permission']),
            new Middleware('permission: Delete Permission',only:['delete_permission']),
        ];
    }
    public function permission_list()
    {
        $permissions = permission::where('status', '!=', 9)->get();
        // dd($permissions);
        return view('permission/list', compact('permissions'));
    }
    public function create_permission()
    {
        $category = sideCategory::where('status','!=',9)->get();
        return view('permission/create',compact('category'));
    }
    public function store_permission(Request $request)
    {
        try {
            $validatedData = $request->validate(
                [
                    'name' => 'required',
                ],
                [
                    'name.required' => 'Please Enter name',
                ],
            );
            $permission = new permission();
            $permission->name = $request->name;
            $permission->description = $request->description;
            $permission->status = $request->status;
            $permission->category = $request->category;
            $permission->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
        return redirect()->route('permission.list')->with('success', 'Permission added successfully.');
    }

    public function edit_permission($id)
    {
        $permission = permission::find($id);
        $category = sideCategory::where('status','!=',9)->get();
        return view('permission/edit', compact('permission', 'id','category'));
    }
    public function update_permission(Request $request, $id)
    {
        try {
            $validatedData = $request->validate(['name' => 'required'], ['name.required' => 'Please Enter name']);
            $permission = permission::find($id);
            // dd($permission);
            $permission->name        = $request->name;
            $permission->description = $request->description;
            $permission->status      = $request->status;
            $permission->category      = $request->category;
            $permission->update();
        } catch (\Exception $e) {

            return redirect()->back()->with('message', $e->getMessage());
        }
        return redirect()->route('permission.list')->with('success', 'Permission updated successfully.');
    }

    public function delete_permission($id){
        $delete = permission::find($id);
        $delete->status = 9;
        $delete->update();
        return redirect()->back();

    }

    public function status_change($id){
        $status = permission::find($id);
        $temp_status = 1;
        if($status->status ==1){
            $temp_status = 0;
        }
        else{
            $temp_status =1;
        }
        $status->status = $temp_status;
        $status->update();
        return redirect()->back()->with('success', 'Permission status changed successfully.');
    }
}
