@extends('layouts.dashboard')
@section('page_heading','Applications')

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
			@foreach($applications as $application)
				<tr>
					<td scope="row">{{$application->id}}</td>
					<td>{{$application->first_name}}</td>
					<td>{{$application->first_surname}}</td>
					<td>{{$application->document}}</td>
					<td>{{$application->email}}</td>
					<td>
						<a href="applications/{{$application->id}}/edit" class="btn btn-xs btn-danger">
							<i class="glyphicon glyphicon-edit"></i>Edit</a>
						<a href="applications/{{$application->document}}/show" class="btn btn-xs btn-warning">
							<i class="glyphicon glyphicon-list-alt"></i>Workshops</a>
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