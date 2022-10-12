<?php

use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/admin/categories", function () {
    $categories = new SubCategories();
    $values = $categories->SubCategoriesAggregate();
    $total_categories = $categories::all()->count();
    $subcategories = new SubCategories();

    $total_subcategories = $subcategories::all()->count();

    $menu = new \App\Models\Menu();
    $last_five = $menu->GetMenuItems(5);

    $categories = new Categories();
    $categories_aggregate = $categories->GetCategoriesAggregate();


    return view("admin.categories", ["subcategories" => $values, "total_categories" => $total_categories, "total_subcategories" => $total_subcategories, "menus" => $last_five, "categories_aggregate" => $categories_aggregate]);

});

Route::get('/', function () {
    return file_get_contents(public_path()."/index.html");
});

Route::get("/admin/users", function () {
    $users = new User();
    $values = $users->getUserOrders();

    return view("admin.users", ["users" => $values, "total_users" => $users::count()]);

});

Route::get("/admin/upload_products", function () {
    return view("admin.upload_products");
});

Route::get("/admin/categories_form", function () {
    return view("categories_form");
});

Route::get("/admin/subcategories_form", function () {
    return view("admin.subcategories_form");
});

Route::get("/admin/menu_form", function () {
    return view("admin.menu_form");
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
