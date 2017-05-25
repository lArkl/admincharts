
@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Teachers - Show Details</div>

				<div class="panel-body">
					id: {{ $teacher->id }}<br>
					names: {{ $teacher->names }}<br>
					last names: {{ $teacher->last_names }}<br>					
					dni: {{ $teacher->dni }}<br>
					email: {{ $teacher->email }}<br>
					phone: {{ $teacher->phone }}<br>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

