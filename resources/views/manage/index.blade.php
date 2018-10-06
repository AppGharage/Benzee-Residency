@extends('layouts.app')


@section('styleshet')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@include('layouts.dashboard.nav')

@section('content')
<div class="container col-sm-10 col-md-10 col-lg-10">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
           
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow col-md-12" style="background-color: #0B3BE9;">
                <div class="lh-100">
                    <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Manage</h6>
                    <small style="color:#ffffff;font-weight:bold;">Manage Requests, Bookings, Rooms, Issues, Other Services </small>
                </div>
            </div><br>

            <ul class="nav nav-tabs col-md-12" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); font-size:16px; font-weight:bold;">
                <li class="nav-item" style="border 2px solid blue;">
                    <a class="nav-link" data-toggle="tab" href="#requests"> 
                        <span class="fas fa-clipboard-list" style="color:#0B3BE9;"></span> Accomodation Requests
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#bookings">
                        <span class="fas fa-book-open" style="color:#0B3BE9;"></span> Bookings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#residents">
                        <span class="fas fa-users" style="color:#0B3BE9;"></span> Residents
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#rooms">
                        <span class="fas fa-bed" style="color:#0B3BE9;"></span> Rooms
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#issues">
                        <span class="fas fa-receipt" style="color:#0B3BE9;"></span> Issues
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#services">
                        <span class="fas fa-coins" style="color:#0B3BE9;"></span> Other Services
                    </a>
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
                                        <th>Telephone</th>
                                        <th>Occupancy Type</th>
                                        <th>Institution</th>
                                        <th>Level</th>
                                        <th>Duration</th>
                                        <th>Submitted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($requests as $request)
                                    <tbody>
                                        <tr>
                                            <td>{{ $request->user->fullname }}</td>
                                            <td>{{ $request->user->nationality }}</td>
                                            <td>{{ $request->user->telephone }}</td>
                                            <td>{{ $request->occupancy_type }}</td>
                                            <td>{{ $request->institution }}</td>
                                            <td>{{ $request->level }}</td>
                                            <td>{{ $request->duration }}</td>
                                            <td>{{ $request->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ $request->path() }}" role="button">Respond</a>
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
                                    <th>Telephone</th>
                                    <th>Institution</th>
                                    <th>Level</th>
                                    <th>Occupancy Type</th>
                                    <th>Rent (USD)</th>
                                    <th>Status</th>
                                    <th>Expires on</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($bookings as $booking)
                                    <tbody>
                                        <tr>
                                        <td>{{ $booking->user->fullname }}</td>
                                        <td>{{ $booking->user->nationality }}</td>
                                        <td>{{ $booking->user->telephone }}</td>
                                        <td>{{ $booking->request->institution }}</td>
                                        <td>{{ $booking->request->level }}</td>
                                        <td>{{ $booking->request->occupancy_type }}</td>
                                        <td>$ {{ $booking->amount }}</td>
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
                                            <td>{{ $booking->end_date->format('F d, Y') }}</td>
                                        @endif
                                            <td>
                                                    <a class="btn btn-sm btn-primary {{( !$booking->is_paid) ? 'btn-danger' : 'btn-primary'}}"  href="{{ ($booking->is_paid && !$booking->has_fee_request) ? $booking->roomAssignPath()  : '#'}}" style="font-weight:bold" role="button" >                                                            
                                                            {{ ($booking->has_fee_request) ? 'Room Allocated' : 'Assign Room'}}
                                                    </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        {{ $requests->render() }}
                    @endif
                </div>
                <div id="residents" class="tab-pane fade my-3 p-3 bg-white rounded" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;margin-top:30px;">Residents</h6>
                    <div class="media text-muted pt-3" style="font-size:16px;">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Institution</th>
                                <th scope="col">Level</th>
                                <th scope="col">Room</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($residents as $resident)
                                <tbody>
                                    <tr>
                                    <td>{{$resident->user->fullname}}</td>
                                    <td>{{$resident->request->institution}}</td>
                                    <td>{{$resident->request->level }}</td>
                                    <td>{{$resident->room->room_number }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="#" role="button">Send Message</a>
                                    </td>
                                    <tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div id="rooms" class="tab-pane fade my-3 p-3 bg-white rounded" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;margin-top:30px;">Rooms</h6>

                    <a href="{{route('rooms.create')}}" class="btn btn-outline-primary btn-md" style="float:right;" role="button" aria-pressed="true">Add Room</a>
                    <br>
                    <br>
                    <div class="media text-muted pt-3" style="font-size:16px;">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Room Number</th>
                                <th scope="col">Occupancy Type</th>
                                <th scope="col">Capacity</th>
                                 <th scope="col">Meter Number</th>
                                </tr>
                            </thead>
                            @foreach ($rooms as $room)
                                <tbody>
                                    <tr>
                                    <td>{{$room->room_number}}</td>
                                    <td>{{$room->occupancy_type}}</td>
                                    <td>{{$room->capacity}}</td>
                                    <td>{{$room->meter_number}}</td>
                                    </tr>
                                    <tr>
                                </tbody>
                            @endforeach
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
