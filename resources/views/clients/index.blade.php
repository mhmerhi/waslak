@extends('layouts.dashboard')

@section('content')
    <div class='mb-5'>
        <a href='{{ route('clients.create') }}' class='btn btn-secondary mt-3'>Create Client</a>
    </div>
    <table class='table table-striped table-hover js-datatable cell-border hover nowrap'>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Has Whish Account</th>
            <th style='width: 100px'>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->phone }}</td>
                <td> <?= $client->has_account ? '<i class="fa fa-thumbs-o-up color-blue"></i>': '<i class="fa fa-thumbs-o-down color-red"></i>' ?> </td>
                <td>
                    <a href='{{ route('clients.show', $client->id) }}' class='btn btn-success btn-sm'><i class='fa fa-eye'></i></a>
                    <a href='{{ route('clients.edit', $client->id) }}' class='btn btn-warning btn-sm'><i class='fa fa-pencil'></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('.js-datatable').DataTable({
                'order': [[ 0, 'desc' ]]
            });
        });
    </script>
@endsection
