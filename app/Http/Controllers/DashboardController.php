<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $totalOrders = \App\Models\Order::where('payment_status', 'completed')->count();

        // Menghitung jumlah produk 'food' yang terjual
        $foodCategory = \App\Models\Category::where('name', 'food')->first();
        $totalFoodOrders = 0;
        if ($foodCategory) {
            $totalFoodOrders = \App\Models\Order::whereHas('product', function ($query) use ($foodCategory) {
                $query->where('category_id', $foodCategory->id)->where('payment_status', 'completed');
            })->count();
        }
        
        // Menghitung jumlah produk 'drink' yang terjual
        $drinkCategory = \App\Models\Category::where('name', 'drink')->first();
        $totalDrinkOrders = 0;
        if ($drinkCategory) {
            $totalDrinkOrders = \App\Models\Order::whereHas('product', function ($query) use ($drinkCategory) {
                $query->where('category_id', $drinkCategory->id)->where('payment_status', 'completed');
            })->count();
        }

        // Menghitung total penjualan
        $totalIncome = \App\Models\Order::where('payment_status', 'completed')
            ->whereHas('product')
            ->get()
            ->sum(function ($order) {
                return $order->product->price;
            });

        // Menghitung penjualan per hari
        $salesData = \App\Models\Order::select(
            DB::raw('DAY(created_at) as day'),
            DB::raw('count(*) as total')
        )
        ->where('payment_status', 'completed')
        ->groupBy(DB::raw('DAY(created_at)'))
        ->pluck('total', 'day')
        ->toArray();

        $sales = [];

        // Dapatkan tahun dan bulan saat ini
        $currentDate = \Carbon\Carbon::now();
        $year = $currentDate->year;
        $month = $currentDate->month;
        
        // Dapatkan jumlah hari dalam bulan saat ini
        $daysInMonth = $currentDate->daysInMonth;
        
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $sales[$i] = $salesData[$i] ?? 0;
        }

        return view('admin.dashboard', compact('totalOrders', 'totalFoodOrders', 'totalDrinkOrders', 'totalIncome', 'sales'));
    }
}
