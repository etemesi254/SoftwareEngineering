<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CategoriesController;
use App\Http\Requests\CategoriesStoreRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.upload_products');
    }

    public function store(CategoriesStoreRequest $request)
    {
        $image = $request->file('image')->store('public/images');

        Categories::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        return to_route('admin.categories.index')->with('success', 'Category created successfully.');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories)
    {
        Storage::delete($categories->image);
        $categories->menus()->detach();
        $categories->delete();

        return to_route('admin.categories.index')->with('danger', 'Category deleted successfully.');
    }
}