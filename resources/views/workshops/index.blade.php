@extends('layouts.dashboard')
@section('page_heading','Workshops')

@section('section')
<div class="col-sm-12">

<div class="row">
	<div class="col-sm-12">
		
		@section ('atable_panel_body')
		<table class="table-condensed table-bordered table-striped">
			<thead>
				<th>Id</th>
				<th>Technology</th>
				<th>Program</th>
				<th>Level</th>
				<th>State</th>
				<th>Options</th>
			</thead>
			<tbody>
			@foreach($workshops as $workshop)
				<tr>
					<td scope="row">{{$workshop->id }}</td>
					<td>{{$workshop->technology }}</td>
					<td>{{$workshop->program->key }}</td>
					<td>{{$workshop->level->value}}</td>
					<td>{{$workshop->state->value }}</td>
					<td>
						<a href="workshops/{{$workshop->id}}/edit" class="btn btn-xs btn-danger">
							<i class="glyphicon glyphicon-edit"></i>Edit</a>
						@if($workshop->state->value=='approved')
							<a href="workshops/{{$workshop->id}}/show" class="btn btn-xs btn-warning">
							<i class="glyphicon glyphicon-list-alt"></i>Applications</a>
						@else
							{{ Form::open([ 'route' => [ 'workshop.approve', $workshop->id ], 'method'  => 'post','style'=>'display:inline-block' ]) }}
				{{ Form::hidden('id', $workshop->id) }}
				{{ Form::button('<i class="glyphicon glyphicon-thumbs-up">Approve</i>', array('class'=>'btn btn-xs btn-success', 'type'=>'submit')) }}
				{{ Form::close() }}
				{{ Form::open([ 'route' => [ 'workshop.reject', $workshop->id ], 'method'  => 'post','style'=>'display:inline-block' ]) }}
				{{ Form::hidden('id', $workshop->id) }}
				{{ Form::button('<i class="glyphicon glyphicon-thumbs-down">Reject</i>', array('class'=>'btn btn-xs btn-warning', 'type'=>'submit')) }}
				{{ Form::close() }}
				{{ Form::open([ 'method'  => 'delete', 'route' => [ 'workshops.destroy', $workshop->id ] ,'style'=>'display:inline-block']) }}
				{{ Form::hidden('id', $workshop->id) }}
				{{ Form::button('<i class="glyphicon glyphicon-remove-circle">Delete</i>', array('class'=>'btn btn-xs btn-danger', 'type'=>'submit')) }}
				{{ Form::close() }}
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