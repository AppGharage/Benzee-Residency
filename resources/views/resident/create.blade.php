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
                <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">New Resident</h6>
                <small style="color:#ffffff;font-weight:bold;">Add New Resident Information</small>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="my-3 p-3 bg-white rounded col-md-8" style=" margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-weight:bold;">
                        <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Resident Information</h6>
                        <hr>

                        <div class="container">
                        @include('includes.flash')
                            <div class="row justify-content-md-center">
                                <form method="POST" action="{{ route('resident.store') }}">
                                    @csrf
                                    <div class="form-row">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="fullname">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" placeholder="Nationality">
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="fullname">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="fullname">Telephone</label>
                                        <input type="text" class="form-control" name="telephone" placeholder="Telephone">
                                    </div>
                                    
                                    <br>

                                    <div class="form-row">
                                        <label for="room_number">Institution</label>
                                        <input type="text" class="form-control " id="room_number" name="institution" placeholder="Institution">
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
                                        <label for="occupancy_type">Duration</label>
                                        <select class="form-control" name="duration" id="duration">
                                            <option class="text-dark" disabled selected hidden>Duration</option>
                                            <option value="9 months" class="text-dark">9 months</option>
                                            <option value="12 months" class="text-dark">12 months</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="occupancy_type">Level</label>
                                        <select class="form-control" name="level">
                                            <option class="text-dark" disabled selected hidden>Level</option>
                                            <option value="9 months" class="text-dark">1st year</option>
                                            <option value="9 months" class="text-dark">2nd year</option>
                                            <option value="9 months" class="text-dark">3rd year</option>
                                            <option value="9 months" class="text-dark">4th year</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-row" style="margin-top:10px;">
                                        <div class="col-md-12">
                                            <label for="title">Room</label>
                                            <select class="form-control" name="room" id="room">
                                                <option class="text-dark" disabled selected hidden>Select Room</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}" class="text-dark">{{ $room->room_number }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <br>
                                    <button type="submit" class="btn btn-primary">Add Resident</button>
                                </form>

                        </div>
                    </div>
                </div>

            </div>

            
            
        </div>
    </div>
</div>
@endsection
