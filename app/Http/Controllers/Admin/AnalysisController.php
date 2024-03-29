<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{

    public function index()
    {
        $revenue_per_month = OrderItem::whereYear('created_at', '=', Carbon::now()->subYear()->year + 1)->get();


        // revenue

        $order_items = OrderItem::whereBetween('created_at', [request()->sales_from, request()->sales_to])
            ->orderBy('created_at')
            ->get();

        if (!empty(request()->sales_from)  ||  !empty(request()->sales_to)) {
            $order_items = OrderItem::whereBetween('created_at', [request()->sales_from, request()->sales_to])
                ->orderBy('created_at')
                ->get();
        } else {
            $order_items = OrderItem::orderBy('created_at')
                ->get();
        }

        // orders per week
        $order_counts = Order::select([
            DB::raw('count(order_no) as `order`'),
            DB::raw('DATE(created_at) as day')
        ])->groupBy('day')
            ->whereBetween('created_at', [Carbon::now()->subDays(7),  Carbon::now()])
            ->get();

        // users per week
        $user_per_week = User::select([
            DB::raw('count(id) as `users`'),
            DB::raw('DATE(created_at) as day')
        ])->groupBy('day')
            ->whereBetween('created_at', [Carbon::now()->subDays(7),  Carbon::now()])
            ->get();


        $popular_items = WishList::select('product_code')
            ->groupBy('product_code')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        return view('pages.admin.analysis', [
            'order_items' => $order_items,
            'order_counts' => $order_counts,
            'user_per_week' => $user_per_week,
            'revenue_per_month' => $revenue_per_month,
            'popular_items' => $popular_items,

        ]);
    }
}
