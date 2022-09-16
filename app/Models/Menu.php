<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;

    public function GetMenuItems(): array
    {
        return DB::select("select menus.id,menus.name,menus.unit_price,menus.description,menus.image,sub_categories.subcategory_name,categories.category_name from categories
	                            inner join sub_categories on  sub_categories.category_id=categories.id
                                inner join menus on menus.subcategory_id = sub_categories.id; ");
    }
}
