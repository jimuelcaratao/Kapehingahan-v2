<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart_check = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')->first();

        if (empty($cart_check)) {
            return Redirect::route('cart')->with('toast_error', 'You cannot checkout if you had no item on cart');
        }

        $carts = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')->get();

        return view('pages.ecommerce.checkout', [
            'carts' => $carts,
        ]);
    }

    public function confirm_address_checkout(Request $request)
    {

        if (Auth::user()->user_address) {
            return Redirect::route('payment.index');
        }

        $request->validate([
            'mobile_no' => 'required',
            'house' => 'required',
            'city' => 'required',
            'province' => 'required',
            'barangay' => 'required',
        ]);



        if (empty(Auth::user()->user_address)) {
            UserAddress::create([
                'user_id' => Auth::user()->id,
                'mobile_no' => $request->input('mobile_no'),
                'house' =>  $request->input('house'),
                'city' =>  $request->input('city'),
                'province' =>  $request->input('province'),
                'barangay' =>  $request->input('barangay'),
            ]);
        }

        return Redirect::route('payment.index')->with('toast_success', 'Address saved.');
    }
}
