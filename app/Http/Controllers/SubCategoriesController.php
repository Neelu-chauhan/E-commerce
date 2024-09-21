<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class SubCategoriesController extends Controller implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission: Sub Category-view ',only:['subcat_list']),
            new Middleware('permission: Sub Category-create',only:['subcat_create']),
            new Middleware('permission: Sub Category-edit',only:['subcat_edit']),
            new Middleware('permission: Sub Category-delete',only:['delete']),
        ];
    }
  
    public function subcat_list()
    {
        $subcategories = SubCategories::leftJoin('categories','categories.id','sub_categories.category_id_fk')
                                        ->where('sub_categories.status','!=',9)
                                        ->select('categories.name as category_name','sub_categories.*')
                                        ->get();      

        return view('subCategory/list',compact('subcategories'));
    }


    public function subcat_create()
    {
        $category_type = Category::where('status', '!=', 9)->pluck('name', 'id')->toArray();
        return view('subCategory/create', compact('category_type'));
    }

    public function subcat_store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'category_id_fk' => 'required',
        ]);

        $subcat = new SubCategories;
        $subcat->name           = $request->name;
        $subcat->category_id_fk = $request->category_id_fk;
        $subcat->description    = $request->description;
        $subcat->status         = $request->status;
        $subcat->save();
        return redirect()->route('subcat.list')->with('success','sub category save successfully');
    }

  
    public function show(SubCategories $subCategories)
    {
        //
    }

    public function subcat_edit($id)
    {
        $sub_cat_edit = subCategories::find($id);
        $category_type= Category::where('status', '!=', 9)->pluck('name', 'id')->toArray();
        // dd($sub_cat_edit);
        return view('subCategory/edit',compact('sub_cat_edit','category_type'));
    }

    public function subcat_update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'category_id_fk' => 'required',
        ]);

        $subcat = SubCategories::find($id);
        $subcat->name           = $request->name;
        $subcat->category_id_fk = $request->category_id_fk;
        $subcat->description    = $request->description;
        $subcat->status         = $request->status;
        $subcat->update();
        return redirect()->route('subcat.list')->with('success','sub category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
       $dest_sub_cat= SubCategories::find($id);
       $dest_sub_cat->status = 9;
       $dest_sub_cat->update();
       return redirect()->back();
    }

    public function status($id)
    {
        // dd($id);
        $itemData = subCategories::find($id);
        $new_status_val = '1';
        if ($itemData->status == '1') {
            $new_status_val = '0';
        } else {
            $new_status_val = '1';
        }
        //return $itemData->status;
        $itemData->status = $new_status_val;
        if ($itemData->save()) {
            return back()->with('success', 'Status has been changed.');
        } else {
            return back()->with('Message', 'Please try again.');
        }
    }
}
