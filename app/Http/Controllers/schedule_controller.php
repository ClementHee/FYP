<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\events;
use App\Models\schedule;
use Carbon\CarbonPeriod;
use App\Models\event_roles;
use App\Models\event_types;
use Illuminate\Http\Request;
use App\Models\member_profile;
use App\Models\volunteer_type;
use App\Models\not_availabletime;
use Illuminate\Support\Facades\DB;
use PDF;

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
                    'eventId' => $request -> eventId,
                    'eventdate' => $request -> date[$y],
                    'roles' => $request -> roles[$i],
                    'profileId' => $request -> volunteers[$key]
                ];
                DB::table('schedules')->insert($insert);
                $i+=1;
                if($i==count($request->roles)){
                    $i=0;
                    $y+=1;
                }
            
        }
       return redirect()->route('event.index')
        ->with('success','Schedule created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        $dates = schedule::groupBy('eventdate')->where('eventId',$id)->get('eventdate');
        $roleId = schedule::groupBy('roles')->where('eventId',$id)->get('roles');

        $rolesneeded=[];
        $schedule =  schedule::join("member_profiles","member_profiles.profileId","=","schedules.profileId")->where('eventId',$id)->orderBy('eventdate','ASC')->get();

        foreach($roleId as $r ){
           
            $rolesneeded[] = event_roles::join('roles','roles.roleId', '=','event_roles.roles')->where('event_roles.roles',$r->roles)->get();
    
        }

        return view('schedule.viewschedule',compact('dates','rolesneeded','schedule'));
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
        schedule::where('eventId',$id)->delete();
        return redirect()->route('event.index')
                        ->with('success','Schedule deleted successfully');
    }

    public function assignSchedule($id){
        
        $schedule = schedule::where('eventId',$id)->get();
        
        if (count($schedule)!=0){
            
            return redirect()->route('schedule.show',$id)->with('message','Schedule Exists');;
        }
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
        
        $dates=[];
        
        $x = Carbon::parse($eventdate[0]->start_datetime);
        if($eventtype=="Weekly Services"){
            $dates=[];
            $y = Carbon::parse($eventdate[0]->end_datetime)->endOfMonth();
            $count = floor(($x->diff($y)->days)/7);
            for($i = 1;  $i<=$count+1 ; $i++){
                $dates[]=$x->format('d F Y');
                $x=$x->addDays(7);
            }
        }elseif($eventtype=="Daily Services"){
            $dates=[];
            $y = Carbon::parse($eventdate[0]->end_datetime);    
            $count = floor(($x->diff($y)->days));
            for($i = 1;  $i<=$count+1 ; $i++){
                $dates[]=$x->format('d F Y');
                $x=$x->addDays(1);
            }
        }
        elseif($eventtype=="Monthly Services"){
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
        //date('d-m-Y', strtotime($user->from_date));
        $natime = not_availabletime::get();
 
        $ct=[];
        $pi=[];
        foreach ($natime as $nt){
      
            $ct[]= Carbon::parse($nt->na_time)->format('d F Y');
        }
      
        $same_date = array_intersect($dates,$ct);
        for($i=0;$i<count($same_date);$i++){
            $same_date[$i] = Carbon::parse($same_date[0])->format('Y-m-d');
        }
        $notavailblemembers = not_availabletime::where('na_time',$same_date)->get('profileId');
        foreach($notavailblemembers as $nm){
            $pi[]=$nm->profileId;
        }
        
        $allvolunteertype =  member_profile::join("volunteer_type","member_profiles.profileId","=","volunteer_type.profileId")
        
        ->get();
        $ntime =  member_profile::join("not_availabletime","member_profiles.profileId","=","not_availabletime.profileId")
        
        ->get();
        
   
        return view('schedule.generateschedule',compact('id','ntime','rolesneeded','eventtype','eventtypeId','dates','allvolunteertype'));
    }

   
}
