<?php

namespace App\Http\Controllers;
// use LaravelAnalytics;
use App\Order;
use App\Customer;
use App\Store;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ReportController extends Controller
{
    public function home(){
        // $order=Order::first();
        // return $order->RelativeMonth;
        // https://github.com/spatie/laravel-analytics/tree/1.4.1
        // $startDate = Carbon::now()->subYear();
        // $endDate = Carbon::now();
        // $analytic=LaravelAnalytics::getVisitorsAndPageViews(2);
        // $analytic=LaravelAnalytics::getVisitorsAndPageViewsForPeriod($startDate,$endDate);
        // return $analytic;
        $customers=Customer::select('created_at')->get();
        $orders=Order::all();
        $vendors=Store::select('created_at')->get();
        return view('admin.home',compact('orders','customers','vendors'));
    }
}
