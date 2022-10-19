<?php

namespace App\Http\Controllers;

use App\Models\events;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class event_controller extends Controller
{
    function __construct() //This function is to restrict actions based on roles 
    {
         $this->middleware('permission:event-list|event-create|event-edit|event-delete', ['only' => ['index','store']]);
         $this->middleware('permission:event-create', ['only' => ['create','store']]);
         $this->middleware('permission:event-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:event-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('event.events',[
            'events' => events::orderby('updated_at','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('event.createvent');
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
            'name' => 'required',
            
        ]);
     
        events::create([
            'eventId' => Str::uuid(),
            'name' => $request->name,
            'type' => $request->type,
            'date_time' => $request->date_time,
            'venue' => $request->venue,
            'pic' => $request->pic,
            
   
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
            'name' => $request->name,
            'type' => $request->type,
            'date_time' => $request->date_time,
            'venue' => $request->venue,
            'pic' => $request->pic,
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
