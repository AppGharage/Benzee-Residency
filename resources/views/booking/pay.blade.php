@extends('layouts.app') 
 
@section('styleshet')
    <style>
      .container {max-width: 960px;}
      .border-top { border-top: 1px solid #e5e5e5; }
      .border-bottom { border-bottom: 1px solid #e5e5e5; }
      .border-top-gray { border-top-color: #adb5bd; }
      .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
      .lh-condensed { line-height: 1.25; }
    </style>
@endsection

@section('content')
<div class="container col-md-6">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('img/Group 2.png') }}" alt="" width="62" height="72">
        <h2>BenZee Residency - Booking Payment</h2>
        <p class="lead">
             I <b>{{ $booking->user->fullname }}</b> having expressed interest in the Residency hereby agrees
             to pay a <b>Non-Refunable Deposit (Booking Fee)</b> as stated below before <b>{{ $booking->end_date->format('F d, Y') }}</b> 
             to <b>Reserve a place in BenZee Residency</b> subject to <b>Full Payment of Rent (Hostel Fees) of $ {{ $booking->amount }}</b> 
             for a <b>Duration of {{ $booking->request->duration }}</b> 
        </p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Booking Details</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Accommodation Booking Fee</h6>
                <small class="text-muted">Fixed booking fee Charge </small>
              </div>
              <span class="text-muted"> &#x20B5; 200</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Service Charge</h6>
                <small class="text-muted">Withdrawal & other service Charges</small>
              </div>
              <span class="text-muted"> &#x20B5; 10</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (GHS)</span>
              <strong> &#x20B5; 210.00 </strong>
            </li>
          </ul>
        </div>

        <div class="col-md-8 order-md-1">
          <h4 class="mb-3 text-muted">Personal Information</h4>
          <hr>
          <form class="needs-validation" novalidate>
              <div class="mb-3">
                <label for="firstName">Fullname</label>
                <input type="text" class="form-control" value="{{ $booking->user->fullname }}" readonly>
            </div>

            <div class="mb-3">
                <label for="firstName">Nationality</label>
                <input type="text" class="form-control" value="{{ $booking->user->nationality }}" readonly>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" value="{{ $booking->user->email }}" readonly>
            </div>

            <div class="mb-3">
              <label for="email">Telephone</label>
              <input type="email" class="form-control" value="{{ $booking->user->telephone }}" readonly>
            </div>

            <div class="mb-3">
              <label for="email">Institution</label>
              <input type="email" class="form-control" value="{{ $booking->request->institution }}" readonly>
            </div>

            <div class="mb-3">
              <label for="email">Level</label>
              <input type="email" class="form-control" value="{{ $booking->request->level }}" readonly>
            </div>

            <br>
            <h4 class="mb-3 text-muted">Accommodation Details</h4>
            <hr>

            <div class="mb-3">
              <label for="email">Occupancy Type</label>                                   
              <input type="email" class="form-control" value="{{ $booking->request->occupancy_type }}" readonly>
            </div>
            <div class="mb-3">
              <label for="email">Duration</label>
              <input type="email" class="form-control" value="{{ $booking->request->duration }}" readonly>
            </div>
            <div class="mb-3">
              <label for="email">Rent Fee <small class="text-muted">Hostel Fee for Entire Duration (USD)</small></label>
              <input type="email" class="form-control" value="$ {{ $booking->amount }}" readonly>
            </div>

            <br>
            <h4 class="mb-3 text-muted">Payment Details</h4>
            <hr class="mb-4">


            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Pay with Mobile Money</label>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-8 mb-3">
                <label for="cc-name">Mobile Money Network</label>
                <select class="form-control" required>
                    <option readonly class="text-dark">Network Operator</option>
                    <option value="Single Room" class="text-dark">MTN (Ghana only)</option>
                    <option value="Single Room with AirCondition" class="text-dark">Airtel Tigo (Ghana only)</option>
                </select>  
                <small class="text-muted">Mobile Money account Operator Network</small>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on MoMo Account</label>
                <input type="text" class="form-control" placeholder="Samuel Owusu" required>
                <small class="text-muted">Full name as setup on mobile money account</small>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">MoMo Account Number</label>
                <input type="text" class="form-control" placeholder="0244565478" required>
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
          </form>
        </div>
      </div>

    @endsection