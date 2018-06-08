@extends('layouts.app')


@section('styleshet')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@include('layouts.dashboard.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
           
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow" style="background-color: #0B3BE9;">
                <div class="lh-100">
                <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Rooms Information</h6>
                <small style="color:#ffffff;font-weight:bold;">Add New Room </small>
              
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="my-3 p-3 bg-white rounded col-md-8" style=" margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-weight:bold;">
                        <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Rooms</h6>
                        <hr>

                        <div class="container">
                            <div class="row justify-content-md-center">
                    <form method="POST" action="/rooms">
                        @csrf
                      <div class="form-group">
                        <label for="room_number">Room Number</label>
                        <input type="text" class="form-control" id="room_number" name="room_number" placeholder="Room Number">
                      </div>
                      <div class="form-group">
                        <label for="occupancy_type">Occupancy Type</label>
                        <select class="form-control" name="occupancy_type" id="occupancy_type">
                          <option>Single Room</option>
                          <option>Single Room with AirCondition</option>
                          <option>Double Room</option>
                          <option>Double Room with AirCondition</option>
                          <option>Special Room</option>
                          <option>Special Room with AirCondition</option>
                          <option>Special Double Room</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Capacity">
                      </div>
                      <div class="form-group">
                        <label for="meter_number">Meter Number</label>
                        <input type="text" class="form-control" id="meter_number" name="meter_number" placeholder="Meter Number">
                      </div>
                       <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
                    </div>
                </div>

            </div>

            
            
        </div>
    </div>
</div>
@endsection
