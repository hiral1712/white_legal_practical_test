@extends('layouts.app')
@section('title')
    Add Client
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Client</div>
                    @include('layouts.error')
                    <div class="card-body">
                        <form action="{{ route('addclient') }}" method="POST">
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
                                <label for="address">Address</label>
                                <span class="require">*</span>
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                                    id="address" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <span class="require">*</span>
                                <input type="text" value="{{ old('city') }}" name="city" class="form-control" id="city"
                                    placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea name="notes" id="notes" rows="3" class="form-control">{{ old('notes') }}</textarea>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Add Client</button>
                                <a href="{{ route('clients') }}" class="btn btn-secondary">Back To List</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
