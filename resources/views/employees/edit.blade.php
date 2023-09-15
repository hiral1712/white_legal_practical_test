@extends('layouts.app')
@section('title')
    Update Employee
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Employee</div>
                    @include('layouts.error')
                    <div class="card-body">
                        <form action="{{ route('updateemployee') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <span class="require">*</span>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                    id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <span class="require">*</span>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                    id="email" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <span class="require">*</span>
                                <input type="tel" name="phone" value="{{ $user->phone }}" class="form-control"
                                    id="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label>Leave this empty unless you change the password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Update Employee</button>
                                <a href="{{ route('employees') }}" class="btn btn-secondary">Back To List</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
