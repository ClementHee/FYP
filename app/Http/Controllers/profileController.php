<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\memberProfile;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('profile.index',[
            'profiles' => memberProfile::orderby('updated_at','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.createprofile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        memberProfile::create([
            'userId' => Str::uuid(),
            'name' => $request->name,
            'phone' => $request->phone,
            'handphoneNo' => $request->handphoneNo,
            'email' => $request->email,
            'address' => $request->address,
            'congregation' => $request->congregation,
            'isVolunteer' => $request->isVolunteer==='on',
            'isStaff' => $request->isStaff==='on',
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
    public function show($userId)
    {
        return view('profile.showprofile',[
            'profile'=>memberProfile::findOrFail($userId)
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
        //
    }
}
