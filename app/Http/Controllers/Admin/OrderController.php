<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderDelivered;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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
            $search = Order::searchfilter()
                ->statusfilter()
                ->first();

            if ($search === null) {
                return Redirect::route('orders')->with('info', 'No "' . request()->search . '" found in the database.');
            }

            if ($search != null) {
                // default returning
                $orders = Order::searchfilter()
                    ->statusfilter()
                    ->latest('order_no')
                    // ->orderByRaw("FIELD(status , 'Pending', 'Packaging', 'Shipping', 'Delivering', 'Delivered', 'Returned') DESC")
                    ->paginate(10);
            }
        }

        return view('pages.admin.orders', [
            'orders' => $orders,
        ]);
    }

    public function order_status(Request $request)
    {
        $order = Order::where('order_no', $request->input('order_no'))->first();

        // if (empty($order->confirmed)) {
        //     return Redirect::route('orders')->withInfo('Order no.:' . $request->input('order_no') . '. Confirmation needed!');
        // }

        // rider update
        if ($request->input('update_rider_id') != null) {

            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'rider_id' => $request->input('update_rider_id'),
                ]);
        }

        if (!empty($order->canceled_at)) {
            return Redirect::route('orders')->withInfo('Order no.:' . $request->input('order_no') . '. Already Canceled!');
        }

        // Switches status
        if ($order->packaged_at == null) {
            if ($request->has('packaged_switch')) {




                // minus in the stock
                $get_items = OrderItem::where('order_no', $request->input('order_no'))->get();

                foreach ($get_items as $item) {
                    $get_products = Product::where('product_code', $item->product_code)->first();

                    $updated_stock = $get_products->stock - $item->quantity;

                    if ($get_products->is_customizable == 0) {
                        // if ($updated_stock <= 0) {
                        //     return  Redirect::back()->with('toast_error', 'No more Stocks');
                        // }

                        if ($item->quantity <= $get_products->stock) {
                            Product::where('product_code', $item->product_code)->update([
                                'stock' => $updated_stock,
                            ]);
                        } else {
                            return  Redirect::back()->with('toast_error', 'Not enough stock');
                        }

                        // if ($updated_stock > 0) {
                        //     Product::where('product_code', $item->product_code)->update([
                        //         'stock' => $updated_stock,
                        //     ]);
                        // }
                    }
                }

                Order::where('order_no', $request->input('order_no'))
                    ->update([
                        'status' => 'Shipping',
                        'packaged_at' => Carbon::now(),
                    ]);
            }
        }

        if ($request->input('packaged_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'packaged_at' => null,
                ]);
        }

        if ($order->shipped_at == null) {
            if ($request->has('shipped_switch')) {
                Order::where('order_no', $request->input('order_no'))
                    ->update([
                        'status' => 'Delivering',
                        'shipped_at' => Carbon::now(),
                    ]);
            }
        }
        if ($request->input('shipped_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'shipped_at' => null,
                ]);
        }

        if ($order->delivered_at == null) {
            if ($request->has('delivered_switch')) {
                Order::where('order_no', $request->input('order_no'))
                    ->update([
                        'status' => 'Delivered',
                        'delivered_at' => Carbon::now(),
                    ]);


                $order = Order::findOrFail($request->input('order_no'));

                // Ship the order...
                Mail::to($order->user->email)->send(new OrderDelivered($order));
            }
        }
        if ($request->input('delivered_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'delivered_at' => null,
                ]);
        }

        // returned
        if ($order->returned_at == null) {
            if ($request->has('returned_switch')) {
                Order::where('order_no', $request->input('order_no'))
                    ->update([
                        'status' => 'Returned',
                        'returned_at' => Carbon::now(),
                        'viewed_by_user' => 0,
                    ]);
            }
        }
        if ($request->input('returned_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'returned_at' => null,
                    'status' => 'Pending',
                ]);
        }

        // paid
        if ($order->paid_at == null) {
            if ($request->has('paid_switch')) {
                Order::where('order_no', $request->input('order_no'))
                    ->update([
                        'paid_at' => Carbon::now(),
                    ]);
            }
        }
        if ($request->input('paid_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'paid_at' => null,
                ]);
        }

        // text status
        if ($request->input('delivered_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'status' => 'Delivering',
                ]);
        }

        if ($request->input('delivered_switch') == null && $request->input('shipped_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'status' => 'Shipping',
                ]);
        }

        if ($request->input('delivered_switch') == null && $request->input('shipped_switch') == null && $request->input('packaged_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'status' => 'Preparing',
                ]);
        }

        return Redirect::route('orders')->withSuccess('Order no.:' . $request->input('order_no') . '. Updated Successfully!');
    }
}
