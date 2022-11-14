<?php
    
namespace App\Http\Controllers;
use DB;
use App\Models\roles;
use App\Models\events;
use App\Models\event_roles;
use App\Models\event_types;
use Illuminate\Http\Request;
use App\Models\volunteer_type;
use App\Http\Controllers\Controller;
    
class event_types_controller extends Controller
{

    function __construct() //This function is to restrict actions based on roles
    {
         $this->middleware('permission:Show Event Types|Create Event Types|Edit Event Types|Delete Event Types', ['only' => ['index','store']]);
         $this->middleware('permission:Create Event Types', ['only' => ['create','store']]);
         $this->middleware('permission:Edit Event Types', ['only' => ['edit','update']]);
         $this->middleware('permission:Delete Event Types', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        
        $eventtypes = event_types::orderby('name','asc')->paginate(5);
        return view('eventtype.eventtypes',compact('eventtypes'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        return view ('eventtype.createtype');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:event_types',
        ]);
    
        $input = $request->all();
        event_types::create([
            'name' => ucwords($request->name),
        ]);
        
        return view ('eventtype.assigntype',[
            'eventtypeId' => event_types::where('name',$request->name)->get('eventtypeId')->first(),
            
            'vroles' => roles::get()
            
        ]);
        
    

    }
    public function show($id)
    {
        $eventtypes = event_types::findOrFail($id);
       
        $rolesneeded = roles::join("event_roles","event_roles.roles","=","roles.roleId")
        ->where("event_roles.eventtypeId",$id)
        ->get();
        
        $assignedevents = events::where('eventtype',$eventtypes->name)->get();
        
        return view('eventtype.showtypes',compact('eventtypes','assignedevents','rolesneeded'));
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   
    {
       return view ('eventtype.edittype',[
            'edit_type' => event_types::where('eventtypeId',$id)->first(),
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
        
        $this->validate($request, [
            'name' => 'required|unique:event_types',
        ]);
    
        event_types::where('eventtypeId',$id)->update([
            'name' => $request->name,
        ]);

        return redirect(route('eventtypes.index'));
    }
        
        
       
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        event_types::find($id)->delete();
        return redirect()->route('eventtypes.index')
                        ->with('success','User deleted successfully');
    }
}