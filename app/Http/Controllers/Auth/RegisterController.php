<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){

        // dd($request);
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' =>'required|confirmed',
            'role' => 'required',
        ]);

        //validation
        //store user
        //sign the user in
        //redirect
        // dd($request);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'usertype' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        auth()->attempt($request->only('email', 'password'));

        $data=['name' => $request->name, 'data'=>'Hello '.$request->name, 'email'=> $request->email];
        $user = ['email' => $request->email, 'name' => $request->name];
        Mail::send('mail', $data, function($messages) use ($user){
            $messages->to($user['email']);
            $messages->subject('Hello '.$user['name'].'This is Just a Test for SMTP config.');
            $messages->from('aayush.ouctus@gmail.com', 'Aayush App');
        });

        return redirect()->route('dashboard');
    }

}
