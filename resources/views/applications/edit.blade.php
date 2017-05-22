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