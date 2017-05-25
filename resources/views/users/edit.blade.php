@extends('layouts.dashboard')
@section('page_heading','Users')

@section('section')

  <div class="row">
    <div class="col-sm-12">
      
      @section ('atable_panel_body')
      
      <div class="page-header">
        <h3>Edit User Information</h3>
      </div>

      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          
          {!! Form::model($information, ['route'=>['users.update', $information->user_id], 'method'=>'put']) !!}       

              {!! Field::text('first_name') !!}
              {!! Field::text('middle_name') !!}
              {!! Field::text('first_surname') !!}
              {!! Field::text('second_surname') !!}
              {!! Field::text('document_type') !!}
              {!! Field::text('document_number') !!}
              {!! Field::text('birthdate') !!}
              {!! Field::text('phone') !!}
              {!! Field::email('email') !!}

              {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
          {!! Form::close() !!}


        </div>
      </div> 
      
      @endsection
      @include('widgets.panel', array('header'=>true, 'as'=>'atable'))
    </div>
  </div>

@stop


