<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\events;
use Carbon\CarbonPeriod;
use App\Models\event_roles;
use App\Models\event_types;
use Illuminate\Http\Request;
use App\Models\member_profile;
use App\Models\volunteer_type;
use Illuminate\Support\Facades\DB;

class schedule_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $y=0;
        $i=0;
       
            foreach ($request->volunteers as $key=>$name){
           
                    $insert=[
                        'eventId' => $request -> xsadsa,
                        'eventdate' => $request -> date[$y],
                        'roles' => $request -> roles[$i],
                        'profileId' => $request -> volunteers[$key]
                    ];
                DB::table('schedules')->insert($insert);
                $i+=1;
                if($i==8){
                    $i=0;
                    $y+=1;
                }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignSchedule($id){
        $eventtypeId = events::join("event_types","events.eventtype","=","event_types.name")
        ->where("events.eventId",$id)
        ->get('eventtypeId');
         
        $eventtypeId = json_decode($eventtypeId);
        $eventtypeId = $eventtypeId[0]->eventtypeId;
        $rolesneeded = event_roles::join('roles','roles.roleId', '=','event_roles.roles')
        ->where('eventtypeId',$eventtypeId)
        ->get();

        $eventtype = event_types::where('eventtypeId',$eventtypeId)->get('name');
        $eventtype = json_decode($eventtype);
        $eventtype = $eventtype[0]->name;

        $eventdate = events::where('eventId',$id)->get();      
        
        
        $x = Carbon::parse($eventdate[0]->start_datetime);
        if($eventtype=="Weekly Services"){
            $dates=[];
            $y = Carbon::parse($eventdate[0]->end_datetime)->endOfMonth();
            $count = floor(($x->diff($y)->days)/7);
            for($i = 1;  $i<=$count+1 ; $i++){
                $dates[]=$x->format('d F Y');
                $x=$x->addDays(7);
            }
        }else{
            $dates[]=$x->format('d F Y');
        }
        $allvolunteertype =  member_profile::join("volunteer_type","member_profiles.profileId","=","volunteer_type.profileId")
        ->get();
  
        return view('schedule.generateschedule',compact('id','rolesneeded','eventtype','eventtypeId','dates','allvolunteertype'));
    }
}
