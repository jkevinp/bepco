@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 ">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('barcode.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Product Listing<span class="pull-right"><a href="{{route('barcode.print')}}" class="btn btn-theme"><i class="fa fa-print"></i> Print</a></span></h2>
                            @foreach($product as $p)
                            <hr>
                            <div class="form-group">
                                    <label for="readingdate" class="control-label col-lg-2">
                                        Product ID*
                                    </label>  
                                    <div class="col-lg-3">
                                        <input name="barcodekey"class="form-control input-medium " value="{{$p->id}}" size="16" type="text">
                                    </div>
                                    <div class='col-lg-7'>
                                        <img src="{{URL::asset($p->barcode['imageurl'])}}"   />
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="readingdate" class="control-label col-lg-2">Product Name*</label>  
                                    <div class="col-lg-3">
                                        <input name="barcodekey"class="form-control input-medium " value="{{$p->name}}" size="16" type="text">
                                    </div>
                                    <div class='col-lg-7'>
                                        <img src="{{URL::asset('img-barcode')}}/{{$p->imageurl}}"   />
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="readingdate" class="control-label col-lg-2">Product Price*</label>  
                                    <div class="col-lg-3">
                                        <input name="barcodekey"class="form-control input-medium " value="{{$p->price}}" size="16" type="text">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="readingdate" class="control-label col-lg-2">Alert quantity*</label>  
                                    <div class="col-lg-3">
                                        <input name="barcodekey"class="form-control input-medium " value="{{$p->alert_quantity}}" size="16" type="text">
                                    </div>
                            </div>
                            <a class="btn btn-primary recipe " data-id="{{$p->id}}">Show Recipe*</a>

                            <div class="form-group" style="display:none;"  id="{{$p->id}}">
                                <div class="col-md-offset-1">
                            @foreach($p->recipe as $r)
                                <label for="readingdate" class="control-label col-lg-2">Recipe*</label>  
                                <div class="col-lg-3">
                                    <input name="barcodekey"class="form-control input-medium " value="{{$r->id}}" size="16" type="text">
                                    <input name="barcodekey"class="form-control input-medium " value="{{$r->name}}" size="16" type="text">
                                </div>
                            @endforeach
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </form>
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