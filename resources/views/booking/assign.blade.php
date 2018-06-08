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
                <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Assign Room</h6>
                <small style="color:#ffffff;font-weight:bold;">Assing booking with ID: {{ $booking->id}} a room</small>
                </div>
            </div>

            <div class="row justify-content-md-center">

                @include('includes.flash')

                <div class="my-3 p-3 bg-white rounded col-md-8" style=" margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-weight:bold;">
                        <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Assign Room</h6>

                        <div class="container">
                            <div class="form-row" style="margin-top:10px;">
                                <div class="col-md-12">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" id="title" value="{{ $booking->user->fullname}}" readonly>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <label for="category">Nationality</label>
                                    <input type="text" class="form-control" id="status" value="{{ $booking->user->fullname}}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="category">Institution</label>
                                    <input type="text" class="form-control" id="opened" value="{{ $booking->request->institution}}" readonly>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <label for="category">Level</label>
                                    <input type="text" class="form-control" id="status" value="{{ $booking->request->level }}" readonly>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="category">Request Date</label>
                                    <input type="text" class="form-control" id="opened" value="{{ $booking->request->created_at->format('F d, Y H:i') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center">
                @include('includes.flash')

                <div class="my-3 p-3 bg-white rounded col-md-8" style=" margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-weight:bold;">
                        <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Room Assign Form</h6>

                        <div class="container">
                            <form method="POST" action="{{ route('booking.store') }}">
                                @csrf
                                <div class="form-row" style="margin-top:10px;">
                                    <div class="col-md-12">
                                        <label for="title">Occupancy Type</label>
                                        <input type="text" class="form-control" id="amount" name="duration" class="form-control" value="{{ $booking->request->occupancy_type }}" readonly>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top:10px;">
                                    <div class="col-md-12">
                                        <label for="title">Room</label>
                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Eg: 1,600" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('amount') }}" required autofocus>
                                    </div>
                                </div>
                                    <input type="hidden" name="request_id" value="{{ $booking->id }}">
                                <br>
                                <button class="btn btn-outline-primary" type="submit">Assign Room</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection