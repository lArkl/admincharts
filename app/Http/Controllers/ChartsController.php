<?php

namespace App\Http\Controllers;
use App\Application;
use Illuminate\Http\Request;
use Charts;
use DB;

class ChartsController extends Controller
{
    public function Applicationarea()
    {
        $chart = Charts::database(Application::all(), 'area', 'highcharts')
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
        $chart = Charts::database(Application::all(), 'bar', 'highcharts')
          ->title('Applications per Workshop')
          ->elementLabel("Total")
          //->dimensions(1000, 500)
          ->responsive(false)
          ->groupBy('workshop_name');
          return view('charts', ['chart' => $chart]);
    }

    public function Workshoparea()
    {
        //$data = Application::select('applications.created_at', DB::raw('count(applications.id) as aggregate'))->groupBy(DB::raw('Date(applications.created_at)'))->get();
        $chart = Charts::multiDatabase('areaspline', 'highcharts')
        ->dataset('Laravel', Application::where('workshop_name','Laravel')->get())
        ->dataset('VueJs', Application::where('workshop_name','VueJs')->get())
        ->title('Application per Month per Workshop')
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
        $chart = Charts::database(Application::all(), 'bar', 'highcharts')
        ->title('Applications per Workshop')
        ->elementLabel("Total")
        ->responsive(false)
        ->groupBy('workshop_name');
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
    }
        
}