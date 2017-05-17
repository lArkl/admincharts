@extends ('layouts.dashboard')
@section('page_heading','Charts')
@section('section')
<div class="col-sm-12">	
	<div class="row">
		<canvas id="daily-reports" height="300" width="1100"></canvas>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>		
		<script>

			var chart = {
					labels: {!! $labels !!},
		            datasets: [
		            	{
			                data : [100,160,95,205,170,135,200],
			                backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(255, 159, 64, 0.2)'
            				],
				            /*borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],*/
			                strokeColor: "rgba(151,187,205,0.8)",
			                highlightFill: "rgba(151,187,205,0.75)",
			                highlightStroke: "rgba(151,187,205,1)",
						    //showTooltips: true,
			                responsive: true
		            	}
		            ]
		         };
			var ctx = document.getElementById('daily-reports').getContext('2d');
			var ShowChart = new Chart(ctx , {
    			type: "pie",
    			data: chart, 
    			options: {
				    legend: {
				        display: false,
				        labels: {
			    	        fontColor: 'rgb(255, 99, 132)'
            			}
            		},
            		title: {
 					   display: true,
            			text: 'Applications per Workshop'
        			}
        	 	}
			});

		    
		</script>


		{{--
		<div class="col-sm-6">
			@section ('cchart1_panel_title','Line Chart')
			@section ('cchart1_panel_body')
			@include('widgets.charts.clinechart')
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart1'))
			@section ('cchart3_panel_title','Donut Chart')
			@section ('cchart3_panel_body')
				<div style="max-width:400px; margin:0 auto;">@include('widgets.charts.cdonutchart')</div>
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart3'))
		</div>
		<div class="col-sm-6">
			
			@section ('cchart2_panel_title','Pie Chart')
			@section ('cchart2_panel_body')
				<div style="max-width:400px; margin:0 auto;">@include('widgets.charts.cpiechart')</div>
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart2'))

			@section ('cchart4_panel_title','Bar Chart')
			@section ('cchart4_panel_body')
			@include('widgets.charts.cbarchart')
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart4'))
		</div> 
		--}}
		
	</div>
	
	
</div>
@stop
