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
                    <h6 class="mb-0 lh-100" style="color:#ffffff;font-size:18px; font-weight:bold;">Payments</h6>
                    <small style="color:#ffffff;font-weight:bold;">View all Payments (Booking and Rent Fee)</small>
                </div>
            </div><br>

            <div class="">
                <div class=" my-3 p-3 bg-white rounded" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
                    <h6 class="pb-2 mb-0" style="color:#0B3BE9;font-size:18px; font-weight:bold;margin-top:30px;">All Payment </h6>
                    @if ($payments->isEmpty())
                        <p>Aww Snap! There are currently no Accomodation Requests.</p>
                    @else
                        <div class="media text-muted pt-3" style="font-size:16px;">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Ref. ID</th>
                                        <th>Narration</th>
                                        <th>Paid On</th>
                                    </tr>
                                </thead>
                                @foreach ($payments as $payment)
                                    <tbody>
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->payment_type }}</td>
                                            <td>{{ $payment->totalAmount() }}</td>
                                            <td>{{ $payment->ref_id }}</td>
                                            <td>{{ $payment->narration }}</td>
                                            @if($payment->created_at == null)
                                                <td>June 05, 2018</td>
                                            @else
                                                <td>{{ $payment->created_at->format('F d, Y') }}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        {{ $payments->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
