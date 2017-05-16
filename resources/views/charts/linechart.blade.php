@extends('layouts.charts')
@section('chart')
    {!! Charts::database(Application::where('workshop_name','Laravel')->get(), 'line', 'chartjs')
      ->elementLabel("Total")
      ->dimensions(1000, 500)
      ->responsive(false)->monthFormat('F')
      ->groupByMonth('2016',true);
    !!}
@endsection