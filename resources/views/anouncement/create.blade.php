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
                    <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">New Anouncement</h6>
                    <small style="color:#ffffff;font-weight:bold;">Send New Anouncement</small>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="my-3 p-3 bg-white rounded col-md-8" style=" margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-weight:bold;">
                        <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Announcement</h6>
                        <hr>

                        <div class="container">
                            @include('includes.flash')
                            <div class="row justify-content-md-center">
                                <form method="POST" action="{{ route('rooms.store') }}">
                                    @csrf

                                    <div class="form-row">
                                        <label for="occupancy_type">To</label>
                                        <select class="form-control" name="occupancy_type" id="occupancy_type">
                                            <option class="text-dark" disabled selected hidden>Send To</option>
                                            <option value="residents" class="text-dark">All Residents</option>
                                            <option value="awaiting" class="text-dark">Awaiting Bookings</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label for="capacity">Message</label>
                                        <textarea name="message"  class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Send Anouncement</button>
                                </form>

                        </div>
                    </div>
                </div>

            </div>

            
            
        </div>
    </div>
</div>
@endsection
