<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Applicant Register</div>
        <div class="panel-body">
          {!! Form::open(['url'=>'applicants'])!!}
          {!! Field::text('first_name') !!}
          {!! Field::text('middle_name') !!}
          {!! Field::text('first_surname')!!}
          {!! Field::text('second_surname')!!}
          {!! Field::text('birth_date')!!}
          {!! Field::text('document')!!}
          {!! Field::text('home_phone')!!}
          {!! Field::text('mobile_phone')!!}
          {!! Field::email('email') !!}
          {!! Field::text('workshop_name')!!}
          {!! Form::submit('Submit') !!}
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>