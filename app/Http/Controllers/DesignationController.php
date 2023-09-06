<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Exception;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::all();
        return view('designations.index', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designations.create');
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
            'designation_name' => 'required',
        ]);


        if($request->designation_id != ''){

            $designation = Designation::where('id', $request->designation_id)->first();
            $designation->designation_name = $request->designation_name;
            $designation->mail_alias = $request->mail_alias;
            $designation->modified_by = auth()->user()->id;
            $designation->save();

            return redirect()->route('designations.index')->with('success', $designation->designation_name.' Designation Updated Successfully');

        }else{

            ###### Create designation record
            $designation = new Designation();
            $designation->designation_name = $request->designation_name;
            $designation->mail_alias = $request->mail_alias;
            $designation->created_by = auth()->user()->id;
            $designation->modified_by = auth()->user()->id;
            $designation->save();

            return redirect()->route('designations.index')->with('success', $designation->designation_name.' Designation Created Successfully');
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
        $designation = Designation::where('id', $id)->first();
        return view('designations.create', compact('designation'));
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
            $designation = Designation::findOrFail($id);
            $designation->delete();
            return redirect()->route('designations.index')->with('success', 'Designation Deleted Successfully');
        }catch (\Exception $e) {
            return redirect()->route('designations.index')->with('error', $e);
        }
    }
}
