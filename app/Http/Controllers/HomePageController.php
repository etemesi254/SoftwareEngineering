<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use App\Models\SubCategories;
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

    function showMenuPage(Request $request)
    {

        $menus = new MenuController();
        $menu_details = $menus->getAllMenus();;


        return view("menu", ["menus" => $menu_details]);
    }

    function getDataForMenu(): array
    {
        $end = [];
        // step 1. get all categories
        $categories = Categories::all();
        // step 2 get sub categories for a category
        foreach ($categories as $category) {
            $small_one = array("description" => $category->description, "image" => $category->image, "name" => $category->category_name);
            // there is a stupid bug with the db returning ids as 0,
            // this took way to  long to figure out
            $sub_categories = DB::table("sub_categories")
                ->join("categories", "sub_categories.category_id", "=", "categories.id")
                ->where("sub_categories.category_id", "=", $category->id)
                ->get()
                ->toArray();

            $meals_a = [];
            foreach ($sub_categories as $sub_category) {
                $meals = Db::table('menus')
                    ->join('sub_categories', 'sub_categories.id', "=", "menus.subcategory_id")
                    ->join("categories", "categories.id", "=", "sub_categories.category_id")
                    ->select("menus.id", "menus.name", "menus.unit_price",
                        "menus.description", "menus.image", "sub_categories.subcategory_name",
                        "categories.category_name")
                    ->where("sub_categories.subcategory_name", "=", $sub_category->subcategory_name)
                    ->get()
                ->toArray();

                $meals_b["id"] = $sub_category->id;
                $meals_b["subcategory_name"] = $sub_category->subcategory_name;
                $meals_b["description"] = $sub_category->description;
                $meals_b["image"] = $sub_category->image;
                $meals_b["data"] = $meals;

                $meals_a["data"][] = $meals_b;
            }
            $small_one["data"] = $meals_a;
            $end[] = $small_one;
        }
        return $end;
    }

}
