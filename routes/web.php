<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\SubCategoryFormController;
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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->name("admin")->prefix("admin")->group(function () {
        // -- Main dashboard ----
        Route::get("/", [DashboardController::class, "showDashboard"]);
        Route::get("/dashboard", [DashboardController::class, "showDashboard"]);
        // ------- Categories start ----------
        Route::get("/categories_dashboard", [CategoriesController::class, "showCategoriesDashboard"]);
        Route::get("/view_categories", [CategoriesController::class, "showCategoriesUploadView"]);
        Route::get("/add_categories", [CategoriesController::class, "showCategoriesUploadForm"]);

        Route::post("/upload_category_post", [CategoriesFormController::class, "uploadCategory"])->name("/admin/upload_category_post");
        //-------- Categories end -----------------

        //--------- Subcategories start -------------
        Route::get("/add_subcategories", [SubCategoriesController::class, "showSubCategoriesForm"]);

        Route::post("/upload_sub_category_post", [SubCategoryFormController::class, "uploadSubCategory"]);
        //--------- Subcategories end -------------

        //------- Menu start -----------------------
        Route::get("/add_menu", [MenuController::class, "showUploadForm"]);
        Route::post("/upload_menu_post", [MenuController::class, "uploadMenu"]);
        //------ Menu End --------------------

    });

