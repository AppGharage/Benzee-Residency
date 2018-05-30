@extends('layouts.app') 
 
@section('styleshet')
    <style>
      
    </style>
@endsection

@section('content')
<div class="container col-md-6">
      <div class="py-4 text-center">
        <h2>BenZee Residency - Checkout Form</h2>
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

          <form class="mb-3 ">
              <div class="mb-3">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" placeholder="Samuel Owusu">
            </div>

            <div class="mb-3">
                <label for="name">Email</label>
                <input type="email" class="form-control" >
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" >
            </div>

            <div class="mb-3">
              <label for="email">Telephone</label>
              <input type="email" class="form-control">
            </div>

            <div class="mb-3">
              <label for="email">Secondary Contact</label>
              <input type="text" class="form-control">
            </div>

            <div class="mb-3">
              <label for="email">Nationality</label>
              <input type="text" class="form-control">
            </div>

            <div class="mb-3">
              <label for="email">Institution</label>
              <input type="text" class="form-control" >
            </div>

            <div class="mb-3">
              <label for="email">Level</label>
              <select>
                <option>100</option>
                <option>200</option>
                <option>300</option>
                <option>400</option>
              </select>
            </div>

            <br>
            <h4 class="mb-3 text-muted">Accommodation Details</h4>
            <hr>

            <div class="mb-3">
              <label for="email">Residency Type</label>
              <select>
                <option>Student</option>
                <option>Non-Student</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="email">Duration</label>
              <input type="email" class="form-control">
            </div>

            <div class="mb-3">
              <label for="email">Repoting Date</label>
              <input type="date" class="form-control">
            </div>

            <div class="mb-3">
              <label for="email">Room Number</label>
              <input type="number" class="form-control">
            </div>

            <div class="mb-3">
              <label for="email">Room Capacity</label>
              <select>
                <option>1 in a room</option>
                <option>2 in a room</option>
                <option>Team</option>
                <option>Other</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="email">Payment Expiration Date</label>
              <input type="date" class="form-control">
            </div>

             <div class="mb-3">
              <label for="email">Rent Expiration Date</label>
              <input type="date" class="form-control">
            </div>

             <div class="mb-3">
              <label for="email">Amount to be paid</label>
              <input type="text" class="form-control">
            </div>

             <div class="mb-3">
              <label for="email">Service Charge</label>
              <input type="text" class="form-control">
            </div>

            <div class="mb-3">
              <label for="text">Rent Fee</label>
              <input type="textl" class="form-control">
            </div>

            <br>
            <h4 class="mb-3 text-muted">Payment Details</h4>
            <hr class="mb-4">
            
            <div class="row">
              <div class="col-md-8 mb-3">
                <label for="cc-name">Mobile Money Network</label>
                <select class="form-control" required>
                    <option readonly class="text-dark">Network Operator</option>
                    <option value="Single Room" class="text-dark">MTN (Ghana only)</option>
                    <option value="Single Room with AirCondition" class="text-dark">Airtel Tigo (Ghana only)</option>
                </select>  
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on MoMo Account</label>
                <input type="text" class="form-control" placeholder="Samuel Owusu" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">MoMo Account Number</label>
                <input type="text" class="form-control" placeholder="0244565478" required>
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay</button>
          </form>
        </div>
      </div>

    @endsection