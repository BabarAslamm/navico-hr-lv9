@extends('layouts.app')


@section('content')
    <div class="container">

       <div class="card">
        <div class="container-fluid">
            <div class="mt-4 mb-4">
                <h3>Create Address</h3>
            </div>

            <form action="{{ route('address.store') }}" method="POST">
                @csrf
                <input type="hidden" name="address_id" id=""  @if(isset($address)) value="{{ $address->_id }}" @endif>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="ml-3 mb-3">
                                <label for="" class="">Street *</label>
                                <input type="text" class="form-control" name="street" placeholder="Street"
                                    @if(isset($address)) value="{{ $address->street }}" @else value="{{ old('street') }}" @endif
                                >
                                @error('street')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="ml-3 mb-3">
                                <label for="" class="">city *</label>
                                <input type="text" class="form-control" name="city" placeholder="City"
                                    @if(isset($address)) value="{{ $address->city }}" @else value="{{ old('city') }}" @endif
                                >
                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="ml-3 mb-3">
                                <label for="" class="">State *</label>
                                <input type="text" class="form-control" name="state" placeholder="State"
                                    @if(isset($address)) value="{{ $address->state }}" @else value="{{ old('state') }}" @endif
                                >
                                @error('state')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="ml-3 mb-3">
                                <label for="" class="">Country *</label>
                                <input type="text" class="form-control" name="country" placeholder="Country"
                                    @if(isset($address)) value="{{ $address->country }}" @else value="{{ old('country') }}" @endif
                                >
                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="ml-3 mb-3">
                                <label for="" class="">Zip *</label>
                                <input type="text" class="form-control" name="zip" placeholder="Zip"
                                    @if(isset($address)) value="{{ $address->zip }}" @else value="{{ old('zip') }}" @endif
                                >
                                @error('zip')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <input type="submit" class="btn btn-sm btn-primary mb-4" name="" id="" value="Submit">
                    </div>
                </div>
            </form>
        </div>
       </div>

    </div>
@endsection
