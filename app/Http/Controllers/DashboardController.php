<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if(auth()->user()->usertype == "admin"){

        return view('admin.Admindashboard');

        }
        else if(auth()->user()->usertype == "employee")
        {
            return view('admin.employee');
        }
        else if(auth()->user()->usertype == "user")
        {
            return view('admin.dashboard');
        }

    }


    public function accessAdmin(){
        if(auth()->user()->usertype == "admin")
        {
            return view('admin.Admindashboard');
        }
        else {
            return redirect('/');
        }
    }

    public function accessEmployee(){
        if(auth()->user()->usertype == "employee")
        {
            return view('admin.employee');
        }
        else {
            return redirect('/');
        }
    }

   public function __construct(){
       $this->middleware(['auth']);
   }
}
