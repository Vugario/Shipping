<?php

namespace App\Http\Controllers;

use App\Order;
use App\Http\Requests;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders/index', compact('orders'));
    }

    public function show($id)
    {
        return view('orders/show');
    }
}
