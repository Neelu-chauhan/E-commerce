<?php

namespace App\Http\Controllers;

use App\Models\sideCategory;
use Illuminate\Http\Request;

class SidecategoryController extends Controller
{
    public function sidecategory_list()
    {
        $sidecategory = sideCategory::where('status', '!=', 9)->get();
        return view('sidecategory/list', compact('sidecategory'));
    }
    public function sidecategory_create()
    {
        return view('sidecategory/create');
    }
    public function store_sidecat(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new sideCategory();
        $data->name = $request->name;
        $data->status = $request->status;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('sidecategory.list')->with('success', 'Side Category Added Successfully');
    }
    public function sidecategory_edit($id)
    {
        $sidecategory = sidecategory::find($id);
        return view('sidecategory/edit', compact('sidecategory', 'id'));
    }

    public function update_sidecategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = sideCategory::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->description = $request->description;
        $data->update();
        return redirect()->route('sidecategory.list')->with('success', 'Side category updated successfully!');
    }

    public function delete_sidecat($id)
    {
        $data = sideCategory::find($id);
        $data->status = 9;
        $data->update();
        return redirect()->route('sidecategory.list');
    }

    public function change_status($id)
    {
        $data = sideCategory::find($id);
        if ($data->status == 0) {
            $data->status = 1;
        } else {
            $data->status = 0;
        }
        $data->update();
        return redirect()->route('sidecategory.list');
    }
}
