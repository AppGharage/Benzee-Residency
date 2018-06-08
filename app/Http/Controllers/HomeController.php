<?php

namespace BenZee\Http\Controllers;

use BenZee\User;
use BenZee\Room;
use BenZee\Booking;
use Illuminate\Http\Request;
use BenZee\Request as AccommodationRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = AccommodationRequest::where('is_closed', 0)
                                            ->latest()
                                                ->take(5)
                                                    ->get();

        $allRequests = AccommodationRequest::where('is_closed', 0)->get();

        $bookings = Booking::latest()
                                ->take(5)->get();

        return view('home', compact('requests', 'allRequests', 'bookings'));
    }

    public function manage()
    {
        //
        $requests = AccommodationRequest::where('is_closed', 0)
                                            ->latest()
                                                ->paginate(15);

        $bookings = Booking::where('fee_is_paid', 0)
                                ->orderBy('is_paid', 'dsc')
                                    ->orderBy('has_fee_request', 'asc')
                                        ->latest()
                                            ->paginate(15);

        $rooms = Room::get();

        return view('manage.index', compact('requests', 'bookings', 'rooms'));
    }

}
