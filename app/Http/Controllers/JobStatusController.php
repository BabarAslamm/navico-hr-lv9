<?php

namespace App\Http\Controllers;

use App\Models\JobStatus;
use Exception;
use Illuminate\Http\Request;

class JobStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $job_statuses = JobStatus::all();
       return view('job-status.index', compact('job_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job-status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'status' => 'required',
        ]);


        if($request->job_status_id != ''){

            try {
                ###### Update job status record
                $job_status = JobStatus::findOrFail($request->job_status_id);
                $job_status->status = $request->status;
                $job_status->mail_alias = $request->mail_alias;
                $job_status->modified_by = auth()->user()->id;
                $job_status->save();

                return redirect()->route('job-status.index')->with('success', $job_status->status.' Job Status Updated Successfully');

            }catch (\Exception $e) {
                return redirect()->route('job-status.index')->with('error', $e);
            }

        }else{

            try {
                ###### Create job status record
                $job_status = new JobStatus();
                $job_status->status = $request->status;
                $job_status->mail_alias = $request->mail_alias;
                $job_status->created_by = auth()->user()->id;
                $job_status->modified_by = auth()->user()->id;
                $job_status->save();

                return redirect()->route('job-status.index')->with('success', $job_status->status.' Job Status Created Successfully');

            }catch (\Exception $e) {
                return redirect()->route('job-status.index')->with('error', $e);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $job_status = JobStatus::findOrFail($id);
            return view('job-status.create', compact('job_status'));

        }catch (Exception $e) {
            return redirect()->route('job-status.index')->with('error', $e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $location = JobStatus::findOrFail($id);
            $location->delete();
            return redirect()->route('job-status.index')->with('success', 'Job Status Deleted Successfully');
        }catch (\Exception $e) {
            return redirect()->route('job-status.index')->with('error', $e);
        }
    }
}
