<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderFormController extends Controller
{

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
            'menu_data' => $menuData,
            'current_time' => $currentTime,
        ]);
    }

    public function insertOrder(Request $request)
    {
        //generating instance of model
        $newOrder = new Orders;

        //assigning extracted data
        $newOrder->customer_id = $request->customerId;
        $newOrder->quantity = $request->customer_quantity;
        $newOrder->price = $request->unit_price;
        $newOrder->date = $request->dateTime;
        $newOrder->description = $request->customer_preferences;
        $newOrder->status = $request->status;

        //running the new assigned queries and updating order details table

        if ($newOrder->save()) {
            $newOrderDetails = new OrderDetails;
            $lastID = DB::getPdo()->lastInsertId();
            $orderInfo = DB::table('orders')->find($lastID);

            $newOrderDetails->order_id = $orderInfo->id;
            $newOrderDetails->product_id = $request->menuId;
            $newOrderDetails->price = $request->unit_price;
            $newOrderDetails->quantity = $request->customer_quantity;

            $newOrderDetails->save();
            return redirect('kitchenView');
        }

    }

    public function kitchenOrderListing(){
        return view('kitchenside.kitchenView');
    }
}
