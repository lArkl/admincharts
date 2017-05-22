<?php

namespace App\Http\Controllers;
use App\Application;
use App\Workshop;
use Illuminate\Http\Request;
use Charts;
use DB;

class ChartsController extends Controller
{
    public function Applicationarea()
    {
        $applications = Application::orderBy('application_date','desc')->get();
        $chart = Charts::database($applications, 'area', 'highcharts')
        ->dateColumn('application_date')
        ->elementLabel("Applications")
        ->title('Applications per Month')
        //->dimensions(1000, 500)
        ->responsive(false)
        ->monthFormat('F Y')
        ->lastByMonth(13,true);
        return view('charts', ['chart' => $chart]);
    }

    public function Acumulado()
    {
        $chart = Charts::database(Application::all(), 'bar', 'highcharts')
        ->title('Applications per Month')
        ->dataset('Applications', Application::all())
        ->dataset('Total', $data->aggregateColumn('amount', 'sum'))
        ->responsive(false)
        ->monthFormat('F Y')
        ->lastByMonth(13,true);
        
    }

    public function Workshoppie()
    { 
        /*$applications = Application::all();
        $techs = collect([]);
        foreach($applications as $application){
            $techs ->put('technology',$application->workshop->technology);
        }
        $chart = Charts::database($techs, 'pie', 'highcharts')
        //->data(Workshop::where('state_id',1)->get())*/
        $applications = DB::table('applications')->join('workshops',function($join){
            $join->on('applications.workshop_id','=','workshops.id')->where('workshops.state_id','=',1);
        })->select('applications.id','workshops.technology')->get();
        $chart = Charts::database($applications, 'pie', 'highcharts')
        ->title('Applications per Workshop')
        ->elementLabel("Applications")
        //->dimensions(1000, 500)
        ->responsive(false)
        ->groupBy('technology');
        return view('charts', ['chart' => $chart]);
    }

    public function Categoryarea()
    { 
        $chart = Charts::multiDatabase('areaspline', 'highcharts')
        ->dataset('Business Intelligence', Workshop::where('category_id',1)->get())
        ->dataset('Big Data', Workshop::where('category_id',2)->get())
        ->dataset('Databases', Workshop::where('category_id',3)->get())
        ->dataset('Virtualization', Workshop::where('category_id',4)->get())
        ->dataset('Programming', Workshop::where('category_id',5)->get())
        ->title('Workshops per Category')
        ->elementLabel("Workshops")
        ->responsive(false)
        ->monthFormat('F Y')
        ->lastByMonth(13,true);
        return view('charts', ['chart' => $chart]);
    }

    public function Categoryapparea()
    { 
        
        $applications = DB::table('applications')->join('workshops',function($join){
            $join->on('applications.workshop_id','=','workshops.id')->where('workshops.state_id','=',1);
        })->select('applications.id','workshops.category_id','applications.application_date')->get();
        $chart = Charts::multiDatabase('areaspline', 'highcharts')
        ->dateColumn('application_date')
        ->dataset('Business Intelligence',$applications->where('category_id','=',1))
        ->dataset('Big Data', $applications->where('category_id','=',2))        
        ->dataset('Databases', $applications->where('category_id','=',3))
        ->dataset('Virtualization', $applications->where('category_id','=',4))
        ->dataset('Programming', $applications->where('category_id','=',5))
        ->title('Applications per Category')
        ->elementLabel("Workshops")
        ->responsive(false)
        ->monthFormat('F Y')
        ->lastByMonth(13,true);
        return view('charts', ['chart' => $chart]);
    }

    public function Workshoparea()
    {
        //$data = Application::select('applications.created_at', DB::raw('count(applications.id) as aggregate'))->groupBy(DB::raw('Date(applications.created_at)'))->get();
        $chart = Charts::multiDatabase('areaspline', 'highcharts')
        ->dataset('Approved', Workshop::where('state_id',1)->get())
        ->dataset('Rejected', Workshop::where('state_id',3)->get())
        ->dataset('Pending', Workshop::where('state_id',2)->get())
        ->title('Workshops per State')
        ->elementLabel("Workshops")
        ->responsive(false)
        ->monthFormat('F Y')
        ->lastByMonth(13,true);
        return view('charts', ['chart' => $chart]);

              /*
        Charts::multiDatabase('line', 'material')
        ->dataset($label[0], $workshops[0])
        ->dataset($label[1], $workshops[1])
        ->dimensions(1000, 500)
        ->responsive(false)->monthFormat('F')
        ->groupByMonth('2016',true);
        */
        /*
        $chart = Charts::create('line', 'highcharts')
        ->title('My nice chart')
        ->labels(['First', 'Second', 'Third'])
        ->values([5,10,20])
        ->dimensions(0,500);
        */
    }

    public function Workshopbars()
    {
        /*$workshops= DB::table('applications')
                 ->select('workshop_name', DB::raw('count(*) as total'))
                 ->groupBy('workshop_name')
                 ->get();
        $chart = Charts::create('bar', 'highcharts')
        ->title('Workshop\'s applications')
        ->elementLabel('Applications')
        ->labels($workshops->pluck('workshop_name'))
        ->values($workshops->pluck('total'))
        ->responsive(true);*/
        $applications = DB::table('applications')->join('workshops',function($join){
            $join->on('applications.workshop_id','=','workshops.id')->where('workshops.state_id','=',1);
        })->select('applications.id','workshops.technology')->get();
        $chart = Charts::database($applications, 'bar', 'highcharts')
        ->title('Applications per Workshop')
        ->elementLabel("Applications")
        //->dimensions(1000, 500)
        ->responsive(false)
        ->groupBy('technology');
        return view('charts', ['chart' => $chart]);
    }

    public function show($type)
    {
        if($type==='applicationarea'){
          return $this->Applicationarea();
        }
        if($type==='workshoppie'){
          return $this->Workshoppie();
        }
        if($type==='workshoparea'){
          return $this->Workshoparea();
        }

        if($type==='workshopbars'){
          return $this->Workshopbars();
        }

        if($type==='categoryarea'){
          return $this->Categoryarea();
        }

        if($type==='categoryapparea'){
          return $this->Categoryapparea();
        }
        
    }
        
}