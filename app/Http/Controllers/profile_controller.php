<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\roles;
use Illuminate\Support\Str;
use App\Models\congregation;
use Illuminate\Http\Request;
use App\Models\member_profile;
use App\Models\volunteer_type;
use App\Models\not_availabletime;
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
         $this->middleware('permission:Show Profile|Create Profile|Edit Profile|Delete Profile', ['only' => ['index','show','showsingle']]);
         $this->middleware('permission:Create Profile', ['only' => ['create','store']]);
         $this->middleware('permission:Edit Profile', ['only' => ['edit','update']]);
         $this->middleware('permission:Delete Profile', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $profiles = member_profile::orderBy('created_at','ASC')->paginate(5);
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
            'name' => ucwords($request->name),
            'phone' => $request->phone,
            'handphoneNo' => $request->handphoneNo,
            'email' => $request->email,
            'address' => $request->address,
            'congregation' => $request->congregation,
            'gender' => $request->gender,
            'designation' => $request->designation,

        ]);

        return view ('volunteertype.assigntype',[
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
    public function show($id)
    {
        $allocatedtypes = roles::join("volunteer_type","volunteer_type.roles","=","roles.roleId")
            ->where("volunteer_type.profileId",$id)
            ->get();
        
        $profile = member_profile::findOrFail($id);
        $not_availtime = not_availabletime::where('profileId',$id)->get();
        return view('profile.showprofile',compact('profile','allocatedtypes','not_availtime'));
        
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
            'name' => ucwords($request->name),
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

    public function showsingle($email)
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
    $not_availtime = not_availabletime::where('profileId',$profileId)->get();
       
    return view('profile.showprofile',compact('profile','allocatedtypes','not_availtime'));
    
        
    }

    public function create_na($id)
    {
        $profileId = $id;
        return view('notavailtime.setnatime',compact('profileId'));
    }



}
