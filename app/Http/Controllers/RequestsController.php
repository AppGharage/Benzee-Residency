<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Request as AccommodationRequest;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('request.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|string|max:30',
                'email' => 'required|string|email|max:255',
                'telephone'     => 'required|digits:10|numeric',
                'nationality'  => 'required|max:50',
                'occupancy'  => 'required|max:60',
                'resident'   => 'required|max:50',
                'institution' => 'required|max:60',
                'level' => 'required|max:60',
            ]);

        $accommodationRequest = new AccommodationRequest([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'telephone'     => $request->input('telephone'),
                'nationality'   => $request->input('nationality'),
                'occupancy' => $request->input('occupancy'),
                'resident'  => $request->input('resident'),
                'institution'  => $request->input('institution'),
                'level'   => $request->input('level'),
            ]);

        $accommodationRequest->save();

        //accomodation->store();

       

        return redirect('home')->with('alert-success', 'Your Request was successfully send,We will Contact you within 24hrs.');
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
        //
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
        //
    }
}
