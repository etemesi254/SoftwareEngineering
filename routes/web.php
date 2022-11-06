<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\orderFormController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\SubCategoryFormController;
use App\Http\Controllers\UserDashboardController;
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
Route::get('/menu', [HomePageController::class, "showMenuPage"]);

Route::get('about', function () {
    return view('about');
});
// ----- Home page end ---------

// ----- Kitchen/Order Pages Start ---------
Route::post('kitchenOrders', [orderFormController::class, 'selectedOrder']);
Route::post('submitOrder', [orderFormController::class, 'insertOrder']);
Route::get('kitchenView', [orderFormController::class, 'kitchenOrderListing']);
Route::post('kitchenView', [orderFormController::class, 'orderCompletion']);
// ----- Kitchen/Order Pages End ---------

// ----- Login and Registration start ---------
Route::get("/login", [CustomAuthController::class, "index"]);
Route::get('/logout', [CustomAuthController::class, 'customLogout']);
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login-post', [CustomAuthController::class, 'customLogin'])->name('login-post');
Route::get('registration', [CustomAuthController::class, 'index'])->name('register-user');
Route::post('sign-up-post', [CustomAuthController::class, 'customRegistration'])->name('sign-up-post');
// ----- Login and Registration end ---------

// -- User start----
Route::post('users',[CustomAuthController::class, 'userDashboard']);
// -- User end----

// -- Administrator start ----
Route::middleware(['auth'])->name("admin")->prefix("admin")->group(function () {
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

    //------- Orders start -----------------------
    Route::get("/view_orders", [OrdersController::class, "showOrdersView"]);
    //------ Orders End --------------------

    //---- Users start ---------------------
    Route::get("/view_users", [UserDashboardController::class, "showUserDashboard"]);
    //----- Users end --------------------
});
// -- Administrator end----
