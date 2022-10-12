<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        "category_name",
        "description",
        "image"
    ];

    public function GetCategoriesAggregate(): \Illuminate\Support\Collection
    {

        // select categories.category_name, count(categories.id) as counts from menus
        // RIGHT join sub_categories on sub_categories.id = menus.subcategory_id
        // RIGHT JOIN categories on sub_categories.category_id = categories.id
        // GROUP by menus.subcategory_id;
        return DB::table("menus")
            ->rightJoin("sub_categories", "sub_categories.id", "=", "menus.subcategory_id")
            ->rightJoin("categories","sub_categories.category_id","=","categories.id")
            ->selectRaw("categories.category_name, count(categories.id) as counts")
            ->groupBy("menus.subcategory_id")
            ->get();



    }

    public function GetTotalCategories(): int
    {
        return $this::all()->count();
    }
}
