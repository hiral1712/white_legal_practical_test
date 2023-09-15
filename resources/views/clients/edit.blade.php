@extends('layouts.app')
@section('title')
    Update Client
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Client</div>
                    @include('layouts.error')
                    <div class="card-body">
                        <form action="{{ route('updateclient') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <span class="require">*</span>
                                <input type="text" name="name" value="{{ $client->name }}" class="form-control"
                                    id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <span class="require">*</span>
                                <input type="email" name="email" value="{{ $client->email }}" class="form-control"
                                    id="email" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <span class="require">*</span>
                                <input type="text" name="address" value="{{ $client->address }}" class="form-control"
                                    id="address" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <span class="require">*</span>
                                <input type="text" value="{{$client->city }}" name="city" class="form-control" id="city"
                                    placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea name="notes" id="notes" rows="3" class="form-control">{{ $client->notes }}</textarea>
                            </div>
                            <input type="hidden" name="id" value="{{ $client->id }}">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Update Client</button>
                                <a href="{{ route('clients') }}" class="btn btn-secondary">Back To List</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
