<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\events;
use Illuminate\Http\Request;
use App\Models\member_profile;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $events=events::get();
        return view('home',compact('events'));
    }
}
