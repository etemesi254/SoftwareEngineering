<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\FlareClient\Time\Time;

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
        return redirect("/admin");
    }

    public function getMenusForTime(String $time="*",int $limit=PHP_INT_MAX): \Illuminate\Support\Collection
    {
        // Do some joins I love
        return Db::table('menus')
            ->join('sub_categories', 'sub_categories.id', "=", "menus.subcategory_id")
            ->join("categories", "categories.id", "=", "sub_categories.category_id")
            ->select("menus.id", "menus.name", "menus.unit_price", "menus.description", "menus.image", "sub_categories.subcategory_name", "categories.category_name")
            ->limit($limit)
            ->where("categories.category_name","=",$time)
            //->groupBy("subcategory_id")
            ->get();

    }

}
