<?php

namespace App\Http\Controllers;
use App\Workshop;
use App\Application;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshop::orWhere('state_id',2)->orWhere('state_id',3)->get();
        return view('workshops.index') -> with('workshops', $workshops);
    }

    public function list()
    {
        $workshops = Workshop::orWhere('state_id',1)->get();
        return view('workshops.index') -> with('workshops', $workshops);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applications = Application::where('workshop_id',$id)->get();
        $workshop = Workshop::where('id',$id)->first();
        return view('workshops.show') -> with('applications', $applications)
        ->with('workshop',$workshop);
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

    public function postApprove($id) {
        $workshop = Workshop::where('id', $id)->first();
        if($workshop)
        {
            $workshop->state_id =1; //approved state_id
            $workshop->save();
            return redirect()->back();
        }
    }

    public function postReject($id) {
        $workshop = Workshop::where('id', $id)->first();
        if($workshop)
        {
            $workshop->state_id =3; //approved state_id
            $workshop->save();
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshop $workshop)
    {
        $id = $workshop->id;
        Workshop::destroy($workshop->id);
        $workshops = Workshop::where('id',$id)->get();
        if($workshops){
            return redirect()->back();
            //return view('applicants.show') -> with('applicants', $applications);
        }
        else{
            return redirect()->action('WorkshopController@index');
        }
    }
}
