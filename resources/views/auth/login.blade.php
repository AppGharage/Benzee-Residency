@extends('layouts.app')

@section('content')
    <section class="row h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand" style="margin: 40px auto;">
                        <img src="{{ asset('img/Group 2.png') }}" style="margin: 20px 40px 0px 150px; width: 30px;">
                    </div>
                    <div class="card col-md-12 col-10" style="margin-left:30px;">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align:left;margin-left:-15px;">Login</h4>
                            <br>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email">E-Mail Address</label>

                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="password">Password &nbsp
                                        <a href="{{ route('password.request') }}" class="float-right">
                                            <small> Forgot Password?</small>
                                        </a>
                                    </label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}" > {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                </div>

                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="footer">
                        Built with &#10084; by; <a href="https://appgharage.com" target="_blank">AppGharage</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
