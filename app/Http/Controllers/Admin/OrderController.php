<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {

        $tableOrders = Order::all();

        if ($tableOrders->isEmpty()) {
            $orders = Order::latest('order_no')->paginate();
        }

        if ($tableOrders->isNotEmpty()) {
            // search validation
            $search = Order::where('order_no', 'like', '%' . request()->search . '%')
                // ->OrWhere('name', 'like', '%' . request()->search . '%')
                ->first();

            if ($search === null) {
                return Redirect::route('orders')->with('info', 'No "' . request()->search . '" found in the database.');
            }

            if ($search != null) {
                // default returning
                $orders = Order::where('order_no', 'like', '%' . request()->search . '%')
                    // ->OrWhere('name', 'like', '%' . request()->search . '%')
                    ->latest('order_no')
                    ->paginate(5);
            }
        }

        return view('pages.admin.orders', [
            'orders' => $orders,
        ]);
    }
}
