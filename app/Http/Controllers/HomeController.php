<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
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
       
    
      $calendar_events = array();
      $allevents =  events::all();

      $dates=[];
      foreach ($allevents as $aevent){
        $dates=[];
        $x = Carbon::parse($aevent->start_datetime);
        if($aevent->eventtype=="Weekly Services"){

            $y = Carbon::parse($aevent->end_datetime)->endOfMonth();
            $count = floor(($x->diff($y)->days)/7);
            for($i = 1;  $i<=$count+1 ; $i++){
                $dates[]=$x->format('d F Y');
                $x=$x->addDays(7);
            }
        }elseif($aevent->eventtype=="Daily Services"){
            $calendar_events [] = [
                
                'title' => $aevent->name,
                 
                'start' => $aevent->start_datetime,
        
                'end' => $aevent->end_datetime
            ];
            return view('home',compact('events','calendar_events'));
        }
        elseif($aevent->eventtype=="Monthly Services"){
            $dates=[];
            $y = Carbon::parse($eventdate[0]->end_datetime)->endOfMonth();
            $count = floor(($x->diff($y)->days)/30);
            for($i = 1;  $i<=$count+1 ; $i++){
                $dates[]=$x->format('d F Y');
                $x=$x->addMonth();
            }
        }else{
            $dates[]=$x->format('d F Y');
        }
   
        for($i=0;$i<count($dates);$i++){
            $calendar_events [] = [
                
                'title' => $aevent->name,
                 
                'start' => date('Y-m-d',strtotime($dates[$i])),
        
                'end' => date('Y-m-d',strtotime($dates[$i]))
            ];
        }
        
      }

    return view('home',compact('events','calendar_events'));
    }

}