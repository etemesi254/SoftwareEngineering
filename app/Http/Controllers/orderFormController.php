<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderFormController extends Controller
{
    //
//    public function showOrderForm()
//    {
//        $user = Auth::user();
//        $id = Auth::id();
//        $menus = new MenuController();
//        $menu_details = $menus->getMenusForTime($time);
//    }

    public function selectedOrder(Request $request)
    {
        $selected_menu = $request->input('id');
        $unit_price = $request->input('unit_price');
        $id = Auth::id();
        $menuData = DB::table('menus')->find($selected_menu);
        $currentTime = Carbon::now();

        return view('kitchenside.orderForm', [
            'menu_id' => $selected_menu,
            'unit_price' => $unit_price,
            'customer_id' => $id,
            'menu_data'=>$menuData,
            'current_time'=>$currentTime,
        ]);
    }
}
