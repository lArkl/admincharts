@extends('layouts.dashboard')
@section('page_heading','Users')

@section('section')
<div class="col-sm-12">

	<div class="row">
		<div class="col-sm-12">
			
			@section ('atable_panel_body')
			
			<div class="page-header">
				<h1 class="text-center">User Creation</h1>
			</div>

			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					
					{!! Form::open(['url' => 'users']) !!}

					<p>
						<div class="input-group"> 
							<span class="input-group-addon" id="basic-addon1">Names</span>
							{!! Form::text('names', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
						</div>
					</p>


					<p>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Last Names</span>
							{!! Form::text('last_names', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
						</div>
					</p>


					<p>
						<div class="input-group">   
							<span class="input-group-addon" id="basic-addon1">DNI</span>
							{!! Form::text('dni', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
						</div>
					</p>
					
					<p>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Email</span>
							{!! Form::text('email', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
						</div>
					</p>

					<p>
						<div class="input-group">   
							<span class="input-group-addon" id="basic-addon1">Phone</span>
							{!! Form::text('phone', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
						</div>
					</p>
					
					{!! Form::submit('Apply', ['class' => 'btn btn-primary col-xs-12']) !!}
					
					{!! Form::close() !!}

				</div>
			</div> 
			
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'atable'))
		</div>
	</div>
</div>
@stop


