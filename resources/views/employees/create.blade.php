@extends('layouts.app')
@section('title')
    Add Employee
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Employee</div>
                    @include('layouts.error')
                    <div class="card-body">
                        <form action="{{ route('addemployee') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <span class="require">*</span>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <span class="require">*</span>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    id="email" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <span class="require">*</span>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control"
                                    id="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <span class="require">*</span>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Add Employee</button>
                                <a href="{{ route('employees') }}" class="btn btn-secondary">Back To List</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
