<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\congregation;
use Illuminate\Http\Request;
use App\Models\member_profile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class profile_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('profile.profiles',[
            'profiles' => member_profile::orderby('updated_at','desc')->get(),
            'congregations' => congregation::get()
        ]);
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
     
        member_profile::create([
            'profileId' => Str::uuid(),
            'name' => $request->name,
            'phone' => $request->phone,
            'handphoneNo' => $request->handphoneNo,
            'email' => $request->email,
            'address' => $request->address,
            'congregation' => $request->congregation,
            'is_volunteer' => $request->is_volunteer==='on',
            'is_staff' => $request->is_staff==='on',
            'gender' => $request->gender,
            'designation' => $request->designation,
   
        ]);
        return redirect(route('profile.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($profileId)
    {
        return view('profile.showprofile',[
            'profile'=>member_profile::findOrFail($profileId)
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
            'is_volunteer' => $request->is_volunteer==='on',
            'is_staff' => $request->is_staff==='on',
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
        return redirect (route('profile.index'))->with('message', 'Profile Deleted');
    }
}
