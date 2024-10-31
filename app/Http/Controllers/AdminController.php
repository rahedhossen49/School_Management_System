<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    function index()
    {
        return view('admin.login');
    }


    function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::guard('admin')->user()->role != 'admin') {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', "Unauthorize User. Access denied");
            }
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', "Something Went Wrong");
        }
    }


    function register()
    {
        $user = new User();
        $user->name = "Admin";
        $user->role = "admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('admin');
        $user->save();
        return redirect()->route('admin.login')->with('sucess', "User Created Sucessfully");
    }


    function dashboard()
    {
        return view('admin.dashboard');
    }


    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('sucess', "Loggged Out Sucessfully!");
    }

    function form()
    {
        return view('admin.form');
    }





    function table()
    {
        return view('admin.table');
    }


}
