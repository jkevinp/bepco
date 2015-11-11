@extends('default.layout.layout')



@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('barcode.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Product Listing<span class="pull-right"><a href="{{route('barcode.print')}}" class="btn btn-theme"><i class="fa fa-print"></i> Print</a></span></h2>
                            @foreach($product as $p)
                            <div class="col-md-6" style="margin-left:0;">
                                <div class="row mt">
                                    <div class="thumbnail col-md-5">
                                        <img src="{{URL::asset($p['imageurl'])}}"  class="img-responsive" style="height:300px;width:100%;"/>
                                    </div>
                                    <div class="thumbnail col-md-7" style="height:90px;">
                                        <h4>Product Info</h4>
                                        <p class="violet">{{$p->name}}
                                            <span class="pull-right">&#8369;{{$p->price}}</span>
                                        </p>
                                        <p>Alert Quantity:{{$p->alert_quantity}}</p>
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
           $('a.recipe').click(function(){
            var id = $(this).data('id');
            $('#' + id).fadeToggle();
                
           });
        });
    </script>
@stop