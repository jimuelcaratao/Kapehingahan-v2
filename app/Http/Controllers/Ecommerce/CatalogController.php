<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        // filtered
        $products = Product::latest()
            ->get();

        // // converting category value to text
        // if (!empty(request()->brand_type)) {
        //     $searchBrandConvert = Brand::where('brand_id', request()->brand_type)->first();
        //     $brands_search = $searchBrandConvert->brand_name;
        // }

        return view('pages.ecommerce.catalog', [
            'products' => $products,
            // 'brands_search' => $brands_search ?? null,
        ]);
    }

    public function single_product()
    {
        return view('pages.ecommerce.single_product', [
            // 'brands_search' => $brands_search ?? null,
        ]);
    }
}
