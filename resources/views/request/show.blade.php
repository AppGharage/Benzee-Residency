@extends('layouts.app')


@section('styleshet')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@include('layouts.dashboard.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
           
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow" style="background-color: #0B3BE9;">
                <div class="lh-100">
                <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Detailed Request Information</h6>
                <small style="color:#ffffff;font-weight:bold;">View and Respond to Request with ID: {{ $request->id}} </small>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="my-3 p-3 bg-white rounded col-md-8" style=" margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-weight:bold;">
                        <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Accomodation Request</h6>

                        <div class="container">
                            <div class="form-row" style="margin-top:10px;">
                                <div class="col-md-12">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" id="title" value="{{ $request->user->fullname }}" readonly>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <label for="category">Nationality</label>
                                    <input type="text" class="form-control" id="status" value="{{ $request->user->nationality  }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="category">Institution</label>
                                    <input type="text" class="form-control" id="opened" value="{{ $request->institution}}" readonly>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <label for="category">Occupancy Type</label>
                                    <input type="text" class="form-control" id="status" value="{{ $request->occupancy_type }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="category">Roommate</label>
                                    <input type="text" class="form-control" id="opened" value=" {{ $request->has_roommate ? 'Yes' : 'No' }}" readonly>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <label for="category">Level</label>
                                    <input type="text" class="form-control" id="status" value="{{ $request->level }}" readonly>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="category">Request Date</label>
                                    <input type="text" class="form-control" id="opened" value="{{ $request->created_at->format('F d, Y H:i') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-md-center">
                <div class="my-3 p-3 bg-white rounded col-md-8" style=" margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-weight:bold;">
                        <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Response Form</h6>

                        <div class="container">
                            <form method="POST" action="{{ route('booking.store') }}">
                                @csrf
                                <div class="form-row" style="margin-top:10px;">
                                    <div class="col-md-12">
                                        <label for="title">Amount ($) </label>
                                        <input type="text" class="form-control" id="amount" name="amount" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('amount') }}" required autofocus>
                                    </div>
                                </div>
                                    <input type="hidden" name="request_id" value="{{ $request->id }}">
                                    <input type="hidden" name="user_id" value="{{ $request->user->id }}">
                                <br>
                                <button class="btn btn-outline-primary" type="submit">Send Response</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
