<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    function  showHomePage()
    {
        return view("index");
    }

}
