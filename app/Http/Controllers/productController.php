<?php

namespace App\Http\Controllers;

use File;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImg;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class productController extends Controller implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission: Product-view ',only:['product_list']),
            new Middleware('permission: Product-create',only:['product_create']),
            new Middleware('permission: Product-edit',only:['product_edit']),
            new Middleware('permission: Product delete',only:['delete']),
        ];
    }
    public function product_list()
    {
        $products = Product::where('status', '!=', 9)->get();
        $image = Product::orderByDesc('id')->first();
        // dd($image->toArray());
        return view('product/list', compact('products', 'image'));
    }

    public function product_create()
    {
        $category_data = Category::where('status', '!=', 9)->pluck('name', 'id')->toArray();
        $subCat_data = SubCategories::where('status', '!=', 9)->pluck('name', 'id')->toArray();
        // dd($subCat_data);

        return view('product/create', compact('category_data', 'subCat_data'));
    }

    public function product_store(Request $request)
    {
        try {
            $request->validate(
                [
                    'category_id_fk' => 'required',
                    'name' => 'required',
                    'sku' => 'required',
                    'buying_price' => 'required',
                    'selling_price' => 'required',
                    'status' => 'required',
                    'purchasable' => 'required',
                    'stock_out' => 'required',
                    'refundable' => 'required',
                    'max_quantity' => 'required',
                    'min_quantity' => 'required',
                    'unit' => 'required',
                ],
                [
                    'category_id_fk.required' => 'Please select category',
                    'subcat_id_fk.required' => 'Please choose sub category',
                ],
            );

            $product = new Product();

            $product->category_id_fk = $request->category_id_fk;
            $product->subcat_id_fk = $request->subcat_id_fk;
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->brand = $request->brand;
            $product->tax = $request->tax;
            $product->status = $request->status;
            $product->purchasable = $request->purchasable;
            $product->stock_out = $request->stock_out;
            $product->refundable = $request->refundable;
            $product->max_quantity = $request->max_quantity;
            $product->min_quantity = $request->min_quantity;
            $product->unit = $request->unit;
            $product->weight = $request->weight;
            $product->product_img = $request->product_img;
            $product->description = $request->description;

            $product->save();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        return redirect()->route('productList')->with('success', 'Product data save successfully!!');
    }

    public function product_edit($id)
    {
        $product_edit = Product::find($id);
        $category_data = Category::where('status', '!=', 9)->pluck('name', 'id')->toArray();
        $subCat_data = SubCategories::where('status', '!=', 9)->pluck('name', 'id')->toArray();
        return view('product/edit', compact('product_edit', 'category_data', 'subCat_data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function product_update(Request $request, $id)
    {
        try {
            $request->validate(
                [
                    'category_id_fk' => 'required',
                    'name' => 'required',
                    'sku' => 'required',
                    'buying_price' => 'required',
                    'selling_price' => 'required',
                    'status' => 'required',
                    'purchasable' => 'required',
                    'stock_out' => 'required',
                    'refundable' => 'required',
                    'max_quantity' => 'required',
                    'min_quantity' => 'required',
                    'unit' => 'required',
                ],
                [
                    'category_id_fk.required' => 'Please select category',
                    'subcat_id_fk.required' => 'Please choose sub category',
                ],
            );

            $product = Product::find($id);
            $product->category_id_fk = $request->category_id_fk;
            $product->subcat_id_fk = $request->subcat_id_fk;
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->brand = $request->brand;
            $product->tax = $request->tax;
            $product->status = $request->status;
            $product->purchasable = $request->purchasable;
            $product->stock_out = $request->stock_out;
            $product->refundable = $request->refundable;
            $product->max_quantity = $request->max_quantity;
            $product->min_quantity = $request->min_quantity;
            $product->unit = $request->unit;
            $product->weight = $request->weight;
            $product->product_img = $request->product_img;
            $product->description = $request->description;

            if ($request->hasFile('product_img')) {
                $path = 'assets/product/image/' . $product->product_img;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->product_img;
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/product/image/', $filename);
                $product->product_img = $filename;
            }
            $product->Update();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        return redirect()->route('productList')->with('success', 'Product Updated successfully!!');
    }

    public function delete($id)
    {
        $delete_product = Product::find($id);
        $delete_product->status = 9;
        $delete_product->update();
        return redirect()->back()->with('success', 'Product deleted successfully!!');
    }
    public function getsubcat($category_id_fk)
    {
        $subCat_data = SubCategories::where('category_id_fk', $category_id_fk)->pluck('name', 'id')->toArray();
        return $subCat_data;
    }

    public function view($id)
    {
        $product = Product::find($id);
        // dd($product->toArray());
        return view('product/view', compact('product'));
    }

    public function status_change($id)
    {
        $status = Product::find($id);
        // dd($status);
        $new_status = 1;

        if ($status->status == 1) {
            $new_status = 0;
        } else {
            $new_status = 1;
        }
        $status->status = $new_status;
        $status->update();
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function view_img($id)
    {
        $product = Product::find($id);
        $product_img =ProductImg::where('status','!=',9)->where('product_id',$id)->select('product_img','id')->get();
        // dd($id);
        return view('product/upload_img', compact('product', 'id','product_img'));
    }

    public function upload_img(Request $request, $product_id)
    {
        if ($request->hasFile('product_img')) {
            $request->validate([
                'product_img.*' => 'mimes:jpg,jpeg,png|max:2048',
            ]);
            foreach ($request->file('product_img') as $file) {
                $image = new ProductImg();
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('upload/product/', $filename);
                $image->product_id = $product_id;
                $image->product_img = $filename;
                $image->status = 1;
                // dd($image);
                $image->save();
            }
        }

        return redirect()->back()->with('success', 'Image uploaded successfully');
    }

    public function delete_img($id){
        $img= ProductImg::find($id);
        $img->status=9;
        $img->update();
        return redirect()->back();
    }
}
