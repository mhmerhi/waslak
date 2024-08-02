@extends('layouts.dashboard')

@section('content')
    <div class='mb-5'>
        <a href='{{ route('monthly-rides.create') }}' class='btn btn-secondary mt-3'>Create Monthly Ride</a>
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
        @foreach ($monthlyRides as $monthlyRide)
            <tr>
                <td>{{ $monthlyRide->id }}</td>
                <td>{{ $monthlyRide->client->name }}</td>
                <td>{{ $monthlyRide->driver->name }}</td>
                <td>{{ $monthlyRide->from }}</td>
                <td>{{ $monthlyRide->to }}</td>
                <td>{{ number_format($monthlyRide->cost) }}</td>
                <td>{{ $monthlyRide->created_at->format('d/m/Y h:i A') }}</td>
                <td><?= $monthlyRide->client_paid ? '<i class="fa fa-thumbs-o-up color-blue"></i>' : '<i class="fa fa-thumbs-o-down color-red"></i>'?></td>
                <td>
                    <a href='{{ route('monthly-rides.show', $monthlyRide->id) }}' class='btn btn-success btn-sm'><i class='fa fa-eye'></i></a>
                    @if(!$monthlyRide->client_paid)
                        <a href='{{ route('monthly-rides.edit', $monthlyRide->id) }}' class='btn btn-warning btn-sm'><i class='fa fa-pencil'></i></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
