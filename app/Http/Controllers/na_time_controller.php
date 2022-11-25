<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\not_availabletime;

class na_time_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'profileId' => 'required',
            'na_time' => 'required'
            
        ]);

        not_availabletime::create([
            'profileId' => $request->profileId,
            'na_time' => $request->na_time

        ]);
        return redirect(route('profile.show',$request->profileId));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$time)
    { 
        return view ('notavailtime.editnatime',[
           
            'edit_natime' => not_availabletime::where('profileId',$id)->whereDate('na_time',$time)->first(),
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$time)

    
    {
    
        $request->validate([
            
            'na_time' => 'required'
            
        ]);
        not_availabletime::where('profileId',$id)->whereDate('na_time',$time)->update([
    
            
            'na_time' => $request->na_time
            
        ]);

        return redirect(route('profile.show',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$time)
    {
       
        not_availabletime::where('profileId',$id)->where('na_time',$time)->delete();
        return redirect(route('profile.show',$id));
    }
}
