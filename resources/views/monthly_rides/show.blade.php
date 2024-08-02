@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user">Created By: {{ $order->user->first_name }} {{ $order->user->last_name }}</label>
                    </div>

                    <div class="form-group">
                        <label for="client">Client: {{ $order->client->name }}</label>
                    </div>

                    <div class="form-group">
                        <label for="driver">Driver: {{ $order->driver->name }}</label>
                    </div>

                    <div class="form-group">
                        <label for="type">Type: {{ $order->type }}</label>
                    </div>

                    <div class="form-group">
                        <label for="from">From: {{ $order->from }}</label>
                    </div>

                    <div class="form-group">
                        <label for="to">To: {{ $order->to }}</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cost">Cost: {{ $order->cost }}</label>
                    </div>

                    <div class="form-group">
                        <label for="profit">Profit: {{ $order->profit }}</label>
                    </div>

                    <div class="form-group">
                        <label for="client_paid">Client Paid: {!! $order->client_paid ? '<i class="fa fa-thumbs-o-up color-blue"></i>' : '<i class="fa fa-thumbs-o-down color-red"></i>' !!}</label>
                    </div>

                    <div class="form-group">
                        <label for="driver_paid">Driver Paid: {!! $order->driver_paid ? '<i class="fa fa-thumbs-o-up color-blue"></i>' : '<i class="fa fa-thumbs-o-down color-red"></i>' !!}</label>
                    </div>

                    <div class="form-group">
                        <label for="driver_paid_by_account">Driver Paid by Account: {!! $order->driver_paid_by_account ? '<i class="fa fa-thumbs-o-up color-blue"></i>' : '<i class="fa fa-thumbs-o-down color-red"></i>' !!}</label>
                    </div>
                </div>
            </div>

            <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to List</a>
            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning mt-3">Edit Order</a>
        </div>
    </div>
@endsection
