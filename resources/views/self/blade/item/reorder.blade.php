@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="row mt">
                <div class="col-md-6">
                      <div class="form-panel ">
                    <div class=" form">
                        <h2 class="violet">Reorder Setup: {{$item->name}}<button class="btn btn-theme03 pull-right add_date" value="Add date">Add date</button></h2>
                        
                        <form class="cmxform form-horizontal style-form" method="post" action="{{route('item.setReorder')}}">
                            <input type="hidden" name="id" value="{{$item->id}}" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div  id="mainform" >
                                @if(count($logs)> 0 && count($used)> 0)
                                    @foreach($logs as $log)
                                        <div class="form-group usage_div">
                                            <label for="date" class="control-label col-lg-2">Date & usage:</label>
                                            <div class="col-lg-5">
                                                <input type="date" class="form-control input-medium usage_date" readonly  size="16" data-value="{{date('Y-m-d' , strtotime($log->created_at))}}" required /></div>
                                                <div class="col-lg-5">
                                                    <input name="usage_qty" class="form-control input-medium usage_qty" size="16" value="{{$log->param}}" required="" type="number" min="0"></div>
                                                </div>
                                    @endforeach
                                @endif
                            </div>
                            <hr>
                            <div class="form-group ">
                                <label for="quantity" class="control-label col-lg-2">Annual Demand:</label>     
                                <div class="col-lg-10"><input id="total_usage"  name="total_usage" class="form-control input-medium " size="16" value="{{$used ? $used : 0}}"  required="" type="number" min="0"></div>
                            </div>
                             <hr/>
                            <h2 class='violet'> Results</h2>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Optimal Order Quantity(Q)  </label>      
                                <div class="col-lg-10"><input id="optimal_order_qty"  name="optimal_order_qty" class="form-control input-medium " size="16" value="0" required="" type="number" min="0"></div>
                            </div>

                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Reorder Point</label>      
                                <div class="col-lg-10"><input id="reorder_point"  name="reorder_point" class="form-control input-medium " size="16" value="0" required="" type="text" readonly min="0"></div>
                            </div>
                           
                            <input class="btn btn-theme" type="submit" value="Submit">
                            <input class="btn btn-theme04" type="submit" value="Reset">
                        </form>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-panel ">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="#">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Computations: {{$item->name}}</h2>
                            <hr>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Average Daily Demand(d)</label>      
                                <div class="col-lg-10"><input id="daily_demand"  name="daily_demand" class="form-control input-medium " size="16" value="0" required="" type="number" ></div>
                            </div>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Setup Cost(s)</label>      
                                <div class="col-lg-10"><input id="setup_cost"  name="setup_cost" class="form-control input-medium " size="16" value="263.95" required="" type="number" ></div>
                            </div>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Holding Cost(h)</label>      
                                <div class="col-lg-10"><input id="holding_cost"  name="holding_cost" class="form-control input-medium " size="16" value="1.77" required="" type="number" ></div>
                            </div>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Lead Time(L)</label>      
                                <div class="col-lg-10"><input id="lead_time"  name="lead_time" class="form-control input-medium " size="16" value="7" required="" type="number" ></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
$(document).ready(function(){
    
    $('.add_date').click(function(e){
        e.preventDefault();
        $('#mainform').append('<div class="form-group usage_div"><label for="date" class="control-label col-lg-2">Date & usage:</label><div class="col-lg-5"><input name="" class="form-control input-medium usage_date" size="16" value="1" required="" type="date" min="1"></div><div class="col-lg-5"><input name="usage_qty" class="form-control input-medium usage_qty" size="16" value="0" required="" type="number" min="0"></div>');
    });

    $('div').delegate('.usage_qty','keyup',function(e){
        compute(1);
    });

    $('#total_usage').keyup(function(e){
        compute(0);
        $('.usage_div').each(function(index, obj){
            $(obj).fadeOut("fast" ,"swing" , function(){
                $(obj).html('');
            });
        });
    });
    function compute(usedate){
        var total_usage = 0;
        if(usedate){
            $('.usage_qty').each(function(index,obj){
                total_usage += parseFloat($(obj).val());
            });
            $('#total_usage').val(total_usage);
        }else{
          total_usage=  $('#total_usage').val();
        }
        
        var daily_demand =$('#daily_demand');
        var setup_cost = $('#setup_cost');
        var holding_cost = $('#holding_cost');
        var lead_time = $('#lead_time');
        var optimal_order_qty = $('#optimal_order_qty');
        var reorder_point  = $('#reorder_point');
        daily_demand.val(total_usage / 240);
        optimal_order_qty.val(Math.round(Math.sqrt((2 *total_usage * setup_cost.val()) / holding_cost.val()) ));
        reorder_point.val(Math.round(daily_demand.val() * lead_time.val()));
    }
    if($('#total_usage').val()!= 0){
        compute(0);
        $('.usage_date').each(function(index,obj){
            $(obj).val($(obj).data('value'));
        });
    }
});//end dom ready

</script>
@stop