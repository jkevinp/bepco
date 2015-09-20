@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-12 ">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('barcode.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Show All Barcodes <span class="pull-right"><a href="{{route('barcode.print')}}" class="btn btn-theme"><i class="fa fa-print"></i> Print</a></span></h2>
                            
                             @foreach($files as $file)
                             <hr>
                            <div class="form-group">
                              
                                    <label for="readingdate" class="control-label col-lg-2">Barcode Key*</label>  
                                    <div class="col-lg-3">
                                        <input name="barcodekey"class="form-control input-medium " value="{{$file->getFilename()}}" size="16" type="text">
                                    </div>
                                    <div class='col-lg-7'>
                                        <img src="{{URL::asset('img-barcode')}}/{{$file->getFilename()}}"   />
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