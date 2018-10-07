<?php

namespace BenZee\Http\Controllers;

use Illuminate\Http\Request;
use BenZee\Booking;
use BenZee\User;
use BenZee\Jobs\ProcessNotifications;

class AnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anouncement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anouncement.create');
    }

    public function singleAnouncement(User $user)
    {
        return view('anouncement.single', compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    public function bulkSend()
    {
        //
    }


    public function singleSms(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'message' => 'required'
        ]);

        $userID = $request->input('user_id');
        $message = $request->input('message');


        $user = User::find($userID);
        $notificationType= 'Anouncement';
        ProcessNotifications::dispatch($user, null, $notificationType, null, $message)->delay(now()->addMinutes(1));

        return redirect()->back()->with('status', 'Awesome ! Your message was sent Successfully!.');
    }
}
