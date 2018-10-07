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
                                <form method="POST" action="{{ route('anouncement.send.single') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" value="{{ $user->fullname }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="name">Telpehone</label>
                                        <input type="number" class="form-control" value="{{ $user->telephone }}" readonly>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <br>
                                    <div class="form-row">
                                        <label for="message">Message</label>
                                        <textarea name="message"  class="form-control" id="" cols="30" rows="10" maxlength="120"></textarea>
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
