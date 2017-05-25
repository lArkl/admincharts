@extends('layouts.dashboard')
@section('page_heading','Users')

@section('section')

  <div class="row">
    <div class="col-sm-12">
      
      @section ('atable_panel_body')
      
      <div class="page-header">
        <h3>Edit Workshop</h3>
      </div>

      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          
          {!! Form::model($workshop, ['route'=>['workshops.update', $workshop->id], 'method'=>'put']) !!}       

              {!! Field::text('id', ['readonly']) !!}
              {!! Field::text('technology') !!}
              {!! Field::text('release') !!}
              {!! Field::text('description') !!}

              {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
          {!! Form::close() !!}


        </div>
      </div> 
      
      @endsection
      @include('widgets.panel', array('header'=>true, 'as'=>'atable'))
    </div>
  </div>

@stop


