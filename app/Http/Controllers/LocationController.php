<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Exception;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
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
            'location_name' => 'required',
        ]);


        if($request->location_id != ''){

            try {
                ###### Update location record
                $location = Location::findOrFail($request->location_id);
                $location->location_name = $request->location_name;
                $location->mail_alias = $request->mail_alias;
                $location->modified_by = auth()->user()->id;
                $location->save();

                return redirect()->route('locations.index')->with('success', $location->location_name.' Location Updated Successfully');

            }catch (\Exception $e) {
                return redirect()->route('locations.index')->with('error', $e);
            }

        }else{

            ###### Create location record
            $location = new Location();
            $location->location_name = $request->location_name;
            $location->mail_alias = $request->mail_alias;
            $location->created_by = auth()->user()->id;
            $location->modified_by = auth()->user()->id;
            $location->save();

            return redirect()->route('locations.index')->with('success', $location->location_name.' Location Created Successfully');
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

            $location = Location::findOrFail($id);
            return view('locations.create', compact('location'));

        }catch (Exception $e) {
            return redirect()->route('locations.index')->with('error', $e);
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
            $location = Location::findOrFail($id);
            $location->delete();
            return redirect()->route('locations.index')->with('success', 'Location Deleted Successfully');
        }catch (\Exception $e) {
            return redirect()->route('locations.index')->with('error', $e);
        }
    }
}
