<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Charts;
use App\Application;

class ChartsController extends Controller
{
    //public $protected_charts = ['admin_dashboard'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels=Application::groupBy('workshop_name')->pluck('workshop_name');
        $workshops=collect([]);
        foreach($labels as $label){
            $datacount=Application::where('workshop_name',$label)->get()->count();
            $workshops->push($datacount);
        }

        $chart = 
        /*Charts::database(Application::where('workshop_name','Laravel')->get(), 'line', 'chartjs')
      ->elementLabel("Total")
      ->dimensions(1000, 500)
      ->responsive(false)->monthFormat('F')
      ->groupByMonth('2016',true);
*/
         Charts::multiDatabase('line', 'material')
    ->dataset($label[0], $workshops[0])
    ->dataset($label[1], $workshops[1])
    ->dimensions(1000, 500)
      ->responsive(false)->monthFormat('F')
      ->groupByMonth('2016',true);
        /*$chart = Charts::create('bar', 'highcharts')
             ->title('My nice chart')
             ->elementLabel('My nice label')
             ->labels($labels)
             ->values($workshops)
             ->responsive(true);
        */
        /*
        $chart = Charts::create('line', 'highcharts')
        ->title('My nice chart')
        ->labels(['First', 'Second', 'Third'])
        ->values([5,10,20])
        ->dimensions(0,500);
*/
        return view('charts', ['chart' => $chart]);
    }

    public function show($name, $height)
    {
        /*if (in_array($name, $this->protected_charts)) {
            $this->checkProtected();
        }*/
        return view("charts.$name", ['height' => $height]);
    }

    public function checkProtected()
    {
        if(!Auth::user()->admin) {
            abort(404);
        }
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
