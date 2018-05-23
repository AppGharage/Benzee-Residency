<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <main role="main" class="container">
        <div class="col-md-10" style="margin:auto">
            <div class="card">
                <div class="card-header" style="background:#2737A6;color:white; font-size:17px; font-weight:bold;">Request for Room</div>
                <div class="container">
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('request.store') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                <label for="fullname" class="col-md-4 control-label">Fullname</label>

                                <div class="col-md-12">
                                    <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}"> @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <label for="telephone" class="col-md-4 control-label">Telephone</label>

                                <div class="col-md-12">
                                    <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}"> @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
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

                            <div class="form-group{{ $errors->has('occupancy_type') ? ' has-error' : '' }}">
                                <label for="occupancy_type" class="col-md-4 control-label">Ocuppancy_Type</label>

                                <div class="col-md-12">
                                    <input id="occupancy_type" type="text" class="form-control" name="occupancy_type" value="{{ old('occupancy_type') }}"> @if ($errors->has('occupancy_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('occupancy_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('residency_status') ? ' has-error' : '' }}">
                                <label for="roommate_status" class="col-md-4 control-label">Do you have Roommate ? answer 1/0</label>

                                <div class="col-md-12">
                                    <input id="residency_status" type="text" class="form-control" name="roommate_status" value="{{ old('residency_status') }}"> @if ($errors->has('residency_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('residency_status') }}</strong>
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
        </div>
            </div>
        </div>
	<script>
		if('serviceWorker' in navigator) {
		navigator.serviceWorker.register('public/sw.js')
		  .then(function() {
			console.log('Service Worker Registered');
		  });
		}
	</script>
    </body>
</html>
