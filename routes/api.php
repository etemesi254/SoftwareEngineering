<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    $request_data = json_decode($request->getContent(),true);
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
            "gender"=>"required",
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
            $msg= ["status"=>200,"description"=>"okay","data"=>["token"=>$token->plainTextToken]];

        } catch (Exception $e) {
            $msg = ["status" => 500, "description" => "Internal error", "error" => $e->getMessage(),"data"=>[]];
            $status = 500;

        }
    }

    return response($msg, $status);
});
