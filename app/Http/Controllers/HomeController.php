<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Request as AccommodationRequest;

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
        $requests = AccommodationRequest::where('is_closed', 0)->latest()->take(5)->get();

        return view('home', compact('requests'));
    }

    public function manage()
    {
        //
        $requests = AccommodationRequest::where('is_closed', 0)->latest()->paginate(15);
        
        return view('manage.index', compact('requests'));
    }
}
