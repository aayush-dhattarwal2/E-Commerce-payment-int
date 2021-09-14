<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        return view('auth.login');
    }

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function store(Request $request)
    {
        // dd($request->remember);
        $this->validate($request, [
            'email' => 'required|email',
            'password' =>'required'
        ]);
        // dd('ok');
        if (!auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return back()->with('status', 'Invalid Login details');
        }

        return redirect()->route('dashboard');
    }
}
