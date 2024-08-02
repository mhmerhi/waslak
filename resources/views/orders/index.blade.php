@extends('layouts.dashboard')

@section('content')
    <div class='mb-5'>
        <a href='{{ route('orders.create') }}' class='btn btn-secondary mt-3'>Create Order</a>
    </div>
    <table id="ordersTable" class='table table-striped table-hover js-datatable cell-border hover nowrap'>
        <thead>
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Driver</th>
            <th>From</th>
            <th>To</th>
            <th>Cost</th>
            <th>Date</th>
            <th>Paid</th>
            <th style='width: 100px'>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->client->name }}</td>
                <td>{{ $order->driver->name }}</td>
                <td>{{ $order->from }}</td>
                <td>{{ $order->to }}</td>
                <td>{{ number_format($order->cost) }}</td>
                <td>{{ $order->created_at->format('d/m/Y h:i A') }}</td>
                <td><?= $order->driver_paid ? '<i class="fa fa-thumbs-o-up color-blue"></i>' : '<i class="fa fa-thumbs-o-down color-red"></i>'?></td>
                <td>
                    <a href='{{ route('orders.show', $order->id) }}' class='btn btn-success btn-sm'><i class='fa fa-eye'></i></a>
                    @if(!$order->driver_paid)
                        <a href='{{ route('orders.edit', $order->id) }}' class='btn btn-warning btn-sm'><i class='fa fa-pencil'></i></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
