<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class  CategoriesDashboard
{
    function GetSubcategoriesForCategory(): array
    {
        return DB::select(
            "select categories.category_name,sub_categories.subcategory_name from categories inner join sub_categories on sub_categories.id=categories.id; "
        );
    }


}
