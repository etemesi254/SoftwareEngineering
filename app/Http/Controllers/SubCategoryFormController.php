<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SubCategoriesFormController;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categories = Category::all();
//        return view('admin.categories', compact('categories'));
    }

    public function uploadSubCategory(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp svg|max:2048',
            "category_id" => 'required'
        ]);

        // $imageName = time() . '.' . $request->image->extension();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/images/categories');
            if ($image === false) {
                return "Image not uploaded";
            }
            SubCategories::create([
                "subcategory_name" => $request->name,
                "description" => $request->description,
                "image" => $image,
                "category_id" => $request->category_id
            ]);
//            return route('admin');
//            redirect()->route('admin');
        } else {
            return "error";
        }


        return redirect("/admin")->with(["success"]);
    }

}

;
