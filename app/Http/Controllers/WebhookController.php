<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function postOrders(Request $request)
    {
        if ($request->has('order.id'))
        {
            // Find or create the order
            $order = Order::firstOrNew(array('order_id' => $request->input('order.id')));

            // Now populate or update
            $order->update([
                'number'            => $request->input('order.number'),
                'customer_name'     => $request->input('order.addressShippingName'),
                'customer_email'    => $request->input('order.email'),
                'city'              => $request->input('order.addressShippingCity'),
                'country_code'      => $request->input('order.addressShippingCountry.code'),
                'price'             => $request->input('order.priceIncl'),
                'shipment_id'       => $request->input('order.shipmentId'),
                'data'              => json_encode($request->input('order'))
            ]);


        }
    }
}
