<?php

namespace BenZee\Http\Controllers;

use Illuminate\Http\Request;
use BenZee\Room;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rooms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
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
            'room_number' => 'required|string|max:255',
            'occupancy_type' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'meter_number' => 'required|max:11'
        ]);

      
        $room = new Room;

        $room->room_number = $request->input('room_number');
        $room->occupancy_type = $request->input('occupancy_type');
        $room->capacity = $request->input('capacity');
        $room->meter_number = $request->input('meter_number');
      
      

        $room->save();


        return redirect()->back()->with('status', 'Room Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('room.show', ['room' => Room::findOrFail($id)]);
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
