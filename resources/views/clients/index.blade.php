@extends('layouts.app')
@section('title')
    Clients
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of clients
                        <a style="float: right" href="{{ route('createclient') }}" class="btn btn-primary">Add
                            Client</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Notes</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $key => $client)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>{{ $client->city }}</td>
                                        <td>{{ Str::words($client->notes, 4, ' ...') }}</td>
                                        <td>{{ date('d-m-Y', strtotime($client->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('editclient', $client->id) }}" class="btn btn-info">Edit</a>
                                            <a href="javascript:void(0)"
                                                data-name="{{ route('deleteclient', $client->id) }}"
                                                class="btn btn-danger delete-record">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (!sizeof($clients))
                                    <tr class="no-records">
                                        <td colspan="8">No record found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
