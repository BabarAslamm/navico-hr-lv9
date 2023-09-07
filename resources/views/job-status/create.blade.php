@extends('layouts.app')


@section('content')
    <div class="container">

       <div class="card">
        <div class="container-fluid">
            <div class="mt-4 mb-4">
                <h3>Create Job Status</h3>
            </div>

            <form action="{{ route('job-status.store') }}" method="POST">
                @csrf
                <input type="hidden" name="job_status_id" id=""  @if(isset($job_status)) value="{{ $job_status->_id }}" @endif>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="ml-3 mb-3">
                                <label for="" class="">Job Status *</label>
                                <input type="text" class="form-control" name="status" placeholder="Job Status"
                                    @if(isset($job_status)) value="{{ $job_status->status }}" @else value="{{ old('status') }}" @endif
                                >
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="ml-3 mb-3">
                                <label for="" class="">Mail Alias</label>
                                <input type="text" class="form-control" name="mail_alias" placeholder="Mail Alias"
                                    @if(isset($job_status)) value="{{ $job_status->mail_alias }}" @else value="{{ old('mail_alias') }}" @endif
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
