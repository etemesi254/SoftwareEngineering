<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\SubCategoryFormController;
use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesFormController;

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

// ----- Home page  Start ------
Route::get('/', [HomePageController::class, "showHomePage"]);
// ----- Home page end ---------

// ------- Categories start ----------
Route::get("/admin/categories_dashboard", [CategoriesController::class, "showCategoriesDashboard"]);
Route::get("/admin/view_categories", [CategoriesController::class, "showCategoriesUploadView"]);
Route::get("/admin/add_categories", [CategoriesController::class, "showCategoriesUploadForm"]);
Route::post("/admin/upload_category_post", [CategoriesFormController::class, "uploadCategory"])->name("/admin/upload_category_post");
//-------- Categories end -----------------


//--------- Subcategories start -------------
Route::get("/admin/add_subcategories", [SubCategoriesController::class, "showSubCategoriesForm"]);

Route::post("/admin/upload_sub_category_post", [SubCategoryFormController::class, "uploadSubCategory"]);
//--------- Subcategories start -------------

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
