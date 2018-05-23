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
        $requests = AccommodationRequest::take(5)->get();

        return view('home', compact('requests'));
    }

    public function manage()
    {
        //
        $requests = AccommodationRequest::paginate(15);
        
        return view('admin.manage', compact('requests'));
    }
}
