<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {

        $brands = Brand::where('status', 'Available')->get();
        $categories = Category::get();
        $tableProducts = Product::all();

        if ($tableProducts->isEmpty()) {
            $products = Product::paginate();
        }

        if ($tableProducts->isNotEmpty()) {
            // $products = Product::paginate(5);

            // search validation
            $search = Product::searchfilter()
                ->categoryfilter()
                ->first();

            $searchAdvance = Product::searchfilter()
                ->categoryfilter()
                ->first();

            if ($search === null) {
                return redirect('products')->with('info', 'No "' . request()->search . '" found in the database.');
            }


            if ($search != null) {
                // default returning
                $products = Product::searchfilter()
                    ->categoryfilter()
                    ->latest()
                    ->paginate(10);
            }
        }

        return view('pages.admin.products', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
            'tableProducts' => $tableProducts,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'product_code' => 'required|unique:products|numeric',
            'product_name' => 'required',
            'category_name' => 'required',
            'brand_name' => 'required',
            'description' => 'required',
            // 'stock' => 'numeric|min:0',
            'price' => 'required|numeric',
            'default_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return Redirect::route('products')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        $product =  Product::create([
            // 'product_code' => $request->input('product_code'),
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'category_name' => $request->input('category_name'),
            'brand_name' => $request->input('brand_name'),
            'status' => $request->input('status'),
            'stock' => $request->input('stock'),
            'stock_measurement' => $request->input('stock_measurement'),
            'price' => $request->input('price'),
            'viewers' => 0,
        ]);


        if ($request->has('is_customizable')) {
            Product::where('product_code', $product->product_code)
                ->update([
                    'is_customizable' => '1',
                ]);
        }

        // photos
        if ($request->hasFile('default_photo') != null) {
            if ($request->file('default_photo')->isValid()) {
                // create images
                $image       = $request->file('default_photo');
                $filename    = $image->getClientOriginalName();
                $product_code =  $product->product_code;

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


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'edit_product_code' => 'required|numeric',
            'edit_category_name' => 'required',
            'edit_brand' => 'required',
            'edit_product_name' => 'required',
            // 'edit_stock' => 'numeric|min:0',
            // 'edit_stock_measurement' => 'required',
            'edit_price' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return Redirect::route('products')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        Product::where('product_code',  $request->input('edit_product_code'))
            ->update([
                // 'product_code' => $request->input('edit_product_code'),
                'product_name' => $request->input('edit_product_name'),
                'description' => $request->input('edit_description'),
                'category_name' => $request->input('edit_category_name'),
                'brand_name' => $request->input('edit_brand'),
                'price' => $request->input('edit_price'),
            ]);

        if ($request->has('edit_is_customizable')) {
            Product::where('product_code', $request->input('edit_product_code'))
                ->update([
                    'is_customizable' => '1',
                    'status' => $request->input('edit_status'),
                    'stock' => null,
                    'stock_measurement' => null,
                ]);
        } else {
            Product::where('product_code', $request->input('edit_product_code'))
                ->update([
                    'is_customizable' => '0',
                    'status' => null,
                    'stock' => $request->input('edit_stock'),
                    'stock_measurement' => $request->input('edit_stock_measurement'),
                ]);
        }

        if ($request->hasFile('default_photo') != null) {
            if ($request->file('default_photo')->isValid()) {
                // create images
                $image       = $request->file('default_photo');
                $filename    = $image->getClientOriginalName();
                $product_code =  $request->input('edit_product_code');

                $image_resize = Image::make($image);
                $image_resize->resize(300, 300);

                $image_resize->save(public_path('storage/media/products/main_'
                    . $product_code . '_' . $filename));

                // create barcode 
                $char = strval($filename);
                Product::where('product_code', $product_code)
                    ->update([
                        'default_photo' => $char,
                    ]);
            }
        }

        return Redirect::route('products')->withSuccess('Product: ' . $request->input('edit_product_name') . '). Updated Successfully!');
    }

    public function destroy($product_code)
    {
        if (is_null($product_code)) {
            return Redirect::route('products')->withInfo('Yawa!');
        }
        // Softdeletes
        Product::find($product_code)->delete();

        return Redirect::route('products')->withSuccess('Product (Product code: ' . $product_code . '). Deleted Successfully!');
    }
}
