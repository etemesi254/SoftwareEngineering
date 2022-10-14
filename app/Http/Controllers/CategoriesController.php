<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    //

    function showCategoriesDashboard(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = new SubCategories();
        $values = $categories->SubCategoriesAggregate();
        $total_categories = $categories::all()->count();

        $subcategories = new SubCategories();

        $total_subcategories = $subcategories::all()->count();

        $menu = new \App\Models\Menu();
        $last_five = $menu->GetMenuItems(5);

        $categories = new Categories();
        $categories_aggregate = $categories->GetCategoriesAggregate();

        return view("admin.categories.categories_dashboard", ["subcategories" => $values, "total_categories" => $total_categories, "total_subcategories" => $total_subcategories, "categories" => DB::table("categories")->limit(3)->get(), "categories_aggregate" => $categories_aggregate]);
    }

    function showCategoriesUploadView(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Categories::all();
        return view('admin.categories.categories_view', ["categories" => $categories]);
    }

    function showCategoriesUploadForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories.categories_upload_form');

    }
}
