<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        // filtered
        $products = Product::latest()
            ->get();

        $categories = Category::oldest()
            ->get();

        // // converting category value to text
        // if (!empty(request()->brand_type)) {
        //     $searchBrandConvert = Brand::where('brand_id', request()->brand_type)->first();
        //     $brands_search = $searchBrandConvert->brand_name;
        // }

        return view('pages.ecommerce.catalog', [
            'products' => $products,
            'categories' => $categories,
            // 'brands_search' => $brands_search ?? null,
        ]);
    }

    public function catalog_category($category_name)
    {
        // filtered
        $products = Product::where('category_name', $category_name)
            ->latest()
            ->get();

        $categories = Category::oldest()
            ->get();
        // // converting category value to text
        // if (!empty(request()->brand_type)) {
        //     $searchBrandConvert = Brand::where('brand_id', request()->brand_type)->first();
        //     $brands_search = $searchBrandConvert->brand_name;
        // }

        $category_found = Category::where('category_name', $category_name)->first();

        return view('pages.ecommerce.catalog', [
            'products' => $products,
            'categories' => $categories,
            'category_found' => $category_found,
            // 'brands_search' => $brands_search ?? null,
        ]);
    }
    // public function single_product()
    // {
    //     return view('pages.ecommerce.single_product', [
    //         // 'brands_search' => $brands_search ?? null,
    //     ]);
    // }
}
