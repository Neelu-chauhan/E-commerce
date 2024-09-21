<?php

use App\Http\Controllers\Permission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagement;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SidecategoryController;
use App\Http\Controllers\SubCategoriesController;


Route::any('login', 'Auth\LoginController@login');
Route::get('logout', '\Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(categoryController::class)->middleware('auth')->prefix('category/')->group(function(){

    Route::get('list','category_list')->name('category.list');
    Route::get('create','create_category')->name('category.create');
    Route::POST('store','store_category')->name('category.store');
    Route::get('edit/{id}','edit_category')->name('category.edit');
    Route::POST('update/{id}','update_category')->name('category.update');
    Route::get('delete/{id}','delete_category')->name('category.delete');
    Route::get('status/{id}','status')->name('category.status');
});

Route::controller(SubCategoriesController::class)->middleware('auth')->prefix('subcat/')->group(function(){

    Route::get('list','subcat_list')->name('subcat.list');
    Route::get('create','subcat_create')->name('subcat.create');
    Route::POST('store','subcat_store')->name('subcat.store');
    Route::get('edit/{id}','subcat_edit')->name('subcat.edit');
    Route::POST('update/{id}','subcat_update')->name('subcat.update');
    Route::get('status/{id}','status')->name('subcat.status');
    Route::get('delete/{id}','delete')->name('subcat.delete');
});


Route::controller(productController::class)->middleware('auth')->prefix('product/')->group(function(){
    Route::get('list','product_list')->name('productList');
    Route::get('create','product_create')->name('product.create');
    Route::POST('store','product_store')->name('product.store');
    Route::get('edit/{id}','product_edit')->name('product.edit');
    Route::POST('update/{id}','product_update')->name('product.update');
    Route::get('delete/{id}','delete')->name('product.delete');
    Route::get('view/{id}','view')->name('product.view');
    Route::get('upload_img/{id}','view_img')->name('product.upload_img');
    Route::POST('upload_img/save/{product_id}','upload_img')->name('product.save_img');
    Route::get('upload_img/delete/{id}','delete_img')->name('product.delete_img');
    Route::get('status/{id}','status_change')->name('product.status');
    Route::get('getsubcat/{category_id_fk}','getsubcat')->name('product.getsubcat');
    Route::get('getcat/{subcat_id_fk}','getcat')->name('product.getcat');

});
Route::controller(UserManagement::class)->middleware('auth')->prefix('roles/')->group(function(){
    Route::get('list','role_list')->name('role.list');
    Route::get('create','create_roles')->name('roles.create');
    Route::POST('store','store_roles')->name('roles.store');
    Route::get('edit/{id}','edit_roles')->name('roles.edit');
    Route::POST('update/{id}','update_roles')->name('roles.update');
    Route::get('delete/{id}','delete_roles')->name('roles.delete');
    Route::get('status/{id}','status_change')->name('roles.status');
    Route::get('assign/{id}','assign_perm')->name('roles.assign');
    Route::POST('assign/store/{id}','store_assign_perm')->name('roles.assign');
});

Route::controller(PermissionController::class)->middleware('auth')->prefix('permission/')->group(function(){
    Route::get('list','permission_list')->name('permission.list');
    Route::get('create','create_permission')->name('permission.create');
    Route::POST('store','store_permission')->name('permission.store');
    Route::get('edit/{id}','edit_permission')->name('permission.edit');
    Route::POST('update/{id}','update_permission')->name('permission.update');
    Route::get('delete/{id}','delete_permission')->name('permission.delete');
    Route::get('status/{id}','status_change')->name('permission.status');
});


Route::controller(UserController::class)->middleware('auth')->prefix('users/')->group(function(){
    Route::get('list','user_list')->name('users.list');
    Route::get('create','create_users')->name('users.create');
    Route::POST('store','store_users')->name('users.store');
    Route::get('edit/{id}','edit_users')->name('users.edit');
    Route::POST('update/{id}','update_users')->name('users.update');
    Route::get('permission/{id}','permission_users')->name('users.permission');
    Route::POST('permission/{id}','store_user_per')->name('users.permission');
    Route::POST('roles/{id}','roles')->name('users.roles');
});

Route::controller(SidecategoryController::class)->middleware('auth')->prefix('sidecategory')->group(function(){

    Route::get('list','sidecategory_list')->name('sidecategory.list');
    Route::get('create','sidecategory_create')->name('sidecategory.create');
    Route::POST('store','store_sidecat')->name('sidecategory.store');
    Route::get('edit/{id}','sidecategory_edit')->name('sidecategory.edit');
    Route::POST('update/{id}','update_sidecategory')->name('sidecategory.update');
    Route::get('delete/{id}','delete_sidecat')->name('sidecategory.delete');
    Route::get('status/{id}','change_status')->name('sidecategory.status');
});




