<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OrdersController extends Controller
{
    function showOrdersView(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Orders::all();
        return view("admin.orders.view_orders", ["orders" => $orders,]);
    }

    function showOrdersDashboard()
    {
        $totalPrice = DB::select("SELECT sum(order_details.total) as total_amount from order_details;");
        $totalOrders = DB::select("SELECT sum(order_details.quantity) as total_sales from order_details;");
        $bestSellers = DB::select("SELECT max(order_details.quantity) as max_ordered, menus.name  from order_details inner join menus on menus.id = order_details.product_id;");
        $avgSales = DB::select("SELECT avg(order_details.total) as avg  from order_details;");
        $orders = DB::select("select order_details.total,menus.name from order_details inner join orders on order_details.order_id=orders.id inner join menus on menus.id = orders.id ");

        return view("admin.orders.orders_dashboard", ["total_sales" => $totalOrders[0]->total_sales, "total_price" => $totalPrice[0]->total_amount, "best_seller" => $bestSellers[0], "avg" => intval($avgSales[0]->avg), "orders" => $orders]);

    }
}
