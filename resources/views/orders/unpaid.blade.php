@extends('layouts.dashboard')

@section('content')
    <table id="ordersTable" class='table table-striped table-hover js-datatable cell-border hover nowrap'>
        <thead>
        <tr>
            <th>Client</th>
            <th>Driver</th>
            <th>From</th>
            <th>To</th>
            <th>Cost</th>
            <th>Waslak</th>
            <th>Date</th>
            <th>Paid</th>
            <th style='width: 100px'>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->client->name }}</td>
                <td>{{ $order->driver->name }}</td>
                <td>{{ $order->from }}</td>
                <td>{{ $order->to }}</td>
                <td>{{ number_format($order->cost) }}</td>
                <td>{{ number_format($order->profit) }}</td>
                <td>{{ $order->created_at->format('d/m/Y h:i A') }}</td>
                <td><?= $order->driver_paid ? '<i class="fa fa-thumbs-o-up color-blue"></i>' : '<i class="fa fa-thumbs-o-down color-red"></i>'?></td>
                <td>
                    <a href='{{ route('orders.show', $order->id) }}' class='btn btn-success btn-sm'><i class='fa fa-eye'></i></a>
                    <a href='{{ route('orders.edit', $order->id) }}' class='btn btn-warning btn-sm'><i class='fa fa-pencil'></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="5">Total Waslak</th>
            <th id="totalCost"></th>
            <th colspan="3"></th>
        </tr>
        </tfoot>
    </table>
    <script>
        $(document).ready(function() {
            function formatNumber(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            var table = $('#ordersTable').DataTable({
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(5)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(5, { page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(5).footer()).html(
                        formatNumber(pageTotal.toFixed(2))
                    );
                }
            });
        });
    </script>
@endsection
