@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Driver Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name"><b>Name:</b> {{ $driver->name }}</label>
                    </div>

                    <div class="form-group">
                        <label for="phone"><b>Phone:</b> {{ $driver->phone }}</label>
                    </div>

                    <div class="form-group">
                        <label for="Address"><b>Address:</b> {{ $driver->address }}</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="has_account"><b>Has Whish Account:</b> <?= $driver->has_account ? '<i class="fa fa-thumbs-o-up color-blue"></i>': '<i class="fa fa-thumbs-o-down color-red"></i>' ?></label><br>
                        <label for="activated"><b>Activated:</b> <?= $driver->activated ? '<i class="fa fa-thumbs-o-up color-blue"></i>': '<i class="fa fa-thumbs-o-down color-red"></i>' ?></label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type"><b>Moto Type:</b> <?= $driver->type ?></label><br>
                        <label for="activated"><b>Recorded:</b> <?= $driver->recorded ? '<i class="fa fa-thumbs-o-up color-blue"></i>': '<i class="fa fa-thumbs-o-down color-red"></i>' ?></label>
                    </div>
                </div>
            </div>

            <a href="{{ route('drivers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
            <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning mt-3">Edit Driver</a>
        </div>
    </div>
@endsection
