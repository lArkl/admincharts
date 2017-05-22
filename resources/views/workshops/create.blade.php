<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Workshop Registration</div>
        <div class="panel-body">
          {!! Form::open(['url'=>'workshops'])!!}
          {!! Field::text('technology') !!}
          {!! Field::text('release') !!}
          {!! Field::text('description')!!}
          {!! Field::text('url')!!}
          {!! Field::text('catalog_image_url')!!}
          {!! Field::text('about_image_url')!!}
          {!! Field::text('program_id')!!}
          {!! Field::text('level_id')!!}
          {!! Field::email('category_id') !!}
          {!! Field::text('aspect_id')!!}
          {!! Form::submit('Submit') !!}
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>