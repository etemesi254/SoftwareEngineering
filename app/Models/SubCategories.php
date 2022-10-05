<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubCategories extends Model
{
    use HasFactory;

    function GetMenuAggregate()
    {
        // select sub_categories.subcategory_name,
        // count(menus.subcategory_id) as counts from menus
        // RIGHT join sub_categories on sub_categories.id = menus.subcategory_id
        // GROUP by menus.subcategory_id;

        DB::table("menus")
            ->rightJoin("sub_categories", "sub_categories.id", "=", "menus.subcategory_id")
            ->selectRaw("sub_categories.subcategory_name,count(menus.subcategory_id) as counts")
            ->groupBy("menus.subcategory_id")
            ->get();
    }
}
