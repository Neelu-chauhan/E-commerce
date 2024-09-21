<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class categoryController extends Controller  implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission: Create-Category',only:['category_list']),
            new Middleware('permission: Edit-category',only:['create_category']),
            new Middleware('permission: Delete-category',only:['store_category']),
            new Middleware('permission: View-Category',only:['edit_category']),
        ];
    }
    public function category_list()
    {
        $page_title = 'Category List';
        $categories = Category::where('status','!=',9)->get();
        return view('category/list', compact('page_title', 'categories'));
    }

    public function create_category()
    {
        $page_title = 'Create Category';
        return view('category/create', compact('page_title'));
    }

    public function store_category(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $categories = new Category();
        $categories->name         = $request->name;
        $categories->description  = $request->description;
        $categories->status       = $request->status;
        $categories->save();
        return redirect()->route('category.list')->with('success', 'Category created successfully');
    }

    public function edit_category($id){
        $page_title = 'Edit Category';
        $categories = Category::find($id);
        return view('category/edit', compact('page_title', 'categories'));
    }

    public function update_category(Request $request,$id){
        $request->validate([
            'name'=>'required'
        ]);

        $categories = Category::find($id);
        $categories->name         = $request->name;
        $categories->description  = $request->description;
        $categories->status       = $request->status;
        $categories->update();
        return redirect()->route('category.list')->with('success', 'Category Updated successfully');
    }

    public function delete_category($id){
        $categories = Category::find($id);
        $categories->status=9;
        $categories->update();
        return redirect()->route('category.list');

    }

    public function status($id){
        $status = Category::find($id);
        $new_status =1;
        if($status->status==1){
            $new_status=0;
        }
        else{
            $new_status=1;
        }

        $status->status =$new_status;
        $status->update();
        return redirect()->back()->with('success','Status updated successfully');

    }
}
