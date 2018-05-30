@extends('layouts.app')


@section('styleshet')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@include('layouts.dashboard.nav')

@section('content')
<div class="container col-md-8 col-lg-10">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
           
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow" style="background-color: #0B3BE9;">
                <div class="lh-100">
                <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Dashboard</h6>
                <small style="color:#ffffff;font-weight:bold;">View Quick Facts</small>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="my-3 p-3 bg-white rounded col-md-3" style="margin-right:20px; margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-size:18px;text-align:center;font-weight:bold;">
                        <span class="fas fa-users" style="color:#0B3BE9;"></span> Residents
                        <br>
                        <span style="font-size:40px; font-weight:bold;">0</span>
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded col-md-3" style="margin-right:20px; margin-left:20px;box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                <div class="card-body" style="font-size:18px;text-align:center;font-weight:bold;">
                        <span class="fas fa-clipboard-list" style="color:#0B3BE9;"></span> Accomodation Requests 
                        <br>
                        <span style="font-size:40px; font-weight:bold;">{{ $allRequests->count() }}</span>
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded col-md-3" style="margin-right:20px; margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body" style="font-size:18px;text-align:center;font-weight:bold;">
                        <span class="fas fa-receipt" style="color:#0B3BE9;"></span> Open Issues
                        <br>
                        <span style="font-size:40px; font-weight:bold;">0</span>
                    </div>
                </div>

            </div>
            
            <div class="row justify-content-center">
                <div class="my-3 p-3 bg-white rounded col-md-5" style="margin-right:10px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">
                        <span class="fas fa-clipboard-list"></span> Accomodation Requests
                    </h6>
                    @if ($requests->isEmpty())
                        <p>Aww Snap! There are currently no Accomodation Requests.</p>
                    @else
                        <div class="media text-muted pt-3" style="font-size:16px;"> 
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Occupany Type</th>
                                    <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                @foreach ($requests as $request)
                                    <tbody>
                                        <tr>
                                            <td>{{ $request->user->fullname }}</td>
                                            <td>{{ $request->occupancy_type }}</td>
                                            <td>{{ $request->created_at->diffForHumans(null, true) }}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="border-bottom border-gray"></div><br>
                        <a class="btn btn-outline-primary" href="{{ route('manage') }}" role="button">See more</a>
                    @endif
                </div>

                <div class="my-3 p-3 bg-white rounded col-md-5" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">
                        <span class="fas fa-book-open"></span> Bookings
                    </h6>
                    @if ($bookings->isEmpty())
                        <p>Aww Snap! There are currently no Bookings.</p>
                    @else
                        <div class="media text-muted pt-3" style="font-size:16px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Expires 0n</th>
                                    </tr>
                                </thead>
                                @foreach ($bookings as $booking)
                                    <tbody>
                                        <tr>
                                        <td>{{ $booking->user->fullname }}</td>
                                        @if($booking->is_paid)
                                            <td>
                                                <button class="btn btn-sm btn-outline-success" style="font-weight:bold" disabled="disabled">Paid</button>
                                            </td>
                                        @else
                                            <td>
                                                <button class="btn btn-sm btn-outline-warning" style="font-weight:bold" disabled="disabled">Pending</button>
                                            </td>
                                        @endif
                                        @if( $booking->end_date <= date('Y-m-d H:i:s'))
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger" style="font-weight:bold" disabled="disabled">Expired</button>
                                            </td>
                                        @else
                                            <td>{{ $booking->end_date->format('F d, Y')}}</td>
                                        @endif
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="border-bottom border-gray"></div><br>
                        <a class="btn btn-outline-primary" href="{{ route('manage') }}" role="button">See more</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
