<?php

namespace App\Http\Controllers;

use App\Models\events;

use Illuminate\Support\Str;
use App\Models\event_types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class event_controller extends Controller
{
    
    function __construct() //This function is to restrict actions based on roles
    {
         $this->middleware('permission:Show Event|Create Event|Edit Event|Delete Event', ['only' => ['index','store']]);
         $this->middleware('permission:Create Event', ['only' => ['create','store']]);
         $this->middleware('permission:Edit Event', ['only' => ['edit','update']]);
         $this->middleware('permission:Delete Event', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = events::orderby('updated_at','desc')->paginate (5);
        return view ('event.events',compact('events'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('event.createvent',[
            'eventtypes' => event_types::get()
        ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:events',
            
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'venue' => 'required',
            'pic' => 'required',
            'eventtype' => 'required',
            
        ]);

        events::create([
            'eventId' => Str::uuid(),
            'name' => $request->name,
            
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'venue' => $request->venue,
            'pic' => $request->pic,
            'eventtype' => $request->eventtype,


        ]);
        return redirect(route('event.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('event.showevent',[
            'event'=>events::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('event.editevent',[
            'edit_event' => events::where('eventId',$id)->first(),

        ]);
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
        events::where('eventId',$id)->update([
    
            'name' => $request->name,
            
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'venue' => $request->venue,
            'pic' => $request->pic,
            'eventtype' => $request->eventtype,

        ]);

        return redirect(route('event.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        events::destroy($id);
        return redirect (route('event.index'))->with('message', 'Event Deleted');
    }
}
