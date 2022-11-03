<?php
    
namespace App\Http\Controllers;
use DB;
use App\Models\roles;
use Illuminate\Http\Request;
use App\Models\member_profile;
use App\Models\volunteer_type;
use App\Models\event_types;
use App\Models\event_roles;
use App\Http\Controllers\Controller;
    
class event_type_roles_controller extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alltypes = roles::get();
        return view('eventtype.assigntype',compact('alltypes'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        foreach ($request->types as $key=>$name){
           
            $insert = [
                'eventtypeId' =>json_decode($request ->eventtypeId)->eventtypeId,
                'roles' => $request -> types[$key]
            ];
            DB::table('event_roles')->insert($insert);
        }
        $eventtypes = event_types::orderBy('eventtypeId','ASC')->paginate(5);
        
        return view('eventtype.eventtypes',compact('eventtypes'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   
    {

        $eventtypeId=$id;
        
        $eventtype = DB::table("event_roles")->where("event_types_roles.eventtypeId",$id)
            ->pluck('event_types_roles.roles_needed','event_types_roles.roles_needed')
            ->all();
        
        
        $alltypes = roles::all();
       
        return view('eventtype.editeventroles',compact('eventtypeId','alltypes','volunteer_type'));
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
        
        $veventtype = event_roles::where('eventtypeId',$id)->get();
        
        if(count($veventtype)==0){
            
            foreach ($request->types as $key=>$name){
                $insert = [
                    'eventtypeId' =>$id,
                    'roles' => $request -> types[$key]  
                ];
                    
                DB::table('event_roles')->insert($insert); 
                
            }
            
        }
        else{
        foreach($veventtype as $row){
            if($request->types!=null){
                foreach ($request->types as $key=>$name){
                    if(!$row->roles==$request -> types[$key] ){
                        $insert = [
                            'eventtypeId' =>$id,
                            'roles' => $request -> types[$key]  
                        ];
                        DB::table('event_roles')->insert($insert); 
                    }
                    else{
                        event_roles::where('eventtypeId','=',$id)->where('roles',$request -> types[$key])->delete();  
                        $insert = [
                            'eventtypeId' =>$id,
                            'roles' => $request -> types[$key]  
                        ];
                        DB::table('event_roles')->insert($insert); 
                    }
                } 
            }
            else{
                event_roles::where('eventtypeId','=',$id)->delete();  
            }
        }
    }
        
        
        return redirect()->route('eventtypes.show',$id);
                        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("event_roles")->where('eventtypeId',$id)->delete();
        return redirect()->route('eventtypes.index')
                        ->with('success','Role deleted successfully');
    }
}