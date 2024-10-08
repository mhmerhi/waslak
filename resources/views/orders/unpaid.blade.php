@extends('layouts.dashboard')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
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
                <td>
                    <a href='{{ route('orders.show', $order->id) }}' class='btn btn-success btn-sm'><i class='fa fa-eye'></i></a>

                    <form action="{{ route('orders.approve', ['id' => $order->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to approve the order?');"><i class="fa fa-thumbs-up"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="5">Total Waslak</th>
            <th id="totalCost"></th>
            <th colspan="2"></th>
        </tr>
        </tfoot>
    </table>
    <script>
        $(document).ready(function() {
            var successAlert = document.getElementById('success-alert');

            if (successAlert) {
                setTimeout(function () {
                    successAlert.style.display = 'none';
                }, 300000);
            }

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
