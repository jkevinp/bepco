@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('barcode.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Product Barcode List<span class="pull-right"><a href="{{route('barcode.print')}}" class="btn btn-theme"><i class="fa fa-print"></i> Print</a></span></h2>
                            @foreach($files as $file)
                            <hr>
                            <div class="form-group">
                                <label for="readingdate" class="control-label col-lg-2">Barcode ID*</label>  
                                <div class="col-lg-3">
                                    <input name="barcodekey"class="form-control input-medium " value="{{$file->id}}" size="16" type="text">
                                </div>
                                <div class='col-lg-7'>
                                    <img src="{{URL::asset($file->imageurl)}}" class="img img-responsive"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="readingdate" class="control-label col-lg-2">Barcode Key*</label>  
                                <div class="col-lg-3">
                                    <input name="barcodekey"class="form-control input-medium " value="{{$file->barcodekey}}" size="16" type="text">
                                </div>  
                            </div>

                            <div class="form-group">
                                <label for="readingdate" class="control-label col-lg-2">Assigned Product</label>  
                                <div class="col-lg-3">
                                    <p class="well well-info">
                                        {{$file->product->name}}
                                    </p>
                                </div>  
                                <div class="col-lg-3">
                                    <img src="{{URL::asset($file->product->imageurl)}}" class="img img-responsive"/>
                                </div>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop