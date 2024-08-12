@extends('layouts.dashboard')

@section('content')
    <div class='mb-5'>
        <a href='{{ route('drivers.create') }}' class='btn btn-secondary mt-3'>Create Driver</a>
    </div>
    <table class='table table-striped table-hover js-datatable cell-border hover nowrap'>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Moto Type</th>
            <th>Recorded</th>
            <th>Has Whish Account</th>
            <th>Activated</th>
            <th style='width: 100px'>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($drivers as $driver)
            <tr>
                <td>{{ $driver->id }}</td>
                <td>{{ $driver->name }}</td>
                <td>{{ $driver->phone }}</td>
                <td>{{ $driver->type }}</td>
                <td> <?= $driver->recorded ? '<i class="fa fa-thumbs-o-up color-blue"></i>': '<i class="fa fa-thumbs-o-down color-red"></i>' ?> </td>
                <td> <?= $driver->has_account ? '<i class="fa fa-thumbs-o-up color-blue"></i>': '<i class="fa fa-thumbs-o-down color-red"></i>' ?> </td>
                <td> <?= $driver->activated ? '<i class="fa fa-thumbs-o-up color-blue"></i>': '<i class="fa fa-thumbs-o-down color-red"></i>' ?> </td>
                <td>
                    <a href='{{ route('drivers.show', $driver->id) }}' class='btn btn-success btn-sm'><i class='fa fa-eye'></i></a>
                    <a href='{{ route('drivers.edit', $driver->id) }}' class='btn btn-warning btn-sm'><i class='fa fa-pencil'></i></a>
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
