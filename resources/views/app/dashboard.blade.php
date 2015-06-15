@extends('app')

@section('content')

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Statistics</h4>
                <p class="text-muted">Below you'll find statistics on how many requests I have handled.</p>

                <div class="wrapper">
                    <canvas id="chart" width="100%" height="50"></canvas>
                </div>

                <small class="text-center text-muted" style="display: block;">Number of shipments</small>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Recent orders</h4>
                <p class="text-muted">Below you'll find the most recent shipments.</p>

                <table class="table">
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td width="60%">{{ str_limit($order['addressBillingName'], 20) }}</td>
                                <td>{{ str_limit($order['addressShippingCity'], 20) }}</td>
                                <td><a href="{{ url('orders', $order['id']) }}">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <a href="#" class="btn btn-default pull-right">Change configuration</a>
        <span style="line-height: 34px;">You can change prices, shipping options and more in your configuration.</span>
    </div>
</div>

@endsection()
