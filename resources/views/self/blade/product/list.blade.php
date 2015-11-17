@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('report.generate')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Product Listing<span class="pull-right"><a href="{{route('barcode.print')}}" class="btn btn-theme"><i class="fa fa-print"></i> Print</a></span></h2>
                            <p><i class="fa fa-info"></i> List of all finished products.</p>
                            @foreach($product as $p)
                            <div class="col-md-4" style="margin-left:0;">
                                <div class="row mt">
                                    <div class="thumbnail col-md-5">
                                        <img src="{{URL::asset($p['imageurl'])}}"  class="img-responsive" style="height:350px;width:100%;"/>
                                    </div>
                                    <div class="thumbnail col-md-7" style="height:140px;">
                                        <p> <span class="violet"><h4><input type="checkbox" value="{{$p->id}}" class="checkitem_list" alt="Include to generate report" name="check_list[]" />{{$p->name}}</span>
                                        <span>
                                             @if(($p->quantity <= $p->safe_quantity) && $p->quantity > 0)
                                              <span class="label label-warning">CRITICAL</span>
                                            @elseif(($p->quantity <= $p->safe_quantity))
                                              <span class="label label-danger">OUT OF STOCK</span>
                                            @else
                                              <span class="label label-success">GOOD</span>
                                            @endif
                                        </span>
                                        <span class="pull-right">&#8369;{{$p->price}}</span></h4></p>
                                        <p><span>Safe Quantity:{{$p->safe_quantity}}</span><span class="pull-right">Alert Quantity:{{$p->alert_quantity}}</span></p>
                                        <p><span>Quantity: {{$p->quantity}}</span></p>
                                        <p>
                                        Actions: 
                                               @if($p->quantity <= 0 )
                                                <a class="btn btn-xs btn-theme03" data-id="{{$p->id}}" disabled title="Withdraw {{$p->name}}" href="{{route('product.withdraw' , $p->id)}}"> <i class="fa fa-share"></i> </a>
                                                @else
                                                 <a class="btn btn-xs btn-theme03" data-id="{{$p->id}}"  title="Withdraw {{$p->name}}" href="{{route('product.withdraw' , $p->id)}}"><i class="fa fa-share"></i></a>
                                              @endif
                                                <a class="btn btn-xs btn-theme04"  title="Deposit {{$p->name}}" href="{{route('product.deposit' , $p->id)}}"><i class="fa fa-reply"></i></a>
                                                <a class="btn btn-xs btn-default"  title="Order {{$p->name}}"  href="{{route('product.deposit' , $p->id)}}" ><i class="fa fa-truck"></i></a>
                                                <a class="btn btn-xs btn-default"  title="Setup reorder {{$p->name}}"  href="{{route('product.reorder' , $p->id)}}/auto" ><i class="fa fa-calculator"></i></a>

                                        </p>
                                    </div>
                                        <div class="col-md-7 thumbnail" style="overflow-y:scroll;height:200px;">
                                        @if(!count($p->recipe))
                                            The product has no recipe.
                                            <a href="{{route('recipe.create' , $p->id)}}">Click here to create recipe</a>
                                        @endif
                                        @foreach($p->recipe as $r)
                                            <p>Recipe ID: {{$r->id}}</p>
                                            <p>Recipe Name:{{$r->name}}</p>
                                            <hr/>
                                            <h4>Recipe Info</h4>
                                            @foreach($r->ingredient as $i)
                                                <ul class="tree">{{$i->name}}
                                                   <li class="fruit">Item:{{$i->item->name}} x{{$i->quantity}}</li>
                                                   <li class="fruit">Desc:{{$i->description}}</li>
                                                </ul>
                                            @endforeach
                                        @endforeach
                                        </div>
                                </div>
                            </div>
                          
                            @endforeach
                              
                       
                        </div>
                    </div>
                </div>
                    <div class="row mt">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-panel">
                                <div class="row mt">
                                <div class="col-md-12">
                                            Start Date:<input type="date" name="start_date" class='form-control' required/>
                                            End Date:  <input type="date" name="end_date"   class='form-control' required/>
                                            Report Type
                                            <select name="reporttype" class="form-control">
                                              <option value="Withdraw">Withdrawal Report</option>
                                              <option value="Deposit"> Deposit Report</option>
                                              <option value="Inventory">Inventory Report</option>
                                              <option value="Delivery">Delivery Report</option>
                                              <option value="Purchase">Purchase Report</option>
                                              <option value="Summary">Summary Report</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                        <br/>
                                            <input type="submit" class="btn btn-theme btn-block" value="Generate report" />
                                        </div>
                                    </div>
                                    <input type="hidden" name="reporttarget" value="product"/>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
           $('a.recipe').click(function(){
            var id = $(this).data('id');
            $('#' + id).fadeToggle();
                
           });
            $('.cmxform').on('submit', function(e){
              
                var find = 0;
                $.each($('.checkitem_list') , function(index, object){
                    if($(object).is(':checked')){
                        find +=1;
                    }
                }); 
                if(find === 0){

                      e.preventDefault();
                      swal("Missing Input" , "Please check at least 1 product."  , "error");
                }

            });
        });
    </script>
@stop