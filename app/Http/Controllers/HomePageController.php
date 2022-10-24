<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//https://stackoverflow.com/a/66208862


class HomePageController extends Controller
{
    function getTimeOfDay()
    {
        $timeOfDay = date('a');
        if ($timeOfDay == 'am') {
            return "breakfast";
        } else {
            return "lunch";
        }

    }

//
    function showHomePage()
    {
        $category = new Categories();
        $time = $this->getTimeOfDay();

        // Get sub category, this is set up there with enums
        $category_details = DB::table("categories")
            ->where("category_name", "=", $time)
            ->first();
        $menus = new MenuController();
        $menu_details = $menus->getMenusForTime($time);


        return view("index", ["category" => $category_details, "menus" => $menu_details]);
    }

}
