<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    //
    public function showUserDashboard()
    {
        $values = DB::raw("SELECT users.fullname,count(user_logins.user)  FROM `user_logins` left join  users on  users.id = user_logins.id  GROUP by user_logins.user;");

    }
}
