
@extends('layouts.dashboard')
@section('page_heading','Applications')


@section('section')

<div class="col-sm-12">
	<h2>{{$workshop->technology}}</h2>
	<div class="row">
		<div class="col-sm-12">
		@section ('atable_panel_body')
			<table class="table table-striped">
	<thead>
	<th>Id</th>
	<th>Applicant</th>
	<th>Application date</th>
	<th>Status</th>
	<th>Action</th>
	</thead>
	<tbody>
	@foreach($applications as $applicant)
		<tr>
			<th scope="row">{{$applicant->id}}</th>
			<td>{{$applicant->user->personal_information->first_name}}</td>
			<td>{{$applicant->user->personal_information->first_surname}}</td>
			<td>{{$applicant->application_date}}</td>
			<td>{{$applicant->state->value}}</td>
			<td>
				{{ Form::open([ 'route' => [ 'application.approve', $applicant->id ], 'method'  => 'post','style'=>'display:inline-block' ]) }}
				{{ Form::hidden('id', $applicant->id) }}
				{{ Form::button('<i class="glyphicon glyphicon-thumbs-up">Approve</i>', array('class'=>'btn btn-xs btn-success', 'type'=>'submit')) }}
				{{ Form::close() }}
				{{ Form::open([ 'route' => [ 'application.reject', $applicant->id ], 'method'  => 'post','style'=>'display:inline-block' ]) }}
				{{ Form::hidden('id', $applicant->id) }}
				{{ Form::button('<i class="glyphicon glyphicon-thumbs-down">Reject</i>', array('class'=>'btn btn-xs btn-warning', 'type'=>'submit')) }}
				{{ Form::close() }}
				{{ Form::open([ 'method'  => 'delete', 'route' => [ 'applications.destroy', $applicant->id ] ,'style'=>'display:inline-block']) }}
				{{ Form::hidden('id', $applicant->id) }}
				{{ Form::button('<i class="glyphicon glyphicon-remove-circle">Delete</i>', array('class'=>'btn btn-xs btn-danger', 'type'=>'submit')) }}
				{{ Form::close() }}

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