@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Client Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name: {{ $client->name }}</label>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone: {{ $client->phone }}</label>
                    </div>

                    <div class="form-group">
                        <label for="activated">Activated: <?= $client->has_account ? '<i class="fa fa-thumbs-o-up color-blue"></i>': '<i class="fa fa-thumbs-o-down color-red"></i>' ?></label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Address">Address: {{ $client->address }}</label>
                    </div>
                    <div class="form-group">
                        <label for="description">Description: {{ $client->description }}</label>
                    </div>
                </div>
            </div>

            <a href="{{ route('clients.index') }}" class="btn btn-secondary mt-3">Back to List</a>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning mt-3">Edit Client</a>
        </div>
    </div>
@endsection
