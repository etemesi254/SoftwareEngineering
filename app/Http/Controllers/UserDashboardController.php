<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use App\Models\Orders;
use App\Models\SubCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    //
    public function showUserDashboard()
    {
        $values = DB::table("user_logins")
            ->selectRaw("users.fullname as name,count(user_logins.user)  as counts")
            ->leftJoin("users", "users.id", "=", "user_logins.id")
            ->groupBy("user_logins.user")->get();

        $most_common = DB::table("user_logins")
            ->selectRaw("users.fullname as name,count(user_logins.user)  as counts, users.created_at as joined")
            ->leftJoin("users", "users.id", "=", "user_logins.id")
            ->groupBy("user_logins.user")
            ->orderBy("counts")->limit(5)
            ->get();

        $new_accounts = DB::table("users")->orderByDesc("id")->limit(5)->get();


        $user = auth()->user();
        $total_categories = Categories::all()->count();

        $total_subcategories = SubCategories::all()->count();
        $total_users = User::all()->count();
        $total_orders = Orders::all()->count();
        $total_menus = Menu::all()->count();
        $database_name = DB::connection()->getDatabaseName();

        return view("admin.users.users_dashboard", ['user' => $user,
            "total_categories" => $total_categories,
            "total_subcategories" => $total_subcategories,
            "total_users" => $total_users,
            "total_orders" => $total_orders,
            "total_menus" => $total_menus,
            "database_name" => $database_name,
            "users" => $values,
            "common_users" => $most_common,
            "new_users" => $new_accounts]);


    }
}
