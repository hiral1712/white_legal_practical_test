@extends('layouts.app')
@section('title')
    Employees
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of employees
                        <a style="float: right" href="{{ route('createemployee') }}" class="btn btn-primary">Add
                            Employee</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('editemployee', $user->id) }}" class="btn btn-info">Edit</a>
                                            <a href="javascript:void(0)"
                                                data-name="{{ route('deleteemployee', $user->id) }}"
                                                class="btn btn-danger delete-record">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (!sizeof($users))
                                    <tr class="no-records">
                                        <td colspan="7">No record found</td>
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
