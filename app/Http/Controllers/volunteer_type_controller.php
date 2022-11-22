<?php

namespace App\Http\Controllers;
use DB;
use App\Models\roles;
use Illuminate\Http\Request;
use App\Models\member_profile;
use App\Models\volunteer_type;
use App\Http\Controllers\Controller;

class volunteer_type_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view ('roles.roles',[
            'vroles' => roles::get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alltypes = roles::get();
        return view('volunteertype.assigntype',compact('alltypes'));
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
                'profileId' =>json_decode($request ->profileId)->profileId,
                'roles' => $request -> types[$key]
            ];
            DB::table('volunteer_type')->insert($insert);
        }
        $profiles = member_profile::orderBy('profileId','ASC')->paginate(10);

        return redirect()->route('profile.index');


    }
    public function show($id)
    {
        return redirect()->route('profile.show',$id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $profileId=$id;

        $volunteer_type = DB::table("volunteer_type")->where("volunteer_type.profileId",$id)
            ->pluck('volunteer_type.roles','volunteer_type.roles')
            ->all();


        $alltypes = roles::all();

        return view('volunteertype.edittype',compact('profileId','alltypes','volunteer_type'));
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

        $vprofile = volunteer_type::where('profileId',$id)->get();

        if(count($vprofile)==0){

            foreach ($request->types as $key=>$name){
                $insert = [
                    'profileId' =>$id,
                    'roles' => $request -> types[$key]
                ];

                DB::table('volunteer_type')->insert($insert);

            }

        }
        else{
        foreach($vprofile as $row){
            if($request->types!=null){
                volunteer_type::where('profileId',$id)->delete();
                foreach ($request->types as $key=>$name){
                    if(!$row->roles==$request -> types[$key] ){
                        $insert = [
                            'profileId' =>$id,
                            'roles' => $request -> types[$key]
                        ];
                        DB::table('volunteer_type')->insert($insert);
                    }
                    else{
                        volunteer_type::where('profileId','=',$id)->where('roles',$request -> types[$key])->delete();
                        $insert = [
                            'profileId' =>$id,
                            'roles' => $request -> types[$key]
                        ];
                        DB::table('volunteer_type')->insert($insert);
                    }
                }
            }
            else{
                volunteer_type::where('profileId','=',$id)->delete();
            }
        }
    }


        return redirect()->route('profile.show',$id);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("volunteer_type")->where('profileId',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
