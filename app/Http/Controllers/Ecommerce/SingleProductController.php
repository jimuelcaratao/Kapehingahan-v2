<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SingleProductController extends Controller
{
    public function index($product_code)
    {

        $product = Product::where('product_code', $product_code)->first();

        if (empty($product)) {
            return abort(404);
        }

        if (Auth::check() == true) {
            $wishlist = WishList::Where('user_id', 'like', '%' . Auth::user()->id . '%')
                ->Where('product_code', $product_code)->first();
        }

        $product_ave_reviews = Review::where('product_code', $product_code)->avg('stars');

        return view('pages.ecommerce.single_product', [
            'product' => $product,
            'product_ave_reviews' => $product_ave_reviews,
            'wishlist' => $wishlist ?? null,
        ]);
    }


    // public function review($product_code, Review $review)
    // {
    //     $product = Product::where('product_code', $product_code)->first();

    //     if (empty($product)) {
    //         return abort(404);
    //     }
    //     return view('Pages.NormalUser.product_review', [
    //         'review' => $review,
    //         'product' => $product,

    //     ]);
    // }
}
