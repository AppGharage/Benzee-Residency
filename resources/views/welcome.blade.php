<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BenZee Residency | A Home Away From Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto|Roboto+Slab" rel="stylesheet">
    <style>
        body,
        html {
            background: -webkit-linear-gradient(45deg,rgba(0, 0, 28, 0.6), rgba(0, 0, 255, 0.6)), url('{{ asset('img/bg.JPG') }}'); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(45deg,rgba(0, 0, 28, 0.8), rgba(0, 0, 255, 0.8)), url('{{ asset('img/bg.JPG') }}'); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background-size: cover;
            background-repeat: repeat-y;
            height:100%;
            width: 100%;
        }
        .btn {
            border: 1px solid;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            font-weight:bold;
        }
        .nav {
                display: inline-block;
                font-size: 16px;
                font-weight:bold;
        }
        #logo {
            width: 220px;
        }
        #request {
            margin-left: 32%;
        }
        #nav {
            margin-right: 30px;
        }
        #callout {
            text-align:center;
            margin-top:13%;
            font-family: 'Roboto', sans-serif;
            font-size: 50px;
            font-weight:bold;
        }
        #request-form-inputs {
            font-size:20px;
            background:transparent;
            font-color:#ffffff;
            font-weight: bold;
            border-radius:0px;
        }

        /* Tablets */
        @media (min-width: 481px) and (max-width: 767px) {
            #request{
                margin-left: 10%;
            }
            #nav {
                margin-right: 30px;
                margin-left: 30px;
            }
            #auth-btn {
                width: 30%;
            }
            #callout {
                font-size: 40px;
            }
            .nav {
                margin-top:10px;
            }
            .btn {
                margin-top:20px;
                margin-left:25%;
            }
        }
        
        /*Mobile Phone */
        @media (min-width: 326px) and (max-width: 480px) {
            #logo {
                width: 250px;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            #request{
                margin-left: 0%;
            }
            #nav {
                margin-right: 3%;
                margin-left:5%;
            }
            #para-1 {
                text-align: justify;
            }
            #para-2 {
                margin-top:20px;
                text-align: justify;
            }
            #auth-btn {
                width: 30%;
                margin-left: 30%;
            }
            #callout {
                font-size: 40px;
            }
            #request-form-inputs {
                margin-bottom:15px;
            }
            .btn {
                margin-top:20px;
                margin-left:30%;
            }
            .nav {
                margin-top:20px;
            }
        }
        /*Mobile Phone with smaller screen size*/
        @media (min-width: 100px) and (max-width: 325px) {
            #logo {
                width: 200px;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            #request{
                margin-left: 0%;
                width: 100%
            }
            #nav {
                margin-right: 1%;
                margin-left:1%;
            }
            #para-1 {
                text-align: justify;
            }
            #para-2 {
                margin-top:20px;
                text-align: justify;
            }
            .btn {
                margin-top:20px;
                margin-left:30%;
            }
        }
    </style>

</head>

<body>
    <div class="container col-md-12">
            <nav class="navbar navbar-inverse col-md-12">
                <div class="container-fluid" style="margin-top:2%;">
                    <div class="navbar-brand text-white" style="position: relative; left: 7%; font-family: 'Open Sans', sans-serif;">
                           <img src="{{ asset('img/logo.png') }}" alt="BenZee Residency" id="logo"> 
                    </div>
                    <div class="text-white nav navbar-nav navbar-right">
                        <a class="text-light active" href="#home" id="nav" >HOME</a>
                        <a class="text-light" href="#about" id="nav">GALLERY</a>
                        <a class="text-light" href="#contact" id="nav">CONTACT</a>
                        @if (Route::has('login'))
                            @auth
                                <a class="text-light btn" id="auth-btn" href="{{ url('/home') }}">Home</a>
                            @else
                                <a class="text-light btn" id="auth-btn" href="{{ route('login') }}">Login</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>

        <div class="container">
            <div class="row col-md-12 justify-content-center">
                <h2 class="text-light" id="callout">A Home away from Home</h2>
                <hr class="bg-danger" style="height: 7px; width: 50%; margin-left: 25%; border-radius: 10px; border: none;">
            </div>

            @include('includes.flash')

            <form action="{{ route('request.store') }}" method="POST" style="margin-top:3%; border:2px solid #ffffff; padding:20px;">
                    @csrf
                    <div class="form-group form-inline">
                        <input id="request-form-inputs" class="form-control col-md-4 col-xs-3 col-sm-4 text-light{{ $errors->has('fullname') ? ' is-invalid' : '' }}" 
                            type="text" name="fullname" value="{{ old('fullname') }}" placeholder="Full Name" required>
                        @if ($errors->has('fullname'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                        @endif

                        <input id="request-form-inputs" class="form-control col-md-3 col-xs-3 col-sm-4 text-light{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        
                        <input id="request-form-inputs" class="form-control col-md-2 col-xs-2 col-sm-2 text-light{{ $errors->has('telephone') ? ' is-invalid' : '' }}" 
                            type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="Tel: +233xxxxxxxxxx" required>
                        @if ($errors->has('telephone'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif

                        <input id="request-form-inputs" class="form-control col-md-3 col-xs-2 col-sm-2 text-light{{ $errors->has('nationality') ? ' is-invalid' : '' }}" 
                            type="text" name="nationality" value="{{ old('nationality') }}" placeholder="Nationality" required>
                        @if ($errors->has('nationality'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nationality') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group form-inline">
                        <input id="request-form-inputs" class="form-control col-md-4 col-xs-2 col-sm-3 text-light{{ $errors->has('institution') ? ' is-invalid' : '' }}" 
                            type="text" name="institution" value="{{ old('institution') }}" placeholder="Institution" required>
                        @if ($errors->has('institution'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('institution') }}</strong>
                            </span>
                        @endif

                        <select id="request-form-inputs{{ $errors->has('level') ? ' is-invalid' : '' }}" style="height:46px;" class="form-control col-md-2 col-xs-2 col-sm-3 text-light" 
                                name="level" required>
                            <option readonly style="text-dark">Level</option>
                            <option value="1st year" class="text-dark">1st year</option>
                            <option value="2nd Year" class="text-dark">2nd Year</option>
                            <option value="3rd Year" class="text-dark">3rd Year</option>
                            <option value="4th Year" class="text-dark">4th Year</option>
                        </select>
                        <select id="request-form-inputs" style="height:46px;" class="form-control col-md-3 col-xs-2 col-sm-3 text-light{{ $errors->has('occupancy_type') ? ' is-invalid' : '' }}" 
                                name="occupancy_type" required>
                            <option readonly class="text-dark">Occupancy Type</option>
                            <option value="Single Room" class="text-dark">Single Room</option>
                            <option value="Single Room with AirCondition" class="text-dark">Single Room with AirCondition</option>
                            <option value="Double Room" class="text-dark">Double Room</option>
                            <option value="Double Room with AirCondition" class="text-dark">Double Room with AirCondition</option>
                            <option value="Special Room" class="text-dark">Special Room</option>
                            <option value="Special Room with AirCondition" class="text-dark">Special Room with AirCondition</option>
                            <option value="Special Double Room" class="text-dark">Special Double Room</option>
                        </select>                          
                        <select id="request-form-inputs"style="height:46px;" class="form-control col-md-3 col-xs-2 col-sm-3 text-light{{ $errors->has('duration') ? ' is-invalid' : '' }}" 
                                name="duration" required>
                            <option readonly class="text-dark">Duration</option>
                            <option value="9 months" class="text-dark">9 months</option>
                            <option value="12 months" class="text-dark">12 months</option>
                        </select>
                    </div>
                    <input class="form-control bg-danger text-light btn col-md-4 col-12" type="submit" value="Request Accomodation" name="request" id="request" 
                        style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);border: none">
            </form>
            
            <div class="text-light messsage" style="margin-top:15%">
                <h2 style="font-family: 'Roboto', sans-serif; font-size: 30px;font-weight:bold;">Experience <span style="color:#F00034">Luxury</span> and <span style="color:#F00034">Comfortability</span></h2>
                <br>
                <div class="row col-md-12 col-sm-12" style="font-size: 16px;font-weight:bold;">
                    <div class="col-md-6 col-sm-12" id="para-1">
                        BenZee Residency is about 20 min drive from the International Airport and 10-15 mins from two shopping malls. Within 3 mins walk away from the hostel, taxis are available, with the occasional buses(trotro) passing by.
                    </div>
                    <div class="col-md-6 col-sm-12" id="para-2">
                        Resturants are also available in the hostel and around the Vicinity, 5 mins drive away, however there is a semi furnished kitchen available on site.Parking is available within the walls of hostel. 
                    </div>
                </div>
            </div>


        </div>
 
    </div>
</body>

</html>
