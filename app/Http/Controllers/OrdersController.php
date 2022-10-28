<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Storage;

class OrdersController extends Controller
{
    function showOrdersView(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Orders::all();
        return view("admin.orders.view_orders", ["orders" => $orders,]);
    }
}
