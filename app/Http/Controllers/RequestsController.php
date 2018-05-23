<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Request as AccommodationRequest;
use App\User;



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
                'occupancy_type'  => 'required|max:60',
                'residency_status'   => 'required|max:50',
                'institution' => 'required|max:60',
                'level' => 'required|max:60',
            ]);

        $user = new User([
            'fullname' => $request->fullname,
            'telephone' => $request->telephone,
            'nationality' => $request->nationality,
            'email' => $request->email,            
            'password' => bcrypt($request->password)
        ]);
        $user->save();
       

        $accommodationRequest = new AccommodationRequest([
                'occupancy_type' => $request->input('occupancy_type'),
                'residency_status'  => $request->input('residency_status'),
                'institution'  => $request->input('institution'),
                'level'   => $request->input('level'),
                'user_id'   => $user->id,
                
            ]);
        

        $accommodationRequest->save();
        

       

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
