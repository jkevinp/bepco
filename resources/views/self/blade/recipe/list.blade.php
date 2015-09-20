@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('barcode.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Recipe Listing<span class="pull-right"><a href="{{route('barcode.print')}}" class="btn btn-theme"><i class="fa fa-print"></i> Print</a></span></h2>
                            
                            @foreach($recipe as $r)
                            <hr>
                            <div class="form-group">
                                    <label for="readingdate" class="control-label col-lg-2">
                                        Recipe ID*
                                    </label>  
                                    <div class="col-lg-3">
                                        <input name="barcodekey"class="form-control input-medium " value="{{$r->id}}" size="16" type="text">
                                    </div>
                                    <div class='col-lg-7'>
                                        <img src="{{URL::asset(url('/').$r->product['imageurl'])}}"   />
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="readingdate" class="control-label col-lg-2">Recipe Name for {{$r->product['name']}}</label>  
                                    <div class="col-lg-3">
                                        <input name="barcodekey"class="form-control input-medium " value="{{$r->name}}" size="16" type="text">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="readingdate" class="control-label col-lg-2">Description*</label>  
                                    <div class="col-lg-3">
                                        <input name="barcodekey"class="form-control input-medium " value="{{$r->description}}" size="16" type="text">
                                    </div>
                            </div>
                            <a class="btn btn-primary ingredient" data-id="{{$r->id}}">Show Ingredients</a>

                            <div class="form-group ingredient{{$r->id}}" style="display:none;" >
                                
                                    <label for="readingdate" class="control-label col-lg-2">Ingredients</label> 
                                    <div class="col-md-12">
                                    <ul> 
                                        @foreach($r->ingredient as $i)
                                            <li> {{$i->quantity}} x {{$i->name}}</li>
                                        @endforeach
                                    </ul>
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
           $('a.ingredient').click(function(){
            var id = $(this).data('id');
            $('.ingredient' + id).fadeToggle();
           });
        });
    </script>
@stop