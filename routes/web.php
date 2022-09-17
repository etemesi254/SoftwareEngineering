<?php

use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Support\Facades\Route;

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
    $categories = new Categories();
    $values = $categories->GetCategories();
    $total_categories = $categories->GetTotalCategories();
    $subcategories = new SubCategories();

    $total_subcategories = $subcategories::all()->count();

    return view("admin.categories", ["categories" => $values, "total_categories" => $total_categories, "total_subcategories" => $total_subcategories]);

});
