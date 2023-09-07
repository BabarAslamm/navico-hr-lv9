@extends('layouts.app')


@section('content')
    <div class="container">

       <div class="card">
        <div class="container-fluid">
            <div class="mt-4 mb-4">
                <h3>Create Location</h3>
            </div>

            <form action="{{ route('locations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="location_id" id=""  @if(isset($location)) value="{{ $location->_id }}" @endif>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="ml-3 mb-3">
                                <label for="" class="">Location Name *</label>
                                <input type="text" class="form-control" name="location_name" placeholder="Location Name"
                                    @if(isset($location)) value="{{ $location->location_name }}" @else value="{{ old('location_name') }}" @endif
                                >
                                @error('location_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="ml-3 mb-3">
                                <label for="" class="">Mail Alias</label>
                                <input type="text" class="form-control" name="mail_alias" placeholder="Mail Alias"
                                    @if(isset($location)) value="{{ $location->mail_alias }}" @else value="{{ old('mail_alias') }}" @endif
                                >
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
