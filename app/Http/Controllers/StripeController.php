<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use Stripe\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $price = $request->price;
        return view('stripe', ['price'=>$price] );
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = \Stripe\Customer::create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'address' => [
                'line1' => '510 Townsend St',
                'postal_code' => '98140',
                'city' => 'San Francisco',
                'state' => 'CA',
                'country' => 'US',
            ],
        ]);
        
        \Stripe\Customer::createSource(
            $customer->id,
            ['source' => $request->stripeToken]
        );
        
        Charge::create ([
            "customer" => $customer->id,
            "amount" => $request->price * 100,
            "currency" => "usd",
            "description" => "Test payment from stripe.test." , 
        ]);
        
        Session::flash('success', 'Payment successful!');
           
        return back();
    }
}
