<?php

use App\Http\Controllers\HomePageController;
use App\Models\CategoriesDashboard;
use App\Models\Menu;
use App\Models\SubCategories;
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



Route::get('/menu', [HomePageController::class, "getDataForMenu"]);

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
    try {
        $categories = $request->only("category", "subcategory");

        $menu = new Menu();
        $values = $menu->GetMenuItems()->all();
        $new_values = [];
        if (!(isset ($categories["category"]) || isset($categories["subcategory"]))) {
            $new_values = $values;
        } else {
            foreach ($values as $value) {
                if (isset ($categories["category"])) {
                    if ($value->category_name === $categories["category"]) {
                        $new_values[] = $value;
                    };
                } else if (isset ($categories["subcategory"])) {
                    if ($value->subcategory_name === $categories["subcategory"]) {
                        $new_values[] = $value;
                    };
                }
            }
        }
        $response_data = ["status" => 200, "description" => "okay", "num_records" => count($new_values), "data" => $new_values];
        return response($response_data, 200);

    } catch (\PHPUnit\Exception $e) {
        $response_data = ["status" => 400, "description" => $e->getMessage() ];
        return response($response_data, 400);
    }

});


Route::get("/get_category_details", function (Request $request) {
    $categories = new Categories();
    $values = $categories->GetCategoriesAggregate();
    $response_data = ["status" => 200, "description" => "okay", "num_records" => count($values), "data" => $values];
    return response($response_data, 200);
});

Route::get("/get_subcategory_details",function (){

    $categories = new SubCategories();
    $values = $categories->SubCategoriesAggregate();
    $response_data = ["status" => 200, "description" => "okay", "num_records" => count($values), "data" => $values];
    return response($response_data, 200);
});

Route::any("/add_menu",function (Request $request){
    $rules = [
        "name" => "required",
        "unit_price" => "required",
        "description" => "required",
        "image" => "required",
        "available_quantity" => "required",
        "subcategory_id" => "required",
        ];

    $msg = [];
    $status = 200;
    try{
        $request->validate($rules);
    } catch (Exception $e)
    {
        $status = 400;
        $msg = ["statusDescription"=>$e->getMessage(),"status"=>400];
    }
    return response($msg, $status);

});
