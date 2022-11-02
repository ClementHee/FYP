<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\roles;
use Illuminate\Support\Str;
use App\Models\congregation;
use Illuminate\Http\Request;
use App\Models\member_profile;
use App\Models\volunteer_type;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class profile_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:profile-list|profile-create|profile-edit|profile-delete', ['only' => ['index','show','showsingle']]);
         $this->middleware('permission:profile-create', ['only' => ['create','store']]);
         $this->middleware('permission:profile-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:profile-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $profiles = member_profile::orderBy('profileId','ASC')->paginate(5);
        $vtypes = volunteer_type::get();
        return view('profile.profiles',compact('profiles','vtypes'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('profile.createprofile',[
            'congregations' => congregation::get()
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
            'name' => 'required|unique:member_profiles',
            'handphoneNo' => 'required|unique:member_profiles',
            'email' => 'required|email',
            'address' => 'required',
        ]);
     
        $np = member_profile::create([
            'profileId' => Str::uuid(),
            'name' => $request->name,
            'phone' => $request->phone,
            'handphoneNo' => $request->handphoneNo,
            'email' => $request->email,
            'address' => $request->address,
            'congregation' => $request->congregation,
            'gender' => $request->gender,
            'designation' => $request->designation,

        ]);

        return view ('volunteertype.createtype',[
            'profile_id' => member_profile::where('email',$np->email)->get('profileId')->first(),
            'vroles' => roles::get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $allocatedtypes = roles::join("volunteer_type","volunteer_type.roles","=","roles.roleId")
            ->where("volunteer_type.profileId",$id)
            ->get();
        
        $profile = member_profile::findOrFail($id);
        
        return view('profile.showprofile',compact('profile','allocatedtypes'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('profile.editprofile',[
            'edit_profile' => member_profile::where('profileId',$id)->first(),
            'congregations' => congregation::get()

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
        member_profile::where('profileId',$id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'handphoneNo' => $request->handphoneNo,
            'email' => $request->email,
            'address' => $request->address,
            'congregation' => $request->congregation,
            'gender' => $request->gender,
            'designation' => $request->designation,
        ]);

        return redirect(route('profile.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        member_profile::destroy($id);
        DB::table("volunteer_type")->where('profileId',$id)->delete();
        return redirect (route('profile.index'))->with('message', 'Profile Deleted');
    }

    public function showsingle($id)
    {
        $createdprofile = member_profile::join('user_account','user_account.email','=','member_profiles.email')
        ->where('user_account.email',$email)
        ->get();
    
    if(count($createdprofile)==0){
        return view ('profile.createprofile',[
            'congregations' => congregation::get(),
            'email' => $email
        ]);
    }else{
        $profileId = $createdprofile[0]->profileId;
    }
    
    $allocatedtypes = roles::join("volunteer_type","volunteer_type.roles","=","roles.roleId")
        ->where("volunteer_type.profileId",$profileId)
        ->get();
    
    $profile = member_profile::findOrFail($profileId);
    
    return view('profile.showprofile',compact('profile','allocatedtypes'));
    
        
    }



}
