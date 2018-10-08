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
                                <form method="POST" action="{{ route('resident.update') }}">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                                    <div class="form-row">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" class="form-control" name="fullname" value="{{ $user->fullname }}" placeholder="Full Name">
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="fullname">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" value="{{ $user->nationality }}" placeholder="Nationality">
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="fullname">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="fullname">Telephone</label>
                                        <input type="text" class="form-control" name="telephone"  value="{{ $user->telephone }}" placeholder="Telephone">
                                    </div>
                                    
                                    <br>

                                    <div class="form-row" style="margin-top:10px;">
                                        <div class="col-md-12">
                                            <label for="title">Room</label>
                                            <select class="form-control" name="room" id="room">
                                                <option class="text-dark" value="{{ $user_room->id }}" selected hidden>{{ $user_room->room_number }}</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}" class="text-dark">{{ $room->room_number }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <br>
                                    <button type="submit" class="btn btn-primary">Update Resident Details</button>
                                    <br><br>
                                    <hr>
                                    <br>
                                    <a href="/resident/delete/{{ $user->id }}" style="color:red;">Remove as Resident</a>
                                </form>

                        </div>
                    </div>
                </div>

            </div>

            
            
        </div>
    </div>
</div>
@endsection
