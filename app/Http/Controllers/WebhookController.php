<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function postOrders(Request $request)
    {
        Log::info('Webhook test');
        Log::info($request->input('order.id'));
    }
}
