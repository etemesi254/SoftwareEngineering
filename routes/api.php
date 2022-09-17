<?php

use App\Models\CategoriesDashboard;
use App\Models\Menu;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', function (Request $request) {

    $response_data = ["status" => 200, "description" => "okay", "num_records" => DB::table("users")->count(), "data" => User::all()];
    return response($response_data, 200);

});

Route::post("new_user", function (Request $request) {
    $request_data = json_decode($request->getContent(), true);
    $msg = [];
    $status = 200;

    if ($request_data == null) {
        $msg = ["status" => 400, "description" => "Unprocessible entry"];
        $status = 400;

    } else {
        $rules = [
            "email" => "required|unique:users",
            "password" => "required|min:6",
            "username" => "required|unique:users",
            "full_name" => "required",
            "dob" => "required",
            "gender" => "required",
            "telephone" => "required|unique:users"];
        try {
            $request->validate($rules);
            $user = new User;

            $user = User::create([
                    'username' => $request_data['username'],
                    'email' => $request_data['email'],
                    'password' => Hash::make($request_data['password']),
                    'full_name' => $request_data["full_name"],
                    'gender' => $request_data["gender"],
                    'telephone' => $request_data['telephone'],
                    'dob' => $request_data['dob']
                ]
            );
            $token = $user->createToken($request_data["username"]);
            $msg = ["status" => 200, "description" => "okay", "token" => $token->plainTextToken];

        } catch (Exception $e) {
            $msg = ["status" => 500, "description" => $e->getMessage(), "token" => ""];
            $status = 500;

        }
    }

    return response($msg, $status);
});
Route::post("login_user", function (Request $request) {

    $rules = [
        "password" => "required|min:6",
        "username" => "required",
    ];
    $msg = [];
    $status = 200;
    try {
        $request->validate($rules);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {

            $id = Auth::id();
            $currentUser = User::find($id);
            $token = $currentUser->createToken($currentUser->username);
            $msg = ["status" => 200, "description" => "okay", "token" => $token->plainTextToken];
        } else {
            $msg = ["status" => 401, "description" => "unauthorised"];
            $status = 401;

        }
    } catch (Exception $e) {
        $msg = ["status" => 500, "description" => $e->getMessage(), "token" => ""];
        $status = 500;

    }

    return response($msg, $status);
});


Route::post("add_category", function (Request $req) {
    $rules = ["category" => "required"];

    $msg = [];
    $status = 200;
    try {
        $req->validate($rules);
        $categoryV = $req->only("category");
        $categories = Categories::create([
            "category_name" => $categoryV["category"]
        ]);
        $msg = ["status" => 200, "description" => "okay"];

    } catch (Exception $e) {
        $status = 400;
        $msg = ["status" => 400, "description" => $e->getMessage()];
    }

    return response($msg, $status);
});


Route::get('/get_categories', function (Request $request) {
    $data = new CategoriesDashboard;
    $values = $data->GetSubcategoriesForCategory();
    $response_data = ["status" => 200, "description" => "okay", "num_records" => count($values), "data" => $values];
    return response($response_data, 200);

});

Route::get('/get_menu', function (Request $request) {
    /* The objective is to modify this in that it can do filtering
     * depending on data input by the client.
     * I.e a request can specify the type of category, and we will return only menu items that are present
     * for that category, same for sub-categories.
     * Say e.g we have a request with  the following json
     *
     *
    * {
     *  "sub-category":"pizza"
     *  }
     * We want to only return menu items whose categories is pizza and not burgers.
     * This allows for us to generate multiple options for menus  , but now we need it to work for the api.
     *
     *  Before you even figure out how it's done, you need to add data in your db, so suggesting using phpmyadmin
     * (note you need to run in the terminal `service mysql start` and `apachectl start` before navigating to phpmyadmin, the former starts
     * mysql for you and the latter starts apache, think of it like xampp, but in the command line!!!),
     * add data in the following order
     *  1. Sub-categories
     *  2. Categories
     *  3. Orders
     *
     *  The more, the merrier, and the random the better.
     *
     * There are some queries here, like the GetMenuItems which is found in the app/Models/Menu.php which has some
     * hairy things, but you'd need to understand what it's doing,(just fetching subcategory and categories of each menu item),
     * but investigate to understand !!!.
     *
     * What we want is now selective filtering, i.e we usually did select * from menu, we now want
     * select * from menu where [CONDITION]
     * So like if I were to take the above api and use sql for filtering i might have
     *
     * ``
     *  select categories.category_name,sub_categories.subcategory_name,menus.* from categories
	 *  inner join sub_categories on  sub_categories.category_id=categories.id and sub_categories.subcategory_name="pizza"
     *  inner join menus on menus.subcategory_id = sub_categories.id;
     * ``
     *
     * Notice the `and sub_categories.subcategory_name="pizza"` will ensure my query only returns menus that have pizza as sub-category
     *
     * So you are to figure out how to do it for categories, and sub categories too
     *
     * There are limitless ways to do it, some of those I'm aware of are
     *
     * 1. Via sql like above(how do you do subcategories and categories and defaults??)
     * 2. Via php array_filter,
     *
     * ideally I want you to explore, enjoy and get annoyed when things don't work, as is the work of software development, and the
     * end of this, I hope you feel you contributed as much as me to this project,
     *
     * And so good luck!!!, may God be with you.
     *
     * And if you are stuck do not hesitate to ask.
     *
     */
    $menu = new Menu();
    $values = $menu->GetMenuItems();
    $response_data = ["status" => 200, "description" => "okay", "num_records" => count($values), "data" => $values];
    return response($response_data, 200);

});

Route::get("/get_category_details",function (Request $request){
    $categories = new Categories();
    $values = $categories->GetCategories();
    $response_data = ["status" => 200, "description" => "okay", "num_records" => count($values), "data" => $values];
    return response($response_data, 200);
});
