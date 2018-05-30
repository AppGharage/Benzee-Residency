@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ROOMS') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('room') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="room_number" class="col-md-4 col-form-label text-md-right">{{ __('Room Number') }}</label>

                            <div class="col-md-6">
                                <input id="room_number" type="text" class="form-control{{ $errors->has('room_number') ? ' is-invalid' : '' }}" name="room_number" value="{{ old('room_number') }}" required autofocus>

                                @if ($errors->has('room_number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('room_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="occupancy_type" class="col-md-4 col-form-label text-md-right">{{ __('Occupancy Type') }}</label>

                            <div class="col-md-6">
                                <input id="occupancy_type" type="text" class="form-control{{ $errors->has('occupancy_type') ? ' is-invalid' : '' }}" name="occupancy_type" value="{{ old('occupancy_type') }}" required autofocus>

                                @if ($errors->has('nationalty'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('occupancy_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="capacity" class="col-md-4 col-form-label text-md-right">{{ __('Capacity') }}</label>

                            <div class="col-md-6">
                                <input id="capacity" type="number" class="form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }}" name="capacity" value="{{ old('capacity') }}" required autofocus>

                                @if ($errors->has('capacity'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
