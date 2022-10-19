<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{

    function showSubCategoriesForm(){
        $categories = Categories::all();
        return view('admin.sub_categories.subcategories_upload_form', ["categories" => $categories]);
    }
}
