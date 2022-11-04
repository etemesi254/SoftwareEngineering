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
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function customLogin(Request $request): Redirector|RedirectResponse|Application
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            UserLogins::create(["user" => \auth()->user()->id]);
            return redirect()->intended('/');
        }

        return redirect("/login?window=login")->withErrors(['msg' => "Invalid Login Credentials"]);
    }

    public function registration(): Factory|View|Application
    {
        return view('auth.registration');
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
        $check = $this->create($data);


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

    public function dashboard()
    {
        if (Auth()::check()) {
            return view('');
        }

        return redirect("login");
    }

    public function signOut(): Redirector|Application|RedirectResponse
    {
        Session::flush();
        Auth::logout();
//        (new \App\Models\UserLogins)->update([]);
        return Redirect('/');
    }
}
