<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function count(){
       return response()->json([
            'totalProducts' =>Product::count(),
            'totalOrders' =>  Order::count(),
            'totalUsers' => User::count(),
            'totalRevenue' => Order::sum('total_price')
        ]);
    }
}
