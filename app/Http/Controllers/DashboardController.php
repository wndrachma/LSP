<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentDay = Carbon::now()->format('Y-m-d');
        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d');
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $dailyEarnings = Order::whereDate('order_date', $currentDay)->sum('total_amount');
        $weeklyEarnings = Order::whereBetween('order_date', [$startOfWeek, $endOfWeek])->sum('total_amount');
        $monthlyEarnings = Order::whereMonth('order_date', $currentMonth)
                                ->whereYear('order_date', $currentYear)->sum('total_amount');
        $annualEarnings = Order::whereYear('order_date', $currentYear)->sum('total_amount');

        // Format earnings to Rupiah
        $dailyEarnings = number_format($dailyEarnings, 2, ',', ',');
        $weeklyEarnings = number_format($weeklyEarnings, 2, ',', ',');
        $monthlyEarnings = number_format($monthlyEarnings, 2, ',', ',');
        $annualEarnings = number_format($annualEarnings, 2, ',', ',');

        // Mendapatkan data penjualan 3 bulan terakhir
        $salesData = Order::selectRaw('MONTH(order_date) as month, SUM(total_amount) as total_sales')
                            ->where('order_date', '>=', now()->subMonths(3))
                            ->groupByRaw('MONTH(order_date)')
                            ->get()
                            ->pluck('total_sales', 'month')
                            ->toArray();

        return view('dashboard.home', compact('dailyEarnings', 'weeklyEarnings', 'monthlyEarnings', 'annualEarnings', 'salesData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
