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
                <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">New Room</h6>
                <small style="color:#ffffff;font-weight:bold;">Add New Room Information</small>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="my-3 p-3 bg-white rounded col-md-8" style=" margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-weight:bold;">
                        <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Rooms</h6>
                        <hr>

                        <div class="container">
                        @include('includes.flash')
                            <div class="row justify-content-md-center">
                                <form method="POST" action="{{ route('rooms.store') }}">
                                    @csrf
                                    <div class="form-row">
                                        <label for="room_number">Room Number</label>
                                        <input type="text" class="form-control " id="room_number" name="room_number" placeholder="Room Number">
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="occupancy_type">Occupancy Type</label>
                                        <select class="form-control" name="occupancy_type" id="occupancy_type">
                                            <option class="text-dark" disabled selected hidden>Occupancy Type</option>
                                            <option value="Single Room" class="text-dark">Single Room</option>
                                            <option value="Single Room with AirCondition" class="text-dark">Single Room with AirCondition</option>
                                            <option value="Double Room" class="text-dark">Double Room</option>
                                            <option value="Double Room with AirCondition" class="text-dark">Double Room with AirCondition</option>
                                            <option value="Special Room" class="text-dark">Special Room</option>
                                            <option value="Special Room with AirCondition" class="text-dark">Special Room with AirCondition</option>
                                            <option value="Special Double Room" class="text-dark">Special Double Room</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="capacity">Capacity</label>
                                        <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Capacity">
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="meter_number">Meter Number</label>
                                        <input type="text" class="form-control" id="meter_number" name="meter_number" placeholder="Meter Number">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Add Room</button>
                                </form>

                        </div>
                    </div>
                </div>

            </div>

            
            
        </div>
    </div>
</div>
@endsection
