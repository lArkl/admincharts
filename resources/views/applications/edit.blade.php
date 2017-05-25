@extends('layouts.dashboard')
@section('page_heading','Users')

@section('section')
<div class="col-sm-12">

<div class="row">
  <div class="col-sm-12">
    
    @section ('atable_panel_body')
    <table class="table-condensed table-bordered table-striped">
      <thead>
        <th>Id</th>
        <th>First name</th>
        <th>Last name</th>
        <th>DNI</th>
        <th>Email</th>
        <th>Action</th>
      </thead>
      <tbody>
      @foreach($users as $user)
        <tr>
          <td scope="row">{{$user->id}}</td>
          <td>{{$user->personal_information->first_name}}</td>
          <td>{{$user->personal_information->first_surname}}</td>
          <td>{{$user->personal_information->document_number}}</td>
          <td>{{$user->personal_information->email}}</td>
          <td>
            <a href="users/{{$user->id}}/edit" class="btn btn-xs btn-danger">
              <i class="glyphicon glyphicon-edit"></i>Edit</a>
            @if(! $user->application->isEmpty())
              <a href="applications/{{$user->personal_information->document_number}}/show" class="btn btn-xs btn-warning">
              <i class="glyphicon glyphicon-list-alt"></i>Workshops</a>
            @endif
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    @endsection
    @include('widgets.panel', array('header'=>true, 'as'=>'atable'))
  </div>
</div>
</div>
@stop

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Applicant</div>
        <div class="panel-body">
          {!! Form::model($applicant,['route'=>['applicants.update',$applicant],'method'=>'put'])!!}
          {!! Field::text('first_name') !!}
          {!! Field::text('middle_name') !!}
          {!! Field::text('first_surname')!!}
          {!! Field::text('second_surname')!!}
          {!! Field::text('birth_date')!!}
          {!! Field::text('document')!!}
          {!! Field::text('home_phone')!!}
          {!! Field::text('mobile_phone')!!}
          {!! Field::email('email') !!}
          {!! Form::submit('Save') !!}
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>