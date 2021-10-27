<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
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

        $products = Product::inRandomOrder()->take(10)->get();

        $latest_products = Product::latest()->take(10)->get();

        return view('pages.ecommerce.home');
    }
}
