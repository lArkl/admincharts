<?php

namespace App\Http\Controllers;

use App\Application;
use App\Workshop;
use Illuminate\Http\Request;
use DB;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_entry = $request -> search_entry;
        if ($search_entry != NULL OR $search_entry != '')
        {
            $search_values = preg_split('/\s+/', $search_entry, -1, PREG_SPLIT_NO_EMPTY);
            $applications = Application::where(function($query) use($search_values) {
                foreach ($search_values as $value) {
                    $query -> orWhere('first_name', 'like', "%{$value}%")
                        ->orWhere('first_surname', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%")
                    ->orWhere('document', 'like', "%{$value}%");
                }
            })-> paginate(8)->unique('document') ;
            $search_placeholder = 'Results for '.$search_entry;
            return view('applications.index') -> with('applications', $applications) -> with('search_placeholder', $search_placeholder);
        } else
        {
            $applications = Application::paginate(8)->unique('document');
            return view('applicationlist') -> with('applications', $applications);
        }
    }

    public function dashboard(Request $request)
    {
        $nApps = Application::all()->count();
        $nWork = Workshop::where('state_id',5)//->pluck('workshop_name')
        ->count();
        $nStatus=Application::where('state_id','pending')->count();
        return view('home')->with('nApps',$nApps)->with('nWork',$nWork)->with('nStatus',$nStatus);
    }

    public function data()
    {
        $labels=Application::groupBy('workshop_name')->pluck('workshop_name');
        $datacount=Application::all()->groupBy('workshop_name')->count();
        return view('mcharts')->with('datacount',$datacount)->with('labels',json_encode($labels));
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
        //
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
