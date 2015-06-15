<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\Webshop;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Webshop::instance()->orders->get();

        return view('orders/index', compact('orders'));
    }

    public function show($id)
    {
        return view('orders/show');
    }
}
