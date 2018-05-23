@extends('layouts.app')


@section('styleshet')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@include('layouts.dashboard.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow" style="background-color: #0B3BE9;">
                <div class="lh-100">
                <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Dashboard</h6>
                <small style="color:#ffffff;font-weight:bold;">View Quick Facts</small>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="my-3 p-3 bg-white rounded col-md-3" style="margin-right:20px; margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded col-md-3" style="margin-right:20px; margin-left:20px;box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded col-md-3" style="margin-right:20px; margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>

            </div>
            
            <div class="row justify-content-center">
                <div class="my-3 p-3 bg-white rounded col-md-5" style="margin-right:10px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Recent Accomodation Requests</h6>
                    @if ($requests->isEmpty())
                        <p>Aww Snap! There are currently no Accomodation Requests.</p>
                    @else
                        <div class="media text-muted pt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Occupany Type</th>
                                    <th scope="col">Institution</th>
                                    </tr>
                                </thead>
                                @foreach ($requests as $request)
                                    <tbody>
                                        <tr>
                                            <td>{{ $request->user->fullname }}</td>
                                            <td>{{ $request->occupancy_type }}</td>
                                            <td>{{ $request->institution }}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    <div class="border-bottom border-gray"></div><br>
                    <button class="btn btn-outline-primary" href="{{ route('manage') }}">See All</button>
                </div>

                <div class="my-3 p-3 bg-white rounded col-md-5" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">Recent Bookings</h6>
                    <div class="media text-muted pt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Occupany Type</th>
                                    <th scope="col">Institution</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                </tr>
                                <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="border-bottom border-gray"></div><br>
                    <button type="submit" class="btn btn-outline-primary">See All</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
