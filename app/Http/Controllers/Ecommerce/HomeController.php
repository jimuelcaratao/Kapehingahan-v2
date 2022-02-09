<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // create visit
        Visit::Create([
            'ip_address' => FacadesRequest::ip(),
            'visit_date' => Carbon::now(),
        ]);

        $products = OrderItem::select('product_code')
            ->groupBy('product_code')
            ->orderByRaw('COUNT(*) DESC')
            ->take(5)
            ->get();

        // $products = Product::inRandomOrder()->take(5)->get();
        $latest_products = Product::latest()->take(6)->get();


        // menu db
        $food_products = Product::where('category_name', 'Food')->latest()->take(6)->get();
        $bean_products = Product::where('category_name', 'Bean')->latest()->take(6)->get();
        $pastry_products = Product::where('category_name', 'Pastry')->latest()->take(6)->get();
        $drink_products = Product::where('is_customizable', 1)->latest()->take(6)->get();

        return view('pages.ecommerce.home', [
            'products' => $products,
            'latest_products' => $latest_products,
            'food_products' => $food_products,
            'bean_products' => $bean_products,
            'pastry_products' => $pastry_products,
            'drink_products' => $drink_products,
        ]);
    }
}
