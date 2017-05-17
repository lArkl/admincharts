@extends('layouts.dashboard')
@section('page_heading','Charts')

@section('section')
<div class="col-sm-12">
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        {!! Charts::assets() !!}

    </head>
    <body>
        <center>
            {!! $chart->render() !!}
        </center>
    </body>
</html>
@stop