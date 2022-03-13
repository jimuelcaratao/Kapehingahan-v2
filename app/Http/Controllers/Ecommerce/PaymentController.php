<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProductCustom;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductCustom;
use App\Models\UserCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function index()
    {
        $cart_check = Cart::Where('user_id', Auth::user()->id)->first();

        if (empty($cart_check)) {
            return Redirect::route('cart')->with('toast_error', 'You cannot proceed to payment if you had no item on cart');
        }

        $carts = Cart::Where('user_id', Auth::user()->id)->get();

        return view('pages.ecommerce.payment', [
            'carts' => $carts,
        ]);
    }

    public function place_order(Request $request)
    {
        if (Auth::user()->user_address) {
            if ($request->input('payment_method') == "Online Payment") {
                if (empty(Auth::user()->user_card)) {
                    $request->validate([
                        'cardname' => 'required',
                        'cardnumber' => 'required|numeric|digits:16',
                        'expmonth' => 'required|numeric|digits:2|max:12',
                        'expyear' => 'required|numeric|digits:4',
                        'ccv' => 'required|numeric|digits:3',
                    ]);

                    UserCard::create([
                        'user_id' => Auth::user()->id,
                        'cardname' => $request->input('cardname'),
                        'cardnumber' =>  $request->input('cardnumber'),
                        'expmonth' =>  $request->input('expmonth'),
                        'expyear' =>  $request->input('expyear'),
                        'ccv' =>  $request->input('ccv'),
                    ]);
                }
            }

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'status' => 'Pending',
                'payment_method' => $request->input('payment_method'),
            ]);

            $my_carts =  Cart::where('user_id', Auth::user()->id)->get();


            foreach ($my_carts as $my_cart) {

                if ($my_cart->product->stock > 0) {

                    $order_items = OrderItem::Create([
                        'order_no' => $order->order_no,
                        'product_code' => $my_cart->product_code,
                        'quantity' => $my_cart->quantity,
                        'price' => $my_cart->product->price,
                    ]);

                    // dd($my_cart->cart_product_customizations);
                    if ($my_cart->cart_product_customizations != null) {
                        foreach ($my_cart->cart_product_customizations as $item) {

                            ProductCustom::create([
                                'order_item_id' => $order_items->order_item_id,
                                'product_code' => $item->product_code,
                                'size' => $item->size,
                                'milk' => $item->milk,
                                'flavor' => $item->flavor,
                                'toppping' => $item->toppping,
                                'add_in' => $item->add_in,
                            ]);
                        }

                        // delete from cart
                        CartProductCustom::where('cart_id', $my_cart->cart_id)->delete();
                    }
                }
            }
            $deletedRows = Cart::where('user_id', Auth::user()->id)->delete();


            //  Mail

            return Redirect::route('my_orders')->with('toast_success', 'Order placed.');
        }
    }
}
