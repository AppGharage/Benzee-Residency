
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
                <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Add New Room</h6>
                <small style="color:#ffffff;font-weight:bold;">Fill and Submit Form with ID: {{ $room->id}} </small>
                </div>
            </div>

            
           
    
       <form method="post" action="{{ url('room') }}">
       @csrf
           <div class="row justify-content-md-center">
               <div class="my-3 p-3 bg-white rounded col-md-8" style=" margin-left:20px; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                   <div class="card-body" style="font-weight:bold;">
                       <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;">New Room</h6>
       
                       <div class="container">
                           <div class="form-row" style="margin-top:10px;">
                               <div class="col-md-12">
                                   <label for="title">Room Number</label>
                                   <input type="text" class="form-control" id="title" value="{{ $room->room_number }}">
                               </div>
                           </div>
                           <div class="form-row" style="margin-top:20px;">
                               <div class="col-md-6">
                                   <label for="category">Occupancy Type</label>
                                   <input type="text" class="form-control" id="status" value="{{ $room->occupancy_type  }}" >
                               </div>
       
                               <div class="col-md-6">
                                   <label for="category">Capacity</label>
                                   <input type="text" class="form-control" id="opened" value="{{ $room->capacity}}" >
                               </div>
                           </div>
                           <br>
                           <button class="btn btn-outline-primary" type="submit">Submit</button
                        </div>
                               
                           </div>
                       </div>
                   </div>
               </div>
       </form>
           </div>
                    </div>
                </div>

            </div>

            
               

        </div>
    </div>
</div>
@endsection
