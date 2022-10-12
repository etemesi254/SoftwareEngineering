<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class CategoriesFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.upload_products');
    }

    public function uploadCategory(Request $request): string
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp svg|max:2048'

        ]);

       // $imageName = time() . '.' . $request->image->extension();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/images/categories');
            if ($image===false){
                return "Image not uploaded";
            }
            Categories::create([
                "category_name"=>$request->name,
                "description"=>$request->description,
                "image"=>$image
            ]);
        } else{
         return "error";
        }


        return "success";
    }


    public function update(Request $request, Categories $categories)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $image = $categories->image;
        if ($request->hasFile('image')) {
            Storage::delete($categories->image);
            $image = $request->file('image')->store('public/images');
        }

        $categories->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Categories $categories)
    {
        Storage::delete($categories->image);
        $categories->menus()->detach();
        $categories->delete();

        return to_route('admin.categories.index')->with('danger', 'Category deleted successfully.');
    }
}
