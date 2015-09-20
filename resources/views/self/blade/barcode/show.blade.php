@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('barcode.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Show barcode</h2>
                            <hr>
                            <div class="form-group ">
                                <label for="readingdate" class="control-label col-lg-2">Barcode Key*</label>     
                                <div class="col-lg-10"><input name="barcodekey"class="form-control input-medium " value="{{$file}}" size="16" type="text"></div>
                            </div>
                            <div class="form-group ">
                                <label for="details" class="control-label col-lg-2">Image*</label>        
                                <div class="col-lg-10">
                                   <img src="{{URL::asset('img-barcode')}}/{{$file}}" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@stop