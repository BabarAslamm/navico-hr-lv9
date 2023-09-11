<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container m-4">

        <div class="card">
            <div class="container-fluid">
                <div class="mt-4 mb-4">
                    <h3>Create Employee</h3>
                </div>

                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" class="form-control" id="" value="{{ $id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ml-3 mb-3">
                                <label for="" class="">Employee First Name *</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ml-3 mb-3">
                                <label for="" class="">Employee Last Name </label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="ml-3 mb-3">
                                <label for="" class="">Employee Phone *</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <hr>
                        <div class="col-md-12">
                              <center class="mt-2 mb-2"><h3>Address</h3></center>
                              <div class="row">
                                    <div class="col-md-6">
                                        <div class="ml-3 mb-3">
                                            <label for="" class="">Street *</label>
                                            <input type="text" class="form-control" name="street" placeholder="Street"
                                                @if(isset($address)) value="{{ $address->street }}" @else value="{{ old('street') }}" @endif
                                            >
                                            @error('street')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="ml-3 mb-3">
                                            <label for="" class="">city *</label>
                                            <input type="text" class="form-control" name="city" placeholder="City"
                                                @if(isset($address)) value="{{ $address->city }}" @else value="{{ old('city') }}" @endif
                                            >
                                            @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="ml-3 mb-3">
                                            <label for="" class="">State *</label>
                                            <input type="text" class="form-control" name="state" placeholder="State"
                                                @if(isset($address)) value="{{ $address->state }}" @else value="{{ old('state') }}" @endif
                                            >
                                            @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="ml-3 mb-3">
                                            <label for="" class="">Country *</label>
                                            <input type="text" class="form-control" name="country" placeholder="Country"
                                                @if(isset($address)) value="{{ $address->country }}" @else value="{{ old('country') }}" @endif
                                            >
                                            @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
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
                              </div>



                        </div>
                        <hr>




                        <div class="col-md-12">
                              <center class="mt-2 mb-2"><h3>Work Information</h3></center>
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ml-3 mb-3">
                                        <label for="exampleFormControlSelect2">Employee Location</label>
                                        <select name="location_id" class="form-control form-select" id="exampleFormControlSelect2">
                                            <option selected disabled value="">-- Select Location --</option>
                                            @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('address_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                              </div>
                        </div>

                    </div>
                    <input type="submit" class="btn btn-sm btn-primary mb-4" name="" id=""
                        value="Submit">
                </form>
            </div>
        </div>

    </div>
</body>

</html>
