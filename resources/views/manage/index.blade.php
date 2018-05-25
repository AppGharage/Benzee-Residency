@extends('layouts.app')


@section('styleshet')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@include('layouts.dashboard.nav')

@section('content')
<div class="container col-md-8">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow col-md-12" style="background-color: #0B3BE9;">
                <div class="lh-100">
                    <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Manage</h6>
                    <small style="color:#ffffff;font-weight:bold;">Manage Requests, Bookings, Rooms, Issues, Other Services </small>
                </div>
            </div><br>

            <ul class="nav nav-tabs col-md-12" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); font-size:16px; font-weight:bold;">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#requests">Accomodation Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#bookings">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#rooms">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"href="#issues">Issues</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"href="#services">Other Services</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="requests" class="tab-pane fade in active my-3 p-3 bg-white rounded" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;margin-top:30px;">Accomodation Request List</h6>
                    @if ($requests->isEmpty())
                        <p>Aww Snap! There are currently no Accomodation Requests.</p>
                    @else
                        <div class="media text-muted pt-3" style="font-size:16px;">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Nationality</th>
                                        <th>Occupancy Type</th>
                                        <th>Institution</th>
                                        <th>Level</th>
                                        <th>Roommate</th>
                                        <th>Duration</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($requests as $request)
                                    <tbody>
                                        <tr>
                                            <td>{{ $request->user->fullname }}</td>
                                            <td>{{ $request->user->nationality }}</td>
                                            <td>{{ $request->occupancy_type }}</td>
                                            <td>{{ $request->institution }}</td>
                                            <td>{{ $request->level }}</td>
                                            @if($request->roommate)
                                                <td>Yes</td>
                                            @else
                                                <td>No</td>
                                            @endif
                                            <td>{{ $request->duration }}</td>
                                            <td>{{ $request->created_at->diffForHumans(null, true) }}</td>
                                            <td>
                                                <form action="{{ $request->path() }}" method="GET">
                                                    <button type="submit" class="btn btn-sm btn-primary" style="font-weight:bold">Respond</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        {{ $requests->render() }}
                    @endif
                </div>
                <div id="bookings" class="tab-pane fade my-3 p-3 bg-white rounded" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;margin-top:30px;">Booking List</h6>
                    @if ($bookings->isEmpty())
                        <p>Aww Snap! There are currently no Bookings Requests.</p>
                    @else
                        <div class="media text-muted pt-3" style="font-size:16px;">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>Institution</th>
                                    <th>Level</th>
                                    <th>Occupancy Type</th>
                                    <th>Roommate</th>
                                    <th>Status</th>
                                    <th>Expires In</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($bookings as $booking)
                                    <tbody>
                                        <tr>
                                        <td>{{ $booking->user->fullname }}</td>
                                        <td>{{ $booking->user->nationality }}</td>
                                        <td>{{ $booking->request->institution }}</td>
                                        <td>{{ $booking->request->level }}</td>
                                        <td>{{ $booking->request->occupancy_type }}</td>
                                        @if($booking->has_roommate)
                                            <td>Yes</td>
                                        @else
                                            <td>No</td>
                                        @endif
                                        @if($booking->is_paid)
                                            <td>
                                                <button class="btn btn-sm btn-outline-success" style="font-weight:bold" disabled="disabled">Paid</button>
                                            </td>
                                        @else
                                            <td>
                                                <button class="btn btn-sm btn-outline-warning" style="font-weight:bold" disabled="disabled">Pending</button>
                                            </td>
                                        @endif
                                        @if( $booking->end_date->diffInDays() <= 0)
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger" style="font-weight:bold" disabled="disabled">Expired</button>
                                            </td>
                                        @else
                                            <td>{{ $booking->end_date->diffInDays() }} days</td>
                                        @endif
                                        <td>
                                                <form action="#" method="GET">
                                                    <button type="submit" class="btn btn-sm  {{( !$booking->is_paid) ? 'btn-danger' : 'btn-primary'}}" style="font-weight:bold" 
                                                            {{( $booking->is_paid && !$booking->has_fee_request  ) ? '': 'disabled'}}>
                                                            {{ ($booking->has_fee_request) ? 'Request already sent' : 'Request Fee Payment'}}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        {{ $requests->render() }}
                    @endif
                </div>
                <div id="rooms" class="tab-pane fade my-3 p-3 bg-white rounded" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;margin-top:30px;">Rooms</h6>
                    <div class="media text-muted pt-3" style="font-size:16px;">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="issues" class="tab-pane fade my-3 p-3 bg-white rounded" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;margin-top:30px;">Issues List</h6>
                    <div class="media text-muted pt-3" style="font-size:16px;">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="services" class="tab-pane fade my-3 p-3 bg-white rounded" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;margin-top:30px;">Other Services</h6>
                    <div class="media text-muted pt-3" style="font-size:16px;">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection