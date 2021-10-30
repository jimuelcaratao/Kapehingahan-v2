<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProductCustom;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')
            ->get();

        return view('pages.ecommerce.cart', [
            'carts' => $carts,
        ]);
    }


    public function add_to_cart(Request $request, $product_code)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|between:1,5',
        ]);

        if ($validator->fails()) {
            return redirect('categories')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        // getting all cart info from user
        $get_cart_info = Cart::where('user_id', 'like', '%' . Auth::user()->id . '%')
            ->where('product_code', $product_code)
            ->first();


        $product_info = Product::where('product_code', $product_code)
            ->first();

        // validation for stock if nostocks
        if ($product_info->stock <= 0) {
            return Redirect::route('product', [$product_code])->with('toast_error', 'Opps no more stocks');
        }

        if ($product_info->stock < $request->input('quantity')) {
            return Redirect::route('product', [$product_code])->with('toast_error', 'Opps only ' . $product_info->stock . ' stock left.');
        }


        $cart =  Cart::create([
            'user_id' => Auth::user()->id,
            'product_code' => $product_code,
            'quantity' => $request->input('quantity'),
        ]);

        if (!empty($request->input('size'))) {
            CartProductCustom::create([
                'cart_id' => $cart->cart_id,
                'product_code' => $product_code,
                'size' => $request->input('size'),
                'milk' => $request->input('milk'),
                'flavor' => $request->input('flavor'),
                'toppping' => $request->input('toppping'),
                'add_in' => $request->input('add_in'),
            ]);
        }

        return Redirect::route('product', [$product_code])->with('toast_success', 'Added from cart');
    }

    public function remove_to_cart($product_code)
    {
        $remove_cart =  Cart::Where('product_code', $product_code)
            ->Where('user_id', 'like', '%' . Auth::user()->id . '%')
            ->delete();

        return Redirect::route('cart')->with('toast_success', 'Removed from cart');
    }

    public function move_to_wishlist($product_code)
    {

        $cart = Cart::Where('product_code', $product_code)
            ->Where('user_id', 'like', '%' . Auth::user()->id . '%')->first();


        $wishlist = WishList::Where('product_code', $product_code)
            ->Where('user_id', 'like', '%' . Auth::user()->id . '%')->first();

        if (!empty($wishlist)) {
            return Redirect::route('cart')->with('toast_info', 'Already on your wishlist');
        }

        if (empty($wishlist)) {
            WishList::Create([
                'user_id' => Auth::user()->id,
                'product_code' => $product_code,
            ]);

            // $cart->delete();

            return Redirect::route('cart')->with('toast_success', 'Moved to Wishlist');
        }
    }


    public function change_quantity($cart_id, $product_code, Request $request)
    {

        $product_info = Product::where('product_code', $product_code)
            ->first();

        if ($product_info->stock < $request->input('quantity')) {
            return Redirect::route('cart')->with('toast_error', 'Opps only ' . $product_info->stock . ' stock left.');
        }

        if ($request->input('quantity') > 5) {
            return Redirect::route('cart')
                ->with('toast_error', 'Sorry, maximum per item is (5)');
        }

        if ($request->input('quantity') < 1) {
            return Redirect::route('cart')
                ->with('toast_error', 'Sorry, minimum per item is (1)');
        }
        $cart = Cart::Where('cart_id', $cart_id)
            ->Where('user_id', 'like', '%' . Auth::user()->id . '%')
            ->update([
                'quantity' => $request->input('quantity'),
            ]);

        return Redirect::route('cart');
    }
}
