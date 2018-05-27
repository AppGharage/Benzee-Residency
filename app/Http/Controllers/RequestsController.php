<?php

namespace App\Http\Controllers;

use App\User;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validates all Request Input
        $this->validate($request, [
                'fullname'  => 'required|max:60',
                'email'   => 'required|max:60',
                'telephone'   => 'required|max:14',
                'nationality' => 'required|max:20',
                'level' => 'required|max:10',
                'occupancy_type'  => 'required|max:60',
                'institution' => 'required|max:60',
                'duration' => 'required|max:10',
                'level' => 'required|max:60',
        ]);
        
        //Gets First Name of the full name as Password
        $password =  explode(" ", $request->fullname)[0];
        
        if (User::whereEmail($request->email)->first()) {
            //TODO:
            //If user is already found Update Details if only account is not activated
        }

        //Saves User details in the User table
        $user = new User([
            'fullname' => $request->fullname,
            'telephone' => $request->telephone,
            'nationality' => $request->nationality,
            'email' => $request->email,
            'password' => bcrypt($password)
        ]);
        

        $user->save();
       
        //Saves accommodation Details in requests table
        $accommodationRequest = new AccommodationRequest([
                'occupancy_type' => $request->input('occupancy_type'),
                'institution'  => $request->input('institution'),
                'duration' => $request->input('duration'),
                'level'   => $request->input('level'),
                'user_id'   => $user->id,
            ]);
        
        $accommodationRequest->save();
        
        return redirect()->back()->with('status', 'We have recieved your Request and will contact you shortly via Email & SMS.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AccommodationRequest $request)
    {
        //
        return view('request.show', compact('request'));
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
