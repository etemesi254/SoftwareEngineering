<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'unit_price',
        'description',
        "image",
        "available_quantity",
        "subcategory_id",
    ];

    public function GetMenuItems($limit = PHP_INT_MAX, $order_by_direction = 'asc'): \Illuminate\Support\Collection
    {
        /*
         *  Raw SQL
         * select menus.id,menus.name,menus.unit_price,menus.description,menus.image,sub_categories.subcategory_name,categories.category_name from categories
         *	inner join sub_categories on  sub_categories.category_id=categories.id
         *  inner join menus on menus.subcategory_id = sub_categories.id;
        */
        return Db::table('menus')
            ->join('sub_categories', 'sub_categories.id', "=", "menus.subcategory_id")
            ->join("categories", "categories.id", "=", "sub_categories.category_id")
            ->select("menus.id", "menus.name", "menus.unit_price", "menus.description", "menus.image", "sub_categories.subcategory_name", "categories.category_name")
            ->limit($limit)
            ->orderBy("id", $order_by_direction)
            ->get();
    }

}
