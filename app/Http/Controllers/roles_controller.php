<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Models\member_profile;
use App\Models\volunteer_type;
use Illuminate\Http\Request;

class roles_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Show Volunteer Type|Create Volunteer Type|Edit Volunteer Type|Delete Volunteer Type', ['only' => ['index','store']]);
         $this->middleware('permission:Create Volunteer Type', ['only' => ['create','store']]);
         $this->middleware('permission:Edit Volunteer Type', ['only' => ['edit','update']]);
         $this->middleware('permission:Delete Volunteer Type    ', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        
        $vroles = roles::get();
        return view('roles.roles',compact('vroles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('roles.createroles');
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
            'name' => 'required|unique:roles',
        ]);
    
        $input = $request->all();
        roles::create([
            'name' => $request->name,
        ]);
        
    
        return redirect()->route('roles.index')
                        ->with('success','New Type created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        

        $roles = roles::findOrFail($id);

        
        
        
        $assignedprofiles = volunteer_type::join("member_profiles","volunteer_type.profileId","=","member_profiles.profileId")
        ->where("volunteer_type.roles",$id)
        ->get();
        
        return view('roles.showroles',compact('roles','assignedprofiles'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('roles.editroles',[
            'edit_vroles' => roles::where('roleId',$id)->first(),
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
            'name' => 'required|unique:roles',
        ]);
    
        roles::where('roleId',$id)->update([
            'name' => $request->name,
        ]);

        return redirect(route('roles.index'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        roles::find($id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','User deleted successfully');
    }
}
