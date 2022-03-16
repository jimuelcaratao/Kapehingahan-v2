<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Visit;
use App\Models\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class DashboardController extends Controller
{
    public function index()
    {
        // identify time now
        $dt = new DateTime();
        $hour = $dt->format('H');
        // $dayTerm = ($hour > 17) ? "Evening" : (($hour > 12) ? "Afternoon" : "Morning");

        if ($hour > 6 && $hour <= 11) {
            $dayTerm = "Good Morning";
        } else if ($hour > 11 && $hour <= 17) {
            $dayTerm = "Good Afternoon";
        } else if ($hour > 17 && $hour <= 23) {
            $dayTerm = "Good Evening";
        } else {
            $dayTerm = "Why aren't you asleep?  Are you programming?";
        }

        $users = User::where('is_admin', '0')->get();

        $new_users = User::where('is_admin', '0')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->count();

        $prev_users = User::where('is_admin', '0')
            ->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)
            ->count();

        $original = $prev_users;
        $current  = $new_users;
        $diff = $current - $original;
        $more_less = $diff > 0 ? "1" : "0";
        $diff = abs($diff);
        // $percentChange = 0 ? 0 : ($diff / $original) * 100;


        $customer_count = User::where('is_admin', '0')
            ->count();

        $category_count = Category::count();

        $brand_count = Brand::where('status', 'Available')->count();

        $products_count = Product::count();

        $products_count_low = Product::where('stock', '<=', 10)
            ->count();

        $orders_count_today = Order::whereDate('created_at', Carbon::today())
            ->count();

        $orders_count_yesterday = Order::whereDate('created_at', Carbon::now()->subDays(1))
            ->count();

        $original1 = $orders_count_yesterday;
        $current1  = $orders_count_today;
        $diff1 = $original1 - $current1;
        $more_less1 = $diff1 > 0 ? "1" : "0";
        $diff1 = abs($diff1);
        // $percentChangeOrder = ($diff1 / $original1) * 100;

        $popular_items = WishList::select('product_code')
            ->groupBy('product_code')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        $categories = Category::latest()->limit(4)->get();

        $revenue_today = OrderItem::whereDate('created_at', Carbon::today())->sum('price');

        $revenue_per_month = OrderItem::whereMonth('created_at', '=', Carbon::now()->subMonth()->month + 1)->limit(15)->oldest()->get();

        $page_visits = Visit::select([
            // This aggregates the data and makes available a 'count' attribute
            DB::raw('count(visit_id) as `count`'),
            // This throws away the timestamp portion of the date
            DB::raw('DATE(visit_date) as day')
            // Group these records according to that day
        ])->groupBy('day')
            // And restrict these results to only those created in the last week
            ->where('visit_date', '>=', Carbon::now()->subWeeks(1))
            ->get();
        return view('pages.rider.dashboard', [
            'users' => $users,
            'new_users' => $new_users,
            'products_count' => $products_count,
            'dayTerm' => $dayTerm,
            'products_count_low' => $products_count_low,
            'orders_count_today' => $orders_count_today,
            'popular_items' => $popular_items,
            'category_count' => $category_count,
            'categories' => $categories,
            'page_visits' => $page_visits,
            'revenue_per_month' => $revenue_per_month,
            'revenue_today' => $revenue_today,
            'customer_count' => $customer_count,
            'brand_count' => $brand_count,

            'percentChange' => $percentChange ?? 0,
            'more_less' => $more_less,

            'percentChangeOrder' => $percentChangeOrder ?? 0,
            'more_less1' => $more_less1,
        ]);
    }
}
