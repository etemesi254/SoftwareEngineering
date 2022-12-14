<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\UserLogins;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

//use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\rejection_for;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function customLogin(Request $request): Redirector|RedirectResponse|Application
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            UserLogins::create(["user" => \auth()->user()->id]);

//            selecting logged-in users role
            $selectRole = DB::table('users')
                ->where('email', $request->input('email'))
                ->get('roles')
                ->first()->roles;
//            selecting logged-in users id
            $selectID = DB::table('users')
                ->where('email', $request->input('email'))
                ->get('id')
                ->first()->id;
//            selecting logged - in users username
            $selectCustomName = DB::table('users')
                ->where('email', $request->input('email'))
                ->get('username')
                ->first()->username;

//            selecting logged-in user's full name
            $selectUName = DB::table('users')
                ->where('email', $request->input('email'))
                ->get('fullname')
                ->first()->fullname;

            $request->session()->regenerate();
            $request->session()->put('email', $request->input('email'));
            $request->session()->put('userRole', $selectRole,);
            $request->session()->put('userID', $selectID,);
            $request->session()->put('nickname', $selectCustomName,);
            $request->session()->put('userName', $selectUName,);

            if ($selectRole == 'admin') {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/');
            }
        } else {
            return redirect("/login?window=login")->withErrors(['msg' => "Invalid Login Credentials"]);
        }
    }


    public function customLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function customRegistration(Request $request): Redirector|Application|RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'username' => 'required|unique:users',
            'full_name' => 'required',
            'dob' => 'required',
            'telephone' => 'required|unique:users',
        ]);

        $data = $request->all();
        $this->create($data);
        return redirect("/");
    }

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fullname' => $data["full_name"],
            'gender' => 'male',
            'storage_folder' => "storage/users/" . $data['username'],
            'telephone' => $data['telephone'],
            'dob' => $data['dob']
        ]);
    }

    public function userDashboard(Request $request)
    {
        if (Auth()->check()) {

            $selectPhoneNumber = DB::table('users')
                ->where('id', $request->input('userID'))
                ->get('telephone')
                ->first()->telephone;


            $request->session()->put('phoneNumber', $selectPhoneNumber,);
            //email, userName, userRole, userID and nickname are already present sessions

            $orderDetails = DB::table('users')
                ->selectRaw(
                    'menus.image as image,
                    menus.name as name,
                    orders.date as date,
                    orders.description as description,
                    order_details.quantity as quantity,
                    order_details.total as total_price,
                    orders.status as status,
                    users.id as id,
                    orders.id as orderID')
                ->join('orders', 'users.id', '=', 'orders.customer_id')
                ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->join('menus', 'menus.id', '=', 'order_details.product_id')
                ->where('users.id', '=', $request->input('userID'))
                ->get();

            return view('users.dashboard', [
                'orderDetails' => $orderDetails
            ]);
        } else {
            return redirect("/login?window=login")->withErrors(['msg' => "Unable to Access User Panel without login first"]);
        }
    }
}
