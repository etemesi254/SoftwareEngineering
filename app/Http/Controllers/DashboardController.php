<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use App\Models\Orders;
use App\Models\SubCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    function showDashboard()
    {
        $user = auth()->user();
        $total_categories = Categories::all()->count();

        $total_subcategories = SubCategories::all()->count();
        $total_users = User::all()->count();
        $total_orders = Orders::all()->count();
        $total_menus = Menu::all()->count();
        $database_name = DB::connection()->getDatabaseName();

        return view("admin.dashboard", ["user" => $user,
            "total_categories" => $total_categories,
            "total_subcategories" => $total_subcategories,
            "total_users" => $total_users,
            "total_orders" => $total_orders,
            "total_menus" => $total_menus,
            "database_name"=>$database_name]);

    }
}
