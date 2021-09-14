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
        else {
            return redirect('/');
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

   public function __construct(){
       $this->middleware(['auth']);
   }
}
