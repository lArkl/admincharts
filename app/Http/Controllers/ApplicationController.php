<?php

namespace App\Http\Controllers;

use App\Application;
use App\Workshop;
use App\User;
use App\PersonalInformation;
use Illuminate\Http\Request;
use DB;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//Request $request)
    {
        /*
        $search_entry = $request -> search_entry;
        if ($search_entry != NULL OR $search_entry != '')
        {
            $search_values = preg_split('/\s+/', $search_entry, -1, PREG_SPLIT_NO_EMPTY);
            $users = User::where(function($query) use($search_values) {
                foreach ($search_values as $value) {
                    $query -> orWhere('first_name', 'like', "%{$value}%")
                        ->orWhere('first_surname', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%")
                    ->orWhere('document', 'like', "%{$value}%");
                }
            })-> paginate(8)->unique('document_number') ;
            $search_placeholder = 'Results for '.$search_entry;
            return view('applications.index') -> with('applications', $applications) -> with('search_placeholder', $search_placeholder);
        } else
        {
            */
            $users = User::all();//::paginate(8)->all();
            //->unique('document_number');
            return view('applications.index') -> with('users', $users);
        //}
    }

    public function dashboard(Request $request)
    {
        $nApps = Application::whereMonth('application_date',date('m'))->count();
        $nWork = Workshop::where('state_id',1)->count();
        $nWorkP = Workshop::where('state_id',2)->count();
        $nStatus=Application::where('state_id',8)->count();
        return view('home')->with('nApps',$nApps)->with('nWork',$nWork)->with('nStatus',$nStatus)->with('nWorkP',$nWorkP);
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
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$application = new Application();
        $application->application_date //=;
        $application->application_time //=;
        $application->user_id //=
        $application->workshop_id //= $request->workshop_name;
        $application->state->id =8;
        $application->save();
        return redirect()->action('ApplicantController@index');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($document)
    {
        
        $info = PersonalInformation::where('document_number', $document)->first();
        $applications = Application::where('user_id',$info->user_id)->get();
        return view('applications.show') -> with('applications', $applications)->with('user',$info);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $found_application = Application::where('id', $application->id)->first();
        return view('applications.edit')->with('applicant', $found_application);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $applicant)
    {
        $found_applicant = Application::find($applicant->id);
        //$found_applicantn->user_id =
        $found_applicantion->workshop_id = $request->workshop_id;
        $found_applicant->save();
        return redirect()->action('ApplicationController@index');
    }

    public function postApprove($id) {
        $application = Application::where('id', $id)->first();
        if($application)
        {
            $application->state_id =7; //approved state_id
            $application->save();
            return redirect()->back();
        }
    }

    public function postReject($id) {
        $application = Application::where('id', $id)->first();
        if($application)
        {
            $application->state_id =9;//rejected state_id
            $application->save();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $document = $application->user->personal_information->document_number;
        Application::destroy($application->id);
        $info = PersonalInformation::where('document_number', $document)->first()->user_id;
        $applications = Application::where('user_id',$info)->get();
        if($applications){
            return redirect()->back();
            //return view('applicants.show') -> with('applicants', $applications);
        }
        else{
            return redirect()->action('ApplicantController@index');
        }
    }
}
