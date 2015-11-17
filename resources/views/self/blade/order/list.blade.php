@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Customer Orders Listing<span class="pull-right"><a href="{{route('barcode.print')}}" class="btn btn-theme"><i class="fa fa-print"></i> Print</a></span></h2>
                            <table class="table table-stripe table-hover table-bordered">
                                <thead>
                                    @foreach($fieldlist as $field)
                                        <th>{{$field}}</th>
                                    @endforeach
                                    <th>Days before delivery</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                 <?php 
                                        $today = DateTime::createFromFormat('Y-m-d' , date('Y-m-d'));
                                        $daysLeft = date_diff( $today ,date_create($order->deliverydate));
                                        $daysLeft = $daysLeft->format("%r%a");
                                    ?>
                                    <tr class="<?php echo ($daysLeft == 0) ?  'due':''; ?>">
                                    @foreach($fieldlist as $field)
                                        <td>{{$order[$field]}}</td>
                                    @endforeach
                                   
                                    <td>
                                        @if($daysLeft > 0)
                                            {{$daysLeft}} days
                                        @else
                                            0 days
                                        @endif
                                    </td>
                                    <td>
                                        <button href="#showdetails{{$order->id}}" data-toggle="modal" data-target="showdetails{{$order->id}}" class="showdetails btn btn-xs btn-theme" data-id="{{$order->id}}">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <a href="{{route('product.compute' , $order->id)}}" class="btn btn-xs btn-theme04">
                                            <i class="fa fa-calculator"></i>
                                        </a>
                                         <a href="" class="btn btn-xs btn-theme03">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    </tr>
                                    
                                    <div id="showdetails{{$order->id}}" class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="col-md-offset-3 col-md-6 mb" style="top:150px;">
                                              <div class="content-panel pn">
                                                <div id="profile-02">
                                                    <div class="user">
                                                        <img src="" class="img-circle" width="80">
                                                        <h4>{{$order->id}}</h4>
                                                        <div class="accordion col-md-8 col-md-offset-2" style="background:rgba(255,255,255,0.7)">
                                                            @foreach($order->orderdetail as $od)
                                                                <h3 class="bg-black">{{$od->id}}</h3>
                                                                <div class="row mt">
                                                                    <span>{{($od->product->first()->name)}}</span>
                                                                    <span>{{$od->product_quantity}}</span>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pr2-social centered">

                                                    <button class="btn btn-primary btn-xs">Save changes</button>
                                                    <button class="btn btn-theme btn-xs" data-dismiss="modal" aria-hidden="true">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
        </div>
    </div>
</div>


@stop

@section("header")
<style type="text/css">
    
.due{
    background-color: rgba(255,0,0,0.1);
}

</style>
@stop

@section('script')
    <script type="text/javascript">
    
        $(document).ready(function(){
             $( ".accordion" ).accordion({
                  heightStyle: "content"
              });
           $('.showdetails').click(function(e){
                var target = "#"  + $(this).data('target');
                $(target).fadeToggle().modal('toggle');
           });
        });
    </script>
@stop