<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Mail\OrderDelivered;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {

        $tableOrders = Order::where('rider_id', Auth::user()->id)->get();

        if ($tableOrders->isEmpty()) {
            $orders = Order::where('rider_id', Auth::user()->id)->latest('order_no')->paginate();
        }

        if ($tableOrders->isNotEmpty()) {
            // search validation
            $search = Order::where('rider_id', Auth::user()->id)->where('order_no', 'like', '%' . request()->search . '%')
                // ->OrWhere('name', 'like', '%' . request()->search . '%')
                ->first();

            if ($search === null) {
                return Redirect::route('orders')->with('info', 'No "' . request()->search . '" found in the database.');
            }

            if ($search != null) {
                // default returning
                $orders = Order::where('rider_id', Auth::user()->id)->where('order_no', 'like', '%' . request()->search . '%')
                    // ->OrWhere('name', 'like', '%' . request()->search . '%')
                    ->latest('order_no')
                    // ->orderByRaw("FIELD(status , 'Pending', 'Packaging', 'Shipping', 'Delivering', 'Delivered', 'Returned') DESC")
                    ->paginate(10);
            }
        }

        return view('pages.rider.orders', [
            'orders' => $orders,
        ]);
    }
}
