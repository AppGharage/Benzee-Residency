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
                    <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Anouncement</h6>
                    <small style="color:#ffffff;font-weight:bold;">View and Send Anouncements to Residents </small>
                </div>
            </div><br>

            <div class="bg-white my-3 p-3  rounded" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;margin-top:30px;">New Anouncement</h6>

                <a href="{{route('anouncement.create')}}" class="btn btn-outline-primary btn-md" style="float:right;" role="button" aria-pressed="true">New Anouncement</a>
                <br>
                <br>
                <div class="media text-muted pt-3" style="font-size:16px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">To</th>
                                <th scope="col">Message</th>
                                <th scope="col">Sent On</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
 
        </div>
    </div>
</div>
@endsection
