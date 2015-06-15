@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h4>Your orders</h4>

        <table class="table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Customer</th>
                    <th>Destination</th>
                    <th>Total</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order['number'] }}</td>
                        <td>{{ str_limit($order['addressBillingName'], 20) }}</td>
                        <td>{{ str_limit($order['addressShippingCity'], 20) }}</td>
                        <td>&euro; {{ number_format($order['priceIncl'], 2) }}</td>
                        <td><a href="{{ url('orders', $order['id']) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection()
