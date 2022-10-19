<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function showUploadForm()
    {
        $subcategories = SubCategories::all();
        return view("admin.menu_form", ["subcategories" => $subcategories]);
    }
    function uploadMenu(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp svg|max:2048',
            "subcategory" => 'required',
            "quantity"=>"required",
            "price"=>"required"
        ]);

        // $imageName = time() . '.' . $request->image->extension();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/images/menus');
            if ($image === false) {
                return "Image not uploaded";
            }
            Menu::create([
                'name'=>$request->name,
                'unit_price'=>$request->price,
                'description'=>$request->description,
                "image"=>$image,
                "available_quantity"=>$request->quantity,
                "subcategory_id"=>$request->subcategory
            ]);
        } else {
            return "error";
        }


        return "success";
    }
}
