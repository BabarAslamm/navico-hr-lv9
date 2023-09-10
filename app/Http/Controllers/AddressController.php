<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $addresses = Address::all();
       return view('address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.create');
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

            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip' => 'required',

        ]);

        try {
            if($request->address_id != ''){

                $address = Address::findOrFail($request->address_id);
                $message = 'Address Updated Successfully';

            }else{

                $address = new Address();
                $message = 'Address Created Successfully';
            }

            $address->street = $request->street;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->country = $request->country;
            $address->zip = $request->zip;
            $address->save();

            return redirect()->route('address.index')->with('success', 'success', $message);

        }catch (\Exception $e) {

            return redirect()->route('address.index')->with('error', $e);
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

            $address = Address::findOrFail($id);
            return view('address.create', compact('address'));

        }catch (\Exception $e) {
            return redirect()->route('address.index')->with('error', $e);
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
            $designation = Address::findOrFail($id);
            $designation->delete();
            return redirect()->route('address.index')->with('success', 'Address Deleted Successfully');
        }catch (\Exception $e) {
            return redirect()->route('address.index')->with('error', $e);
        }
    }
}
