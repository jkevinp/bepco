@extends('default.layout.layout')

@section('header')
<style type="text/css">
	.tab-active{
		background-color: #79589F !important;
	}
</style>
@stop

@section('content')
<div class="row mt">
    <div class="col-md-12">
		<div class="row mt">
			<div class="col-md-12">
				<button class="btn btn-theme col-md-4 tab tab-active" style="border-radius:0 !important;background-color:gray;" data-target="#computed">Computed</button>
				<button class="btn btn-theme col-md-4 tab" style="border-radius:0 !important;background-color:gray;" data-target="#order">Orders Summary</button>
				<button class="btn btn-theme col-md-4 tab" style="border-radius:0 !important;background-color:gray;" data-target="#rawitem">Raw Item Summary</button>
			</div>
		</div>
    	<div class="content-panel tabitems" id="computed"> 
            <h2 class="violet"><i class="fa fa-angle-right"></i> Computed Ingredients</h2>
            <div class='row mt'>
              <div class="col-md-12">
                  <span class="col-md-8">
                   
                </span>
                 <a href="{{route('item.create')}}" class="btn btn-theme btn-lg col-md-3 col-md-offset-1 pull-right"><i class="fa fa-plus"></i> Place Order</a>
              </div>
            </div>
            <hr>
            <table class="table table-striped table-advance table-hover table-bordered">
              <thead>
              <tr>
                  <th><i class="fa fa-bullhorn" ></i>Product ID</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Product Name</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Ordered Quantity</th>
                  <th><i class="fa fa-bookmark"></i>Recipe</th>
                  <th><i class="fa fa-bookmark"></i>Ingredients</th>
              </tr>
              </thead>
              <tbody>
              	@if(count($toorder) === 0)
                	<td colspan="8">No Items found</td>
             	@endif
            	@foreach($toorder as $item => $value)
              	<tr> 
              		<td class='centered'>{{$item}}</td>
              		<td class='centered'>{{$value['product']['name']}}</td>
              		<td>{{number_format($value['orderquantity'])}}</td>
              		<td>{{$value['recipename']}}</td>
              		<td>
              			@foreach($value['ingredient'] as $ingredient)
              				{{number_format($ingredient->quantity * $value['orderquantity']	)}} x {{$ingredient->item->name}}<br/>
              			@endforeach
              		</td>

              	</tr>
             	@endforeach
            </table>
        </div>


        <div class="content-panel tabitems" id="order"> 
            <h2 class="violet"><i class="fa fa-angle-right"></i> Customer Orders</h2>
            <div class='row mt'>
              <div class="col-md-12">
                  <span class="col-md-8">
                    <i class='fa fa-info '></i> 
                   Item List contains information about all Raw items and maintenance products that are used to create and maintain several products such as Chemical Agents,Eggs and Chemical Supplies
                </span>
                 <a href="{{route('item.create')}}" class="btn btn-theme btn-lg col-md-3 col-md-offset-1 pull-right"><i class="fa fa-plus"></i> Create New Item</a>
              </div>
            </div>
            <hr>
            <table class="table table-striped table-advance table-hover table-bordered">
              <thead>
              <tr>
                  <th><i class="fa fa-bullhorn"></i>Order ID</th>
                  <th><i class="fa fa-bookmark"></i>Customer</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Delivery Date</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Order Information</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Address</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Status</th>
                  <th><i class="fa fa-bookmark"></i>Created At</th>
              </tr>
              </thead>
              <tbody>
              	@if(count($orders) === 0)
                	<td colspan="8">No Items found</td>
             	@endif
            	@foreach($orders as $item)
              	<tr> 
              		<td>{{$item->id}}</td>
              		<td>{{$item->customer->getName()}}</td>
              		<td>{{$item->deliverydate}}</td>
              		<td>
              			@foreach ($item->OrderDetail as $od) 
	              			{{$od['product_quantity']}} x {{$od->product->first()->name}} <br/>
                		@endforeach
            		</td>
              		<td>{{$item->customer->address}}</td>
              		<td>{{$item->status}}</td>
              		
              		<td>{{$item->created_at}}</td>
              	

              	</tr>
             	@endforeach
            </table>
        </div>

         <div class="content-panel tabitems" id="rawitem"> 
            <h2 class="violet"><i class="fa fa-angle-right"></i> Raw Item Summary</h2>
            <div class='row mt'>
              <div class="col-md-12">
                  <span class="col-md-8">
                    <i class='fa fa-info '></i> 
                   Item List contains information about all Raw items and maintenance products that are used to create and maintain several products such as Chemical Agents,Eggs and Chemical Supplies
                </span>
                <form method='post' action="{{route('order.place')}}">
                	<input type="hidden" value="{{csrf_token()}}" name="_token" />
                  	<input type="date" value="{{$startdate}}" name="startdate" /> to 
                 	<input type="date" value="{{$enddate}}"  name="enddate" />
                 	<button type='submit' class="btn btn-theme btn-lg col-md-3 col-md-offset-1 pull-right"><i class="fa fa-plus"></i> Proceed and Print Order form</button>
              	</form>
              </div>
            </div>
            <hr>
            <table class="table table-striped table-advance table-hover table-bordered">
              <thead>
              <tr>
                  <th><i class="fa fa-bookmark"></i>Raw Item Name</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Total Quantity to be ordered</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Available Suppliers</th>
              </tr>
              </thead>
              <tbody>
              	@if(count($orders) === 0)
                	<td colspan="8">No Items found</td>
             	@endif
             	<?php 	$total = [];?>
            	@foreach($toorder as $order=>$value)
            	<?php 
            	
            		foreach($value['ingredient'] as $ingredient){
            			if(!isset($total[$ingredient->item->name])){
            				$total[$ingredient->item->name]['totalQuantity'] = ($ingredient->quantity * $value['orderquantity']);
            				$total[$ingredient->item->name]['supplier'] =   $ingredient->item->supplier;
            				// foreach ($ingredient->item->supplier as $key => $value) {
            				// 	array_push($total[$ingredient->item->name]['supplier'],$value->supplier);
            				// }
            			}
            			else{
            				$total[$ingredient->item->name]['totalQuantity'] += $ingredient->quantity * $value['orderquantity'];
            			}
            		}
            	?>
            
            	@endforeach

            	@foreach($total as $name=>$value)
            		<tr>
            			<td>{{$name}}</td>
            			<td>{{$value['totalQuantity']}}</td>
            			<td>
            				<ul class='tree'>
            					{{$name}} Suppliers
            			@foreach($value['supplier'] as $availableSuppliers)
            				@foreach($availableSuppliers->supplier as $supplier)
            					<li class='fruit'>{{$supplier->name}}</li>
            				@endforeach
            			@endforeach
		            		</ul>
            		</td>
            		</tr>
            	@endforeach
            </table>
        </div>
    </div>
</div>

@stop

@section('script')
<script type="text/javascript">
$(document).ready(function(){
	$('#order').fadeOut(0);
	$('#rawitem').fadeOut(0);
	$('.tab').click(function(){
		$('.tabitems').fadeOut(0);
		$('.tab').removeClass('tab-active');
		$(this).addClass('tab-active');
		$($(this).data('target')).fadeIn(0);
	});

});
	
</script>

@stop

