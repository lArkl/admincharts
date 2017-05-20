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
				<th>Category</th>
				<th>Program</th>
				<th>Level</th>
			</thead>
			<tbody>
			@foreach($workshops as $workshop)
				<tr>
					<td scope="row">{{$workshop->id }}</td>
					<td>{{$workshop->technology }}</td>
					<td>{{$workshop->category }}</td>
					<td>{{$workshop->program->key }}</td>
					<td>{{$workshop->level_id}}</td>
					<td>
						<a href="applications/{{$workshop->id}}/edit" class="btn btn-xs btn-danger">
							<i class="glyphicon glyphicon-edit"></i>Edit</a>
						<a href="applications/{{$workshop->document_number}}/show" class="btn btn-xs btn-warning">
							<i class="glyphicon glyphicon-list-alt"></i>Proposals</a>
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