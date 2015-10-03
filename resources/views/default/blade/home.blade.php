@extends('default.layout.layout')
@section('content')

			
          <!--Charts -->
       
           <div class="row mt">
            <div class="col-md-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Reservations Created within past 7 days</h4>
                  <div class="panel-body">
                    <div  class="col-sm-6" style='width:100%'>
                      <div id="bar-chart-week" ></div>
                     </div>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Total Products Ordered</h4>
                  <div class="panel-body">
                    <div class="col-sm-6" style='width:100%'>
                        <div id="bar-chart" ></div>
                     </div>
                    </div>
              </div>
            </div>
          </div>
          
          <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Order Count</h4>
                  <div class="panel-body">
                    <div  class="col-sm-6" style='width:100%'>
                      <div id="bar-chart-year" ></div>
                     </div>
                  </div>
              </div>
            </div>
          </div>
@stop

@section('script')
	<link rel="stylesheet" href="{{URL::asset('')}}libs/css/morris.css">
	 {!! Html::script('libs/js/morris.js')  !!}
	  {!! Html::script('libs/js/raphael.js')  !!}
	<SCRIPT TYPE="text/javascript">

$(document).ready(function(){
var url = "http://localhost:8000/ajax/";

var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'bar-chart',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'name', // Set the key for X-axis
    ykeys: ['product_count'], // Set the key for Y-axis
    labels: ['Quantity'], // Set the label when bar is rolled over,
    resize : ['true']
  });
var chart1 = Morris.Bar({
    // ID of the element in which to draw the chart.
    barGap: 10,
    barSizeRation:['0.55'],
    element: 'bar-chart-week',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Reservations'], // Set the label when bar is rolled over
    resize : ['true'],
    barColors: ['#4DA74D','#646464'],
    hideHover: ['auto']
});

var chart2 = Morris.Bar({
    // ID of the element in which to draw the chart.
    barGap: 10,
    barSizeRation:['0.55'],
    element: 'bar-chart-year',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'created_at', // Set the key for X-axis
    ykeys: ['order_count'], // Set the key for Y-axis
    labels: ['Order Count'], // Set the label when bar is rolled over
    resize : ['true'],
    barColors: ['#f75b68','#4DA74D','#646464'],
    hideHover: ['auto']
});

 $.ajax({
    type: "GET",
    url : url + 'order',
    dataType: 'json',
    success : function(data){
        chart1.setData(data);
        console.log(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
         alert(textStatus + errorThrown);
      }
    });

 $.ajax({    
    type: "GET",
    url : url + 'order',
    dataType: 'json',
    success : function(data){
        chart.setData(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
         alert(textStatus + errorThrown);
      }
    }); 
 $.ajax({    
    type: "GET",
    url : url + 'ordernumber',
    dataType: 'json',
    success : function(data){
        chart2.setData(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
         alert(textStatus + errorThrown);
      }
    }); 
});

	</SCRIPT>
@stop