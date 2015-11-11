@extends('default.layout.layout')

@section('content')
<section class="">
	<div class="row mt">
		<div class="col-md-10 col-md-offset-1">
		<h2 class="violet"><i class="fa fa-angle-right"></i>Place Order: Select Date Range</h2>
		<form method='post' action='{{route("order.generate2")}}'>
			<input type="hidden" value="{{csrf_token()}}" name="_token">
        	<div class=" form-panel">
              	<div class="cmxform form-horizontal style-form" id="customerform">
                	<div class="row" >
                 		<div class="col-md-12	">
                  	    	Start Date: <input class="form-control opacity5 text-center"  id="startdate" name="startdate" size="16" type="date" value="" placeholder="Delivery Date" min="" required>
               		 		End Date:   <input class="form-control opacity5 text-center"  id="enddate"   name="enddate"   size="16" type="date" value="" placeholder="Delivery Date" min="{{date('Y-m-d')}}" required>
				 		</div>
					</div>
          		</div>
      		</div>
      		  <div class="row">
                  <div class="col-md-6"><button class="btn-lg btn-block col-md-6 btn-theme btn_next">Continue</button></div>
                  <div class="col-md-6"><button class="btn-lg btn-block col-md-6 btn-danger btn_back" type="Reset">Reset</button></div>
                </div>
		</div>
	</form>
	</div>
</section>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){

		$('#startdate').change(function(e){
			$('#enddate').attr('min' , $(this).val()).val($(this).val());

		});

	});//end docready
	

</script>
@stop