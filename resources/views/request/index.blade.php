@extends('layouts.app') @section('external-css')
<link href="{{ asset('css/userdashboard.css') }}" rel="stylesheet"> 
@section('content')
@if(session()->has('alert-success'))
    <div class="alert alert-success">
        {{ session()->get('alert-success') }}
    </div>
@endif
<body class="bg-light">

    <main role="main" class="container">
        <div class="col-md-10" style="margin:auto">
            <div class="card">
                <div class="card-header" style="background:#2737A6;color:white; font-size:17px; font-weight:bold;">Request for Room</div>
                <div class="container">
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('request') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"> @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <label for="telephone" class="col-md-4 control-label">Telephone</label>

                                <div class="col-md-12">
                                    <input id="telephone" type="0544392555" class="form-control" name="telephone" value="{{ old('telephone') }}"> @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-12">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"> @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                                <label for="nationality" class="col-md-4 control-label">Nationality</label>

                                <div class="col-md-12">
                                    <input id="nationality" type="text" class="form-control" name="nationality" value="{{ old('nationality') }}"> @if ($errors->has('nationality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('occupancy') ? ' has-error' : '' }}">
                                <label for="occupancy" class="col-md-4 control-label">Ocuppancy</label>

                                <div class="col-md-12">
                                    <input id="occupancy" type="text" class="form-control" name="occupancy" value="{{ old('occupancy') }}"> @if ($errors->has('occupancy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('occupancy') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('resident') ? ' has-error' : '' }}">
                                <label for="resident" class="col-md-4 control-label">Resident</label>

                                <div class="col-md-12">
                                    <input id="resident" type="text" class="form-control" name="resident" value="{{ old('resident') }}"> @if ($errors->has('resident'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resident') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }}">
                                <label for="institution" class="col-md-4 control-label">Institution</label>

                                <div class="col-md-12">
                                    <input id="institution" type="text" class="form-control" name="institution" value="{{ old('institution') }}"> @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label for="level" class="col-md-4 control-label">Level</label>

                                <div class="col-md-12">
                                    <input id="level" type="text" class="form-control" name="level" value="{{ old('level') }}"> @if ($errors->has('level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                                   <div class="form-group">
                                      <div class="col-md-6 col-md-offset-4">
                                        <button type="submit"class="btn         btn-primary">
                                               Register
                                             </button>
                                        </div>
                                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        
    </main>

    @endsection