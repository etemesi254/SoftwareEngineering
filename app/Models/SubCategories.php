<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubCategories extends Model
{
    use HasFactory;

    function SubCategoriesAggregate(): \Illuminate\Support\Collection
    {
        //   select sub_categories.subcategory_name,categories.category_name ,COUNT(menus.subcategory_id)  as counts from menus
        //	 left join sub_categories on sub_categories.id = menus.subcategory_id
        //   left join categories on sub_categories.category_id = categories.id
        //   GROUP BY menus.subcategory_id;
        return DB::table("menus")
            ->leftJoin("sub_categories", "sub_categories.id", "=", "menus.subcategory_id")
            ->leftJoin("categories", "categories.id", "=", "sub_categories.category_id")
            ->select("sub_categories.subcategory_name", "categories.category_name")
            ->selectRaw("COUNT(menus.subcategory_id)  as counts")
            ->groupBy("menus.subcategory_id")
            ->get();
    }
}
