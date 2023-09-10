@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <div class="pull-left ml-4 mb-4">
                        <h2> Address List</h2>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="">
                        <a class="btn btn-success" href="{{ route('address.create') }}"> + Add Address</a>
                    </div>
                </div>
            </div>



            <div class="container">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success !</strong>   {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                        {{ session()->forget('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error !</strong>   {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                        {{ session()->forget('error') }}
                    </div>
                @endif

                <div class="row">
                    @foreach ($addresses as $address)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">

                                <span> <b>Street : </b>{{ $address->street }}</span><br>
                                <span> <b>City: </b>{{ $address->city }}</span><br>
                                <span> <b>State : </b>{{ $address->state }}</span><br>
                                <span> <b>Country: </b>{{ $address->country }}</span><br>
                                <span> <b>Zip: </b>{{ $address->zip }}</span><br>

                                <br>
                                <a href="{{ route('address.edit', $address->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="{{ route('address.destroy', $address->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
