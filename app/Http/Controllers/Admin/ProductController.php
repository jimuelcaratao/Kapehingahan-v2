<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.admin.products');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sku' => 'required|unique:products',
            'product_code' => 'required|unique:products|numeric',
            'category_name' => 'required',
            'brand_name' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'default_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return Redirect::route('products')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        Product::insert([
            'product_code' => $request->input('product_code'),
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'category_name' => $request->input('category_name'),
            'brand_name' => $request->input('brand_name'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
        ]);

        // photos
        if ($request->hasFile('default_photo') != null) {
            if ($request->file('default_photo')->isValid()) {
                // create images
                $image       = $request->file('default_photo');
                $filename    = $image->getClientOriginalName();
                $product_code =  $request->input('product_code');

                $image_resize = Image::make($image);
                $image_resize->resize(300, 300);

                $image_resize->save(public_path('storage/media/products/main_'
                    . $product_code . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                Product::where('product_code', $product_code)
                    ->update([
                        'default_photo' => $char,
                    ]);
            }
        }

        return Redirect::route('products')->withSuccess('Product :' . $request->input('product_name') . '. Created Successfully!');
    }
}
