<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\events;
class CalenderController extends Controller
{
    public function index(Request $request)
    {
         
        if($request->ajax()) {  
            $data = events::whereDate('start_datetime', '>=', $request->start)
                ->whereDate('end_datetime',   '<=', $request->end)
                ->get(['id', 'name', 'start_datetime', 'end_datetime']);
            
            return response()->json($data);
        }
        return view('welcome');
    }
 
    public function calendarEvents(Request $request)
    {
 
        switch ($request->type) {
           case 'create':
              $event = events::create([
                'eventId' => Str::uuid(),
                'name' => $request->name,
                'start_datetime' => $request->start_datetime,
                'end_datetime' => $request->end_datetime,
                'venue' => $request->venue,
                'pic' => $request->pic,
                'eventtype' => $request->eventtype,
              ]);
 
              return response()->json($event);
             break;
  
           case 'edit':
              $event = events::where('eventId',$id)->update([
    
                'name' => $request->name,

                'start_datetime' => $request->start_datetime,
                'end_datetime' => $request->end_datetime,
                'venue' => $request->venue,
                'pic' => $request->pic,
                'eventtype' => $request->eventtype,
    
            ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = events::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # ...
             break;
        }
    }
}